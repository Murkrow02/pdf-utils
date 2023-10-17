<?php


use Murkrow\PdfUtils\Services\ParsePdfTextService;

it('can parse pdf text content', function (){

    expect(ParsePdfTextService::create()
        ->setInputFile(mockFileDir("parsing/123.pdf"))
        ->flattenText()
        ->execute()
        ->getOperationResult()
    )->toBe("1 2 3");
});


