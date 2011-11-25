<?php

require 'Image.php';
require 'ProxyImage.php';


// Result in three times loading the image
$image = new Image('foo.jpg');
$image->getImageContents();
$image->getImageContents();
$image->getImageContents();



// Result in only loading once
$image = new ProxyImage('foo.jpg');
$image->getImageContents();
$image->getImageContents();
$image->getImageContents();
