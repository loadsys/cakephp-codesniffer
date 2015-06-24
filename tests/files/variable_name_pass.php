<?php

class VariablenamePass {

	public $public = 'defined';

	protected $protected = 'OK';

	private $private = 'OK';

	public static $publicStatic = true;

	protected static $protectedStatic = true;

	private static $privateStatic = true;

/**
 * [setVariables description]
 *
 * @return void
 */
	public function setVariables() {
		$this->public = 'changed';
		$this->protected = 'has value now';
		$this->private = 'not recommended';
	}

/**
 * [setStatics description]
 *
 * @return void
 */
	public static function setStatics() {
		self::$publicStatic = true;
		self::$protectedStatic = true;
		self::$protectedStatic = true;
	}
}
