<?php

namespace Murkrow\PdfUtils\Traits;

use Illuminate\Contracts\Filesystem\FileNotFoundException;

trait HasMultipleInputFiles
{
    protected array $inputFilePaths;

    /**
     * @throws FileNotFoundException
     */
    public function addInputFile(string $inputFilePath): self
    {
        // Check if input file exists
        if(!file_exists($inputFilePath))
            throw new FileNotFoundException();

        $this->inputFilePaths[] = $inputFilePath;
        return $this;
    }

    /**
     * @throws FileNotFoundException
     */
    public function setInputFiles(array $inputFilePaths): self
    {
        foreach($inputFilePaths as $inputFilePath)
        {
            // Check if input file exists
            if(!file_exists($inputFilePath))
                throw new FileNotFoundException();
        }

        $this->inputFilePaths = $inputFilePaths;
        return $this;
    }
    public function getInputFilePaths(): array
    {
        return $this->inputFilePaths;
    }
}
