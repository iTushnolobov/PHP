<?php
/**
 * Created by PhpStorm.
 * User: itushnolobov
 * Date: 3/16/18
 * Time: 12:43 AM
 */

if (!isset($_GET['fileUpload']) || !file_exists($_GET['fileUpload']) || !isset($_GET['select'])) {
    exit('');
}
echo "Students list<br>";
$file = $_GET['fileUpload'];
$f = $fopen($file, 'r');
$arr;
for ($i = 0; $string = fgets($f); $i++) {
    $tempArr_ = explode(':', $string);
    $arr[$i][0] = trim($tempArr_[0]);
    $arr[$i][1] = trim($tempArr_[1]);
}
if ($_GET['select'] == '1') {
    sort($arr);
    echo '<p>';
    for ($i = 0; $i < count($arr); $i++) {
        echo '<i>{$arr[$i][0]}</i>;';
    }
    echo '</p>';
}