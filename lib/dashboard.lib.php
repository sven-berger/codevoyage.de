<?php

if(isset($_SESSION['benutzername'])) {
    echo "Hallo " . $_SESSION['benutzername'] . "!";
    echo "<a href='index.php?page=logout'>Ausloggen</a>";
}