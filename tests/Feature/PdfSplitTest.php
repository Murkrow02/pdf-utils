<?php

use Murkrow\PdfUtils\Services\ParsePdfTextService;
use Murkrow\PdfUtils\Services\SplitPdfPdfService;

it("can split a pdf", function (){

    // Split pdf in 3 parts
    $result = SplitPdfPdfService::create()
        ->setInputFile(mockFileDir("splitting/123.pdf"))
        ->setOutputFilesDirectory(mockFileDir("splitting"))
        ->fromPage(1)
        ->toPage(3)
        ->setOutputFileNamePrefix("output")
        ->execute();

    // Check if the output files were created
    assert(count($result->getOutputFilePaths()) == 3);
    assert(file_exists($result->getOutputFilePaths()[0]));
    assert(file_exists($result->getOutputFilePaths()[1]));
    assert(file_exists($result->getOutputFilePaths()[2]));

    // Check if the output files contain the correct text
    expect(
        ParsePdfTextService::create()
            ->flattenText()
            ->setInputFile($result->getOutputFilePaths()[0])
            ->execute()
            ->getOperationResult()
    )->toBe("1");



    // Check that providing wrong page numbers throws an error
    expect(function (){
        SplitPdfPdfService::create()
            ->fromPage(0)
            ->toPage(1);
    })->toThrow(\Murkrow\PdfUtils\Exceptions\InvalidPageRangeException::class);
    expect(function (){
        SplitPdfPdfService::create()
            ->fromPage(3)
            ->toPage(2);
    })->toThrow(\Murkrow\PdfUtils\Exceptions\InvalidPageRangeException::class);

});

afterAll(function (){
    // Delete the output files
    $outputFiles = glob(mockFileDir("splitting/output*.pdf"));
    foreach($outputFiles as $file){
        unlink($file);
    }
});
