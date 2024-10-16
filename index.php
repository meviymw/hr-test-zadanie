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
        </form>
        
    <h2>Применение фильтра</h2>
    
    <form action="" method="GET">
        <input class="text" name="filter_otdel" placeholder="Отдел">
        <input class="text" name="filter_doljnost" placeholder="Должность">
        <button type="submit" class="but" name="filter_on">Применить фильтр</button>
        <button type="submit" class="but" name="reset_filter">Сбросить фильтр</button>
    </form>

    <h2>Поиск по ФИО</h2>
    <form action="" method="get">
        <input class="text" name="poisk_FIO" placeholder="Введите ФИО">
        <button type="submit" class="but" name="poisk_on">Искать</button>
        <button type="submit" class="but" name="reset_filter">Сбросить</button>
        </form>
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

    $filter_otdel = isset($_GET['filter_otdel']) ? $_GET['filter_otdel'] : '';
        $filter_doljnost = isset($_GET['filter_doljnost']) ? $_GET['filter_doljnost'] : '';
        $poisk_FIO=isset($_GET['poisk_FIO']) ? $_GET['poisk_FIO'] : '';

        $query = "SELECT * FROM Information_about_sotr WHERE 1=1";
        if ($filter_otdel) {
            $query .= " AND Otdel LIKE '%$filter_otdel%'";
        }
        if ($filter_doljnost) {
            $query .= " AND Doljnost LIKE '%$filter_doljnost%'";
        }
        if($poisk_FIO){
            $query .= " AND FIO_sotrudnika LIKE '%$poisk_FIO%'";
        }

        $result = $mysqli->query($query);


    while ($row = $result->fetch_assoc()) {

        $rowStyle = ($row['Status'] === 'Уволен') ? "style='background-color: #ffcccc;'" : "";

        echo "<tr $rowStyle>";
 
        echo "<td>" . $row['ID_sotrudnika']. "</td>";
        echo "<td>" . $row['FIO_sotrudnika'] . "</td>";
        echo "<td>" . $row['Date_birth'] . "</td>";
        echo "<td>" . $row['Seria_and_nomer_passporta'] . "</td>";
        echo "<td>" . $row['Contact_info'] . "</td>";
        echo "<td>" . $row['Adress'] . "</td>";
        echo "<td>" . $row['Otdel'] . "</td>";
        echo "<td>" . $row['Doljnost'] . "</td>";
        echo "<td>" . $row['Zarplata'] . "</td>";
        echo "<td>" . $row['Date_prin_na_rab'] . "</td>";
        echo "<td>" . $row['Status'] . "</td>";
        echo "<td>";


        $rowStyle = ($row['Status'] === 'Уволен') ? "style='background-color: red;'" : "";
  
        if ($row['Status'] !== 'Уволен') {  
        echo "<a href='edit.php?ID_sotrudnika=" . htmlspecialchars($row['ID_sotrudnika']) . "' '>Редактировать</a>";

        if ($row['Status'] === 'Уволен')
        {
            $rowStyle = ($row['Status'] === 'Уволен') ? "style='background-color: red;'" : "";
        }
        echo "<form action='uvol.php' method='POST';'>
        <input type='hidden' name='ID_sotrudnika' value='" . $row['ID_sotrudnika'] . "'>
        <button type='submit' name='delete' class='but' value='delete'>Уволить</button>
        </form>";

        echo "</td>";
        echo"</tr>";
        }

    }

    ?>
    </table>
</body>
</html>