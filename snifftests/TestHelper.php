<?php

/**
 * Wraps up the logic necessary to create an "in-memory" version of the
 * phpcs command line test runner. Used by the TestCase to execute
 * sniffs on the sample files and return the normal command line output
 * as a string.
 */
class TestHelper {

	/**
	 * Store the path to the sniff standard folder to be tested.
	 *
	 * @var string
	 */
	protected $_rootDir;

	/**
	 * Not used??
	 *
	 * @var string
	 */
	protected $_dirName;

	/**
	 * Store an instance of the phpcs test runner class.
	 *
	 * @var PHP_CodeSniffer_CLI
	 */
	protected $_phpcs;

	/**
	 * Instantiate an internal copy of PHP_CodeSniffer_CLI.
	 *
	 * Sets PHP properties necessary for the class to find its dependencies.
	 */
	public function __construct() {
		if (!class_exists('PHP_CodeSniffer_CLI')) {
			$composerInstall = dirname(dirname(dirname(__FILE__))) . '/vendor/squizlabs/php_codesniffer/CodeSniffer/CLI.php';
			if (file_exists($composerInstall)) {
				require_once $composerInstall;
			} else {
				require_once 'PHP/CodeSniffer/CLI.php';
			}
		}

		$this->codingStandardName = 'Loadsys';
		$this->_rootDir = dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . $this->codingStandardName;

		$includePath = explode(PATH_SEPARATOR, get_include_path());
		array_unshift($includePath,
			$this->_rootDir,
			$this->_rootDir . '/Sniffs'
		);
		set_include_path(implode(PATH_SEPARATOR, array_unique($includePath)));

		$this->_phpcs = new PHP_CodeSniffer_CLI();
	}

	/**
	 * Run PHPCS on a file.
	 *
	 * Returns a string representation of the output that would normally
	 * be printed to the console. Artifically sets the `-s` (showSources)
	 * command line switch to make it possible to parse which rules failed
	 * for a given sample file.
	 *
	 * @param string $file to run.
	 * @return string The output from phpcs.
	 */
	public function runPhpCs($file) {
		$defaults = $this->_phpcs->getDefaults();
		$standard = $this->_rootDir . '/ruleset.xml';
		if (
			defined('PHP_CodeSniffer::VERSION') &&
			version_compare(PHP_CodeSniffer::VERSION, '1.5.0') != -1
		) {
			$standard = [$standard];
		}
		$options = [
			'encoding' => 'utf-8',
			'files' => [$file],
			'standard' => $standard,
			'showSources' => true,
			//'reports' => ['json' => null],
		] + $defaults;

		// New PHPCS has a strange issue where the method arguments
		// are not stored on the instance causing weird errors.
		$reflection = new ReflectionProperty($this->_phpcs, 'values');
		$reflection->setAccessible(true);
		$reflection->setValue($this->_phpcs, $options);

		ob_start();
		$this->_phpcs->process($options);
		$result = ob_get_contents();
		ob_end_clean();

		return $result;
	}

	public function sniffList() {
		if (!class_exists('PHP_CodeSniffer')) {
			$composerInstall = dirname(dirname(dirname(__FILE__))) . '/vendor/squizlabs/php_codesniffer/CodeSniffer.php';
			if (file_exists($composerInstall)) {
				require_once $composerInstall;
			} else {
				require_once 'PHP/CodeSniffer.php';
			}
		}

		$phpcs = new PHP_CodeSniffer();
		$phpcs->process(array(), $this->codingStandardName);
		$sniffs = $phpcs->getSniffs();
		$sniffs = array_keys($sniffs);
		sort($sniffs);

		$sniffList = [];
		foreach ($sniffs as $sniff) {
			$parts = explode('_', str_replace('\\', '_', $sniff));
			$sniffList[] = "{$parts[0]}.{$parts[2]}." . substr($parts[3], 0, -5);
		}

		return $sniffList;
	}
}
