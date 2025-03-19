<?php require_once("includes/header.php"); ?>
<div class="section">
<?php

// Standardseite setzen
$page = isset($_GET['page']) ? $_GET['page'] : '';

// Falls keine Seite gesetzt ist, auf index.php?page=index umleiten
if ($page === '') {
    header("Location: index.php?page=index");
    exit();
}

// Sicherheitscheck: Nur alphanumerische Zeichen und Unterstriche erlauben
if (!preg_match('/^[a-zA-Z0-9_]+$/', $page)) {
    $page = 'index';
}

// Pfad zur Datei
$filePath = "lib/" . $page . ".lib.php";

// Datei einbinden, wenn sie existiert
if (file_exists($filePath)) {
    include $filePath;
} else {
    include "lib/errors/404.php";
}
?>
</div>
<?php require_once("includes/footer.php"); ?>