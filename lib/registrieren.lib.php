<?php
    require_once("lib/forms/registrieren.form.php");
    require_once("lib/class/registrieren.class.php");

    
    echo registrierungsFormular();

    if (isset($_POST['submit'])) {
        $benutzername = trim($_POST['benutzername']);
        $passwort = $_POST['passwort'];
        $passwort_wdh = $_POST['passwort-wdh'];

        $registrierung = new Registrieren($benutzername, $passwort);
        $registrierung->gleichesPasswort($passwort_wdh);
        $registrierung->checkVorhanden($connection);
        $registrierung->datenSpeichernSql($connection);
    }