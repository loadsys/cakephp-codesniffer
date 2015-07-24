<?php //~CakePHP.Formatting.UseInAlphabeticalOrder.UseInAlphabeticalOrder

use One;
use Two;

class Foo {

	// Error: use calls not in alphabetical order.
	use LogTrait;
	use FirstTrait;
}