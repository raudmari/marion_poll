<?php
require 'config/config.php';
require 'config/common.php';
$poll_day = date('Y-m-d', time());
$errors = '';

try {
    $conn = new PDO($dsn, USERNAME, PASSWORD, $options); // ühendus andmebaasiga
    $conn->exec('SET NAMES utf8');

    if (isset($_GET['poll_id'])) {
        $poll_id = $_GET['poll_id'];
        $sql = 'SELECT * FROM questions WHERE poll_id = :poll_id';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':poll_id', $poll_id);
        $stmt->execute();
        $poll = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($poll) {
            $sql = 'SELECT * FROM options WHERE poll_id = :poll_id';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':poll_id', $poll_id);
            $stmt->execute();
            $poll_answers = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $total_votes = 0;
            foreach ($poll_answers as $poll_answer) {
                $total_votes += $poll_answer['option_vote'];
            }
            $sql = 'SELECT SUM(option_vote) FROM options WHERE poll_id = :poll_id';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':poll_id', $poll_id);
            $stmt->execute();
            $total = $stmt->fetch(PDO::FETCH_ASSOC);
            // show($total);
        } else {
            $errors = 'Päevaküsimust ei leitud!';
        }
    } else {
        $errors = 'Päevaküsimust ei leitud!';
    }
} catch (PDOException $error) {
    echo 'SQL: <strong>' . $sql . '</strong><br />' . $error->getMessage();
}



require 'templates/header.php'; ?>
<div class="columns is-centered">
    <div class="column is-one-quarter">
        <div class="card">
            <div class="card-content cont">
                <?php if (!$errors) { ?>
                    <div class="content">
                        <h3 class="title"><?= $poll['question'] ?></h3>
                        <?php foreach ($poll_answers as $poll_answer) : ?>
                            <p><?= $poll_answer['option_text'] ?> <span>(<?= $poll_answer['option_vote'] ?>
                                    häält)</span>
                                <span><strong><?= round(($poll_answer['option_vote'] / $total_votes) * 100) ?>%</strong></span>
                            </p>
                            <progress class="progress is-dark is-small" value="<?= round(($poll_answer['option_vote'] / $total_votes) * 100) ?>" max="100"></progress>
                        <?php endforeach; ?>
                    </div>
            </div>
            <footer class="card-footer headfoot">
                <p class="card-footer-item">Küsitluses on osalenud <?= $total['SUM(option_vote)'] ?> inimest</p>
            </footer>
        <?php } else { ?>
            <p class="has-text-centered"><?= $errors ?></p>
        <?php } ?>

        </div>
    </div>
</div>


<?php require 'templates/footer.php'; ?>