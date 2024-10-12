<?php 

error_reporting(E_ALL);
ini_set('display_errors', 1);

$mysqli = new mysqli('127.0.0.1','root','','Uchet_sotrudnikov');
if ($mysqli->connect_error){
    print("Ошибка: Невозможно подключиться к MySQL " . $mysqli->connect_error());
}

mysqli_set_charset($mysqli, "utf8");

    $ID_sotrudnika = $_POST['ID_sotrudnika'];
    $FIO_sotrudnika = $_POST['FIO_sotrudnika'];
    $Date_birth = $_POST['Date_birth'];
    $Seria_and_nomer_passporta = $_POST['Seria_and_nomer_passporta'];
    $Contact_info = $_POST['Contact_info'];
    $Adress = $_POST['Adress'];
    $Otdel = $_POST['Otdel'];
    $Doljnost = $_POST['Doljnost'];
    $Zarplata = $_POST['Zarplata'];
    $Date_prin_na_rab = $_POST['Date_prin_na_rab'];
    $Status = $_POST['Status'];

   mysqli_query($mysqli, query:"UPDATE `Information_about_sotr` SET 
   `FIO_sotrudnika`='$FIO_sotrudnika',
   `Date_birth`='$Date_birth',
   `Seria_and_nomer_passporta`='$Seria_and_nomer_passporta',
   `Contact_info`='$Contact_info',`Adress`='$Adress',
   `Otdel`='$Otdel',`Doljnost`='$Doljnost',
   `Zarplata`='$Zarplata',`Date_prin_na_rab`='$Date_prin_na_rab',`Status`='$Status' WHERE `ID_sotrudnika` = '$ID_sotrudnika'");


    header("location: index.php");


?>