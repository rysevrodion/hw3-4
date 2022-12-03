<?php
require("src/functions.php");

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

echo "Средний возраст пользователей: " . task1($users, $names) . "<br>" . "<br>";

echo "Количество пользователей по именам: " . "<br>" . "<br>";

foreach ($names as $name) {
    echo $name[0] . ": " . $name[1] . "<br>";
}

task2($users);

?>