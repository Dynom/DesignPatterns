<?php
/**
 * The proxy class prevents uncessesary loading of the image, whenever it's 
 * being requested. Basically solving debatable OO design by optimizing heavy 
 * operations such as network traffic or slow I/O (like this example simulates)
 *
 * The reason I call it "debatable OO" is because of multiple calls to 
 * something similar. If the result was injected or otherwise passed along in 
 * your application, the proxy wouldn't be needed.
 */
class ProxyImage
{
    /**
     * The name of the file we're dealing with
     * @var string $fileName
     */
    private $fileName;
    /**
     * The Image object, the one with the actual image logic
     * @var Image $image
     */
    private $image;
    /**
     * The result of the image loading
     * @var string $imageResult
     */
    private $imageResult;


    /**
     * @param string $fileName
     */
    public function __construct($fileName)
    {
        $this->fileName = $fileName;
    }


    /**
     * Return the contents of the image
     * @return string Binary data
     */
    public function getImageContents()
    {
        // If no object has been define yet, do so now.
        if ( ! $this->image instanceof Image) {
            $this->image = new Image( $this->fileName );
        }

        // If we didn't already retrieve the image, do so now
        if ( ! isset($this->imageResult)) {
            $this->imageResult = $this->image->getImageContents();
        }

        // Return the result
        return $this->imageResult;
    }
}
