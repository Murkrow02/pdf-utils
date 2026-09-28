<?php


use Murkrow\PdfUtils\Services\GetPdfInfoService;
use Murkrow\PdfUtils\Services\ParsePdfTextService;

it('can get pdf infos', function (){

    $result = GetPdfInfoService::create()
        ->setInputFile(mockFileDir("info/123.pdf"))
        ->execute();

    expect($result->pages)->toBe(3);
    //TODO: test other infos
});

it('parses all available pdf metadata fields', function () {
    $result = GetPdfInfoService::create()
        ->setInputFile(mockFileDir("info/123.pdf"))
        ->execute();

    // Pages
    expect($result->pages)->toBe(3);

    // Form (mock PDF has "none")
    expect($result->form)->toBe('none');

    // Encrypted
    expect($result->encrypted)->toBe('no');

    // Page size should contain pts
    expect($result->pageSize)->toContain('pts');

    // File size should be numeric string with "bytes"
    expect($result->fileSize)->toContain('bytes');

    // Optimized
    expect($result->optimized)->toBe('no');

    // PDF version should be a float
    expect($result->pdfVersion)->toBeFloat();
    expect($result->pdfVersion)->toBeGreaterThan(0);

    // Tagged
    expect($result->tagged)->toBe('no');
});

it('returns fluent instance from execute', function () {
    $service = GetPdfInfoService::create()
        ->setInputFile(mockFileDir("info/123.pdf"));

    $result = $service->execute();

    expect($result)->toBeInstanceOf(GetPdfInfoService::class);
    expect($result)->toBe($service);
});


