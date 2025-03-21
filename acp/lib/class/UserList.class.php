<?php
$sql = "SELECT 
    benutzer.id,
    benutzer.benutzername,
    benutzer.email,
    benutzergruppen.name AS gruppenname
FROM benutzer
JOIN benutzergruppen ON benutzer.benutzergruppe = benutzergruppen.id;";
$statement = $connection->prepare($sql);
$statement->execute();
$benutzer = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Benutzername</th>
            <th>E-Mail</th>
            <th>Benutzergruppe</th>
            <th>Aktion</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($benutzer as $daten): ?>
            <tr>
                <td><?= $daten['id']; ?></td>
                <td><a href="../acp/index.php?page=user-edit&id=<?= $daten['id']; ?>"><?= htmlspecialchars($daten['benutzername']); ?></a></td>
                <td><?= htmlspecialchars($daten['email']); ?></td>
                <td><?= htmlspecialchars($daten['gruppenname']); ?></td>
                <td><a href="../index.php?page=user-profile&id=<?= $daten['id']; ?>">Zum öffentlichen Profil</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
