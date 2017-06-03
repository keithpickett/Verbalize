# Verbalize
A PHP project to verbalize a password string. It can also generate a random password and score it's strength.

This is a simple PHP-based project for verbalizing passwords.  If you are a system administrator and provide passwords to clients, this will allow you to give them a readable string to identify the password.  For example, consider the following password: Magg|3D0nks

The returned string would be: Upper-M, Lower-a, Lower-g, Lower-g, Pipe, Number-3, Upper-D, Number-0, Lower-n, Lower-k, Lower-s, Lower-s

As I developed this project, I also played around with password generation and substituting [Leet](https://en.wikipedia.org/wiki/Leet "Leet") character-inclusive passwords as well as a password strength rating.

The project depends on other PHP libraries and a composer.json file is provided to install those.  The project itself provides 2 example files, a class, and supporting files (.csv and API key for WordNik).  
The first example file is idchar.php.  It provides a sample password string and can be run on the command line.  The result is the password string verbaized.

The second file is passwd_gen.php.  It generates a random password string made up of a random name chosen from the names.csv file and a random word from [WordNik](http://developer.wordnik.com "WordNik").  Finally, the code will evaluate the password string and give it a strength score between 1 and 4 with 4 being the strongest.

You are free to fork the code and use as you wish.  A little nod would be appreciated, but not required.  It is just something I wanted to do and to get my feet wet in Github. I hope you find it useful.

