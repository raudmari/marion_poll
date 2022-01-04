<?php
require 'config/config.php';
require 'config/common.php';
$errors = '';
$ip_add = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : (isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);
$poll_day = date('Y-m-d', time());

try {
    $conn = new PDO($dsn, USERNAME, PASSWORD, $options); // ühendus andmebaasiga
    $conn->exec('SET NAMES utf8');

    if (isset($_GET['poll_id'])) {
        $poll_id = $_GET['poll_id'];
        $sql = 'SELECT * FROM votes WHERE poll_id = :poll_id';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':poll_id', $poll_id);
        $stmt->execute();
        $p = $stmt->fetch(PDO::FETCH_ASSOC);
        //show($p);

        if ($p['ip_add'] === $ip_add) {
            header('location: votes.php?poll_id=' . $poll_id);
        } else {

            $sql = 'SELECT * FROM questions WHERE poll_id = :poll_id';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':poll_id', $poll_id);
            $stmt->execute();
            $poll = $stmt->fetch(PDO::FETCH_ASSOC);
            //show($poll);

            if ($poll) {
                if ($poll['poll_day'] === $poll_day) {
                    $sql = 'SELECT * FROM options WHERE poll_id = :poll_id';
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':poll_id', $poll_id);
                    $stmt->execute();
                    $poll_options = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    //show($poll_options);
                    $sql = 'SELECT SUM(option_vote) FROM options WHERE poll_id = :poll_id';
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':poll_id', $poll_id);
                    $stmt->execute();
                    $total = $stmt->fetch(PDO::FETCH_ASSOC);
                    //show($total);

                    if (isset($_POST['poll_answer'])) {
                        $option_id = $_POST['poll_answer'];
                        $sql = 'UPDATE options SET option_vote = option_vote + 1 WHERE option_id = :option_id';
                        $stmt = $conn->prepare($sql);
                        $stmt->bindParam(':option_id', $option_id);
                        $stmt->execute();

                        $sql = 'UPDATE votes SET ip_add = :ip_add WHERE poll_id= :poll_id';
                        $stmt = $conn->prepare($sql);
                        $stmt->execute([
                            ':ip_add' => $ip_add,
                            ':poll_id' => $poll_id
                        ]);

                        header('location: votes.php?poll_id=' . $poll_id);
                    }
                } else {
                    $errors = 'Antud päevaküsimus pole aktiivne. Päevaküsimus aktiveerub ' . dateToEst($poll['poll_day']);
                }
            } else {
                $errors = 'Antud päevaküsimust ei leitud!';
            }
        }
    } else {
        $errors = 'Päevaküsimus pole leitav.';
    }
} catch (PDOException $error) {
    echo 'SQL: <strong>' . $sql . '</strong><br />' . $error->getMessage();
}

require 'templates/header.php';

?>
<div class="columns is-centered">
    <div class="column is-one-quarter">
        <div class="card">
            <div class="card-content cont">
                <div class="content">
                    <?php if ($errors) : ?>
                        <p class="has-text-centered"><?= $errors ?></p>
                    <?php else : ?>
                        <h3 class="title"><?php echo $poll['question']; ?></h3>
                        <form action="poll.php?poll_id=<?= $_GET['poll_id'] ?>" method="POST">
                            <?php for ($i = 0; $i < count($poll_options); $i++) : ?>
                                <label>
                                    <input type="radio" name="poll_answer" value="<?= $poll_options[$i]['option_id']; ?>" class="radio m-2" />
                                    <?= $poll_options[$i]['option_text']; ?>
                                </label><br>
                            <?php endfor; ?>
                            <br>
                            <input class="button is-rounded is-primary" type="submit" name="vote" value="Hääleta">
                        </form>


                </div>

            </div>
        </div>
        <footer class="card-footer headfoot">
            <p class="card-footer-item">Küsitluses on osalenud <?= $total['SUM(option_vote)'] ?> inimest</p>
        </footer>
    <?php endif; ?>
    </div>
</div>
</div>


<?php require 'templates/footer.php'; ?>