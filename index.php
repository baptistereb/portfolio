<?php
$fr = ["fr", "Français", "English", "Accueil", "Projets", "Compétences", "Contact", "Etudiant à l'INSA Toulouse, développeur web", "Amoureux des imprimantes 3D, de programmation et plus globalement des nouvelles technologies (communement appelé : nerd)", "Me contacter", "Retourner à la page d'accueil", "Tous droits réservés", "Portail", "Erreur 404", "Bientôt disponible"];
$en = ["en", "English", "Français", "Home", "Projects", "Skills", "Contact", "Student at INSA Toulouse, web developer", "Lover of 3D printers, programming and more generally of new technologies (commonly called : a nerd)", "Contat me", "Back to homepage", "All rights reserved", "Portal", "404 Not found", "Coming soon !"];

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
	<link rel="stylesheet" type="text/css" href="css/link.css" />
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
				<a href="#link">
					<li class="button"><?= $v[12] ?></li>
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
	<h1><?= $v[14] ?></h1>
</section>
<section class="link" id="link">
	<a href="https://github.com/baptistereb" target="" class="button">
			
			
	</a>
</section>
<section class="skill" id="skill">
	<?php /*<table>
		<td width="50%">
			<ul>
				<li>Impression 3D</li>
				<li>Electronique</li>
				<li>Montage PC</li>
				<li>Conception de PCB</li>
			</ul>
		</td>
		<td width="50%">
			<ul>
				<li>HTML, CSS, PHP</li>
				<li>quelques bases en JS</li>
				<li>des bases en ADA, python</li>
				<li>connaissances des API suivantes : discord, youtube, twitter</li>
				<li>UNIX</li>
				<li>GIT</li>
				<li>Sait configurer un serveur web avec virtualhost et certificat SSL</li>
				<li>Gcode pour imprimante 3D</li>
				<li>Modélisation 3D sur Fusion360<li>
			</ul>
		</td>
	</table>*/ ?>
	<h1><?= $v[13] ?> ^^</h1>
</section>
<section class="contact" id="contact" style="text-align:center;">
	<div class="title-contact"><?= $v['9'] ?></div>

	<div id="center_perfect">
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

		<a href="https://github.com/baptistereb" target="_github" class="a-button">
			<img src="img/git.svg" class="title-button">
			<div class="content">
				<div class="table">
					<div class="cell">github.com/baptistereb</div>
				</div>
			</div>
		</a>
	</div>

	<a href="#index" class="back-home">
		<li class="up">
			<div id="arrow-top"></div>
			<div id="text-top"><?= $v[10] ?></div>
		</li>
	</a>

	<div id="copyright">
		<span>Copyright © 2022 - Rébillard Baptiste - <?= $v['11'] ?></span>
	</div>
</section>

</body>
</html>