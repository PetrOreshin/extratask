<?php

function sum(string $a, string $b) : string
{
    $result = '';
    $overflow = 0;
    $a_index = strlen($a);
    $b_index = strlen($b);
    $max_count = max($a_index, $b_index);

    $a_index--;
    $b_index--;

    for ($i = $max_count - 1; $i >= 0; $i--) {
        $a_item = ($a_index >= 0) ? $a[$a_index] : 0;
        $b_item = ($b_index >= 0) ? $b[$b_index] : 0;

        $num = $a_item + $b_item + $overflow;

        $overflow = (int)($num / 10);
        $num %= 10;

        $result = (string)$num . $result;

        $a_index--;
        $b_index--;
    }

    if ($overflow === 1) {
        $result = '1' . $result;
    }

    $result = ltrim($result, '0');

    if (empty($result)) {
        $result = '0';
    }

    return $result;
}
