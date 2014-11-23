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
	 * [doSomethingPrivate description]
	 *
	 * @param string $foo Foo
	 * @return void
	 */
	protected function doSomethingProtected($foo) {
	}

	/**
	 * [doSomethingPrivate description]
	 *
	 * @param string $foo Foo
	 * @return void
	 */
	private function doSomethingPrivate($foo) {
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
	protected function doSomethingProtected($foo) {
	}

}
