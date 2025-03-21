<?php if (!isset($_POST['zahl'])): ?>
    <?php echo $section_beginn; ?>
    <form action="" method="post">
        <label for="zahl">Bitte gib eine Zahl zwischen 1 - 100 ein:</label>
        <input type="number" id="zahl" name="zahl" min="1" max="100" required>   
    <button type="submit">Eingabe abschicken</button>
    </form>
    <?php echo $section_ende; ?>
<?php endif; ?>

<?php
    session_start();
    if (!isset($_SESSION['zufallszahl'])) {
        $_SESSION['zufallszahl'] = rand(0, 101);
    } 
?>

<?php if (isset($_POST['zahl'])): ?>
    <?php 
        $zahl = (int)$_POST['zahl'];
        $zufallszahl = $_SESSION['zufallszahl'];
    ?>
    <?php if ($zahl < $zufallszahl): ?>
        <?php echo $section_beginn; ?>
        <div class="sectionHeader fail">Höher!</div>
        <?php echo $section_ende; ?>
        <?php echo $section_beginn; ?>
        <form action="" method="POST">
            <label for="zahl">Bitte gib eine Zahl zwischen 1 - 100 ein:</label>
            <input type="number" id="zahl" name="zahl" min="1" max="100" required>   
        <button type="submit">Eingabe abschicken</button>
        </form>
        <?php echo $section_ende; ?>
    <?php elseif ($zahl > $zufallszahl): ?>
        <?php echo $section_beginn; ?>
        <div class="sectionHeader fail">Niedriger!</div>
        <?php echo $section_ende; ?>
        <?php echo $section_beginn; ?>
        <form action="" method="POST">
            <label for="zahl">Bitte gib eine Zahl zwischen 1 - 100 ein:</label>
            <input type="number" id="zahl" name="zahl" min="1" max="100" required>   
        <button type="submit">Eingabe abschicken</button>
        <?php echo $section_ende; ?>
    <?php else: ?>
        <?php echo $section_beginn; ?>
        <div class="sectionHeader success">Glückwunsch, du hast die richtige Zahl geraten!</div><br>
        <?php unset($_SESSION['zufallszahl']); ?>
        <button><a href="index.php?page=zahlen-raten">Neues Spiel starten</a></button>
        <?php echo $section_ende; ?>
    <?php endif; ?>
<?php endif; ?> 