<?php
    require_once("class/login.class.php");
?>

<div class="sidebar">
    <h3>Eigene Werke</h3>
    <ul>
        <li><a href="index.php?page=zahlen-raten">Zahlen raten</a></li>
        <li><a href="index.php?page=bankkonten">Bankkonten (objektorientiert programmiert)</a></li>
    </ul>

    <div class="sidebar-end">  
        <form method="POST" action="" class="form-login">
            <input type="text" id="benutzername" name="benutzername" value="Benutzername">
            <input type="passwort" id="passwort" name="passwort" value="Passwort">
            <button type="submit" class="button-1">Anmelden</button>
            <button class="button-2">Passwort vergessen</button>
            <button class="button-3">Registrieren</button>
        </form>
        <?php if(1 == 2): ?>
        <ul>
            <li><a href="../acp/index.php">Administrationsbereich</a></li>
        </ul>
        <?php endif; ?>
    </div>
</div>
<style>
    
</style>