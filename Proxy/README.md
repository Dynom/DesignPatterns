# Proxy

The Proxy design pattern quite simply redirects functionality to a different object and often used to overcome expensive operations. Such as network or otherwise intensive operations. In a way, RPC can be seen as something similar.

Proxy also shares similarities with Adapter and Facade. Proxy however can change the interface and add functionality. Adapter does not change the interface, and only adds functionality. Facade is similar in the sense that it offers a single, more simple, interface (Polymorphism) to certain functionality, often placed in more then one model.


The demonstration includes 3 files:

* Proxy.php - The file tying it all together
* Image.php - The actual class, with expensive operations
* ProxyImage.php - The proxy for our Image class

