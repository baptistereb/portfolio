<?php
if(isset($_POST['send'])) {
	if(isset($_POST['w1']) AND !empty($_POST['w1']) AND isset($_POST['w2']) AND !empty($_POST['w2'])) {
		$mot1 = htmlspecialchars($_POST['w1']);
		$mot2 = htmlspecialchars($_POST['w2']);

		$d = [];
		$i = 0;
		$j = 0;

		for($i = 0; $i <= strlen($mot1); $i++) {
		    $d[$i] = [$i];
		}
		
		for($j = 0; $j <= strlen($mot2); $j++) {
		    $d[0][$j] = $j;
		}

		for($i = 1; $i <= strlen($mot1); $i++) {

			for($j = 1; $j <= strlen($mot2); $j++) {

				if($mot1[$i-1] === $mot2[$j-1]) {
					$cout = 0;
				} else {
					$cout = 1;
				}

				$d[$i][$j] = min($d[$i-1][$j] + 1, $d[$i][$j-1] + 1, $d[$i-1][$j-1] + $cout);

			}

		}

		$return = $d[strlen($mot1)][strlen($mot2)];
	} else {
		$error = "All fields must be completed";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>The Levenshtein Algorithm</title>
	<style>
		:root {
			--white: #EEEEEE;
			--grey: #303841;
			--blue: #00ADB5;
			--orange: #FF5722;
			--yellow: #FFC300;
		}

		* {
			margin: 0;
			padding: 0;
			font-weight: bold;
		}

		body {
			text-align: center;
		}

		section {
			position: absolute;
			width: 100vw;
			height: 50vh;
			top: 50%;
			margin: -25vh auto 0 auto;
		}

		#box-bleu {
			background-color: var(--blue);
			width: 60vw;
			height: 100%;
			margin-right: auto;
			margin-left: auto;
			border-radius: 20px;
			box-shadow: 40px -16px var(--white);
		}

		.input {
			display: block;
			margin: 2vh auto 2vh auto;
			background-color: transparent;
			border: 5px solid var(--white);
			padding: 10px;
			border-radius: 15px;
			width: 25vw;
			color: var(--yellow);
			outline-width: 0;
		}

		.input:focus {
			border: 5px solid var(--yellow);
		}

		.submit {
			display: block;
			margin: 2vh auto 2vh auto;
			background-color: transparent;
			border: 5px solid var(--white);
			padding: 10px;
			border-radius: 15px;
			width: 25vw;
			color: var(--white);
			transition: 0.1s ease;
		}

		.submit:hover {
			transform: scale(1.1);
			background-color: var(--white);
			color: var(--yellow);
			transition: 0.1s ease;
		}

		h1 {
			border: 40px solid transparent;
			color: var(--white);
		}

		font.colored {
			color: var(--yellow);
		}

		@media (max-height: 850px) {
			h1 {
				border: 22px solid transparent;
			}

			.submit {
				margin: 1vh auto 1vh auto;
			}

			.input {
				margin: 1vh auto 1vh auto;
			}

			#box-bleu {
				width: 80vw;
			}
		}
	</style>
</head>
<body bgcolor="#303841">
	<section>
		<div id="box-bleu">
			<h1>Levenshtein</h1>
			<form method="POST">
				<input type="text" placeholder="first word" name="w1" class="input">
				<input type="text" placeholder="second word" name="w2" class="input">
				<input type="submit" value="send" name="send" class="submit">
			</form>
			<h1>
				<?php
				if(isset($error)) {
					echo $error;
				}
				if(isset($return)) {
					echo "<font color='white'>the distance between <font class='colored'>".$mot1."</font> and <font class='colored'>".$mot2."</font> is ".$return."</font>";
				}
				?>
			</h1>
			<!--<a href="https://fr.wikipedia.org/wiki/Distance_de_Levenshtein" class="href" target="wiki" class="img">
			    <img src="https://wikimedia.org/api/rest_v1/media/math/render/svg/4520f5376b54613a5b0e6c6db46083989f901821">
			</a>-->
		</div>
	</section>
</body>
</html>