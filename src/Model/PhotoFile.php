<?php

namespace App\Model;

class PhotoFile
{
    private $filePath;
    private $fileEndpointPath;

    /**
     * @param $filePath
     * @param $fileEndpointPath
     */
    public function __construct($filePath, $fileEndpointPath)
    {
        $this->filePath = $filePath;
        $this->fileEndpointPath = $fileEndpointPath;
    }

    /**
     * @return mixed
     */
    public function getFilePath()
    {
        return $this->filePath;
    }

    /**
     * @param mixed $filePath
     * @return PhotoFile
     */
    public function setFilePath($filePath)
    {
        $this->filePath = $filePath;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFileEndpointPath()
    {
        return $this->fileEndpointPath;
    }

    /**
     * @param mixed $fileEndpointPath
     * @return PhotoFile
     */
    public function setFileEndpointPath($fileEndpointPath)
    {
        $this->fileEndpointPath = $fileEndpointPath;
        return $this;
    }
}