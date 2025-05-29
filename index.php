<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['players'])) {
    $_SESSION['players'] = $_POST['players'];
    $_SESSION['currentPlayer'] = 0;
    $_SESSION['playerMoney'] = array_fill(0, count($_POST['players']), 1000);
    $_SESSION['playerBets'] = array_fill(0, count($_POST['players']), 0);
    $_SESSION['gameStarted'] = true;
    header('Location: game.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ryzyk-Fizyk</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function printPlayers() {
            let num = parseInt(document.getElementById("num").value);
            let inputsDiv = document.getElementById("inputs");
            inputsDiv.innerHTML = "";
            for (let i = 0; i < num; i++) {
                let input = document.createElement("input");
                input.type = "text";
                input.name = "players[]";
                input.maxLength=15;
                input.placeholder = "Gracz " + (i + 1);
                input.required = true;
                inputsDiv.appendChild(input);
            }
        }
    </script>
</head>
<body>
    <h1 id="title" class="rubik">Ryzyk <br>Fizyk</h1>
    <div id="numOfPlayer">
        <h3>Wybierz ilość graczy</h3>
        <input type="number" min="2" max="8" id="num">
        <button id="start" onclick="printPlayers()">Potwierdź</button>
    </div>
    <div id="nameOfPlayer">
        <form method="post" target="game.php">
            <h3>Podaj imiona graczy</h3>
            <div id="inputs"></div>
            <button type="submit">Zaczynaj!</button>
        </form>
    </div>
</body>
</html>