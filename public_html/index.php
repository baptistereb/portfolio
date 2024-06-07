<?php
$fr = ["fr", "Français", "English", "Accueil", "Projets en cours", "Compétences", "Contact", "Etudiant à l'INSA Toulouse, développeur web", "Amoureux des imprimantes 3D, de programmation et plus globalement des nouvelles technologies (communement appelé : nerd)"/*<br>Egalement conseiller en systèmes et logiciels informatiques ^^ (oui oui APE 62.02A)"*/, "Me contacter", "Retourner à la page d'accueil", "Tous droits réservés", "Anciens projets", "Erreur 404", "Bientôt disponible", "Anciens projets", "Site de la semaine d'accueil de l'INSA Toulouse", "MyEntireLife", "Calculer une distance de levenshtein (inutile)", "thumbsgenerator (script bash récursif pour faire des thumbs)", "micasend (chat dans le terminal en bash/php)", "php2ics (permet de générer des calendriers en php)", "systeme cryptographique McEliece (résistant au post quantique) en C", "Moteur graphique 3D from scratch en JS", "Moteur 3D en C", "php2latex (permet de générer des pdf LaTeX en php)"];


$en = ["en", "English", "Français", "Home", "Current projects", "Skills", "Contact", "Student at INSA Toulouse, web developer", "Lover of 3D printers, programming and more generally of new technologies (commonly called : a nerd)", "Contact me", "Back to homepage", "All rights reserved", "Latest projects", "404 Not found", "Coming soon !", "Latest projects", "INSA Toulouse welcome week website", "MyEntireLife", "Calculate a levenshtein distance (useless)", "thumbsgenerator (recursive thumbs generator in bash)", "micasend (terminal chat in bash/php)", "php2ics (allows you to create calendar file using php)", "McEliece cryptosystem (post-quantum resistant) in C", "3D graphics engine from scratch in JS", "3D graphics engine in C", "php2latex (allows you to create pdf with LaTeX in php)"];

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

if(isset($_COOKIE['hexa'])) {
	if($_COOKIE['hexa'] == "true") {
		for($i=0; $i<count($v);$i++) {
			$v[$i] = "0x".bin2hex($v[$i]);
		}
	}
} else {
	setcookie("hexa", "false");
	index();
}

if(isset($_POST['hexa'])) {
	if($_COOKIE['hexa'] == "false") {
		setcookie("hexa", "true");
		index();
	} else {
		setcookie("hexa", "false");
		index();
	}
}
?>
<!DOCTYPE html>
<html lang="<?= $v[0] ?>">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>&ltBR&gt - <?= $v[1] ?></title>
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
					<input type="submit" value="<?php if($_COOKIE['hexa'] == "true") { echo "Hexa : ON"; } else { echo "Hexa : OFF"; } ?>" name="hexa" class="menubutton">
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
		<img src="img/profil.JPG" class="img_profil">
		<div class="title">Baptiste Rébillard &ltBR&gt</div>
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
	<div id="box-middle">
		<h1><?= $v[4] ?></h1>
		<a href="https://github.com/baptistereb/McEliece" target="_link" class="button_blue">
			<?= $v[22] ?>
		</a>
		<a href="https://github.com/baptistereb/real-intgine-c" target="_link" class="button_blue">
			<?= $v[24] ?>
		</a>
	</div>
</section>
<section class="link" id="link">
	<div id="box-middle">
		<h1><?= $v[15] ?></h1>
		<a href="https://github.com/baptistereb/real-intgine-c" target="_link" class="button_blue">
			<?= $v[25] ?>
		</a>
		<a href="https://real-intgine.insat.fr" target="_link" class="button_blue">
			<?= $v[23] ?>
		</a>
		<a href="https://github.com/baptistereb/php2ics" target="_link" class="button_blue">
			<?= $v[21] ?>
		</a>
		<a href="https://github.com/baptistereb/thumbs-generator" target="_link" class="button_blue">
			<?= $v[19] ?>
		</a>
		<a href="https://github.com/baptistereb/micasend" target="_link" class="button_blue">
			<?= $v[20] ?>
		</a>
		<a href="https://accueil.insat.fr" target="_link" class="button_blue">
			<?= $v[16] ?>
		</a>
		<a href="myentirelife.php" target="_link" class="button_blue">
			<?= $v[17] ?>
		</a>
		<!--<a href="levenshtein.php" target="_link" class="button_blue">
			< $v[18]; ?>
		</a>-->
	</div>
</section>
<section class="skill" id="skill">
	<?php if($_COOKIE['language'] == "fr") { ?>
		<embed src="./baptistereb_fr.pdf" class="cv" type="application/pdf"/>
	<?php } else { ?>
		<embed src="./baptistereb_en.pdf" class="cv" type="application/pdf"/>
	<?php } ?> 	
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
		<span>Copyright © 2024 - Rébillard Baptiste - <?= $v['11'] ?></span>
	</div>
</section>

</body>
</html>