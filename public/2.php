<?php

function a()
{
	echo 1;
	return true;
}

function b()
{
	echo 2;
	return false;
}


if (a() )
{
	echo 'a';
}


exit();

$b = '<script src="abc3210"></script>';

echo htmlspecialchars(htmlspecialchars($b));