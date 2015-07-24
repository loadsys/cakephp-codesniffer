<?php

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

	/**
	 * {@inheritDoc}
	 */
	public function doDifferent($foo) {
	}

	/**
	 * {@inheritDoc}
	 */
	protected function doDifferentProtected($foo) {
	}
}
