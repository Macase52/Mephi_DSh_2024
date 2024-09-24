<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo 21.09.2024</title>
    <style>

        h3 {
            width: 50%;
            text-align: center;
        }

        .morning {
            color: orange;
        }

        .afternoon {
            color: darkred;
        }

        .evening {
            background-color: blue;
            color: white;
        }

        .night {
            background-color: black;
            color: white;
        }

        img {
				height: 250px;
			}
        
    </style>
</head>
<body>
    <h1>Привет от PHP</h1>
    <?php
        $x = 2;
        $y = 2;
        $z = $x + $y;
        echo "$x+$y=$z";

        date_default_timezone_set("Europe/Moscow");
        // date_default_timezone_set("America/Toronto");
        // date_default_timezone_set("Europe/London");
        // date_default_timezone_set("Asia/Singapore");

        $now = date("H:i:s");
        echo ("<h2>Время открытия страницы: $now</h2>");

        $hour = date("H");

        if ($hour < 6) {
            echo ("<h3 class='night'>Доброй ночи</h3>");
            echo ('<img src="images/night.jpg">');
        }

        if ($hour >= 6 and $hour < 12) {
            echo ("<h3 class='morning'>Доброе утро</h3>");
            echo ('<img src="images/morning.jpg">');
        }

        if ($hour >= 12 and $hour < 19) {
            echo ("<h3 class='afternoon'>Добрый день</h3>");
            echo ('<img src="images/afternoon.jpg">');
        }

        if ($hour >= 19) {
            echo ("<h3 class='evening'>Добрый вечер</h3>");
            echo ('<img src="images/evening.jpg">');
        }
    ?>
</body>
</html>