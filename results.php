<?php
require('config/config.php');
require('config/common.php');
$poll_day = date('Y-m-d', time());


try {
    $conn = new PDO($dsn, USERNAME, PASSWORD, $options); // ühendus andmebaasiga
    $conn->exec('SET NAMES utf8'); // SQL lause, et täpitähed oleksid loetavad

    $sql = 'SELECT q.*, 
        GROUP_CONCAT(" ", o.option_text ORDER BY o.option_id) AS answers, 
        GROUP_CONCAT(" ", o.option_vote ORDER BY o.option_id) AS votes, 
        SUM(o.option_vote) AS total 
        FROM questions q 
        LEFT JOIN options o 
        ON o.poll_id = q.poll_id 
        WHERE poll_day < :poll_day GROUP BY q.poll_id 
        ORDER BY poll_day DESC';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam('poll_day', $poll_day);
    $stmt->execute();
    $polls = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $error) {
    echo 'SQL: <strong>' . $sql . '</strong><br />' . $error->getMessage();
}

require 'templates/header.php'; ?>

<div class="columns is-centered">
    <div class="column is-two-thirds">
        <?php if (empty($polls)) : ?>
        <p class="has-text-centered">Päevaküsitluse tulemusi pole. Ükski päevaküsitlus pole lõppenud.</p>
        <?php else : ?>
        <h1 class="title has-text-centered is-1">Päevaküsimuste tulemused</h1>
        <div class="table-container">
            <table class="table is-hoverable is-hoverable is-fullwidth headfoot">
                <thead>
                    <tr>
                        <th>Jrk</th>
                        <th>Päevaküsimus</th>
                        <th>Valikvastused</th>
                        <th class="has-text-centered">Tulemused</th>
                        <th class="has-text-centered">Hääletajaid kokku</th>
                        <th class="has-text-centered">Küsitluse kuupäev</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $jrk = 1 ?>
                    <?php foreach ($polls as $row) : ?>
                    <tr>
                        <td><?= $jrk ?></td>
                        <td><a href="votes.php?poll_id=<?= $row['poll_id'] ?>"><?= $row['question']; ?></a></td>
                        <td><?= $row['answers']; ?></td>
                        <td class="has-text-centered"><?= $row['votes']; ?></td>
                        <td class="has-text-centered"><?= $row['total'] ?></td>
                        <td class="has-text-centered"><?= dateToEst($row['poll_day']); ?></td>
                    </tr>
                    <?php $jrk++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php endif; ?>
        </div>
    </div>
</div>


<?php require 'templates/footer.php'; ?>