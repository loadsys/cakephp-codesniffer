# Loadsys Code Sniffer

[![Latest Version](https://img.shields.io/github/release/loadsys/loadsys_codesniffer.svg?style=flat-square)](https://github.com/loadsys/loadsys_codesniffer/releases)
[![Build Status](https://img.shields.io/travis/loadsys/loadsys_codesniffer.svg?style=flat-square)](http://travis-ci.org/loadsys/loadsys_codesniffer)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.txt)
[![Total Downloads](https://img.shields.io/packagist/dt/loadsys/loadsys_codesniffer.svg?style=flat-square)](https://packagist.org/packages/loadsys/loadsys_codesniffer)

This package works with [phpcs](http://pear.php.net/manual/en/package.php.php-codesniffer.php)
and checks code against the coding standards used by Loadsys. It is based upon the
[CakePHP coding standards](https://github.com/cakephp/cakephp-codesniffer) with some customizations specific to the Loadsys internal standards and preference.

:warning: This code is designed to target Cake 3.x projects, for Cake 2.x projects, use one of the latests `2.x` releases of this project.


## Notable Style Differences

This ruleset is basically [PSR-2](http://www.php-fig.org/psr/psr-2/) with the following diferences:

* Tabs are used for indenting instead of spaces. 1 character is better than 4. The other arguments for "fine grained alignment" are a failure of editing tools, not the tab character itself. Resorting to spaces is the wrong solution to the problem. _(See [Elastic Tabstops](http://nickgravgaard.com/elastic-tabstops/).)_
* Opening braces universally go on the same line as their block opener. This applies to classes, functions, methods and all control structures. We prefer a single consistent bracing rule.

Other items that are inherited but worth pointing out anyway:

* Namespaces are mandatory for classes.
* Short array syntax is mandatory.
* Final commas in multi-line arrays are mandatory (soon).


## Installation

Install these code sniffs via composer in your project:

```bash
$ composer require loadsys/loadsys_codesniffer:~3.0
$ vendor/bin/phpcs --config-set installed_paths vendor/cakephp/cakephp-codesniffer,vendor/loadsys/loadsys_codesniffer
```

The second command lets `phpcs` know where to find your the Loadsys and CakePHP sniffs. Ensure that you do not overwrite any existing `installed_paths` value if you have other custom PHPCS sniff locations.


## Usage

Once `installed_paths` is configured, you can run phpcs using:

```bash
$ bin/phpcs -p --standard=Loadsys
```

*Warning* when these sniffs are installed with composer, ensure that you have configured the CodeSniffer `installed_paths` setting set for _both_ the CakePHP Standard and the Loadsys Standard.

A typical option is to supress warnings when running on Travis. To do so, use the `-n` CLI option.

```bash
$ bin/phpcs -n --standard=Loadsys
```

## Contributing

* Clone the project and create a new feature branch.
* Run `composer install` to install the project's testing dependencies.
* Create/edit `Loadsys/Sniffs/*` classes or modify `Loadsys/ruleset.xml` as desired.
* Add or change source files in `snifftests/files/` that verify pass/fail status for the new/changed rules.
* Run `vendor/bin/phpunit` to confirm all tests pass.
* Submit a PR.

**Note:** `phpunit` will fail to run the tests when the root directory contains a dash. (Hence **loadsys_codesniffer** instead of **loadsys-codesniffer**).


## Releasing Loadsys Code Sniffer

* Review and merge a PR.
* Create git tag.
* Push tag back to the repo. (Packagist will be notified.)


## Testing

Tests are run on the coding standard using sample files that are designed to either pass the full sniff suite without generating any errors or warnings, or that are intended to fail and trigger _specific_ sniff errors/warnings.

These sample files live in the `snifftests/files/` directory and can be grouped in any manner that makes sense. Our choice is to group tests into two imperative folders, `must/` and `must_not/`. File names start with the topic being tested, such as `array_` or `braces_` or `indent_` and continue with more specificity. For example:

```
snifftests/files/must_not/array_syntax_long.php
snifftests/files/must/array_syntax_short_pass.php
```

Tests can affirm either that a coding mistake is properly caught by the sniffer, or that valid coding practices are not incorrectly caught by the sniffer.


### Reference sniffs

Since we inherit from these rulesets, it's nice to have links to them handy:

* CakePHP: [ruleset.xml](https://github.com/cakephp/cakephp-codesniffer/blob/master/CakePHP/ruleset.xml), [Sniffs](https://github.com/cakephp/cakephp-codesniffer/tree/master/CakePHP/Sniffs)
* PSR-2: [ruleset.xml](https://github.com/squizlabs/PHP_CodeSniffer/blob/master/CodeSniffer/Standards/PSR2/ruleset.xml), [Sniffs](https://github.com/squizlabs/PHP_CodeSniffer/tree/master/CodeSniffer/Standards/PSR2/Sniffs)
* [All Squiz-provided Standards](https://github.com/squizlabs/PHP_CodeSniffer/tree/master/CodeSniffer/Standards)
* Vanilla Forums: [ruleset.xml](https://github.com/vanilla/addons/blob/master/standards/Vanilla/ruleset.xml), [Sniffs](https://github.com/vanilla/addons/tree/master/standards/Vanilla/Sniffs) (we use a copy of their "ValidClassBrackets" sniff.)
* Codesniffer docs: [Annotated ruleset.xml](https://github.com/squizlabs/PHP_CodeSniffer/wiki/Annotated-ruleset.xml)


### Running codesniffs on the Loadsys-defined Sniff classes

`vendor/bin/phpcs -ps --standard=snifftests/sniff_class_rules.xml Loadsys/`

This custom ruleset relaxes a few of our normal rules to accommodate shortcomings in PHPCS's requirements for Sniff classes themselves (such as not supporting namepspaces or CamelCased class names.) The ruleset will run the entire Loadsys standard with those rules excluded.


### Reviewing the rules included in the standard

`vendor/bin/phpcs -e --standard=./Loadsys Loadsys`

This list can be used to help locate duplicated rules defined directly in the `Loadsys/ruleset.xml`.


### Running tests

```shell
# Run once:
$ composer install
$ vendor/bin/phpcs --config-set installed_paths vendor/cakephp/cakephp-codesniffer

# Run repeatedly:
$ vendor/bin/phpunit
```


### Indicating expected sniff failures

All files inside of the `snifftests/files/` directory that do not end in `pass.php` are expected to fail at least one code sniff. The names of the sniffs that are expected to fail must be annotated on the first line of the file, like so:

```php
		<?php //~Standard.Section.Sniff.Rule,Second.Rule.To.Expect
		$a = [1 , 2]; // Error: Space before comma.
```

The test suite will throw an assertion failure for any files lacking `*pass.php` that also fail to define the expected sniff failures as demonstrated above.

Every attempt should be made to restrict each sample file that is expected to fail to triggering only a single sniff. (A current shortcoming of the testing approach is that we can verify that the named sniffs fail, but can not verify that no other sniffs were also thrown in the process.)


### Indicating expected sniff passes

Files suffixed with `pass.php` will be expected to pass all sniffs. They must **not** define any expected sniff names as failures on the first line of their contents using the `<?php //~` syntax, otherwise a PHPUnit assertion will be thrown and halt the entire test suite.

Positive verification tests are especially important when making modifications to the coding standard's ruleset. This prevents accidentally starting to disallow something that was previously acceptable by having an example of that "acceptable" behavior verified.


### Manually reviewing tests/rules

The output from `find snifftests/files -type f -name '*pass.php' -exec vendor/bin/phpcs -p --standard=./Loadsys {} +` should always pass all sniffs, since these are all of the sample files suffixed with `pass.php`.

Every file listed in `find snifftests/files -type f -name '*.php' ! -name '*pass.php' -exec vendor/bin/phpcs -p --standard=./Loadsys {} +` should throw at least one warning or error each. (Pay attention to any `.`s in the initial progress indicator since that indicates a fully-passing file that should be failing something!) The errors listed will need to be verified by hand that they correctly match the errors that particular file _should_ be triggering.


## License

[MIT](https://github.com/loadsys/loadsys_codesniffer/blob/master/LICENSE.md)


## Copyright

[Loadsys Web Strategies](http://www.loadsys.com) 2015
