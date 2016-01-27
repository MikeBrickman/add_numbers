<?php

$a = '1200575135222';
$b = '522778999092';

var_dump(add_big_numbers($a, $b));

function add_big_numbers($a, $b) {
	$length_a = strlen($a);
	$length_b = strlen($b);

	// created two arrays from numbers
	for ($i = 0; $i < $length_a; $i++) { 
		$array_a[] = $a[$i];
	}
	for ($i = 0; $i < $length_b; $i++) { 
		$array_b[] = $b[$i];
	}

	$size_array_a = count($array_a);
	$size_array_b = count($array_b);

	if ($size_array_a > $size_array_b) {
		$diff = $size_array_a - $size_array_b;
		for ($i = 0; $i < $diff; $i++) { 
			array_unshift($array_b, '0');
		}
	} elseif ($size_array_a < $size_array_b) {
		$diff = $size_array_b - $size_array_a;
		for ($i = 0; $i < $diff; $i++) { 
			array_unshift($array_a, '0');
		}
	}

	$array_a = array_reverse($array_a);
	$array_b = array_reverse($array_b);
	
	$sum = array();

	foreach ($array_a as $key => $value) {
		$sum_size = count($sum);
		$tmp_sum = (string)($value + $array_b[$key]);
		if (strlen($tmp_sum) == 2) {

			$tmp_key = $key;
			$tmp_key++;
			$array_b[$tmp_key] = (string)++$array_b[$tmp_key];

			$sum[$sum_size] = (string)($sum[$sum_size] + $tmp_sum[1]);
		} else {
			$sum[$sum_size] = (string)($sum[$sum_size] + $tmp_sum[0]);
		}
	}

	$sum = implode('', array_reverse($sum));

	return $sum;
} 

?>