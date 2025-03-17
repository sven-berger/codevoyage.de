<!DOCTYPE html>  
<html lang="de">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>CodeVoyage.de</title>  
    <link rel="stylesheet" href="../includes/styles.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.0/styles/default.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.0/highlight.min.js"></script>
    <script>hljs.highlightAll();</script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<script src="/includes/tinymce/tinymce.min.js"></script>
<script>
tinymce.init({
    selector: 'textarea',
    content_css: 'https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/default.min.css',
    tabfocus_elements: 'somebutton',
    menubar: false,
    language: 'de',
    language_url: '/includes/tinymce/langs/de.js',
    plugins: 'code table lists fullscreen wordcount link image autosave tabfocus codesample preview',
    toolbar: 'code undo redo | bold italic | fontsize forecolor backcolor | link image codesample table blockquote | bullist numlist | alignleft aligncenter alignright removeformat preview',
    fontsize_formats: "10pt 12pt 14pt 16pt 18pt 24pt 36pt",
    style_formats: [
        {
            title: 'Zitat (Groß)',
            block: 'blockquote',
            classes: 'big-quote'
        },
        {
            title: 'Zitat (Klein)',
            block: 'blockquote',
            classes: 'small-quote'
        }
    ],
    content_style: ".big-quote { font-size: 20px; font-style: italic; color: darkgray; background: #000; padding: 10px; } .small-quote { font-size: 14px; font-style: italic; color: gray; padding: 5px; }"
});
</script>

<?php 
    $section_beginn = "<div class='section'>";
    $section_ende = "</div>";
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/database-connect.php");
?>

<body>
<div class="container">
<?php require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/seitenleiste.php"); ?>


<div class="main-content">
<?php require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/navigation.php"); ?>

