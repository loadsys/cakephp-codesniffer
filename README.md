# Loadsys Code Sniffer [![Build Status](https://travis-ci.org/loadsys/loadsys_codesniffer.png?branch=master)](http://travis-ci.org/loadsys/loadsys_codesniffer)

This code works with [phpcs](http://pear.php.net/manual/en/package.php.php-codesniffer.php)
and checks code against the coding standards used by Loadsys. This package is based upon the
[CakePHP coding standards](https://github.com/cakephp/cakephp-codesniffer) with some customizations.

## Installation

Its generally recommended to install these code sniffs via composer:

```json
{
     "require": {
         "loadsys/loadsys_codesniffer": "dev-master"
     }
}
```

Alternate method:

	php composer.phar require loadsys/loadsys_codesniffer
	bin/phpcs --config-set installed_paths vendor/loadsys/loadsys_codesniffer

The second command lets `phpcs` know where to find your new sniffs. Ensure that
you do not overwrite any existing `installed_paths` value.

For both Loadsys Skeleton apps and CakePHP 3.x apps, the default composer bin is at root of your app, so replace `vendor/bin/` by `bin/` in all commands.

## Usage

*Warning* when these sniffs are installed with composer, ensure that you have
configured the CodeSniffer `installed_paths` setting.

Once `installed_paths` is configured, you can run phpcs using:

	bin/phpcs --standard=Loadsys

## Contributing

`phpunit` will fail to run the test when the root directory contains a dash. (Hence **loadsys_codesniffer** instead of **loadsys-codesniffer**).

## Releasing Loadsys Code Sniffer

* Update version number in build.xml
* Add changelog entry.
* Commit changes.
* Create git tag.
* Push back to the repo. (Packagist will be notified.)
