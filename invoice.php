<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Счёт</title>

    <style>
        td {
            border: thin solid black;
            padding: 3px;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>Время</th>
            <th>x</th>
            <th>y</th>
            <th>Операция</th>
            <th>Результат</th>
        </tr>
        <?php 

            session_start();
            $UserName = $_SESSION["user"];
            $Operation = $_SESSION["user"];
            if (!isset($_SESSION["user"])) {
            echo('<meta http-equiv="refresh" content="3; URL=login.html">');
            die("You need login to open this page! Вы будете перенаправлены");
            }
            
            $sql = "SELECT * FROM calcs WHERE UserName = '$UserName' ORDER  BY Timestamp DESC";
            $sql_count = "SELECT COUNT(Operation) FROM calcs WHERE UserName = '$UserName' ";

            // Нарушение принципа наименьших привилегий (УЗ root)
			// Отсутствие пароля, слабый пароль
			// Секрет в коде root и ""
            // И уязвимость SQL Injection
			$conn = mysqli_connect("localhost", "root", "", "calc");
			$result = mysqli_query($conn, $sql);
            $calcs = mysqli_fetch_all($result);
            $count = mysqli_query($conn, $sql_count);
            $calcs_count = mysqli_fetch_row($count);
            $total = $calcs_count[0];
            
            echo ("<h1>$UserName, счёт за ваши вычисления!</h1>");
            echo ("<h1>Вы выполнили $total вычислений</h1>");
            //var_dump($calcs);
            for($i=0; $i < count($calcs); $i++) {
                $calc = $calcs[$i];
                echo("
                    <tr>
                        <td>$calc[2]</td>    
                        <td>$calc[4]</td>
                        <td>$calc[5]</td>
                        <td>$calc[3]</td>
                        <td>$calc[6]</td>
                    </tr>
                ");    
            }
            
            
			mysqli_close($conn);
        ?>
    </table>

</body>
</html>