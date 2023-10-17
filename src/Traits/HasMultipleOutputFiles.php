<?php

namespace Murkrow\PdfUtils\Traits;

trait HasMultipleOutputFiles
{
    protected string $outputFilesDirectory;
    protected array $outputFilePaths = [];

    /**
     * The path provided will be used as the output directory
     */
    public function setOutputFilesDirectory(string $path) : self
    {
        $this->outputFilesDirectory = $path;
        return $this;
    }

    /**
     * Get the output file paths
     */
    public function getOutputFilePaths() : array
    {
        return $this->outputFilePaths;
    }
}
