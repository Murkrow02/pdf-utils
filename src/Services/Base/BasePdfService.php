<?php

namespace Murkrow\PdfUtils\Services\Base;
class BasePdfService
{
    public static function create()
    {
        return new static();
    }
}
