<?php

namespace App\Lib;

// Must declare all namespaced classes used in the file.
use \Vendor\Group\Library;

class Foo {
	/**
	 * Build a thing.
	 */
	public function __construct() {
		$a = new Library(); // Local use of classes must not contain namespaces.
		$a->doSomething();
	}
}
