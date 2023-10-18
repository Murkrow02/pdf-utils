<?php

namespace Murkrow\PdfUtils\Services;

use Illuminate\Support\Str;
use Murkrow\PdfUtils\Services\Base\OneToOnePdfService;
use Murkrow\PdfUtils\Traits\HasPageRange;

class ExtractPdfPageRangeService extends OneToOnePdfService
{
    use HasPageRange;

    function execute(): self
    {
        // Get temp folder
        $tmpFolderPath = self::getTmpFolder();

        // First split the pdf into single pages
        $splitPdfService = SplitPdfService::create()
            ->fromPage($this->startPage)
            ->toPage($this->endPage)
            ->setInputFile($this->inputFilePath)
            ->setOutputFilesDirectory($tmpFolderPath)
            ->setOutputFileNamePrefix(Str::random(20))
            ->execute();

        // Merge the pages
        MergePdfService::create()
            ->setInputFiles($splitPdfService->getOutputFilePaths())
            ->setOutputFile($this->outputFilePath)
            ->execute();

        // Delete the tmp files
        foreach($splitPdfService->getOutputFilePaths() as $filePath)
        {
            unlink($filePath);
        }

        return $this;
    }
}
