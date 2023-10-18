pdf-utils
=============


[![Latest Stable Version](http://poser.pugx.org/murkrow/pdf-utils/v)](https://packagist.org/packages/murkrow/pdf-utils)
[![Total Downloads](http://poser.pugx.org/murkrow/pdf-utils/downloads)](https://packagist.org/packages/murkrow/pdf-utils)

A wrapper for popper-utils for your Laravel project

## Prerequisites
Ensure to have poppler-utils installed on your system. You can install it with the following command:
```bash
sudo apt-get install poppler-utils
```
or if you are using a Mac:
```bash
brew install poppler
```

## Installation

You can install the package via composer:

```bash
composer require murkrow/pdf-utils
```

You can publish the config file with:

```bash
php artisan vendor:publish --provider="Murkrow\PdfUtils\PdfUtilsServiceProvider"
```

## Usage

### Convert PDF to text
```php
use Murkrow\PdfUtils\Services\ParsePdfTextService;
ParsePdfTextService::create()
        ->setInputFile("example.pdf")
        ->flattenText(false)
        ->execute()
        ->getOperationResult()
```

### Merge multiple PDFs into one
```php
use Murkrow\PdfUtils\Services\MergePdfService;
MergePdfService::create()
        ->setInputFiles(["1.pdf", "2.pdf"])
        ->addInputFile("3.pdf")
        ->setOutputFile("123.pdf")
        ->execute();
```
### Split PDF into multiple PDFs

```php
use Murkrow\PdfUtils\Services\SplitPdfService;
SplitPdfService::create()
        ->setInputFile("123.pdf")
        ->setOutputFilesDirectory("splitting")
        ->fromPage(1)
        ->toPage(3)
        ->setOutputFileNamePrefix("output")
        ->execute();
```

### Extract page range from PDF
```php
use Murkrow\PdfUtils\Services\ExtractPdfPageRangeService;
ExtractPdfPageRangeService::create()
    ->fromPage(1)
    ->toPage(2)
    ->setInputFile('big.pdf')
    ->setOutputFile('subset.pdf')
    ->execute();
        
```

### Get PDF info (incomplete)
```php
use Murkrow\PdfUtils\Services\GetPdfInfoService;
$result = GetPdfInfoService::create()
        ->setInputFile("123.pdf")
        ->execute();

dd($result->pages);
```

## Testing

```bash
vendor/bin/pest
```

## Contributing
Contributions are welcome, you are free to open a PR or an issue.

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
