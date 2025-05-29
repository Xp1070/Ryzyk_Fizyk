<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ryzyk_Fizyk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="board">
        <div id="playerList">
            <button id="start" onclick="listPlayers()">Lista graczy</button>
        </div>
        <div id="spaces" class="rubik">
            <div class="space" onClick="openBet(0)"><p>6 do 1</p></div>
            <div class="space" onClick="openBet(1)"><p>5 do 1</p></div>
            <div class="space" onClick="openBet(2)"><p>4 do 1</p></div>
            <div class="space" onClick="openBet(3)"><p>3 do 1</p></div>
            <div class="space" id="center_space" onClick="openBet(4)"><p>2 do 1</p></div>
            <div class="space" onClick="openBet(5)"><p>3 do 1</p></div>
            <div class="space" onClick="openBet(6)"><p>4 do 1</p></div>
            <div class="space" onClick="openBet(7)"><p>5 do 1</p></div>
        </div>
    </div>
    <div id="betting">
        <form>
            <div id="close" onclick="closeBet()">X</div>
            <p id="space_name">Pole x</p>
            <p id="space_rate">Stawka x do 1</p>
            <p>Ile chcesz obstawić na tą opcję?</p>
            <input type="number">
            <input type="submit" value="Obstaw">
        </form>
    </div>
</body>
</html>    
    <script>
        function listPlayers(){
            let lista = document.getElementById("playerList");
            lista.innerHTML = "";
            let players = <?php echo json_encode(isset($_SESSION["players"]) ? $_SESSION["players"] : []); ?>;
            let money = <?php echo json_encode(isset($_SESSION["money"]) ? $_SESSION["money"] : []); ?>;
            for (let i = 0; i < players.length; i++) {
            let p = document.createElement("p");
            let cash = (money && money[i] !== undefined) ? money[i] : 0;
            p.innerHTML = players[i] + " - " + cash + " zł";
            lista.appendChild(p);
            }
        }

        function openBet(space){
            document.getElementById("betting").style.display = "block";
            console.log(space);
            document.getElementById("space_name").innerText = "Pole " + (space + 1);
            let rate;
            switch(space){
                case 0:
                    rate = 6;
                    break;
                case 1:
                    rate = 5;
                    break;
                case 2:
                    rate = 4;
                    break;
                case 3:
                    rate = 3;
                    break;
                case 4:
                    rate = 2;
                    break;
                case 5:
                    rate = 3;
                    break;
                case 6:
                    rate = 4;
                    break;
                case 7:
                    rate = 5;
                    break;
            }
            document.getElementById("space_rate").innerText = "Stawka " + rate + " do 1";
        }
        function closeBet(){
            document.getElementById("betting").style.display = "none";
        }
    </script>
</body>
</html>