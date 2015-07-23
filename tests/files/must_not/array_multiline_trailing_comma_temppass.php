<?php //~
//To Do: Find or write a sniff to catch this. For now, allow this test to pass.
$a = [
	1,
	[
		2,
		3 // Error: No trailing comma on final item.
	] // Error: No trailing comma on final item.
];
