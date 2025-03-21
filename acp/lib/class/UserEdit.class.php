<?php if (isset($_GET['id'])): ?>
    <?php ob_start(); ?>

    <?php
        $id = $_GET['id'];
        
        // Benutzer abrufen
        $sql = "SELECT * FROM benutzer WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            echo "Benutzer nicht gefunden.";
            exit;
        }

        // Benutzergruppen abrufen
        $sql = "SELECT id, name FROM benutzergruppen";
        $statement = $connection->prepare($sql);
        $statement->execute();
        $benutzergruppen = $statement->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <form method="POST" action="">
        <label for="benutzername">Benutzername</label>
        <input type="text" name="benutzername" id="benutzername" value="<?= htmlspecialchars($row['benutzername'] ?? ''); ?>" required>

        <label for="email">E-Mail</label>
        <input type="email" name="email" id="email" value="<?= htmlspecialchars($row['email'] ?? ''); ?>" required>

        <label for="beschreibung">Beschreibung</label>
        <textarea name="beschreibung" id="beschreibung"><?= $row['beschreibung'] ?? ''; ?></textarea>

        <label for="iban">IBAN</label>
        <input type="text" name="iban" id="iban" value="<?= htmlspecialchars($row['iban'] ?? ''); ?>">

        <label for="kontostand">Kontostand</label>
        <input type="number" name="kontostand" id="kontostand" value="<?= htmlspecialchars($row['kontostand'] ?? ''); ?>">

        <label for="vorname">Vorname</label>
        <input type="text" name="vorname" id="vorname" value="<?= htmlspecialchars($row['vorname'] ?? ''); ?>">

        <label for="zweitname">Zweitname</label>
        <input type="text" name="zweitname" id="zweitname" value="<?= htmlspecialchars($row['zweitname'] ?? ''); ?>">

        <label for="nachname">Nachname</label>
        <input type="text" name="nachname" id="nachname" value="<?= htmlspecialchars($row['nachname'] ?? ''); ?>">

        <label for="benutzergruppe">Benutzergruppe</label>
        <select name="benutzergruppe" id="benutzergruppe" required>
            <?php foreach ($benutzergruppen as $gruppe): ?>
                <option value="<?= $gruppe['id']; ?>" <?= ($gruppe['id'] == $row['benutzergruppe'] ? 'selected' : ''); ?>>
                    <?= htmlspecialchars($gruppe['name']); ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button type="submit" name="submit">Benutzer bearbeiten</button>
        <button type="reset" name="reset">Zurücksetzen</button>
    </form>

<?php if (isset($_POST['submit'])): ?>
    <?php
        $benutzername = $_POST['benutzername'];
        $email = $_POST['email'];
        $beschreibung = htmlspecialchars($_POST['beschreibung'] ?? '', ENT_QUOTES, 'UTF-8');
        $iban = $_POST['iban'];
        $kontostand = $_POST['kontostand'];
        $vorname = $_POST['vorname'];
        $zweitname = $_POST['zweitname'];
        $nachname = $_POST['nachname'];
        $benutzergruppe = $_POST['benutzergruppe'];

        $sql = "UPDATE benutzer SET
            benutzername = :benutzername,
            email = :email,
            beschreibung = :beschreibung,
            iban = :iban,
            kontostand = :kontostand,
            vorname = :vorname,
            zweitname = :zweitname,
            nachname = :nachname,
            benutzergruppe = :benutzergruppe
            WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->bindParam(':benutzername', $benutzername, PDO::PARAM_STR);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':beschreibung', $beschreibung, PDO::PARAM_STR);
        $statement->bindParam(':iban', $iban, PDO::PARAM_STR);
        $statement->bindParam(':kontostand', $kontostand, PDO::PARAM_INT);
        $statement->bindParam(':vorname', $vorname, PDO::PARAM_STR);
        $statement->bindParam(':zweitname', $zweitname, PDO::PARAM_STR);
        $statement->bindParam(':nachname', $nachname, PDO::PARAM_STR);
        $statement->bindParam(':benutzergruppe', $benutzergruppe, PDO::PARAM_INT);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        if ($statement->execute()) {
        header("Location: ../acp/index.php?page=user");
        exit();
        }
    ?>
    <?php endif; ?>
    <?php ob_end_flush(); ?>
<?php endif; ?>
