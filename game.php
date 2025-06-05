<?php
session_start();
if (!isset($_SESSION['players'])) {
    header('Location: index.php');
    exit();
}
function getQuestionsAndAnswers() {
    $host = 'localhost';
    $db = 'pytania';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $pdo = new PDO($dsn, $user, $pass);
    $stmt = $pdo->prepare("SELECT pytanie, odp FROM pytania LIMIT 100");
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}
$questions = getQuestionsAndAnswers();
print_r($questions);
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
            
        </div>
        <div id="spaces" class="rubik">
            <div class="space" onClick="openBet(0)">
                <p>6 do 1</p>
                <p .class="panswer">?</p>
            </div>
            <div class="space" onClick="openBet(1)">
                <p>5 do 1</p>
                <p class="panswer">?</p>
            </div>
            <div class="space" onClick="openBet(2)">
                <p>4 do 1</p>
                <p class="panswer">?</p>
            </div>
            <div class="space" onClick="openBet(3)">
                <p>3 do 1</p>
                <p class="panswer">?</p>
            </div>
            <div class="space" id="center_space" onClick="openBet(4)">
                <p>2 do 1</p>
                <p class="panswer">?</p>
            </div>
            <div class="space" onClick="openBet(5)">
                <p>3 do 1</p>
                <p class="panswer">?</p>
            </div>
            <div class="space" onClick="openBet(6)">
                <p>4 do 1</p>
                <p class="panswer">?</p>
            </div>
            <div class="space" onClick="openBet(7)">
                <p>5 do 1</p>
                <p class="panswer">?</p>
            </div>
        </div>
    </div>
    <div id="betting">
        <form>
            <div id="close" onclick="closeBet()">X</div>
            <p id="space_name">Pole x</p>
            <p id="space_rate">Stawka x do 1</p>
            <p>Ile chcesz obstawić na tą opcję?</p>
            <input type="number">
            <input type="button" value="Obstaw" onClick="nextPlayer();">
        </form>
    </div>
    <div id="answer">
        <p>Odpowiedź: <span id="answer_text">...</span></p>
    </div>
</body>
</html>    
    <script>
        var currentPlayer = -1; 
        function listPlayers(){
            let lista = document.getElementById("playerList");
            lista.innerHTML = "";
            let players = <?php echo json_encode(isset($_SESSION["players"]) ? $_SESSION["players"] : []); ?>;
            let money = <?php echo json_encode(isset($_SESSION["money"]) ? $_SESSION["money"] : []); ?>;
            for (let i = 0; i < players.length; i++) {
            let p = document.createElement("p");
            let cash = (money && money[i] !== undefined) ? money[i] : 0;
            p.innerHTML = players[i] + " - " + cash + " zł";
            p.id = i;
            lista.appendChild(p);
            }
        }
        function showQuestion(){
            let question = 0;
            answer.innerText = question;
            document.getElementById("answer").style.display = "block";
        }
        function changeHighlight(){
            let pastP = document.getElementById(currentPlayer - 1);
            let p = document.getElementById(currentPlayer);
            if (pastP) pastP.className = "";
            if (p) p.className = "highlight";
        }
        function revealAnswer(){
            let answer = document.getElementById("answer");
            answer.style.display = "block";
        }
        function nextPlayer(){
            currentPlayer++;
            changeHighlight();
            closeBet();
            if(currentPlayer >= <?php echo count($_SESSION['players']); ?>) {
                revealAnswer();
                currentPlayer = -1;
            }
        }
        listPlayers();
        nextPlayer();

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