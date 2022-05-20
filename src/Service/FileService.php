<?php

namespace App\Service;

use Symfony\Component\Mime\MimeTypes;
use App\Model\PhotoFile;

class FileService {

    /** @var string */
    //TODO move it to config
    public const FILES_PATH = "C:\\Users\\toyju\\Desktop\\regenos_rest\\test";
    public const ENDPOINT_PATH = "/image/";

    private $extensionGuesser;

    public function __construct()
    {
        $this->extensionGuesser = new MimeTypes();
    }


    /**
     * @param string $base64
     * @return PhotoFile name of converted file
     */
    public function convertToFile(string $base64): PhotoFile
    {
        $fileName = $this->generateFileName();
        $filePath = $this->generateFilePath($fileName);

        $file = fopen($filePath, 'wb');
        fwrite($file, base64_decode($base64));
        fclose($file);

        $fileExt = $this->getFileExt($filePath);

        $realFilePath = $filePath . '.' . $fileExt;
        rename($filePath, $realFilePath);

        $fileEndpointPath = self::ENDPOINT_PATH . $fileName . '.' . $fileExt;

        return new PhotoFile($realFilePath, $fileEndpointPath);
    }

    /**
     * @param string $fileName
     * @return string
     */
    private function generateFilePath(string $fileName): string
    {
        return self::FILES_PATH . '/' . $fileName;
    }

    /**
     * @return string
     */
    private function generateFileName(): string
    {
        return uniqid("img_", true);
    }

    /**
     * @param string $filePath
     * @return string
     */
    private function getFileExt(string $filePath): string
    {
        return $this->extensionGuesser->getExtensions($this->extensionGuesser->guessMimeType($filePath))[0];
    }

    public function getContentType(string $filePath): string
    {
        return $this->extensionGuesser->guessMimeType($filePath);
    }
}