# Proxy

The Proxy design pattern quite simply redirects functionality to a different object and often used to overcome expensive operations. Such as network or otherwise intensive operations. In a way, RPC can be seen as something similar.

The demonstration includes 3 files:

* Proxy.php - The file tying it all together
* Image.php - The actual class, with expensive operations
* ProxyImage.php - The proxy for our Image class

