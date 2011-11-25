<?php


/**
 * Our kick-ass image class
 */
class Image
{
    private $fileName;

    public function __construct($fileName)
    {
        $this->fileName = $fileName;
    }


    private function loadImage()
    {
        // Loading image from floppy-disk
        #$image = file_get_contents('/mnt/floppy/'. $this->fileName);
        sleep(1);
    }


    public function getImageContents()
    {
        return $this->loadImage();
    }
}


