<!-- site semaine accueil insa toulouse
	projet timelpase 
	projet alimentation labo
	grolth-studio
	gamer2winner
	-->
<?php
$fr = ["fr", "Français", "English", "Accueil", "A propos", "Projets", "Compétences", "Contact"];
$en = ["en", "English", "Français", "Home", "About", "Projects", "Skills", "Contact"];

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
	if($v['0'] == "en") {
		setcookie("language", "fr");
		index();
	} else {
		setcookie("language", "en");
		index();
	}
}
?>
<!DOCTYPE html>
<html lang="<?= $v[0] ?>">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Portfolio - <?= $v[1] ?></title>
	<link rel="stylesheet" type="text/css" href="css/all.css" />
	<link rel="stylesheet" type="text/css" href="css/index.css" />
	<link rel="stylesheet" type="text/css" href="css/about.css" />
	<link rel="stylesheet" type="text/css" href="css/project.css" />
	<link rel="stylesheet" type="text/css" href="css/skill.css" />
	<link rel="stylesheet" type="text/css" href="css/contact.css" />
</head>
<body>
<div class="background" id="index">
	<header>
		<nav>
			<ul>
				<form method="POST" class="language_form">
					<input type="submit" value="<?=$v[2];?>" name="language" class="menubutton">
				</form>
				<a href="#index">
					<li class="button"><?= $v[3] ?></li>
				</a>
				<a href="#about">
					<li class="button"><?= $v[4] ?></li>
				</a>
				<a href="#project">
					<li class="button"><?= $v[5] ?></li
					></a>
				<a href="#skill">
					<li class="button"><?= $v[6] ?></li>
				</a>
				<a href="#contact">
					<li class="contact_button">
					<?= $v[7] ?>
					<div id="arrow-right"></div>
				</li></a>
			</ul>				
		</nav>
	</header>
   <span><!--<a href="test.html" style="color: #090623;">bv</a>--></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
</div>
<div class="about" id="about">
	test
</div>
<div class="project" id="project">
	test
</div>
<div class="contact" id="skill">
	test
</div>
<div class="contact" id="contact">
	test
</div>

</body>
</html>