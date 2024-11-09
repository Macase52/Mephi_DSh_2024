<?php
    session_start();
    if (!isset($_SESSION["user"])) {
        echo('<meta http-equiv="refresh" content="3; URL=login.html">');
		die("You need login to open this page! Вы будете перенаправлены");
	}
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Calc</title>
		<style>
			input {
				/* it is css comment*/
				width: 160px;
				margin: 2px;
				text-align: center;
			}

			button {
				width: 70px;
				background-color: darkgrey;
			}

			.calculator {
				border: solid black thin;
				width: 180px;
				padding: 10px;
				text-align: center;
				background-color: burlywood;
			}

			.pressed {
				background-color: #FFFF55;
			}

			img {
				height: 200px;
			}
			
		</style>
		
	</head>
	<body>
		<!-- It is comment -->
		<h1>Калькулятор</h1>
		<div>Our unique calculator. Try it!</div>
		<?php
			if (isset($_REQUEST["txtX"])) {
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
			}
			else {
				$x = ""; $y = ""; $z = "";
			}	
		?>
		<div class="calculator">
			<form>
				<input name ="txtX" value="<?=$x?>"/> <br />
				<input name ="txtY" value="<?=$y?>"/> <br />
				<div class="buttons">
					<button name="plus">+</button> 
					<button name="minus">-</button>
					<button name="ymnoz">*</button>  
				</div>
				<input name="txtZ" value="<?=$z?>"/>
			</form>
		</div>

		<textarea>
			
		</textarea>
		
	</body>

</html>