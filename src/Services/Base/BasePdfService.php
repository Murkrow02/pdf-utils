<?php

namespace Murkrow\PdfUtils\Services\Base;
use Spatie\TemporaryDirectory\Exceptions\PathAlreadyExists;
use Spatie\TemporaryDirectory\TemporaryDirectory;

class BasePdfService
{
    public static function create(): static
    {
        return new static();
    }

    protected static function getTmpFolder(): string
    {
        $tmpDir = TemporaryDirectory::make()
            ->name('murkrow-pdf-utils');
        if($tmpDir->exists())
            return $tmpDir->path();
        else
            return $tmpDir->create()->path();
    }
}
