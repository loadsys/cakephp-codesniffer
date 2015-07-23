<?php //~CakePHP.PHP.DisallowShortOpenTag.Found
/**
 * If shortopen tags are not enabled phpcs will report that the file has no php code
 * Ensure that there is some php code to skip that logic
 */
$ensure = 'some php code'; ?>

<?
// Error: PHP short open tags are fobidden.
echo "this should fail";
