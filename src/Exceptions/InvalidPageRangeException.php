<?php

namespace Murkrow\PdfUtils\Exceptions;

use Exception;

class InvalidPageRangeException extends Exception
{
    public function __construct($message = "Invalid page range")
    {
        parent::__construct($message);
    }
}
