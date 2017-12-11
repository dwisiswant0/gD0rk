# gD0rk
Google Hack Database dork automatic tool.

**gD0rk** is a free and open source scanner. Evolved from Google search engine, it has adapted several new features that improve fuctionality and usability. It is mostly experimental software. The GHDB is an index of search queries *(we call them dorks)* used to find publicly available information, intended for pentesters and security researchers.

![screenshot - 111217 - 13 15 12](https://user-images.githubusercontent.com/25837540/33818072-8bbfb24c-de75-11e7-9fcf-e3f0ce926b32.png)


## Installation
Clone the repository:
```
$ git clone https://github.com/dwisiswant0/gD0rk.git
```
Then go inside:
```
$ cd gD0rk
```
And install it with [composer](https://getcomposer.org/download/):
```
$ composer install
```

## Recommended PHP Version:
gD0rk required **PHP 5+**, and currently tested on **PHP 7.0.23-1** *(CLI)*.


# Usage
```
$ php gd0rk.php -d "inurl:index.php?id= ext:php" -p "127.0.0.1:9050"
```
```
Startup:
  -d DORK		DORK for searching.

Optional arguments:
  -h,  --help		print this help.
  -p PROXY		surf with PROXY.
  -o FILE		log results to FILE.
  -v,  --verbose	shows details about the results of surfing.
```

## Help & Bugs
If you are still confused or found a bug, please [open the issue](https://github.com/dwisiswant0/gD0rk/issues). All bug reports are appreciated, some features have not been tested yet due to lack of free time.

## License
**gD0rk** is licensed under the MIT. Take a look at the [LICENSE](https://github.com/dwisiswant0/gD0rk/blob/master/LICENSE) for more information.

## Version
**Current version is 1.0** *(experimental)* and still development.
