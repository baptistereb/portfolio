<?php
    $user = "root";
    $host = $_SERVER['REMOTE_ADDR'];
    $dir = "/";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ter-minable</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .terminal {
            height: 100vh;
        }
    </style>
</head>
<body class="bg-black text-green-400 font-mono p-4 terminal overflow-auto">
    <div id="terminal-content"></div>
    <div class="flex items-center">
        <span class="text-purple-400 mr-1"><?= $user."@".$host ?></span><span class="text-yellow-400 mr-1">:<?= $dir ?>$</span>
        <input id="command-input" value="cat /etc/motd" class="bg-black text-green-400 flex-1 outline-none" autofocus autocorrect="off" autocapitalize="off" spellcheck="false" autocomplete="off">
        <script type="text/javascript">
            document.addEventListener('click', () => {
              document.getElementById('command-input').focus();
            });
        </script>
    </div>

    <script>
        const terminal = document.getElementById('terminal-content');
        const input = document.getElementById('command-input');

        let commandHistory = ["rm FLAG{h1st0rY_1s_p0w3r}"];
        let historyIndex = -1;
        let currentCommand = '';
                
        input.addEventListener('keydown', (e) => {
            if (e.key === 'Enter') {
                const command = input.value.trim();
                
                if (command && (commandHistory.length === 0 || commandHistory[commandHistory.length - 1] !== command)) {
                    commandHistory.push(command);
                }
                historyIndex = commandHistory.length;
                
                addLine(`<span class="text-purple-400 mr-1"><?= $user."@".$host ?></span><span class="text-yellow-400 mr-1">:<?= $dir ?>$</span>${command}`);
                
                if (command === 'clear') {
                    terminal.innerHTML = '';
                } else if (command === 'history') {
                    let historyOutput = '';
                    commandHistory.forEach((cmd, index) => {
                        historyOutput += `${index + 1}  ${cmd}<br>`;
                    });
                    addLine(historyOutput, false);
                } else {
                    fetch('api.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: `command=${encodeURIComponent(command)}`
                    })
                    .then(response => {
                        if (!response.ok) {
                            addLine(`Please contact your administrator for assistance`, false);
                        }
                        return response.text();
                    })
                    .then(responseText => {
                        addLine(responseText, false);
                        console.log(responseText)
                    })
                }
                
                input.value = '';
                window.scrollTo(0, document.body.scrollHeight);
            } else if (e.key === 'ArrowUp') {
                e.preventDefault();
                if (commandHistory.length > 0) {
                    if (historyIndex > 0) {
                        if (historyIndex === commandHistory.length) {
                            currentCommand = input.value;
                        }
                        historyIndex--;
                        input.value = commandHistory[historyIndex];
                    }
                }
            } else if (e.key === 'ArrowDown') {
                e.preventDefault();
                if (commandHistory.length > 0) {
                    if (historyIndex < commandHistory.length - 1) {
                        historyIndex++;
                        input.value = commandHistory[historyIndex];
                    } else if (historyIndex === commandHistory.length - 1) {
                        historyIndex++;
                        input.value = currentCommand;
                    }
                }
            }
        });
        
        function addLine(text, withPrompt = true) {
            const line = document.createElement('div');
            line.className = 'mb-2 whitespace-pre-wrap';
            line.innerHTML = text;
            terminal.appendChild(line);
            window.scrollTo(0, document.body.scrollHeight);
        }
    </script>
</body>
</html>