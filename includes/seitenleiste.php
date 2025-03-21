<div class="sidebar">
    <h3>Eigene Werke</h3>
    <ul>
        <li><a href="index.php?page=zahlen-raten">Zahlen raten</a></li>
        <li><a href="index.php?page=bankkonten">Bankkonten (objektorientiert programmiert)</a></li>
    </ul>

    <div class="sidebar-end">  
        <?php
        if (!isset($_SESSION['benutzername'])) {
            include("lib/forms/login.form.php");
            if (isset ($_POST['submit'])) {
                require("lib/login.lib.php");
            }
        }
        ?>

        <?php if (isset($_SESSION['benutzername'])): ?>
        <ul>
            <li><a href="index.php?page=logout">Ausloggen</a></li>
            <li><a href="../acp/index.php">Administrationsbereich</a></li>
        </ul>
        <?php endif; ?>
    </div>
</div>