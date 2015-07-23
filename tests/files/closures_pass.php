<?php
$derp = 'Bryan Crowe';

$pass = function ($one, $two, $three) use ($derp) {
	echo $derp;
};

$passArray = [
	'hello' => 'Beakman',
	'whatsup' => function ($one, $two) use ($derp) {
		echo $one . $two;
	}
];
