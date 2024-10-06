<?php
    session_start();
    unset($_SESSION["user"]);
    echo('<meta http-equiv="refresh" content="3; URL=home_.html">');
    die("Вы успешно вышли из системы! Через несколько секунд 
            Вы будете перенаправлены на домашнюю страницу нашего сайта");
    
