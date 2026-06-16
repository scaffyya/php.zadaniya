<?php

$formData = [
    'email' => 'student@example.com',
    'password' => 'SecurePass123',
    'repit_password' => 'SecurePass123',
    'phone_number' => 79991234567,
    'name' => 'Александр',
    'came_from' => 'site',
    'date_birth' => '2004-09-20'
];

function validateRegistration(array $data): array {
    if (empty($data['email']) || strpos($data['email'], '@') === false || strlen($data['email']) <= 5) {
        return ['status' => false, 'message' => 'Ошибка валидации поля email'];
    }

    if (empty($data['password']) || strlen($data['password']) <= 8 || !preg_match('/[A-Za-zА-Яа-яЁё]/u', $data['password']) || !preg_match('/[0-9]/', $data['password'])) {
        return ['status' => false, 'message' => 'Ошибка валидации поля password'];
    }

    if (empty($data['repit_password']) || $data['password'] !== $data['repit_password']) {
        return ['status' => false, 'message' => 'Ошибка валидации поля repit_password'];
    }

    if (isset($data['phone_number']) && strlen((string)$data['phone_number']) <= 5) {
        return ['status' => false, 'message' => 'Ошибка валидации поля phone_number'];
    }

    if (empty($data['name']) || !preg_match('/^[A-Za-zА-Яа-яЁё]+$/u', $data['name'])) {
        return ['status' => false, 'message' => 'Ошибка валидации поля name'];
    }

    if (isset($data['came_from']) && !in_array($data['came_from'], ['site', 'city', 'tv', 'others'])) {
        return ['status' => false, 'message' => 'Ошибка валидации поля came_from'];
    }

    if (empty($data['date_birth'])) {
        return ['status' => false, 'message' => 'Ошибка валидации поля date_birth'];
    }
    
    $age = (new DateTime())->diff(new DateTime($data['date_birth']))->y;
    if ($age <= 15 || $age >= 67) {
        return ['status' => false, 'message' => 'Ошибка валидации возраста'];
    }

    return ['status' => true, 'message' => 'Успешно'];
}

$validationResult = validateRegistration($formData);
echo "Результат валидации:\n";
print_r($validationResult);

?>
