<?php
require '4structure.php';

$tariff = new TariffHour(5, 59);
//$tariff = new TariffStudent(5,20);
//$tariff = new TariffBasic(5,20);
$tariff->add(new additionGPS());
$tariff->add(new additionDriver());
echo $tariff->calcPrice();

?>