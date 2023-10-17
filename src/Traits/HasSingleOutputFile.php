<?php

namespace Murkrow\PdfUtils\Traits;

trait HasSingleOutputFile
{
    protected string $outputFilePath;

    public function setOutputFile(string $outputFilePath): self
    {
        $this->outputFilePath = $outputFilePath;
        return $this;
    }

    public function getOutputFilePath(): string
    {
        return $this->outputFilePath;
    }
}
