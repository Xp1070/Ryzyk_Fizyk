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

$randomQuestionIndex = array_rand($questions);
$selectedQuestion = $questions[$randomQuestionIndex]['pytanie'];
$correctAnswer = $questions[$randomQuestionIndex]['odp'];
$_SESSION['correct_answer'] = $correctAnswer; 

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
        <div id="playerList"></div>
        <div id="spaces" class="rubik">
            <?php for ($i = 0; $i < 8; $i++): ?>
                <div class="space" onClick="openBet(<?php echo $i; ?>)">
                    <p><?php echo (6 - abs(4 - $i)); ?> do 1</p>
                    <p class="panswer" id="answer_<?php echo $i; ?>">?</p>
                </div>
            <?php endfor; ?>
        </div>
    </div>
    <div id="betting">
        <form>
            <div id="close" onclick="closeBet()">X</div>
            <p id="space_name">Pole x</p>
            <p id="space_rate">Stawka x do 1</p>
            <p>Ile chcesz obstawić na tą opcję?</p>
            <input type="number" min="0" max="1000" id="bet_amount" required>
            <p>Gracz: <span id="current_player_name"><?php echo $_SESSION['players'][0]; ?></span></p>
            <input type="hidden" id="current_player_index" value="0">
            <input type="hidden" id="current_space_index" value="0">
            <input type="button" value="Zamknij" onClick="closeBet();">
            <input type="button" value="Obstaw" onClick="placeBet();">
        </form>
    </div>
    <div id="answer">
        <p>Pytanie: <span id="question_text"><?php echo $selectedQuestion; ?></span></p>
        <p>Odpowiedź: <span id="answer_text">...</span></p>
    </div>
    <div id="playerAnswers">
        <form id="answersForm">
            <p>Podaj odpowiedzi:</p>
            <?php foreach ($_SESSION['players'] as $index => $player): ?>
                <label for="answer_<?php echo $index; ?>"><?php echo $player; ?>:</label>
                <input type="text" id="player_answer_<?php echo $index; ?>" name="player_answer_<?php echo $index; ?>" required>
            <?php endforeach; ?>
            <input type="button" value="Zatwierdź odpowiedzi" onClick="submitAnswers();">
        </form>
    </div>
    <script>
        var currentPlayer = -1; 
        var answers = [];
        
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

        function submitAnswers() {
            let form = document.getElementById("answersForm");
            let formData = new FormData(form);
            answers = [];
            for (let [key, value] of formData.entries()) {
                answers.push(value);
            }
            placeAnswersOnSpaces();
        }

        function placeAnswersOnSpaces() {
            for (let i = 0; i < answers.length; i++) {
                document.getElementById("answer_" + i).innerText = answers[i];
            }
            document.getElementById("playerAnswers").style.display = "none";
            document.getElementById("board").style.display = "block";
        }

        function openBet(space) {
            // Display the betting dialog
            document.getElementById("betting").style.display = "block";

            // Update the space name and rate dynamically
            document.getElementById("space_name").innerText = "Pole " + (space + 1);
            let rate = 6 - Math.abs(4 - space);
            document.getElementById("space_rate").innerText = "Stawka " + rate + " do 1";

            // Update the current space index
            document.getElementById("current_space_index").value = space;

            // Update the current player index dynamically
            let currentPlayerIndex = (currentPlayer + 1) % <?php echo count($_SESSION['players']); ?>;
            document.getElementById("current_player_index").value = currentPlayerIndex;

            // Update the current player name dynamically
            let players = <?php echo json_encode($_SESSION['players']); ?>;
            document.getElementById("current_player_name").innerText = players[currentPlayerIndex];

            // Update the global currentPlayer variable
            currentPlayer = currentPlayerIndex;

            // Highlight the current player in the player list
            let playerList = document.getElementById("playerList").children;
            for (let i = 0; i < playerList.length; i++) {
                playerList[i].classList.remove("current-player");
            }
            playerList[currentPlayerIndex].classList.add("current-player");
        }

        function closeBet(){
            document.getElementById("betting").style.display = "none";
        }

        function placeBet() {
            // Get the current player index and space index
            let playerIndex = parseInt(document.getElementById("current_player_index").value);
            let spaceIndex = parseInt(document.getElementById("current_space_index").value);
            let betAmount = parseInt(document.getElementById("bet_amount").value);

            // Validate the bet amount
            if (betAmount <= 0 || betAmount > 1000) {
                alert("Proszę podać poprawną kwotę zakładu (od 1 do 1000 zł).");
                return;
            }

            // Update the player's money and store the bet
            let players = <?php echo json_encode($_SESSION["players"]); ?>;
            let money = <?php echo json_encode($_SESSION["money"]); ?>;

            if (money[playerIndex] < betAmount) {
                alert("Gracz nie ma wystarczających środków na ten zakład.");
                return;
            }

            // Deduct the bet amount from the player's money
            money[playerIndex] -= betAmount;

            // Store the bet in the session (or a JavaScript object for now)
            if (!window.bets) {
                window.bets = {};
            }
            if (!window.bets[playerIndex]) {
                window.bets[playerIndex] = [];
            }
            window.bets[playerIndex].push({ space: spaceIndex, amount: betAmount });

            // Update the player's money display
            let playerList = document.getElementById("playerList");
            playerList.children[playerIndex].innerHTML = players[playerIndex] + " - " + money[playerIndex] + " zł";

            // Increment the current player index
            currentPlayer = (currentPlayer + 1) % players.length;

            // Update the visual highlight for the next player
            for (let i = 0; i < playerList.children.length; i++) {
                playerList.children[i].classList.remove("current-player");
            }
            playerList.children[currentPlayer].classList.add("current-player");

            // Update the current player name and index in the betting dialog
            document.getElementById("current_player_name").innerText = players[currentPlayer];
            document.getElementById("current_player_index").value = currentPlayer;

            // Close the betting dialog
            closeBet();

            alert("Zakład został pomyślnie obstawiony!");
        }

        listPlayers();
    </script>
</body>
</html>