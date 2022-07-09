<?php

$fr = ["Français", "English", "date de naissance", "votre esperance de vie", "essayer", "il y a ", " jours entre ", " et ", "retourner à l'index", " semaines entre ", "il vous reste ", " semaines à vivre", "vous avez vécu ", " soit ", "% de votre vie déjà effectué", "theme sombre", "theme clair"];
$en = ["English", "Français", "date of birth", "your estimated life expectancy", "try out", "there are ", " days between ", " and ", "return to index", " weeks between ", "you still have ", " weeks to live", "you have lived ", "  that is ", "% of your life already done", "dark mode", "light mode"];

if(isset($_POST['submit'])) {
	header('Location: myentirelife.php?d='.htmlspecialchars($_POST['datel']).'&e='.htmlspecialchars($_POST['lifetime']));
}

if(isset($_COOKIE['mode'])) {
	if($_COOKIE['mode'] == "1") {
		$mode = 1;
	} else {
		$mode = 2;
	}
} else {
	setcookie("mode", "1");
	$mode = 1;
	index();
}

if($mode == "1") {
	$color1 = "white";
	$color2 = "black";
	$color3 = "grey";
} else {
	$color1 = "grey";
	$color2 = "white";
	$color3 = "black";
}

if(isset($_POST['mode'])) {
	if($mode == "1") {
		setcookie("mode", "2");
		index();
	} else {
		setcookie("mode", "1");
		index();
	}
}

if(isset($_POST['index'])) {
	header('Location: myentirelife.php');
}

function index() {
	header('Location: #');
}

if(isset($_COOKIE['language'])) {
	if($_COOKIE['language'] == "fr") {
		$v = $fr;
	} else {
		$v = $en;
	}
} else {
	setcookie("language", "en");
	index();
}


if(isset($_POST['language'])) {
	if($v['0'] == "English") {
		setcookie("language", "fr");
		index();
	} else {
		setcookie("language", "en");
		index();
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>my entire life</title>
	<style>
		@media screen and (max-width: 540px) {
			main {
				width: 300px;
			}

			.input {
				width: 250px;
			}

			#input {
				margin: 10px;
			}

			#c {
				height: 3px;
				width: 3px;
				border: 0.5px solid <?php echo $color2; ?>;
			}

			#d {
				height: 3px;
				width: 3px;
				border: 0.5px solid <?php echo $color2; ?>;
			}
		}

		@media screen and (min-width: 540px) {
			main {
				width: 500px;
			}

			.input {
				width: 400px;
			}

			#input {
				margin: 40px;
			}

			#c {
				height: 12px;
				width: 12px;
				border: 1px solid <?php echo $color2; ?>;
			}

			#d {
				height: 12px;
				width: 12px;
				border: 1px solid <?php echo $color2; ?>;
			}
		}

			#c {
				display: inline-block;
				background-color: <?php echo $color3; ?>;
				padding: 0;
				margin: 0;
			}

			#d {
				display: inline-block;
				background-color: <?php echo $color1; ?>;
				padding: 0;
				margin: 0;
			}

			body {
				font-family: Avantgarde, TeX Gyre Adventor, URW Gothic L, sans-serif;
				background-color: <?php echo $color1; ?>;
			}

			main {
				position: absolute;
				display: flex;
				height: 520px;
			    left: 50%;
			    top: 50%;
			    transform: translate(-50%, -50%);
			    border: 20px solid <?php echo $color2; ?>;
			}

			.input {
				position: relative;
				left: 0px;
				height: 30px;
				padding: 10px;
				/*margin: 40px;*/
				border: 4px solid <?php echo $color2; ?>;
				background-color: <?php echo $color1; ?>;
				color: <?php echo $color2; ?>;
			}

			.input::placeholder {
				color: <?php echo $color2; ?>;
			}

			h2 {
				padding: 30px;
				color: <?php echo $color2; ?>;
			}

			#input {
				position: relative;
			}

			label {
				float: left;
				left: 30px;
				margin-bottom: 3px;
				color: <?php echo $color2; ?>;
			}

			a {
				position: relative;
				display: inline-block;
				padding: 0px 0px;  /*10px 20px*/
				color: <?php echo $color2; ?>;
				font-size: 16px;
				text-decoration: none;
				text-transform: uppercase;
				overflow: hidden;
				transition: 0.7s;
				margin-top: 40px;
				letter-spacing: 10px
			}

			a span {
			  position: absolute;
			  display: block;
			}

			a span:nth-child(1) {
			  top: 0;
			  left: -100%;
			  width: 100%;
			  height: 2px;
			  background: linear-gradient(90deg, transparent, <?php echo $color2; ?>);
			  animation: btn-anim1 2s linear infinite;
			}

			@keyframes btn-anim1 {
			  0% {
			    left: -100%;
			  }
			  50%,100% {
			    left: 100%;
			  }
			}

			a span:nth-child(2) {
			  top: -100%;
			  right: 0;
			  width: 2px;
			  height: 100%;
			  background: linear-gradient(180deg, transparent, <?php echo $color2; ?>);
			  animation: btn-anim2 2s linear infinite;
			  animation-delay: 0.5s
			}

			@keyframes btn-anim2 {
			  0% {
			    top: -100%;
			  }
			  50%,100% {
			    top: 100%;
			  }
			}

			a span:nth-child(3) {
			  bottom: 0;
			  right: -100%;
			  width: 100%;
			  height: 2px;
			  background: linear-gradient(270deg, transparent, <?php echo $color2; ?>);
			  animation: btn-anim3 2s linear infinite;
			  animation-delay: 1s
			}

			@keyframes btn-anim3 {
			  0% {
			    right: -100%;
			  }
			  50%,100% {
			    right: 100%;
			  }
			}

			a span:nth-child(4) {
			  bottom: -100%;
			  left: 0;
			  width: 2px;
			  height: 100%;
			  background: linear-gradient(360deg, transparent, <?php echo $color2; ?>);
			  animation: btn-anim4 2s linear infinite;
			  animation-delay: 1.5s
			}

			@keyframes btn-anim4 {
			  0% {
			    bottom: -100%;
			  }
			  50%,100% {
			    bottom: 100%;
			  }
			}

			.submita {
				border: 12px solid transparent;
				background-color: transparent;
				letter-spacing: 10px;
				font-weight: bold;
				font-size: 20px;
				color: <?php echo $color2; ?>;
			}

			.submita:hover {
				color: <?php echo $color1; ?>;
				background-color: <?php echo $color2; ?>;
				transition: all 0.5s ease;
			}


			#myentirelife {
				position: relative;
				margin: 0;
				line-height: 0;
				width: 60%;
			}

			form {
				display: inline-block;
			}

			.menubutton {
				padding: 5px;
				color: <?php echo $color2; ?>;
				background-color: <?php echo $color1; ?>;
				border: 2px solid <?php echo $color2; ?>;
				width: 120px;
			}

			.menubutton:hover {
				color: <?php echo $color1; ?>;
				background-color: <?php echo $color2; ?>;
			}
	</style>
