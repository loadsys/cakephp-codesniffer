<?php //~CakePHP.Commenting.DocBlockAlignment.NotAllowed
	/**
	 * Error: Doc block should not be indented.
	 */
namespace App\Person\Patient;

/**
 * Hello World.
 *
 * This is a description.
 */
class Foo extends Bar {
	/**
	 * What are your thoughts?
	 *
	 * @var array $brain
	 */
	public $brain = [];

/**
 * Error: Doc block not indented to match method.
 *
 * @return void
 */
	public function dumpThoughts() {
		foreach ($thoughts as $thought) {
			echo $thought;
		}
	}
}
