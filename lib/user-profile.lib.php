<?php if (isset($_GET['id'])): ?>
    <?php 
        $id = $_GET['id']; 
        require_once "$_SERVER[DOCUMENT_ROOT]" . "/lib/class/User/UserProfile.class.php";
        $userProfile = new UserProfile($connection, $id);
        $userProfile->getData($id);
    ?>

    <div class="row user-profile-row">
        <div class="col-md-6">
            <h3 class="section-title">Persönliche Daten</h3>
            <div class="user-details user-details-personal">
                <h4 class="sectionHeader">Benutzer-ID:</h4>
                <p><?= $id; ?></p>

                <!-- Überprüfung auf Vorname, Zweitname und Nachname -->
                <?php if ($userProfile->getVorname() || $userProfile->getZweitname() || $userProfile->getNachname()): ?>
                    <h4 class="sectionHeader">Name</h4>
                    <p><?= $userProfile->getVorname() . " " . $userProfile->getZweitname() . " " . $userProfile->getNachname(); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-6">
            <h3 class="section-title">Details</h3>
            <div class="user-details">
                <h4 class="sectionHeader">Benutzergruppe</h4>
                <p><?= $userProfile->getBenutzergruppe(); ?></p>
            </div>
        </div>
    </div>
    
    <div class="row user-profile-row">
        <div class="col-md-4">
            <h3 class="section-title">Kontakt</h3>
            <div class="user-details user-details-contact">
                <p>E-Mail</p>
                <p><?= $userProfile->getEmail(); ?></p>
            </div>
        </div>
        <div class="col-md-4">
            <h3 class="section-title">Bankdaten</h3>
            <div class="user-details">
                <p>IBAN</p>
                <p><?= $userProfile->getIban(); ?></p>
                <p>Kontostand</p>
                <p><?= $userProfile->getKontostand(); ?></p>
            </div>
        </div>
        <div class="col-md-4">
            <h3 class="section-title">Platzhalter</h3>
            <div class="user-details">
            </div>
        </div>
    </div>

    <?php if ($userProfile->getBeschreibung()): ?>
        <h3 class="section-title">Beschreibung</h3>
        <div class="user-desc">
            <?= $userProfile->getBeschreibung(); ?>
        </div>
    <?php endif; ?>

    <div class="useroptions">
        <ul>
            <li><button><a href="../index.php?page=user-profile-edit&id=<?= $userProfile->getId(); ?>">Profil bearbeiten</a></button></li>
        </ul>
    </div>
<?php endif; ?>