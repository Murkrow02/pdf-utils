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


