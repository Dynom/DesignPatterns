<?php


/**
 * Our kick-ass image class
 */
class Image
{
    /**
     * @var string $fileName;
     */
    private $fileName;

    /**
     * @param string $fileName
     */
    public function __construct($fileName)
    {
        $this->fileName = $fileName;
    }


    /**
     * Load our image from flopp!
     * @return string
     */
    private function loadImage()
    {
        // Loading image from floppy-disk
        #$image = file_get_contents('/mnt/floppy/'. $this->fileName);
        sleep(1);
        return 'foo';
    }


    /**
     * Load the image, and returns the result
     * @return string
     */
    public function getImageContents()
    {
        return $this->loadImage();
    }
}

