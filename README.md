# Loadsys Code Sniffer [![Build Status](https://travis-ci.org/loadsys/loadsys_codesniffer.png?branch=master)](http://travis-ci.org/loadsys/loadsys_codesniffer)

This package works with [phpcs](http://pear.php.net/manual/en/package.php.php-codesniffer.php)
and checks code against the coding standards used by Loadsys. It is based upon the
[CakePHP coding standards](https://github.com/cakephp/cakephp-codesniffer) with some customizations.

:construction: *WARNING: This `php_codesniffer-2.x` branch is a work in progress to support `phpcs 2`. It is currently working, but is probably not accurate.*

## Installation

Install these code sniffs via composer in your project's composer.json `require` or `require-dev` property:

```json
{
     "require": {
         "loadsys/loadsys_codesniffer": "dev-php_codesniffer-2.x"
     }
}
```

Alternate method:

	php composer.phar require loadsys/loadsys_codesniffer
	vendor/bin/phpcs --config-set installed_paths vendor/loadsys/loadsys_codesniffer/,vendor/cakephp/cakephp-codesniffer/

The second command lets `phpcs` know where to find your new sniffs. Ensure that you do not overwrite any existing `installed_paths` value.

For both Loadsys-Skeleton-based apps and CakePHP 3.x apps, the default composer bin is at root of your app, so replace `vendor/bin/` by `bin/` in all commands.


## Usage

Once `installed_paths` is configured, you can run phpcs using:

	bin/phpcs --standard=Loadsys

*Warning* when these sniffs are installed with composer, ensure that you have configured the CodeSniffer `installed_paths` setting. Alternatively you can target the full path to the Loadsys folder:

	bin/phpcs --standard=vendor/loadsys/loadsys_codesniffer/Loadsys files/to/sniff/


# Contributing

* Clone the project and create a new feature branch.
* Create/edit `Loadsys/Sniffs/*` classes.
* Add or change source fils in `tests/files/` that verify pass/fail status for the new/changed rules.
* Run `phpunit` to confirm all tests pass.
* Submit a PR.

**Note:** `phpunit` will fail to run the tests when the root directory contains a dash. (Hence **loadsys_codesniffer** instead of **loadsys-codesniffer**).


## Releasing Loadsys Code Sniffer

* Review and merge a PR.
* Create git tag.
* Push tag back to the repo. (Packagist will be notified.)


## @TODO

Parse the output from `vendor/bin/phpcs --standard=./Loadsys tests/files/` looking for two things:

* Make sure there are no filenames ending in `_pass.php` listed. (This _should_ be redundant, but you never know.)
* Compare the list of warnings and errors generated for each file against some master list of expected failures. Maybe annotations in the Sniff classes? `@test	filename_fail.php	Error message reported.` Other than ending in `_pass.php` the names of the files don't matter, so perhaps they could be conventionalized to indicate the error expected?
