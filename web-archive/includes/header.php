<?php 
    if (ob_get_level() == 0) ob_start();
    require_once("includes/session.php");
?>

<!DOCTYPE html>  
<html lang="de">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>CodeVoyage.de</title>  

    <!-- Font Awesome 6 Free einbinden -->
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">

    <!-- Bootstrap einbinden
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    -->

    <!-- HightLight.js einbinden -->
    <link rel="stylesheet" href="../assets/highlightjs/styles/default.min.css">
    <script src="../assets/highlightjs/highlight.min.js"></script>
    <script>hljs.highlightAll();</script>

    <!-- Angelegte Stylesheets einbinden -->
    <link rel="stylesheet "href="../styles/editor.css">
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="../styles/mobile.css">
</head>

<body>
    <div class="container">
        <?php require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/seitenleiste.php"); ?>
        <div class="main-content">
        <?php require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/navigation.php"); ?>