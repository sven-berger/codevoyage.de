<!-- Direktlink zu der Bearbeitung der Seite hinzufügen-->
<?php
$page = $_GET['page'];
$sql = "SELECT * FROM pages WHERE url = '$page'";
$result = $connection->query($sql);
$row = $result->fetchAll();
foreach ($row as $row) {
    // Process each row if needed
}
?>

<!-- Sicherstellen, dass der Button nur angezeigt wird, wenn ein Parameter übergeben wurde-->
<?php if (isset($_GET['page'])): ?>
<div class="page-function">
    <ul>
        <li><button><a href="../acp/page-edit.php?page=<?php echo $row['url']; ?>">Seite bearbeiten</a></button></li>
    </ul>
</div>
<?php endif; ?>

</div> <!-- Schließendes div für main-content -->
</div> <!-- Schließendes div für container -->
</body>
</html>