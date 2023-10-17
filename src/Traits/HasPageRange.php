<?php

namespace Murkrow\PdfUtils\Traits;

use Murkrow\PdfUtils\Exceptions\InvalidPageRangeException;

trait HasPageRange
{
    protected ?int $startPage;
    protected ?int $endPage;

    /**
     * @throws InvalidPageRangeException
     */
    public function fromPage(int $page) : self
    {
        // Check if page is greater than 0
        if($page < 1)
            throw new InvalidPageRangeException("Page must be greater than 0");

        // Check if endPage is set and ensure endPage is greater than startPage
        if(isset($this->endPage) && $this->endPage < $page)
            throw new InvalidPageRangeException("End page must be greater than start page");

        // Set startPage
        $this->startPage = $page;
        return $this;
    }

    /**
     * @throws InvalidPageRangeException
     */
    public function toPage(int $page) : self
    {
        // Check if page is greater than 0
        if($page < 1)
            throw new InvalidPageRangeException("Page must be greater than 0");

        // Check if startPage is set and ensure endPage is greater than startPage
        if(isset($this->startPage) && $this->startPage > $page)
            throw new InvalidPageRangeException("End page must be greater than start page");

        // Set endPage
        $this->endPage = $page;
        return $this;
    }

}
