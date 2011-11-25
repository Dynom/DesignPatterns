<?php
/**
 * The proxy class prevents uncessesary loading of the image, whenever it's 
 * being requested. Basically solving incorrect OO design...
 */
class ProxyImage
{
    private $fileName;
    private $image;
    private $imageResult;


    public function __construct($fileName)
    {
        $this->fileName = $fileName;
    }


    public function getImageContents()
    {
        if ( ! $this->image instanceof Image) {
            $this->image = new Image( $this->fileName );
        }

        if ( ! isset($this->imageResult)) {
            $this->imageResult = $this->image->getImageContents();
        }

        return $this->imageResult;
    }
}
