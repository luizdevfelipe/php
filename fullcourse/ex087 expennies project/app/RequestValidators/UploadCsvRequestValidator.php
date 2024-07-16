<?php

declare(strict_types=1);

namespace App\RequestValidators;

use App\Contracts\RequestValidatorInterface;
use App\Exception\ValidationException;
use League\MimeTypeDetection\FinfoMimeTypeDetector;
use Psr\Http\Message\UploadedFileInterface;

class UploadCsvRequestValidator implements RequestValidatorInterface
{
    public function validate(array $data): array
    {
        /** @var UploadedFileInterface */
        $uploadedFile = $data['transactions'] ?? null;

        if (!$uploadedFile) {
            throw new ValidationException(['csv' => ['Insert a csv file']]);
        }

        if ($uploadedFile->getError() !== UPLOAD_ERR_OK) {
            throw new ValidationException(['csv' => ['Failed to uploade file']]);
        }

        $maxSize = 5 * 1024 * 1024;
        if ($uploadedFile->getSize() > $maxSize) {
            throw new ValidationException(['csv' => ['Maximum file size is 5MB']]);
        }

        $filename = $uploadedFile->getClientFilename();

        if (!preg_match('/^[a-zA-Z0-9._-]+$/', $filename)) {
            throw new ValidationException(['csv' => ['File name is not supported']]);
        }

        if ($uploadedFile->getClientMediaType() !== 'text/csv') {
            throw new ValidationException(['csv' => ['Incorret file type']]);
        }

        $detector = new FinfoMimeTypeDetector();
        $tmpFilePath = $uploadedFile->getStream()->getMetadata('uri');

        if ($detector->detectMimeTypeFromFile($tmpFilePath) !== 'text/csv') {
            throw new ValidationException(['csv' => 'Incorret file type']);
        }

        return $data;
    }
}
