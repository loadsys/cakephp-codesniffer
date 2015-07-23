<?php //~CakePHP.Commenting.FunctionComment.InvalidNoReturn

namespace Foo;

class Foo {

	/**
	 * Error: Missing `@throws` annotation.
	 */
	public function doThing() {
		throw new \Exception('yikes');
	}

	/**
	 * [doThing description]
	 *
	 * @return string Something.
	 */
	public function doThing() {
		// Error: No return, contradicts `@return` annotation.
	}
}
