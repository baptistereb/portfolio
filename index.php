<?php
$fr = ["fr", "Français", "English", "Accueil", "Projets", "Compétences", "Contact", "Etudiant à l'INSA Toulouse, développeur web", "Amoureux des imprimantes 3D et plus globalement des nouvelles technologies (communement appelé : nerd)"];
$en = ["en", "English", "Français", "Home", "Projects", "Skills", "Contact", "Student at INSA Toulouse, web developer", "Lover of 3D printers and more generally of new technologies (commonly called : a nerd)"];

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
	<link rel="stylesheet" type="text/css" href="css/project.css" />
	<link rel="stylesheet" type="text/css" href="css/skill.css" />
	<link rel="stylesheet" type="text/css" href="css/contact.css" />
</head>
<body>
<section class="background" id="index">
	<header>
		<nav>
			<ul>
				<form method="POST" class="language_form">
					<input type="submit" value="<?=$v[2];?>" name="language" class="menubutton">
				</form>
				<a href="#index">
					<li class="button"><?= $v[3] ?></li>
				</a>
				<a href="#project">
					<li class="button"><?= $v[4] ?></li>
				</a>
				<a href="#skill">
					<li class="button"><?= $v[5] ?></li>
				</a>
				<a href="#contact">
					<li class="contact_button">
					<?= $v[6] ?>
					<div id="arrow-right"></div>
				</li></a>
			</ul>				
		</nav>
	</header>

	<div id="description">
		<img src="img/profil.png" class="img_profil">
		<div class="title">Baptiste Rébillard</div>
		<div class="under_title"><?= $v['7'] ?></div>
		<br><br>
		<div class="under_title"><?= $v['8'] ?></div>
	</div>

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
   <span></span>
</section>
<section class="project" id="project">
	<!-- site semaine accueil insa toulouse
	projet timelpase 
	projet alimentation labo
	grolth-studio
	gamer2winner-->
</section>
<section class="skill" id="skill">
	<!-- Impression 3D -> gcode
		Notions d'éléctroniques
		Developpement HTML, CSS, PHP, des bases en JS
			Sait utiliser les API discord, youtube, twitter

		Serveur web : 
		

	-->
</section>
<section class="contact" id="contact" align="center">
	<!--linkedin
	mail : baptiste.rebillard@proton-mail.com
	-->
	<a href="mailto:baptiste.rebillard@protonmail.com" class="a-button">
		<img src="img/mail.svg" class="title-button">
		<div class="content">
			<div class="table">
				<div class="cell">baptiste.rebillard@protonmail.com</div>
			</div>
		</div>
	</a>

	<a href="https://www.linkedin.com/in/baptistereb/" target="_linkedin" class="a-button">
		<img src="img/linkedin.svg" class="title-button">
		<div class="content">
			<div class="table">
				<div class="cell">linkedin.com/in/baptistereb</div>
			</div>
		</div>
	</a>
</section>

</body>
</html>