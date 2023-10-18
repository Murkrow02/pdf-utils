<?php

namespace Murkrow\PdfUtils\Services;

use Murkrow\PdfUtils\Services\Base\OneToManyPdfService;
use Murkrow\PdfUtils\Traits\HasPageRange;

class SplitPdfService extends OneToManyPdfService
{
    use HasPageRange;

    public function execute(): self
    {
        // Split the pdf
        $filePrefix = $this->outputFileNamePrefix ?? "";
        $command = "pdfseparate -f $this->startPage -l $this->endPage \"$this->inputFilePath\" \"$this->outputFilesDirectory/$filePrefix\"%d.pdf";
        exec($command);

        // Fill the output file paths
        for($i = $this->startPage; $i <= $this->endPage; $i++){
            $this->outputFilePaths[] = $this->outputFilesDirectory."/".$filePrefix.$i.".pdf";
        }

        return $this;
    }
}
