<?php

namespace Murkrow\PdfUtils\Services;

use Murkrow\PdfUtils\Services\Base\OneToManyPdfService;
use Murkrow\PdfUtils\Traits\HasPageRange;

class SplitPdfPdfService extends OneToManyPdfService
{
    use HasPageRange;

    public function execute(): self
    {
        // Split the pdf
        $command = "pdfseparate -f $this->startPage -l $this->endPage \"$this->inputFilePath\" \"$this->outputFilesDirectory/$this->outputFileNamePrefix\"%d.pdf";
        exec($command);

        // Fill the output file paths
        for($i = $this->startPage; $i <= $this->endPage; $i++){
            $this->outputFilePaths[] = $this->outputFilesDirectory."/".$this->outputFileNamePrefix.$i.".pdf";
        }

        return $this;
    }
}
