<?php


use Murkrow\PdfUtils\Services\GetPdfInfoService;
use Murkrow\PdfUtils\Services\MergePdfService;
use Murkrow\PdfUtils\Services\ParsePdfTextService;

it('can merge a pdf', function (){

    // This will merge the 3 input files into a single output file
    $result = MergePdfService::create()
        ->addInputFile(mockFileDir("merging/1.pdf"))
        ->addInputFile(mockFileDir("merging/2.pdf"))
        ->addInputFile(mockFileDir("merging/3.pdf"))
        ->setOutputFile(mockFileDir("merging/123.pdf"))
        ->execute();

    // Expect the output file to exist
    expect(file_exists(mockFileDir("merging/123.pdf")))->toBeTrue();

    // Expect the output file to have 3 pages
    expect(GetPdfInfoService::create()
        ->setInputFile(mockFileDir("merging/123.pdf"))
        ->execute()
        ->pages
    )->toBe(3);

    // Expect the output text to be 123
    expect(ParsePdfTextService::create()
        ->setInputFile(mockFileDir("merging/123.pdf"))
        ->flattenText()
        ->execute()
        ->getOperationResult()
    )->toBe("1 2 3");
});

afterAll(function (){
    // Remove the output file
    exec("rm -rf " . mockFileDir("merging/123.pdf"));
});
