<?php
/**
 * Makes it illegal to call a namespaces class using its fully qualified name.
 * (Instead all used classes must be imported at the top of the file.)
 *
 * @link https://github.com/WoltLab/WCF/blob/a3bdb99/CodeSniff/WCF/Sniffs/Namespaces/ClassMustBeImportedSniff.php
 */

/**
 * Loadsys_Sniffs_Namespaces_ClassesMustBeImportedSniff
 */
class Loadsys_Sniffs_Namespaces_ClassesMustBeImportedSniff implements PHP_CodeSniffer_Sniff {
	/**
	 * Return an array of tokens for which this sniff wants to engage.
	 *
	 * @return array List of PHP tokens this sniff cares about.
	 */
	public function register() {
		return [T_NS_SEPARATOR];
	}

	/**
	 * Process the sniff. Will be engaged when one of the tokens from ::register() is encountered.
	 *
	 * @param PHP_CodeSniffer_File $phpcsFile An instance of the current source file being scanned.
	 * @param int $stackPtr The position of the encountered token in the provided file.
	 * @return void
	 */
	public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr) {
		$tokens = $phpcsFile->getTokens();

		// Nothing to do if the file is already in the global namespace.
		if ($phpcsFile->findPrevious(T_NAMESPACE, $stackPtr) === false) {
			return;
		}

		// Only proceed with checking the matched namespaced string if is not part of a `namespace Vendor\Foo;` or a `use Vendor\Bar as Baz;` statement.
		if ($phpcsFile->findPrevious([T_NAMESPACE, T_USE], ($stackPtr - 1), null, false, null, true) === false) {
			$nextNonClassSegment = $phpcsFile->findNext([T_NS_SEPARATOR, T_STRING], ($stackPtr + 1), null, true);
			$lastNsSeperator = $phpcsFile->findPrevious(T_NS_SEPARATOR, $nextNonClassSegment);

			// Only report for the last backslash matched in a single namespace string. (This sniff will trigger on each slash from `new \Some\Vendor\Lib();`, so this makes sure we don't report 3 errors for that same statement.)
			if ($lastNsSeperator === $stackPtr) {
				$start = $phpcsFile->findPrevious([T_NS_SEPARATOR, T_STRING], ($stackPtr - 1), null, true) + 1;
				$end = $phpcsFile->findNext([T_NS_SEPARATOR, T_STRING], ($start + 1), null, true);

				$class = '';
				for ($i = $start; $i < $end; $i++) {
					$class .= $tokens[$i]['content'];
				}

				$tClass = $phpcsFile->findPrevious(T_CLASS, ($stackPtr - 1));

				// Check if the code is attempting to extend a class with the same name.
				if ($tClass !== false) {
					$newClass = $phpcsFile->findNext(T_STRING, $tClass);
					if ($tokens[$newClass]['content'] == $tokens[$end - 1]['content']) {
						return;
					}

					$err = 'Namespaced class (%s) must be imported before use.';
					$data = [$class];
					$phpcsFile->addError($err, $stackPtr, 'ClassMustBeImported', $data);
				}
			}
		}
	}
}
