<?php if (isset($_GET['id'])): ?>
    <?php
        $id = $_GET['id'];
        
        // Benutzer und Benutzergruppe in einem JOIN abfragen
        $sql = "SELECT 
                    benutzer.id,
                    benutzer.vorname,
                    benutzer.zweitname,
                    benutzer.nachname,
                    benutzer.beschreibung,
                    benutzergruppen.name AS benutzergruppe
                FROM benutzer
                JOIN benutzergruppen ON benutzer.benutzergruppe = benutzergruppen.id
                WHERE benutzer.id = :id";

        $statement = $connection->prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            echo "Benutzer nicht gefunden.";
            exit;
        }

        $id = $row['id'];
        $vorname = $row['vorname'];
        $zweitname = $row['zweitname'];
        $nachname = $row['nachname'];
        $benutzergruppe = $row['benutzergruppe'];
        $beschreibung = $row['beschreibung'];
    ?>

<!-- benutzername, beschreibung, vorname, zweitname, nachname, benutzergruppe schön darstellen mit row col-md -->
<div class="row user-profile-row">
    <div class="col-md-6">
        <h3 class="section-title">Persönliche Daten</h3>
        <div class="user-details user-details-personal">
            <h4 class="sectionHeader">Benutzer-ID:</h4>
            <p><?= $id; ?></p>
            <?php if($vorname || $zweitname || $nachname): ?>
            <h4 class="sectionHeader">Name</h4>
            <p><?= $vorname . " " . $zweitname . " " . $nachname; ?></p>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-md-6">
        <h3 class="section-title">Details</h3>
        <div class="user-details">
            <h4 class="sectionHeader">Benutzergruppe</h4>
            <p><?= $benutzergruppe; ?></p>
        </div>
    </div>
</div>
<div class="row user-profile-row">
    <div class="col-md-4">
        <h3 class="section-title">Kontakt</h3>
        <div class="user-details user-details-contact">
        </div>
    </div>
    <div class="col-md-4">
        <h3 class="section-title">Bankdaten</h3>
        <div class="user-details">
        </div>
    </div>
    <div class="col-md-4">
        <h3 class="section-title">Platzhalter</h3>
        <div class="user-details">
        </div>
    </div>
</div>
<?php if ($beschreibung): ?>
    <h3 class="section-title">Beschreibung</h3>
    <div class="user-desc">
    <?= $beschreibung; ?>
</div>
<?php endif; ?>
<?php endif; ?>

<style>
.user-profile-row {
    display: flex;
}

.user-profile-row:first-child {
    margin-bottom: 20px;
}

.user-details {
    background-color: #ecf0f1;
    padding: 10px 20px;
    border-radius: 5px;
}

.user-details:nth-child(2) {
    margin-left: 10px;
}

.user-details-personal {
    margin-left: 0 !important;
}

.user-desc {
    background-color: #ecf0f1;
    padding: 10px 20px;
    border-radius: 5px;
}

h4 {
    font-size: 14px !important;
}
</style>