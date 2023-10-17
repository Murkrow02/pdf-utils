<?php

namespace Murkrow\PdfUtils\Services;

use Murkrow\PdfUtils\Services\Base\OneToResultPdfService;
use Murkrow\PdfUtils\Services\Interfaces\ExecutablePdfService;

class ParsePdfTextService extends OneToResultPdfService
{
    protected bool $flattenText = false;
    function execute(): self
    {
        $command = "pdftotext {$this->inputFilePath} -";
        $this->operationResult = shell_exec($command);

        // Remove line breaks, tabs, multiple spaces and trim
        if($this->flattenText){
            $this->operationResult = preg_replace('/\s+/u', ' ', $this->operationResult);
            $this->operationResult = trim($this->operationResult);
        }

        return $this;
    }

    public function flattenText(bool $flattenText = true): self
    {
        $this->flattenText = $flattenText;
        return $this;
    }
}
