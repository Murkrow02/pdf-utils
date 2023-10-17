<?php

namespace Murkrow\PdfUtils\Services\Base;

use Murkrow\PdfUtils\Services\Interfaces\ExecutablePdfService;

abstract class OneToOnePdfService extends BasePdfService implements ExecutablePdfService
{
    protected string $inputFilePath;
    protected string $outputFilePath;
}
