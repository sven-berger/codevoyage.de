<?php require_once("../includes/acp-header.php"); ?>

<?php if (isset($_GET['page'])): ?>
    <?php
        ob_start(); // Ausgabe puffern
        $page = $_GET['page'];
        
        // SQL-Abfrage
        $sql = "SELECT * FROM pages WHERE url = '$page'";
        $result = $connection->query($sql);
        $row = $result->fetchAll();
        foreach ($row as $row) {
            $row = $row;
        }
    ?>

    <form method="POST" action="">
        <label for="Seitenname">Seitenname</label>
        <input type="text" name="pagename" id="pagename" value="<?php echo $row['pagename']; ?>" required>

        <label for="url">URL</label>
        <input type="text" name="url" id="url" value="<?php echo $row['url']; ?>" required>

        <label for="Seiteninhalt">Seiteninhalt</label>
        <textarea name="content" id="content" required><?php echo $row['content']; ?></textarea>
    
        <button type="submit" name="submit">Seite bearbeiten</button>
        <button type="reset" name="reset">Zurücksetzen</button>
    </form>

    <?php if (isset($_POST['submit'])): ?>
        <?php
            $pagename = $_POST['pagename'];
            $url = $_POST['url'];
            $content = $_POST['content'];
    
            $sql = "UPDATE pages SET pagename = '$pagename', url = '$url', content = '$content' WHERE url = '$page'";
            $connection->query($sql);

            if ($connection->query($sql)) { 
                header("Location: ../index.php?page=" . $page);
                exit;
            } else {
                echo "Fehler beim Speichern: " . $connection->errorInfo()[2];
            }
        ?>
    <?php endif; ?>
<?php endif; ?>
<?php ob_end_flush(); ?>
<?php require_once("../includes/acp-footer.php"); ?>