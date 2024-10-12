<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$mysqli = new mysqli('127.0.0.1','root','','Uchet_sotrudnikov');
if ($mysqli->connect_error){
    print("Ошибка: Невозможно подключиться к MySQL " . $mysqli->connect_error());
}

mysqli_set_charset($mysqli, "utf8");



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ID_sotrudnika = $_POST['ID_sotrudnika'];

    $query = "UPDATE `Information_about_sotr` SET `Status` = 'Уволен' WHERE `ID_sotrudnika` = ?";
    $stmt = $mysqli->prepare($query);

    if ($stmt) {
        $stmt->bind_param('i', $ID_sotrudnika);
        $stmt->execute();
        $stmt->close();
    } else {
        echo "Ошибка подготовки запроса: " . $mysqli->error;
    }
header('Location: index.php');

}
?>