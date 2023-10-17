<?php

namespace Murkrow\PdfUtils\Services;
use Murkrow\PdfUtils\Services\Base\OneToInfoPdfService;

class GetPdfInfoService extends OneToInfoPdfService
{
    public function execute(): self
    {
        $command = "pdfinfo \"$this->inputFilePath\"";
        $output = shell_exec($command);

        // Now populate attributes based on output
        $lines = explode("\n", $output);

        foreach ($lines as $line) {
            if (preg_match('/^Creator:\s+(.+)/', $line, $matches)) {
                $this->creator = $matches[1];
            } elseif (preg_match('/^Producer:\s+(.+)/', $line, $matches)) {
                $this->producer = $matches[1];
            } elseif (preg_match('/^CreationDate:\s+(.+)/', $line, $matches)) {
                $this->creationDate = $matches[1];
            } elseif (preg_match('/^ModDate:\s+(.+)/', $line, $matches)) {
                $this->modDate = $matches[1];
            } elseif (preg_match('/^Tagged:\s+(.+)/', $line, $matches)) {
                $this->tagged = $matches[1];
            } elseif (preg_match('/^Form:\s+(.+)/', $line, $matches)) {
                $this->form = $matches[1];
            } elseif (preg_match('/^Pages:\s+(.+)/', $line, $matches)) {
                $this->pages = $matches[1];
            } elseif (preg_match('/^Encrypted:\s+(.+)/', $line, $matches)) {
                $this->encrypted = $matches[1];
            } elseif (preg_match('/^Page size:\s+(.+)/', $line, $matches)) {
                $this->pageSize = $matches[1];
            } elseif (preg_match('/^File size:\s+(.+)/', $line, $matches)) {
                $this->fileSize = $matches[1];
            } elseif (preg_match('/^Optimized:\s+(.+)/', $line, $matches)) {
                $this->optimized = $matches[1];
            } elseif (preg_match('/^PDF version:\s+(.+)/', $line, $matches)) {
                $this->pdfVersion = $matches[1];
            }
        }

        return $this;
    }
}
