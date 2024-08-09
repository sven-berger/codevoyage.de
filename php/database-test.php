<?php
    $bereich = 'PHP-Bereich';
    $pageTitle = 'Datenbanktest mit PHP';
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/header.inc.php");
?>

<?php if ($connection): ?>
    <p style="text-align: center; font-weight: bold;">Die Datenbankverbindung (MySQL) wurde mit <span style="color: darkred;">Erfolg</span> hergestellt.</p>
    <p align="center">Nun kann das Programmieren beginnen!</p>
<?php endif; ?>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/footer.inc.php");
?>