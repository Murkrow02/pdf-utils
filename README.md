# pdf-utils
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
        ->setInputFile(mockFileDir("example.pdf"))
        ->flattenText(false)
        ->execute()
        ->getOperationResult()
```

### Merge multiple PDFs into one
```php
use Murkrow\PdfUtils\Services\MergePdfService;
MergePdfService::create()
        ->addInputFile(mockFileDir("1.pdf"))
        ->addInputFile(mockFileDir("2.pdf"))
        ->addInputFile(mockFileDir("3.pdf"))
        ->setOutputFile(mockFileDir("123.pdf"))
        ->execute();
```
### Split PDF into multiple PDFs

```php
use Murkrow\PdfUtils\Services\SplitPdfService;
SplitPdfService::create()
        ->setInputFile(mockFileDir("123.pdf"))
        ->setOutputFilesDirectory("splitting")
        ->fromPage(1)
        ->toPage(3)
        ->setOutputFileNamePrefix("output")
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
