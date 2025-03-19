<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];

    // Sichere SQL-Abfrage mit Prepared Statement
    $stmt = $connection->prepare("SELECT * FROM pages WHERE url = :page");
    $stmt->bindParam(':page', $page, PDO::PARAM_STR);
    $stmt->execute();

    // Eine einzelne Zeile abrufen
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!-- Überprüfung, ob die Seite in der Datenbank existiert -->
<?php if (!empty($row)): ?>
    <div class="page-function">
        <ul>
            <li>
                <button>
                    <a href="../acp/index.php?page=page-edit&url=<?php echo htmlspecialchars($row['url']); ?>">
                        Seite bearbeiten
                    </a>
                </button>
            </li>
        </ul>
    </div>
<?php endif; ?>

</div>
</div>
</body>
</html>