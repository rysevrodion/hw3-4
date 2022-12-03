<?php
require '4structure.php';
echo "Тариф Базовый 5км 59 минут, доп. услуги GPS и Водитель: ";
$tariff = new TariffHour(5, 59);
$tariff->add(new additionGPS());
$tariff->add(new additionDriver());
echo $tariff->calcPrice() . "<br>" . "<br>";


echo "Тариф Студенческий 7км 40 минут, доп. услуга GPS: ";
$tariff = new TariffStudent(7,40);
$tariff->add(new additionGPS());
echo $tariff->calcPrice() . "<br>" . "<br>";


echo "Тариф Почасовой 5км 89 минут: ";
$tariff = new TariffHour(5,20);
echo $tariff->calcPrice() . "<br>" . "<br>";

?>
