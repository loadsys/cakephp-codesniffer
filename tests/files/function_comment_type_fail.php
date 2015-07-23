<?php //~TODO.We.Are.Missing.A.Sniff.ThisShouldFailButDoesnt

class Foo {

	/**
	 * Some sentence.
	 *
	 * @param integer $param Error: Long type name used.
	 * @param boolean $otherParam Error: Long type name used.
	 * @return string Something.
	 */
	public function bar($param, $otherParam) {
	}
}
