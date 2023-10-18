<?php

namespace Murkrow\PdfUtils\Services\Base;

use Murkrow\PdfUtils\Traits\HasSingleInputFile;
use Murkrow\PdfUtils\Traits\HasSingleOutputFile;

abstract class OneToOnePdfService extends BasePdfService
{
    use HasSingleInputFile;
    use HasSingleOutputFile;
}
