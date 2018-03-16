<?php
/**
 * Created by PhpStorm.
 * User: itushnolobov
 * Date: 3/16/18
 * Time: 12:43 AM
 */

echo "Students list<br>";
//$file = $_GET['fileUpload'];
$f = $fopen($_GET['fileUpload'], 'r');
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
        echo "<i>{$arr[$i][0]}</i>;";
    }
    echo '</p>';
}
if ($_GET['select'] == '2') {
    for ($i = 0; $i < count($arr); $i++) {
        echo "<p><b>{$arr[$i][1]}</b></p>";
    }
}
if ($_GET['select'] == '3') {
    for ($i = 0; $i < count($arr); $i++) {
        echo "<p><b>{$arr[$i][1]}</b>: <i>{$arr[$i][0]}</i></p>";
    }
}





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="style/style.css" rel="stylesheet" type="text/css">
    <title>Lab 1</title>
</head>
<body>
<form>

    Файл: <input type='text' name='filepath' value='<?php echo ((isset($_GET["filepath"])) ? $_GET["filepath"] : "");?>'>
    <br>
    <select name='sel'>
        <option value='var1' <?php echo ((isset($_GET["sel"]) && $_GET["sel"] == "var1") ? "selected=true" : "");?>>ihgkhgj,hnrjdg</option> //один пункт в выюоре select
        <option value='var2' <?php echo ((isset($_GET["sel"]) && $_GET["sel"] == "var2") ? "selected=true" : "");?>>ФИО в столбик</option>
        <option value='var3' <?php echo ((isset($_GET["sel"]) && $_GET["sel"] == "var3") ? "selected=true" : "");?>>ФИО и год рождения в столбик</option>
    </select>
    <br>
    <input type='submit' value='Обработать'>

</form>
</body>
</html>


<?php

if((!isset($_GET['filepath']) || !file_exists($_GET['filepath'])) || !isset($_GET['sel']))
	exit("");

echo "Список лохов<br>";
$fullPath = "~/PhpstormProjects/PHP" . $_GET["filepath"];
$f = fopen($fullPath, "r");
$arr;
for($i = 0; $str = fgets($f); $i++) {
	$tempArr0 = explode('-', $str);
	$arr[$i][0] = trim($tempArr0[0]);//сначала стоит год в 0 позиции
	$arr[$i][1] = trim($tempArr0[1]);// потом стоит фио в 1 позиции
}

if($_GET["sel"] == "var1"){
	sort($arr);
	echo "<p>";
	for($i = 0; $i < count($arr); $i++)
		echo "<i>{$arr[$i][0]}</i>; ";//курсив это i
	echo "</p>";
}
else if($_GET["sel"] == "var2"){
	for($i = 0; $i < count($arr); $i++)
		echo "<p><b>{$arr[$i][1]}</b></p>"; // b это жирный шрифт
}
else if($_GET["sel"] == "var3"){
	for($i = 0; $i < count($arr); $i++)
		echo "<p><b>{$arr[$i][1]}</b>: <i>{$arr[$i][0]}</i></p>";
}


?>
