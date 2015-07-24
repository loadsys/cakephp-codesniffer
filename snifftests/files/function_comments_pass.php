<?php

namespace Foo;

class Foo {

	/**
	 * [doThing description]
	 *
	 * @param string $foo Foo
	 * @return void
	 * @throws \Exception Bad things happen.
	 */
	public function doThing($foo) {
		throw new \Exception('yikes');
	}

	/**
	 * {@inheritDoc}
	 */
	public function doDifferentThing($foo) {
	}
}
