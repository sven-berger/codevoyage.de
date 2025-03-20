<?php

// Konten aus der Datenbank abrufen
$sql = "SELECT * FROM bankkonten";
$statement = $connection->query($sql);
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<!--- Überweisung tätigen --->
<h2>Überweisung tätigen</h2>
<form method="POST" action="">
    <label for="absendekonto">Absendekonto</label>
    <select name="absendekonto" id="absendekonto">
        <?php foreach ($result as $row): ?>
            <option value="<?= $row['iban'] ?>"><?= $row['iban'] . " (" . $row['inhaber'] . ")" . " => " . "(" . $row['kontostand'] . "€)"; ?></option>
        <?php endforeach; ?>
    </select>

    <label for="zielkonto">Zielkonto</label>
    <select name="zielkonto" id="zielkonto">
        <?php foreach ($result as $row): ?>
            <option value="<?= $row['iban'] ?>"><?= $row['iban'] . " (" . $row['inhaber'] . ")" . " => " . "(" . $row['kontostand'] . "€)"; ?></option>
        <?php endforeach; ?>
    </select>

    <label for="betrag">Betrag</label>
    <input type="number" id="betrag" name="betrag" step="0.01" required>

    <button type="submit">Auftrag übermitteln</button>
    <button type="reset">Zurücksetzen</button>
</form>

<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $absendekonto = $_POST['absendekonto'];
    $zielkonto = $_POST['zielkonto'];
    $betrag = (float) $_POST['betrag'];

    // Konten dürfen nicht identisch sein
    if ($absendekonto === $zielkonto) {
        echo "❌ Absendekonto und Zielkonto dürfen nicht identisch sein.";
        exit;
    }

    // Betrag muss positiv sein
    if ($betrag <= 0) {
        echo "❌ Der Betrag muss positiv sein.";
        exit;
    }

    // Aktuellen Kontostand abrufen
    $stmt = $connection->prepare("SELECT kontostand FROM bankkonten WHERE iban = :iban");
    $stmt->execute([':iban' => $absendekonto]);
    $konto = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$konto) {
        echo "❌ Absendekonto nicht gefunden.";
        exit;
    }

    $kontostand = (float) $konto['kontostand'];

    // Prüfen, ob genug Guthaben vorhanden ist
    if ($kontostand < $betrag) {
        echo "❌ Nicht genügend Guthaben auf dem Absendekonto.";
        exit;
    }

    // Geld abbuchen
    $stmt = $connection->prepare("UPDATE bankkonten SET kontostand = kontostand - :betrag WHERE iban = :iban");
    $stmt->execute([':betrag' => $betrag, ':iban' => $absendekonto]);

    // Geld gutschreiben
    $stmt = $connection->prepare("UPDATE bankkonten SET kontostand = kontostand + :betrag WHERE iban = :iban");
    $stmt->execute([':betrag' => $betrag, ':iban' => $zielkonto]);

    if ($stmt->execute()) {
        header("Location: index.php?page=ueberweisung");
        exit;
    }
}
?>