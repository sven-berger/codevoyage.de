<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.0/styles/default.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.0/highlight.min.js"></script>
    <script>hljs.highlightAll();</script>
    <title><?php echo $pageTitle; ?></title>
</head>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/php/includes/database.inc.php");
    $mariadbVersion = getMariaDBVersion($connection);
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/php/includes/var.inc.php");
?>

<body>

<div class="header">
<a href="https://codevoyage.de/">
    <h2 align="center">Willkommen auf meinem Apache-Webserver!</h2>
</a>
<h3 align="center">Dieser Server verwendet <a href="https://mariadb.org/" style="color: darkred;" target="_blank">MariaDB <?php echo htmlspecialchars($mariadbVersion); ?></a></h3>
</a></h3>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/php/includes/navigation.inc.php"); ?>
</div>

<div class="main">
    <div class="content">
        <h2><?php echo $pageTitle; ?></h2>
        <section class="section">
            <div class="sectionContent">