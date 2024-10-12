<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$mysqli = new mysqli('127.0.0.1','root','','Uchet_sotrudnikov');
if ($mysqli->connect_error){
    print("Ошибка: Невозможно подключиться к MySQL " . $mysqli->connect_error());
}

mysqli_set_charset($mysqli, "utf8");

$ID_sotrudnika = $_GET['ID_sotrudnika'];
$employee = mysqli_query($mysqli, query:"SELECT * FROM `Information_about_sotr` WHERE ID_sotrudnika = '$ID_sotrudnika'");
$employee = mysqli_fetch_assoc($employee);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="jquery.maskedinput.min.js"></script>
    <title>Редактирование информации о сотруднике</title>
</head>
<body>

<h1>Редактирование информации о сотрудниках</h1>

    <form action="update.php" method="POST">
    <input type="hidden" name="ID_sotrudnika" value="<?=$employee['ID_sotrudnika'] ?>">
        <input class="text" name="FIO_sotrudnika" placeholder="ФИО" value="<?=$employee['FIO_sotrudnika'] ?>" required>
        <input type="date" name="Date_birth" class="text" value="<?= $employee['Date_birth'] ?>" required>
        <input id="passport" class="text" name="Seria_and_nomer_passporta" placeholder="Данные паспорта" value="<?=  $employee['Seria_and_nomer_passporta'] ?>" maxlength="10">
        <script>
            $(function(){
                $("#passport").mask("99 99 999999");
            });
            </script>
        <input id="phonenum" name="Contact_info" class="text" placeholder="Контактная информация" value="<?=  $employee['Contact_info'] ?>" maxlength="10">
        <script>
            $(function(){
                $("#phonenum").mask("+7(999)-999-99-99");
            });
            </script>
        <input class="text" name="Adress" placeholder="Адрес" value="<?= $employee['Adress']?>">
        <input class="text" name="Otdel" placeholder="Отдел" value="<?= $employee['Otdel'] ?>">
        <input class="text" name="Doljnost" placeholder="Должность" value="<?= $employee['Doljnost']?>">
        <input type="number" name="Zarplata" placeholder="Зарплата" value="<?= $employee['Zarplata'] ?>" step="0.01" class="text" id="zp">
        <input type="date" name="Date_prin_na_rab" class="text" value="<?= $employee['Date_prin_na_rab'] ?>" required>
        <input class="text" name="Status"  placeholder="Статус работы" value="<?= $employee['Status'] ?>">
 
        <button type="submit" name="FormSubm" value="save" class="but">Сохранить изменения</button>
        <br> <br>
        </form>
        <button onclick="document.location='index.php'" type="submit" name="finishRed" value="finish" class="but">Вернуться на главную</button>
       
        
</body>
</html>