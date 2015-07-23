<?php //~CakePHP.Commenting.FunctionComment.IncorrectParamVarName
//To Do: Catch use of long type names in docblock params. (Cake's is broken.)

class Foo {

	/**
	 * Some sentence.
	 *
	 * @param integer $param Error: Long type name used.
	 * @param boolean $otherParam Error: Long type name used.
	 * @return string Something.
	 */
	public function bar($param, $otherParam) {
		return 'hi';
	}
}
