<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="jquery.maskedinput.min.js"></script>

    <title>Учёт сотрудников</title>
</head>
<body>
    <h1>Информация о сотрудниках</h1>

    <form action='submit.php' method="get">
        <h2>Добавить нового сотрудника</h2>
        <input class="text" name="FIO" placeholder="ФИО" required>
        <input type="date" name="Date_birth" class="text" required>
        <input id="passport" class="text" name="Seria_and_nomer_passporta" placeholder="Паспорт" maxlength="10">
        <script>
            $(function(){
                $("#passport").mask("99 99 999999");
            });
            </script>
        <input id="phonenum" name="Contact_info" class="text" placeholder="Контактная информация" maxlength="10">
        <script>
            $(function(){
                $("#phonenum").mask("+7(999)-999-99-99");
            });
            </script>
        <input class="text" name="Adress" placeholder="Адрес">
        <input class="text" name="Otdel" placeholder="Отдел">
        <input class="text" name="Doljnost" placeholder="Должность">
        <input type="number" name="Zarplata" placeholder="Зарплата" step="0.01" class="text" id="zp">
        <input type="date" name="Date_prin_na_rab" class="text" required>
 
        <button type="submit" name="FormSubmit" value="add" class="but">Добавить сотрудника</button>

        
    <h2>Применение фильтра</h2>
    
    <form action="" method="GET">
        <input class="text" name="filter_otdel" placeholder="Отдел">
        <input class="text" name="filter_doljnost" placeholder="Должность">
        <button type="submit" class="but">Применить фильтр</button>
    </form>
<br>
<h2>Список сотрудников</h2>
    <table>
         <tr>
            <th>ID</th>;
            <th>ФИО</th>;
            <th>Дата рождения</th>;
            <th>Паспортные данные</th>;
            <th>Контактная информация</th>;
            <th>Адрес</th>;
            <th>Отдел</th>;
            <th>Должность</th>;
            <th>Зарплата</th>;
            <th>Дата принятия на работу</th>;
            <th>Статус</th>;
        </tr>
    <?php
    
   
    $mysqli = new mysqli("127.0.0.1", "root", "", "Uchet_sotrudnikov");

    if ($mysqli == false){
        print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
    }
    mysqli_set_charset($mysqli, "utf8");

 

    $sql = 'SELECT * FROM Information_about_sotr';

        $result = mysqli_query($mysqli, $sql);

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['ID_sotrudnika']. "</td>";
        echo "<td>" . $row['FIO_sotrudnika'] . "</td>";
        echo "<td>" . $row['Date_birth'] . "</td>";
        echo "<td>" . $row['Contact_info'] . "</td>";
        echo "<td>" . $row['Adress'] . "</td>";
        echo "<td>" . $row['Otdel'] . "</td>";
        echo "<td>" . $row['Doljnost'] . "</td>";
        echo "<td>" . $row['Zarplata'] . "</td>";
        echo "<td>" . $row['Date_prin_na_rab'] . "</td>";
        echo "<td>" . $row['Status'] . "</td>";
        echo "<td>";

        echo "<button type='submit' name='action' class='but' value='edit'>Редактировать</button>";

        echo "<button type='submit' name='action' class='but' value='edit'>Уволить</button>";


    }
    ?>
    </table>
</body>
</html>