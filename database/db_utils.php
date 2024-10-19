<?php

$sql = "INSERT INTO calcs(UserName, Operation, Number1, Number2, Result)
VALUE('Masha', 'minus', 111, 100, 11)";


// Нарушение принципа наименьших привилегий (УЗ root)
// Отсутствие пароля, слабый пароль
// Секрет в коде root и ""
$conn = mysqli_connect("localhost", "root", "", "calc");
$result = mysqli_query($conn, $sql);
mysqli_close($conn);



