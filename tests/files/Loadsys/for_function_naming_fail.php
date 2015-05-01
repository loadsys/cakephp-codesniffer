<?php
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
	 * This method name _should_ trigger an error due to the leading
	 * underscore being banned, but that error is suppressed
	 * in the ruleset.xml for backwards compatibility with many Loadsys
	 * projects. So we make this fail "artificially" by adding an
	 * extra trailing underscore.
	 *
	 * @param string $foo Foo
	 * @return void
	 */
	protected function _doSomethingProtected_($foo) {
	}

	/**
	 * This method name _should_ trigger an error due to the leading
	 * double-underscores being banned, but that error is suppressed
	 * in the ruleset.xml for backwards compatibility with many Loadsys
	 * projects. So we make this fail "artificially" by adding an
	 * extra trailing underscore.
	 *
	 * @param string $foo Foo
	 * @return void
	 */
	private function __doSomethingPrivate_($foo) {
	}

}

class Bar extends Foo {

	/**
	 * {@inheritDoc}
	 */
	public function doThing($foo) {
	}

	/**
	 * {@inheritDoc}
	 */
	protected function _doSomethingProtected($foo) {
	}

}
