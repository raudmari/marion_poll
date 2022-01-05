<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <!-- DatePicker stiil jms JQuery UI STAFF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="js/datepicker-et.js"></script> <!-- eesti keelne kalender-->
    <script src="https://kit.fontawesome.com/5055a03aa1.js" crossorigin="anonymous"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css">
    <link rel="stylesheet" href="public/mystyles.css">
    <title>Päevaküsimus</title>
</head>

<body>
    <nav class="navbar is-primary mb-4">
        <div class="container">
            <div class="navbar-brand">
                <a class="navbar-item" href="#">
                    <span class="icon is-large">
                        <span class="fas fa-2x">
                            <i class="fas fa-poll-h"></i>
                        </span>
                    </span>
                </a>
            </div>
            <div class="navbar-menu">
                <div class="navbar-start">
                    <a class="navbar-item" href="create.php">Uus päevaküsimus</a>
                    <a class="navbar-item" href="read.php">Kõik päevaküsimused</a>
                    <a class="navbar-item" href="results.php">Küsitluste tulemused</a>
                </div>
            </div>
        </div>
    </nav>