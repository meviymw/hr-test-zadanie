<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Занесение данных</title>
</head>
<body>
    
<?php

$mysqli = new mysqli("127.0.0.1", "root", "", "Uchet_sotrudnikov");

if ($mysqli == false){
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}
mysqli_set_charset($mysqli, "utf8");

if(isset($_GET['FormSubmit'])){
    $FIO_sotrudnika = $_GET['FIO'];
    $Date_birth = $_GET['Date_birth'];
    $Seria_and_nomer_passporta = $_GET['Seria_and_nomer_passporta'];
    $Contact_info = $_GET['Contact_info'];
    $Adress = $_GET['Adress'];
    $Otdel = $_GET['Otdel'];
    $Doljnost = $_GET['Doljnost'];
    $Zarplata = $_GET['Zarplata'];
    $Date_prin_na_rab = $_GET['Date_prin_na_rab'];
}


    $query = "INSERT INTO Information_about_sotr (FIO_sotrudnika, Date_birth, Seria_and_nomer_passporta, Contact_info,
Adress, Otdel, Doljnost, Zarplata, Date_prin_na_rab, Status) VALUES ('$FIO_sotrudnika', '$Date_birth', '$Seria_and_nomer_passporta',
'$Contact_info', '$Adress', '$Otdel', '$Doljnost', '$Zarplata', '$Date_prin_na_rab', 'Работает')";

$result = $mysqli->query($query);
if($result){
    print('Данные успешно внесены.' . '<br>');

}
$mysqli->close();
header("Location: index.php"); 
exit;
?>

</body>
</html>