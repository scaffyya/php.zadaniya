<?php

$data = [
    'category1' => [
        'price' => 1500,
        'name' => 'Телефон'
    ],
    'category2' => [
        'price' => 3000,
        'name' => 'Монитор'
    ],
    'category3' => [
        'price' => 1500,
        'name' => 'Клавиатура'
    ],
    'category4' => [
        'price' => 5000,
        'name' => 'Телефон'
    ]
];

function searchInData(array $data, array $searchParams): array {
    $result = [];
    $searchPrice = $searchParams['price'] ?? null;
    $searchName = $searchParams['name'] ?? null;

    foreach ($data as $key => $item) {
        $priceMatch = ($searchPrice !== null && isset($item['price']) && $item['price'] === $searchPrice);
        $nameMatch = ($searchName !== null && isset($item['name']) && $item['name'] === $searchName);

        if ($priceMatch || $nameMatch) {
            $result[$key] = $item;
        }
    }
    return array_unique($result, SORT_REGULAR);
}

$search = ['price' => 1500, 'name' => 'Телефон'];
$searchResults = searchInData($data, $search);

echo "Результаты поиска:\n";
print_r($searchResults);

?>
