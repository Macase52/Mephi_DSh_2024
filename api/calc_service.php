<?php
		session_start();
        
        $x = $_REQUEST["txtX"];
        $y = $_REQUEST["txtY"];
        if (isset($_REQUEST["plus"])) {
            $z = $x + $y;
            $operation = "plus";
        }
        else {
            $z = $x - $y;
            $operation = "minus";
        }
        if (isset($_REQUEST["ymnoz"])) {
            $z = $x * $y;
            $operation = "ymnoz";
        }
        $user = $_SESSION["user"];
        
        //так писать не стоит: уязвимость SQL Injection
        $sql = "INSERT INTO calcs(UserName, Operation, Number1, Number2, Result)
        VALUE('$user', '$operation', $x, $y, $z)";
                        
        // Нарушение принципа наименьших привилегий (УЗ root)
        // Отсутствие пароля, слабый пароль
        // Секрет в коде root и ""
        $conn = mysqli_connect("localhost", "root", "", "calc");
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);

        sleep(15);

        echo($z);
				
?>