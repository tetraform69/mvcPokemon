<?php

function render($html)
{
    $website = file_get_contents("views/html/$html.html");
    echo $website;
}
