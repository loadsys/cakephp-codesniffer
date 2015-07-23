<?php //~Loadsys.NamingConventions.ValidPrivateProtectedFunctionName.ProtectedWithUnderscore, Loadsys.NamingConventions.ValidPrivateProtectedFunctionName.PrivateWithUnderscore

namespace Foo;

class Foo {

	/**
	 * [doThing description]
	 *
	 * @param string $foo Foo
	 * @return void
	 */
	public function doThing($foo) {
	}

	/**
	 * [doSomethingPrivate description]
	 *
	 * @param string $foo Foo
	 * @return void
	 */
	protected function _doSomethingProtected($foo) {
		// Error: Method name should not be prefixed with an underscore.
	}

	/**
	 * [doSomethingPrivate description]
	 *
	 * @param string $foo Foo
	 * @return void
	 */
	private function __doSomethingPrivate($foo) {
		// Error: Method name should not be prefixed with an underscore.
	}
}
