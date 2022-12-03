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

makeUsers($names, $users);

echo "Средний возраст пользователей: " . calcAvgAge($users, $names) . "<br>" . "<br>";

echo "Количество пользователей по именам: " . "<br>" . "<br>";

foreach ($names as $name) {
    echo $name[0] . ": " . $name[1] . "<br>";
}

makeJson($users);

?>