<?php

namespace Murkrow\PdfUtils\Traits;

trait HasSingleInputFile
{
    protected string $inputFilePath;

    public function setInputFile(string $inputFilePath): self
    {
        $this->inputFilePath = $inputFilePath;
        return $this;
    }

    public function getInputFilePath(): string
    {
        return $this->inputFilePath;
    }
}
