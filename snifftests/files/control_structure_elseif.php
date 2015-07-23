<?php //~PSR2.ControlStructures.ElseIfDeclaration.NotAllowed, CakePHP.ControlStructures.ElseIfDeclaration.NotAllowed
if (isset($a)) {
	echo 'a isset';
} else if (isset($b)) { // Error: Must use `elseif`
	echo 'b isset';
}
