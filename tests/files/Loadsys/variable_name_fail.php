<?php

class VariablenameFail {

	public $_passing;

	public $_passingPublic = 'defined';

	protected $_underScoredStart = 'OK';

	protected $__underScored;

	private $__doubleUnderscore = 'applications';

	public static $_publicStatic = true;

	protected static $_protectedStatic = true;

	private static $__privateStatic = true;

	private static $_privateStaticSingleUnderscore = true;

	/**
	 * [setVariables description]
	 *
	 * @return void
	 */
	public function setVariables() {
		$this->_passingPublic = 'changed';
		$this->__underScored = 'has value now';
		$this->__doubleUnderscore = 'not recommended';
	}

	/**
	 * [setStatics description]
	 *
	 * @return void
	 */
	public static function setStatics() {
		self::$_publicStatic = true;
		self::$_protectedStatic = true;
		self::$__privateStatic = true;
		self::$_privateStaticSingleUnderscore = true;
	}
}