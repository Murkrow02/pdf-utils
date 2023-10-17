<?php

namespace Murkrow\PdfUtils\Services\Base;

use Murkrow\PdfUtils\Services\Interfaces\ExecutablePdfService;
use Murkrow\PdfUtils\Traits\HasMultipleInputFiles;
use Murkrow\PdfUtils\Traits\HasOperationResult;
use Murkrow\PdfUtils\Traits\HasSingleInputFile;
use Murkrow\PdfUtils\Traits\HasSingleOutputFile;

abstract class OneToResultPdfService extends BasePdfService implements ExecutablePdfService
{
    use HasSingleInputFile, HasOperationResult;
}
