<?php
$array = file('./111.txt');
$array = array_count_values($array);
arsort($array);
foreach ($array as $key=>$value)
{
	echo $key.'<====>'.$value,'<br />';
}