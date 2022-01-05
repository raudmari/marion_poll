<?php
require 'config/config.php';
require 'config/common.php';
$errors = array('question' => '', 'option' => '', 'poll_day' => '', 'general' => '');
$question = $option_text = $poll_day = '';

if (isset($_POST['submit'])) {
    // Küsimuse sisestuse kontroll 
    if (!empty($_POST['question'])) {
        $question = ($_POST['question']);
        if (strlen($question) < 4) {
            $errors['question'] = 'Sisesta päevaküsimus korrektselt!';
        }
    } else {
        $errors['question'] = 'Sisesta küsimus!';
    }
    // Valikvasuste sisestuse kontroll
    if (!empty($_POST['option_text'])) {
        $option_text = explode(PHP_EOL, $_POST['option_text']);
        if (count($option_text) < 2) {
            $errors['option'] = 'Sisesta valikvastused korrektselt. Sisesta vähemalt kaks valikvastust.';
        }
    } else {
        $errors['option'] = 'Valikvastus tühi. Sisesta vähemalt kaks valikvastust.';
    }

    if (!empty($_POST['poll_day'])) {
        $poll_day = $_POST['poll_day'];
    } else {
        $errors['poll_day'] = 'Sisesta päevaküsimuse toimumise kuupäev!';
    }

    if (array_filter($errors)) {
        $errors['general'] = "Vorm on poolikult täidetud!";
    } else {
        try {
            $conn = new PDO($dsn, USERNAME, PASSWORD, $options); // ühendus andmebaasiga
            $conn->exec('SET NAMES utf8'); // SQL lause, et täpitähed oleksid loetavad

            $sql = 'INSERT INTO questions (question, poll_day) VALUES (:question, :poll_day)';
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                ':question' => $question,
                ':poll_day' => $poll_day
            ]);

            $poll_id = $conn->lastInsertId();

            $sql1 = 'INSERT INTO votes (poll_id) VALUES (:poll_id)';
            $stmt = $conn->prepare($sql1);
            $stmt->execute([
                ':poll_id' => $poll_id
            ]);

            foreach ($option_text as $o_text) {
                if (empty($o_text)) continue;
                $option_vote = 0;
                $sql = 'INSERT INTO options(poll_id, option_text, option_vote) VALUES(:poll_id, :option_text, :option_vote)';
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    ':poll_id' => $poll_id,
                    ':option_text' => $o_text,
                    ':option_vote' => $option_vote
                ]);
            }
            header('location: read.php');
        } catch (PDOException $error) {
            echo 'SQL: <strong>' . $sql . '</strong><br />' . $error->getMessage();
        }
    }
}
require 'templates/header.php';
?>

<div class="columns is-centered">
    <div class="column is-one-quarter">
        <form action="create.php" method="POST">
            <h1 class="title has-text-centered">Koosta uus päevaküsimus</h1>
            <div class="field">
                <p class="has-text-centered"><?= $errors['general']; ?></p>
                <label for="question" class="label">Päevaküsimus</label>
                <input type="text" name="question" class="input" value="<?= $question; ?>"
                    placeholder="Sisesta päevaküsimus">
                <div><?= $errors['question']; ?></div>
                <label for="option_text" class="label">Valikvastused</label>
                <textarea class="textarea" name="option_text" value="<?= $option_text; ?>" cols="80" rows="5"
                    placeholder="Üks valikvastus rea kohta. Sisesta vähemalt kaks valikvastust."></textarea>
                <p><?= $errors['option']; ?></p>
                <label for="poll_day" class="label">Päevaküsimuse toimumise kuupäev</label>
                <input type="date" name="poll_day" value="<?= $poll_day ?>" class="input mb-3" id="date">
                <p><?= $errors['poll_day']; ?></p>

                <input type="submit" name="submit" value="Lisa küsimus" class="button is-primary is-rounded">
        </form>
    </div>
</div>

<script>
$(function() {
    $("#date").datepicker({
        dateFormat: 'yy-mm-dd', // kuupäeva vorming
        minDate: 0 // eilset kuupäeva ei saa valida
    });

});
</script>

<?php require 'templates/footer.php'; ?>