<?php

namespace Murkrow\PdfUtils\Traits;

trait HasOperationResult
{
    protected string|int|null $operationResult;

    public function getOperationResult(): string|int|null
    {
        return $this->operationResult;
    }
}
