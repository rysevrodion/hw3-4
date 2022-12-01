<?php

$users = [];
$names = [
    ['John', 0],
    ['Liam', 0],
    ['Lucas', 0],
    ['Oliver', 0],
    ['Oleg', 0]
];

for ($i = 0; $i < 50; $i++) {
    $users[$i]['id'] = $i;
    $users[$i]['name'] = $names[random_int(0, 4)][0];
    $users[$i]['age'] = random_int(18, 45);
}

$ageAvg = 0;

foreach ($users as $user) {
    $ageAvg += $user['age'];

    switch ($user['name']) {
        case 'John':
            $names[0][1] += 1;
            break;
        case 'Liam':
            $names[1][1] += 1;
            break;
        case 'Lucas':
            $names[2][1] += 1;
            break;
        case 'Oliver':
            $names[3][1] += 1;
            break;
        case 'Oleg':
            $names[4][1] += 1;
            break;
    }
}

$ageAvg /= 50;

echo "Средний возраст пользователей: " . $ageAvg . "<br>" . "<br>";

echo "Количество пользователей по именам: " . "<br>" . "<br>";

foreach ($names as $name) {
    echo $name[0] . ": " . $name[1] . "<br>";
}

$str = json_encode($users);

file_put_contents('users.json', $str);

$str1 = json_decode(file_get_contents('users.json'), true);

?>