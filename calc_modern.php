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
				margin: 10px;
				text-align: center;
				border: thin solid yellowgreen;
				cursor: pointer;
			}

			button {
				width: 70px;
				background-color: darkgrey;
				border-radius: 10px;
				border: thin solid green;
				background: linear-gradient(10deg, white, green);
				margin: 5px;
				cursor: pointer;
			}

			.calculator {
				border: solid green thin;
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

			#plus:hover {
				transform: skewX(-40deg);
        	}

			#minus:hover {
            	transform: skewX(-40deg);
        	}

			#ymnoz:hover {
            	transform: skewX(-40deg);
        	}

						
		</style>

		<script>
			function plus() {
				var url = "api/calc_service.php?txtX="
				+ document.getElementById("txtX").value
				+ "&txtY= "
				+ document.getElementById("txtY").value
				+ "&plus=&txtZ=";

				var xhr = new XMLHttpRequest();
				xhr.open("GET", url);
				xhr.onload = function() {
					var result = xhr.responseText;
					//alert(result);
					document.getElementById("txtZ").value = result;
				}
				document.getElementById("txtZ").value = "WAITING...";
				xhr.send();
				
			}

			function minus() {
				var url = "api/calc_service.php?txtX="
				+ document.getElementById("txtX").value
				+ "&txtY= "
				+ document.getElementById("txtY").value

				var xhr = new XMLHttpRequest();
				xhr.open("GET", url);
				xhr.onload = function() {
					var result = xhr.responseText;
					//alert(result);
					document.getElementById("txtZ").value = result;
				}
				document.getElementById("txtZ").value = "WAITING...";
				xhr.send();
				
			}

			function ymnoz() {
				var url = "api/calc_service.php?txtX="
				+ document.getElementById("txtX").value
				+ "&txtY= "
				+ document.getElementById("txtY").value
				+ "&ymnoz=&txtZ=";

				var xhr = new XMLHttpRequest();
				xhr.open("GET", url);
				xhr.onload = function() {
					var result = xhr.responseText;
					//alert(result);
					document.getElementById("txtZ").value = result;
				}
				document.getElementById("txtZ").value = "WAITING...";
				xhr.send();
				
			}
		</script>
		
	</head>
	<body>
		<!-- It is comment -->
		<h1>Калькулятор with AJAX</h1>
		<div>Our unique calculator. Try it!</div>
		
		<div class="calculator">
				<input id ="txtX" autocomplete="off"/> <br />
				<input id ="txtY" autocomplete="off"/> <br />
				<div class="buttons">
					<button id="plus" onclick="plus();">+</button> 
					<button id="minus" onclick="minus();">-</button>
					<button id="ymnoz" onclick="ymnoz();">*</button>  
				</div>
				<input id="txtZ" />
		</div>

		<textarea>
			
		</textarea>
		
	</body>

</html>