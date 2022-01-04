<?php
require('config/config.php');
require('config/common.php');
$errors = '';

try {
    $conn = new PDO($dsn, USERNAME, PASSWORD, $options); // ühendus andmebaasiga
    $conn->exec('SET NAMES utf8'); // SQL lause, et täpitähed oleksid loetavad

    if (isset($_GET['poll_id'])) {
        if (!empty($_GET['poll_id'])) {
            $poll_id = $_GET['poll_id'];
            $sql = 'SELECT * FROM questions WHERE poll_id = :poll_id';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':poll_id', $poll_id);
            $stmt->execute();
            $poll = $stmt->fetch(PDO::FETCH_ASSOC);
            if (isset($_GET['confirm'])) {
                if ($_GET['confirm'] == 'Jah') {
                    $sql = 'DELETE FROM options WHERE poll_id = :poll_id';

                    $stmt = $conn->prepare($sql);
                    $stmt->bindValue(':poll_id', $poll_id);
                    $stmt->execute();

                    $sql1 = 'DELETE FROM questions WHERE  poll_id = :poll_id';
                    $stmt = $conn->prepare($sql1);
                    $stmt->bindValue(':poll_id', $poll_id);
                    $stmt->execute();
                    header('location: read.php');
                } else {
                    header('location: read.php');
                    exit;
                }
            }
        } else {
            $errors = 'Päevaküsimust ei leitud.';
        }
    } else {
        $errors = 'Päevaküsimust ei leitud.';
    }
} catch (PDOException $error) {
    echo $error->getMessage();
}
require 'templates/header.php';
?>
<div class="columns is-centered">
    <div class="column is-one-quarter">
        <div class="card">
            <div class="card-content cont">
                <div class="content">
                    <?php if ($errors) : ?>
                        <h3 class="has-text-centered"><?= $errors ?></h3>
                    <?php else :  ?>
                        <p class="has-text-centered">Kas soovid kustuta
                            päevaküsimuse:<br><strong><?= $poll['question']; ?></strong></p>
                        <div class="has-text-centered">
                            <a class="button is-primary" href="delete.php?poll_id=<?= $poll['poll_id'] ?>&confirm=Jah">Jah</a>
                            <a class="button is-primary" href="delete.php?poll_id=<?= $poll['poll_id'] ?>&confirm=Ei">Ei</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>



<?php require 'templates/footer.php';
