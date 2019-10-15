<?php

include ('Brackets.php');

$s_brackets_string = Brackets::getBracketsString(8);
echo $s_brackets_string.'<br>';

echo Brackets::checkBracketsString($s_brackets_string) ? 'String is valid.' : 'Error. String is invalid.';