# Loadsys Code Sniffer 

[![Latest Version](https://img.shields.io/github/release/loadsys/loadsys_codesniffer.svg?style=flat-square)](https://github.com/loadsys/loadsys_codesniffer/releases)
[![Build Status](https://travis-ci.org/loadsys/loadsys_codesniffer.png?branch=master)](http://travis-ci.org/loadsys/loadsys_codesniffer)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.txt)
[![Total Downloads](https://img.shields.io/packagist/dt/loadsys/loadsys_codesniffer.svg?style=flat-square)](https://packagist.org/packages/loadsys/loadsys_codesniffer)

This package works with [phpcs](http://pear.php.net/manual/en/package.php.php-codesniffer.php)
and checks code against the coding standards used by Loadsys. It is based upon the
[CakePHP coding standards](https://github.com/cakephp/cakephp-codesniffer) with some customizations specific to the Loadsys internal standards and preference.

:warning: This code is designed to target Cake 3.x projects, for Cake 2.x projects, use one of the latests `2.x` releases of this project.

## Installation

Install these code sniffs via composer in your project:

```bash
php composer.phar require loadsys/loadsys_codesniffer:~3.0
vendor/bin/phpcs --config-set installed_paths vendor/loadsys/loadsys_codesniffer,vendor/cakephp/cakephp_codesniffer
```

The second command lets `phpcs` know where to find your the Loadsys and CakePHP sniffs. Ensure that you do not overwrite any existing `installed_paths` value, if you have other custom PHPCS sniff locations.

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
