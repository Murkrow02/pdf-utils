<?php

namespace Murkrow\PdfUtils\Traits;

use Illuminate\Contracts\Filesystem\FileNotFoundException;

trait HasSingleInputFile
{
    protected string $inputFilePath;

    /**
     * @throws FileNotFoundException
     */
    public function setInputFile(string $inputFilePath): self
    {
        // Check if file exists
        if(!file_exists($inputFilePath))
            throw new FileNotFoundException();

        $this->inputFilePath = $inputFilePath;
        return $this;
    }

    public function getInputFilePath(): string
    {
        return $this->inputFilePath;
    }
}
