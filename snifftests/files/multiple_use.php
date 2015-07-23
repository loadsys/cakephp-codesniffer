<?php //~PSR2.Namespaces.UseDeclaration.MultipleDeclarations, CakePHP.Formatting.OneClassPerUse.OneClassPerUse
// Error: Must not combine multiple classes in a single `use`.
use Loadsys\Test,
	Loadsys\Fail;

class Foo {
}
