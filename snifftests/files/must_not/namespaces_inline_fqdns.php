<?php //~Loadsys.Namespaces.ClassesMustBeImported.ClassMustBeImported

namespace App\Lib;

use Not\The\Library\Below;

class Foo {
	/**
	 * Build a thing.
	 */
	public function __construct() {
		// Do not use fully-qualified or partially qualified namespaces
		// inline. (Declare them with `use` at the top of the file.)
		$a = new \Vendor\Group\Library();
		$b = new \DateTime();
		$c = new vendor\NotImported();
	}
}
