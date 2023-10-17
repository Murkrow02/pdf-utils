<?php

namespace Murkrow\PdfUtils\Services;
use Murkrow\PdfUtils\Services\Base\ManyToOnePdfService;

class MergePdfService extends ManyToOnePdfService
{
    public function execute(): self
    {
        $inputPaths = implode(' ', $this->inputFilePaths);
        $command = "pdfunite {$inputPaths} {$this->outputFilePath}";
        exec($command);
        return $this;
    }
}
