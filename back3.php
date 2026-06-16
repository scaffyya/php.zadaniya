<?php

$jsonResponse = '{
    "call": {
        "product_name": {
            "tradeble": "true",
            "name": "main_window"
        },
        "image_name": "sun1",
        "image": {
            "link": "https://product_web",
            "base64": "data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAAAAAAD/2wBDAAYEBQYFBAYGBQYHBwYIChAKCgkJChQODwwQFxQYGBcUFhYaHSUfGhsjHBYWICwgIyYnKSopGR8tMC0oMCUoKSj"
        }
    }
}';

function processProductJson(string $jsonResponse): array {
    $decodedJson = json_decode($jsonResponse, true);
    $data = [];

    if (isset($decodedJson['call']['product_name']['tradeble']) && $decodedJson['call']['product_name']['tradeble'] === "true") {
        $callInfo = $decodedJson['call'];
        
        $imageName = $callInfo['image_name'];
        $link = $callInfo['image']['link'];
        $base64String = $callInfo['image']['base64'];
        $productName = $callInfo['product_name']['name'];
        
        if (strpos($base64String, ',') !== false) {
            $base64String = substr($base64String, strpos($base64String, ',') + 1);
        }
        
        $decodedImage = base64_decode($base64String);
        $filePath = '/image_folder/' . $imageName . '.jpeg';
        
        $data = [
            'iamge_name' => $imageName,
            'link' => $link,
            'file_path' => $filePath,
            'name' => $productName
        ];
    }
    return $data;
}

$result = processProductJson($jsonResponse);
echo "Результат обработки JSON:\n";
print_r($result);

?>
