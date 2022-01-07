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
    <nav class="navbar is-dark mb-4" role="navigation" aria-label="main navigation">
        <div class="container">
            <div class="navbar-brand">
                <a class="navbar-item" href="#">
                    <span class="icon is-large">
                        <span class="fas fa-2x">
                            <i class="fas fa-poll-h"></i>
                        </span>
                    </span>
                </a>
                <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarMenu">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>
            <div id="navbarMenu" class="navbar-menu">
                <div class="navbar-start">
                    <a class="navbar-item" href="create.php">Uus päevaküsimus</a>
                    <a class="navbar-item" href="read.php">Kõik päevaküsimused</a>
                    <a class="navbar-item" href="results.php">Küsitluste tulemused</a>
                </div>
            </div>
        </div>
    </nav>
    <script>
    $(document).ready(function() {

        // Check for click events on the navbar burger icon
        $(".navbar-burger").click(function() {

            // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
            $(".navbar-burger").toggleClass("is-active");
            $(".navbar-menu").toggleClass("is-active");

        });
    });
    </script>