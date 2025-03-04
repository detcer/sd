<?php
date_default_timezone_set('UTC');
$dateUpdate = date('Y-m-d H:i:s');
$date = date('m/d/Y H:i:s');
$db = new PDO('mysql:host=127.0.0.1:3306;dbname=laravel', 'laravel', '0J5o0X2e');
$ids = array(258, 260, 681, 2121, 2219);
foreach ($ids as $id) {
    $stmt = $db->prepare('UPDATE `ads_items` SET `lastTimeBamps` = :lastTimeBamps, `updated_at` = :updated_at WHERE `ads_items`.`id` = :id');
    $stmt->bindValue(':lastTimeBamps', $date);
    $stmt->bindValue(':updated_at', $dateUpdate);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
}