<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Щелчки</title>
</head>
<body>
    <?php
        if (isset($_SESSION["counter"]))
            $counter = $_SESSION["counter"];
        else
            $counter = 0;  
        $counter += 1;
        echo("Число щелчков: $counter");
        $_SESSION["counter"] = $counter;
 
    ?>
    <form>
        <button name="btn">Щелкни</button>
    </form>
</body>
</html>