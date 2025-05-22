<?php
$fileSystem = [
	'etc' => [
		'motd' => "  $$\\                                               $$\\                     $$\\       $$\\           <br>  $$ |                                              \\__|                    $$ |      $$ |          <br>$$$$$$\\    $$$$$$\\   $$$$$$\\          $$$$$$\\$$$$\\  $$\\ $$$$$$$\\   $$$$$$\\  $$$$$$$\\  $$ | $$$$$$\\  <br>\\_$$  _|  $$  __$$\\ $$  __$$\\ $$$$$$\\ $$  _$$  _$$\\ $$ |$$  __$$\\  \\____$$\\ $$  __$$\\ $$ |$$  __$$\\ <br>  $$ |    $$$$$$$$ |$$ |  \\__|\\______|$$ / $$ / $$ |$$ |$$ |  $$ | $$$$$$$ |$$ |  $$ |$$ |$$$$$$$$ |<br>  $$ |$$\\ $$   ____|$$ |              $$ | $$ | $$ |$$ |$$ |  $$ |$$  __$$ |$$ |  $$ |$$ |$$   ____|<br>  \\$$$$  |\\$$$$$$$\\ $$ |              $$ | $$ | $$ |$$ |$$ |  $$ |\\$$$$$$$ |$$$$$$$  |$$ |\\$$$$$$$\\ <br>   \\____/  \\_______|\\__|              \\__| \\__| \\__|\\__|\\__|  \\__| \\_______|\\_______/ \\__| \\_______|<br><br>Start by taping \"help\""
	],
    'home' => [
        'root' => [
            'documents' => [
                'file1.txt' => "Connaissez-vous l'IGS ?",
                'file2.txt' => "Grâce au condensat de Bose-Einstein, il n'y pas de limite théorique à la finesse de gravure.",
                'backup' => [
                    'project1' => ['README.md' => "La suite des challenges va se trouver ici => en construction"],
                    'project2' => ['flag.txt' => "https://www.youtube.com/watch?v=dQw4w9WgXcQ"]
                ]
            ],
            'downloads' => [
                'archive.zip' => null
            ],
            '.hidden_file' => null
        ]
    ],
    'var' => [
        'log' => ['system.log' => null]
    ],
    'tmp' => []
];



function command_cat($initial_path) {
	global $fileSystem;

    // Normalisation du chemin
    $path = trim($initial_path, '/');
    $parts = explode('/', $path);

    $current = &$fileSystem;

    foreach ($parts as $part) {
        if (!isset($current[$part])) {
            return "cat: ".$initial_path.": No such file or directory";
        }

        if (is_array($current[$part])) {
            $current = &$current[$part];
        } else {
            // On a trouvé le fichier
            if (count($parts) > 1 && end($parts) === $part) {
                return $current[$part] ?? "";
            } else {
                return "cat: ".$initial_path.": No such file or directory";
            }
        }
    }

    // Si on arrive ici, c'est un dossier, pas un fichier
    return "cat: ".$initial_path.": Is a directory";
}

function command_ls($initial_path) {
	global $fileSystem;
    $path = trim($initial_path, '/');
    if ($path === '') {
        $path = '.';
    }

    $parts = explode('/', $path);
    $current = &$fileSystem;

    foreach ($parts as $part) {
        if ($part === '.') {
            continue;
        }

        if (isset($current[$part]) && is_array($current[$part])) {
            $current = &$current[$part];
        } else {
            return "ls: cannot access '{$initial_path}': No such file or directory";
        }
    }

    $contents = array_keys($current);
	sort($contents);

    return implode("<br>", $contents);
}

$help_content = "NAME
    help    - Display available commands and usage information
    cat     - Display the contents of a file (absolute path only)
    clear   - Clear the terminal screen
    history - Show the list of previously entered commands
    ls      - List files and directories at the specified absolute path

DESCRIPTION
    help
        Shows a brief description of all available commands.

    cat <absolute_path>
        Prints the content of the file located at the given absolute path.
        Relative paths are not supported.

    clear
        Clears the terminal screen.

    history
        Displays the command history for the current session.

    ls <absolute_path>
        Lists the files and directories located at the specified absolute path.
        Relative paths are not supported.";


if(isset($_POST["command"])) {
	$command = explode(" ", htmlspecialchars($_POST["command"]));
	switch ($command[0]) {
		case "cat":
			echo command_cat($command[1]);
			break;
		case "help":
			echo $help_content;
			break;
		case "ls":
			echo command_ls($command[1]);
			break;
		default:
			echo "Unknown command";
			break;
	}
} else {
	echo "Network problem : please contact your administrator for assistance";
}