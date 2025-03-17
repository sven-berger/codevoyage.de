<!--- Diese Seite dient zur Bearbeitung von Seiten --->
<?php

$page = $_GET['page'];
$sql = "SELECT * FROM pages WHERE url = '$page'";
$result = $connection->query($sql);
$row = $result->fetchAll();

if (isset($_POST['submit'])) {
    $pagename = $_POST['pagename'];
    $url = $_POST['url'];
    $content = $_POST['content'];
    
    $sql = "UPDATE pages SET pagename = '$pagename', url = '$url', content = '$content' WHERE url = '$page'";
    $connection->query($sql);
    
    header("Location: index.php?page=pages");
}
?>

<form method="POST" action="">
    <label for="Seitenname">Seitenname</label>
    <input type="text" name="pagename" id="pagename" value="<?php echo $row[0]['pagename']; ?>" required>

    <label for="url">URL</label>
    <input type="text" name="url" id="url" value="<?php echo $row[0]['url']; ?>" required>

    <label for="Seiteninhalt">Seiteninhalt</label>
    <textarea name="content" id="content" required><?php echo $row[0]['content']; ?></textarea>

    <input type="submit" name="submit" value="Seite bearbeiten">
    <input type="reset" name="reset" value="Zurücksetzen">
</form>