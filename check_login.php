<?php
    session_start();
    
    $user = $_REQUEST["user"];
    $pwd = $_REQUEST["pwd"];
    $hash = hash('sha256', $pwd);

    // $valid_hash ="8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92";

    // if (hash('sha256', $pwd)== $valid_hash) {
    //     echo("<h1>Hello, $user!</h1>");
    // }
    // else {
    //     echo("<h1>Неверный вход!</h1>");
    // }
    

    // Ниже ужасные дефекты с точки зрения ИБ

    // Уязвимость для атаки SQL Injection
    $sql = "SELECT * FROM logins
            WHERE UserName='$user'
            and PwdHash='$hash' ";

    // Нарушение принципа наименьших привилегий (УЗ root)
    // Отсутствие пароля, слабый пароль
    // Секрет в коде срока 26 root и ""
    $conn = mysqli_connect("localhost", "root", "", "calc");
    $result = mysqli_query($conn, $sql);
    var_dump(count(mysqli_fetch_all($result)));
   
    if(mysqli_num_rows($result)>0) {
        echo ("<h1>Hello, $user!</h1>");
        $_SESSION["user"] = $user;
        echo('<meta http-equiv="refresh" content="3; URL=home.html">');
    }
    else {
            echo("<h1>Неверный вход!</h1>");
            echo('<meta http-equiv="refresh" content="3; URL=login.html">');
        }

    mysqli_close($conn);