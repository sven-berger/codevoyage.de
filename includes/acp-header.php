<?php 
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/session.php");
?>

<!DOCTYPE html>  
<html lang="de">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>CodeVoyage.de</title>  
    <link rel="stylesheet" href="../includes/styles.css">
    <link rel="stylesheet "href="../includes/editor.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.0/styles/default.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.0/highlight.min.js"></script>
    <script>hljs.highlightAll();</script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<script src="/includes/tinymce/tinymce.min.js"></script>
<script>
tinymce.init({
    selector: 'textarea',
    license_key: 'gpl',
    content_css: 'https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/default.min.css',
    content_css: ['../includes/editor.css'],
    menubar: false,
    language: 'de',
    language_url: '/includes/tinymce/langs/de.js',
    plugins: 'code table lists fullscreen wordcount link image autosave advlist  codesample preview',
    toolbar: 'code undo redo | bold italic | blocks | link image codesample table blockquote | bullist numlist | alignleft aligncenter alignright removeformat preview fullscreen',
    fontsize_formats: "10pt 12pt 14pt 16pt 18pt 24pt 36pt",
    image_advtab: true, // Erweiterte Bildoptionen
    image_class_list: [
        { title: 'Keine', value: '' },
        { title: 'Links mit Textfluss', value: 'float-left' },
        { title: 'Rechts mit Textfluss', value: 'float-right' }
    ],
    content_style: `
        .float-left { float: left; margin: 0 15px 15px 0; }
        .float-right { float: right; margin: 0 0 15px 15px; }
    `
});
</script>

<body>
<?php 
    $section_beginn = "<div class='section'>";
    $section_ende = "</div>";
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/database-connect.php");
?>
<div class="container">
<?php require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/acp-seitenleiste.php"); ?>


<div class="main-content">
<?php require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/navigation.php"); ?>


