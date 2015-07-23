<?php //~Squiz.WhiteSpace.SuperfluousWhitespace.EndLine, PSR2.Classes.ClassDeclaration.CloseBraceAfterBody

class Foo {

	/** 
	 * Error: There is a (disallowed) trailing space after the opening ** in this doc block.
	 *
	 * @return void
	 */
	public function bar() {
	}

}
// Error: Blank line before closing brace.
