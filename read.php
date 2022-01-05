<?php
require('config/config.php');
require('config/common.php');

try {
    $conn = new PDO($dsn, USERNAME, PASSWORD, $options); // ühendus andmebaasiga
    $conn->exec('SET NAMES utf8'); // SQL lause, et täpitähed oleksid loetavad
    $sql = 'SELECT q.*, GROUP_CONCAT(" ", o.option_text ORDER BY o.option_id) AS answers 
        FROM questions q 
        LEFT JOIN options o ON o.poll_id = q.poll_id 
        GROUP BY q.poll_id 
        ORDER BY q.poll_day DESC';
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $polls = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $error) {
    echo $error->getMessage();
}

require 'templates/header.php';

?>

<div class="columns is-centered m-4">
    <div class="column is-two-thirds">
        <?php if (empty($polls)) : ?>
        <p class="has-text-centered">Päevaküsimusi pole. Sisesta uus päevaküsimus.</p>
        <?php else : ?>
        <h1 class="title has-text-centered is-1">Kõik päevaküsimused</h1>
        <table class="table is-hoverable is-hoverable is-fullwidth">
            <thead>
                <tr>
                    <th>Jrk</th>
                    <th>Päevaküsimus</th>
                    <th>Valikvastused</th>
                    <th class="has-text-centered">Kuupäev</th>
                    <th class="has-text-centered">Toimingud</th>
                </tr>
            </thead>
            <tbody>
                <?php $jrk = 1 ?>
                <?php foreach ($polls as $row) : ?>
                <tr>
                    <td><?= $jrk; ?></td>
                    <td><?= $row['question']; ?>
                    </td>
                    <td><?= $row['answers']; ?></td>
                    <td class="has-text-centered "><?= dateToEst($row['poll_day']) ?></td>
                    <td class="has-text-centered">
                        <a href=" poll.php?poll_id=<?= ($row['poll_id']); ?>">
                            <button class="button is-small is-info is-rounded">
                                <span>
                                    <i class="fas fa-poll"></i>
                                </span>
                            </button>
                        </a>
                        <a href="delete.php?poll_id=<?= $row['poll_id']; ?>">
                            <button class="button is-small is-danger is-rounded">
                                <span>
                                    <i class="fas fa-trash-alt"></i>
                                </span>
                            </button>
                        </a>
                    </td>
                </tr>
                <?php $jrk++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>
</div>

<?php require 'templates/footer.php'; ?>