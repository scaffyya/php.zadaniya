<?php

$data = [
    'category' => [
        'one' => [
            'priority' => '3',
            'views' => [
                'user_count' => 345,
                'bot_count' => 9392
            ]
        ],
        'two' => [
            'priority' => '1',
            'views' => [
                'user_count' => 123222,
                'bot_count' => 99
            ]
        ],
        'three' => [
            'priority' => '2',
            'views' => [
                'user_count' => 23,
                'bot_count' => 1
            ]
        ],
    ]
];

$categories = $data['category'];
$botCounts = [];

foreach ($categories as $item) {
    $botCounts[] = $item['views']['bot_count'];
}

echo "1. Максимальный bot_count: " . max($botCounts) . "\n";
echo "2. Минимальный bot_count: " . min($botCounts) . "\n";
echo "--------------------------------------------------\n";

uasort($categories, function($a, $b) {
    return $a['priority'] <=> $b['priority'];
});

echo "3. Значения user_count и bot_count в порядке возрастания приоритета:\n";
foreach ($categories as $key => $item) {
    echo "- Приоритет [{$item['priority']}]: user_count = {$item['views']['user_count']}, bot_count = {$item['views']['bot_count']}\n";
}

?>
