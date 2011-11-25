<?php

require 'Image.php';
require 'ProxyImage.php';


// Result in three times loading the image
$image = new Image('foo.jpg');
$image->getImageContents(); // Loads the image
$image->getImageContents(); // Loads the image
$image->getImageContents(); // Loads the image



// Result in only loading once
$image = new ProxyImage('foo.jpg');
$image->getImageContents(); // Loads the image
$image->getImageContents(); // Does not load the image
$image->getImageContents(); // Does not load the image
