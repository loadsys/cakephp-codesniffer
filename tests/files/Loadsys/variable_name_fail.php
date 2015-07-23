<?php //~TODO.Should.Throw.Some.Warnings

class VariablenameFail {

	public $_publicWithUnderscore;

	public $__publicWithDoubleUnderscore;

	protected $_protectedWithUnderscore;

	protected $__protectedWithDoubleUnderscore;

	private $_privateWithUnderscore;

	private $__privateWithDoubleUnderscore;

	public static $_publicStaticWithUnderscore = true;

	public static $__publicStaticWithDoubleUnderscore = true;

	protected static $_protectedStaticWithUnderscore = true;

	protected static $__protectedStaticWithUnderscore = true;

	private static $_privateStaticWithUnderscore = true;

	private static $__privateStaticWithDoubleUnderscore = true;

	/**
	 * [setVariables description]
	 *
	 * @return void
	 */
	public function setVariables() {
		$this->_publicWithUnderscore = 'changed';
		$this->__publicWithDoubleUnderscore = 'changed';

		$this->_protectedWithUnderscore = 'changed';
		$this->__protectedWithDoubleUnderscore = 'changed';

		$this->_privateWithUnderscore = 'changed';
		$this->__privateWithDoubleUnderscore = 'changed';
	}

	/**
	 * [setStatics description]
	 *
	 * @return void
	 */
	public static function setStatics() {
		self::$_publicStaticWithUnderscore = true;
		self::$__publicStaticWithDoubleUnderscore = true;

		self::$_protectedStaticWithUnderscore = true;
		self::$__protectedStaticWithUnderscore = true;

		self::$_privateStaticWithUnderscore = true;
		self::$__privateStaticWithDoubleUnderscore = true;
	}
}
