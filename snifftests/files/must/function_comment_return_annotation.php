<?php //~CakePHP.Commenting.FunctionComment.MissingReturn

namespace Foo;

class Foo {

	/**
	 * Error: Missing `@return` annotation.
	 */
	public function doThing() {
		return true;
	}
}
