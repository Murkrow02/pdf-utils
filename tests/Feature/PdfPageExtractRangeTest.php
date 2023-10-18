<?php

use Murkrow\PdfUtils\Services\ExtractPdfPageRangeService;
use Murkrow\PdfUtils\Services\GetPdfInfoService;
use Murkrow\PdfUtils\Services\ParsePdfTextService;
use Murkrow\PdfUtils\Services\SplitPdfService;
use function Pest\testDirectory;

it("can extract page range from pdf", function (){

    // Extract pages
    ExtractPdfPageRangeService::create()
        ->fromPage(1)
        ->toPage(2)
        ->setInputFile(mockFileDir('extracting/123.pdf'))
        ->setOutputFile(mockFileDir('extracting/extracted.pdf'))
        ->execute();

    // Ensure pdf has now 2 pages
    expect(GetPdfInfoService::create()
        ->setInputFile(mockFileDir('extracting/extracted.pdf'))
        ->execute()
        ->pages)->toBe(2);
});

afterAll(function (){
    // Delete the extracted pdf
    exec("rm -rf " . mockFileDir('extracting/extracted.pdf'));
});
