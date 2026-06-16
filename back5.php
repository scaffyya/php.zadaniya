<?php

function low_quantity($val) {
    return $val - ($val * 0.5); 
}

function high_quantity($val) {
    return $val * 0.5; 
}

function medium_quantity($val) {
    return 0; 
}

function process_data($data) {
    $result = $data;
    if ($data < 7) {
        $result = low_quantity($data);
    } elseif ($data > 40) {
        $result = high_quantity($data);
    } elseif ($data == 10) {
        $result = medium_quantity($data);
    }
    return round($result); 
}

function count_unique($start, $end) {
    $results = [];
    for ($i = $start; $i <= $end; $i++) {
        $results[] = process_data($i);
    }
    return count(array_unique($results));
}

echo "Количество уникальных результатов:\n";
echo "- От 1 до 15: " . count_unique(1, 15) . "\n";
echo "- От 3 до 55: " . count_unique(3, 55) . "\n";
echo "- От 9 до 43: " . count_unique(9, 43) . "\n";

?>
