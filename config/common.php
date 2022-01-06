<?php

//** Muudab HTML märgid turvaaliseks */

function escape($html)
{
    return htmlspecialchars($html, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/**näita massiivi inimlikul kujul */

function show($array)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

// Kuupäeva kuvamine Eesti päraselt ehk dd.mm.yyyy
function dateToEst($datestr)
{
    $dateParts = explode('-', $datestr); // tükeldatakse kriipsu kohalt
    $day = $dateParts[2];
    $month = $dateParts[1];
    $year = $dateParts[0];
    return $day . "." . $month . "." . $year;
}