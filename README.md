# Verbalize
A PHP project to verbalize a password string.

This is a simple PHP-based project for verbalizing passwords.  If you are a system administrator and provide passwords to clients, this will allow you to give them a readable string to identify the password.  For example, consider the following password: Magg|3D0nks

The returned string would be: Upper-M, Lower-a, Lower-g, Lower-g, Pipe, Number-3, Upper-D, Number-0, Lower-n, Lower-k, Lower-s, Lower-s

As I developed this project, I also played around with password generation and substituting [Leet](https://en.wikipedia.org/wiki/Leet "Leet") character-inclusive passwords as well as a password strength rating.

The project depends on other PHP libraries and a composer.json file is provided to install those.  The project itself 
