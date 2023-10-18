<?php

namespace Murkrow\PdfUtils\Services\Base;

use Murkrow\PdfUtils\Services\Interfaces\ExecutablePdfService;
use Murkrow\PdfUtils\Traits\HasMultipleInputFiles;
use Murkrow\PdfUtils\Traits\HasMultipleOutputFiles;
use Murkrow\PdfUtils\Traits\HasSingleInputFile;

abstract class OneToManyPdfService extends BasePdfService
{
    use HasSingleInputFile;
    use HasMultipleOutputFiles;

    protected string $outputFileNamePrefix;

    /**
     * The string provided will be used as a prefix for the output file names (before 1.pdf, 2.pdf, etc)
     */
    public function setOutputFileNamePrefix(string $prefix) : self
    {
        $this->outputFileNamePrefix = $prefix;
        return $this;
    }
}
