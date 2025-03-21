<?php
    require_once("lib/class/bankkonten.class.php");
    $kontoDaten = Konto::datenAbrufenSql($connection);
    $konten = Konto::datenVerarbeiten($kontoDaten);
?>

<table>
    <tr>
        <th>Inhaber</th>
        <th>IBAN</th>
        <th>Kontostand</th>
    </tr>
    <?php foreach ($konten as $konto): ?>
    <tr>
        <td><?= $konto->getInhaber() ?></td>
        <td><?= $konto->getIban() ?></td>
        <td><?= $konto->getKontostand() ?>€</td>
    </tr>
    <?php endforeach; ?>
</table>