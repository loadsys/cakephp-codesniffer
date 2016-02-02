<?php //~Loadsys.Array.Array.NoLastComma
$a = [
	1,
	[
		2,
		3 // Error: No trailing comma on final item.
	] // Error: No trailing comma on final item.
];
