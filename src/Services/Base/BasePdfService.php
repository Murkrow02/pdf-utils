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
        return TemporaryDirectory::make()
            ->name('murkrow-pdf-utils')
            ->force()
            ->create()
            ->path();
    }
}
