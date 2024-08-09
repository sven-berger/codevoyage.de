<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://codevoyage.de/python/static/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{ url_for('static', filename='css/style.css') }}">
    <title><?php echo $pageTitle; ?></title>
</head>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/database.inc.php");
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/var.inc.php");
?>

<body>

<div class="header">
<a href="https://codevoyage.de/">
    <h2 align="center">Willkommen auf meinem Apache-Webserver!</h2>
</a>
<h3 align="center">Diese Instanz läuft auf <a href="https://php.net" style="color: darkred;" target="_blank">PHP <?php echo htmlspecialchars($phpVersion); ?> (FPM)</a></h3>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/includes/navigation.inc.php"); ?>
</div>

<div class="main">
    <div class="content">
        <h2><?php echo $pageTitle; ?></h2>
        <section class="section">
            <div class="sectionContent">
            <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.0/highlight.min.js"></script>
            <script>hljs.highlightAll();</script>