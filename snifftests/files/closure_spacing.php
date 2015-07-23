<?php //~Squiz.Functions.MultiLineFunctionDeclaration.SpaceAfterFunction, CakePHP.Functions.ClosureDeclaration.SpaceAfterFunction, CakePHP.WhiteSpace.TabAndSpace
$derp = 'Bryan Crowe';

$fail = function($one, $two, $three) use ($derp) { // Error: No space after `function`
	echo $derp . $one;
};

$failTooManySpaces = [
	'hello' => 'Beakman',
	'whatsup' => function  ($one, $two) use ($derp) { // Error: Multiple spaces after `function`
		echo $one . $two;
	}
];
