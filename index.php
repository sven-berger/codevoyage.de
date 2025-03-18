<?php require_once("includes/header.php"); ?>
<div class="section">
<?php
// Standardseite setzen
$page = isset($_GET['page']) ? $_GET['page'] : 'index';

// Sicherheitscheck: Keine ".." oder "/" im Dateinamen erlauben
$page = basename($page);

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