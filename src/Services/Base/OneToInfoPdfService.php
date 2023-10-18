<?php

namespace Murkrow\PdfUtils\Services\Base;

use Murkrow\PdfUtils\Services\Interfaces\ExecutablePdfService;
use Murkrow\PdfUtils\Traits\HasMultipleInputFiles;
use Murkrow\PdfUtils\Traits\HasSingleInputFile;
use Murkrow\PdfUtils\Traits\HasSingleOutputFile;

abstract class OneToInfoPdfService extends BasePdfService
{
    use HasSingleInputFile;
    public ?string $creator         = null;
    public ?string $producer        = null;
    public ?string $creationDate    = null;
    public ?string $modDate         = null;
    public ?string $tagged          = null;
    public ?string $form            = null;
    public ?int $pages              = null;
    public ?string $encrypted       = null;
    public ?string $pageSize        = null;
    public ?string $fileSize        = null;
    public ?string $optimized       = null;
    public ?float $pdfVersion       = null;

}
