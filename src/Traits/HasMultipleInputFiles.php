<?php

namespace Murkrow\PdfUtils\Traits;

trait HasMultipleInputFiles
{
    protected array $inputFilePaths;

    public function addInputFile(string $inputFilePath): self
    {
        $this->inputFilePaths[] = $inputFilePath;
        return $this;
    }

    public function getInputFilePaths(): array
    {
        return $this->inputFilePaths;
    }
}