</head>
<body>
	<?php 
	if(isset($_GET['d']) AND !empty($_GET['d']) AND isset($_GET['e']) AND !empty($_GET['e']))
	{
		$da = htmlspecialchars($_GET['d']);
		if(strlen($da) != 10) {
			index();
		}
		$e = (int) $_GET['e'];
		if(strlen($e) < 1 OR strlen($e) > 200) {
			index();
		}

		$now = new DateTime('now');
		$d = new DateTime($da);
		//echo $d->format('d M Y');
		
		$interval = $d->diff($now);
		$in = $interval->format('%a');

		$week1 = floor($in/7);
		$week2 = floor(52.1*$e)-$week1;
	?>

		<form method="POST">
			<input type="submit" value="<?=$v[1];?>" name="language" class="menubutton">
		</form>
		<form method="POST">
			<input type="submit" value="<?php if($mode == 1) { echo $v['15']; } else { echo $v['16']; } ?>" name="mode" class="menubutton">
		</form>
		<form method="POST">
			<input type="submit" value="<?=$v[8];?>" name="index" class="menubutton">
		</form>

		<br><br>

		<div align="center">
			<font color="<?php echo $color2; ?>">
			<?php echo $v[5].$in.$v[6].$d->format('d M Y').$v[7].$now->format('d M Y'); ?>
			<br>
			<?php echo $v[12].$week1.$v[9].$d->format('d M Y').$v[7].$now->format('d M Y'); ?>
			<br>
			<b>
				<?php echo $v[10].$week2.$v[11]; ?>
				<br>
				<?php 
					$life = floor($week1*1000/($week2+$week1))/10;
					echo $v[13].$life.$v[14];
				?>
			</b>
			</font>

			<br><br>

			<div id="myentirelife" align="left">
				<?php 
				for ($i=0; $i < $week1; $i++) { 
					echo "<div id='c'> </div>";
				}
				for ($n=0; $n < $week2; $n++) { 
					echo "<div id='d'> </div>";
				}
				?>
			</div>
		</div>
	<?php
	} else {
	?>
		<form method="POST">
			<input type="submit" value="<?=$v[1];?>" name="language" class="menubutton">
		</form>
		<form method="POST">
			<input type="submit" value="<?php if($mode == 1) { echo $v['15']; } else { echo $v['16']; } ?>" name="mode" class="menubutton">
		</form>
		<main>
			<div align="center">
				<form method="POST">
					<h2>MY ENTIRE LIFE</h2>
					<div id="input">
						<label for="datel"><?=$v[2];?></label>
						<input type="date" name="datel" id="datel" class="input" required>
					</div>
					<div id="input">
						<label for="lifetime"><?=$v[3];?></label>
						<input type="number" name="lifetime" id="lifetime" class="input" placeholder="<?=$v[3];?>" required>
					</div>
					<a>
				      <span></span>
				      <span></span>
				      <span></span>
				      <span></span>
				      <input type="submit" name="submit" value="<?=$v[4];?>" class="submita">
				  	</a>
				</form>
			</div>
		</main>
	<?php } ?>
</body>
</html>