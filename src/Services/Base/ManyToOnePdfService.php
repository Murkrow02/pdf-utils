<?php

namespace Murkrow\PdfUtils\Services\Base;

use Murkrow\PdfUtils\Services\Interfaces\ExecutablePdfService;
use Murkrow\PdfUtils\Traits\HasMultipleInputFiles;
use Murkrow\PdfUtils\Traits\HasSingleOutputFile;

abstract class ManyToOnePdfService extends BasePdfService
{
    use HasMultipleInputFiles;
    use HasSingleOutputFile;
}
