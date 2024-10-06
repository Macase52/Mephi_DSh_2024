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
		<script>
			function plus() {
				var x, y, z;
				x = parseInt(document.getElementById("txtX").value);
				y = parseInt(document.getElementById("txtY").value);
				z = x + y;
				document.getElementById("txtZ").value = z;
				// document.getElementById("plus").className = "pressed";
				// document.getElementById("minus").className = "";
				document.getElementById("plus").classList.add ("pressed");
				document.getElementById("minus").classList.remove("pressed");
			}
			function minus() {
				var x, y, m;
				x = parseInt(document.getElementById("txtX").value);
				y = parseInt(document.getElementById("txtY").value);
				m = x - y;
				document.getElementById("txtZ").value = m;
				document.getElementById("minus").className = "pressed";
				document.getElementById("plus").className = "";
			}
		</script>
	</head>
	<body>
		<!-- It is comment -->
		<h1>Калькулятор</h1>
		<div>Our unique calculator. Try it!</div>
		<div class="calculator">
			<input id ="txtX"/> <br />
			<input id ="txtY"/> <br />
			<div class="buttons">
				<button style="color: black;" onclick="plus();" id="plus">+</button> 
				<button style="color: black;" onclick="minus();" id="minus">-</button> 
			</div>
			<input id="txtZ"/>
		</div>

		<img src="images/Lev.jpg" />
	</body>

</html>