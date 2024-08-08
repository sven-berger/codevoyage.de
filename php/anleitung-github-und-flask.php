<?php
    $bereich = 'PHP-Bereich';
    $pageTitle = 'Manuelles Hoch/Runterladen bei GitHub - Anleitung Flask';
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/header.inc.php");
?>
<p><p>ssh user@hostname.tld / IP</p>
<p><br/></p>
<p>cd <span style="font-weight: bold; color:darkred;">/verzeichnis-in-das-das-github-repository-kommen-soll/</span></p>
</div>
</section>
<h3 class="boxTitle">AUF GITHUB HOCHLADEN</h3>
<section class="section">
<div class="sectionContent">
<p>git add XXX.<i>file</i></p>
<p><br/></p>
<p>git commit -m "Das und das wurde bearbeitet"</p>
<p><br/></p>
<p>git push</p>
</div>
</section>

<h3 class="boxTitle">MIT SERVER VERBINDEN UND VON GITHUB HERUNTERLADEN</h3>
<section class="section">
<div class="sectionContent">

<p>git clone https://github.com/username/repository.de.git <br/><strong><small>(Bei Bedarf - Das sollte aber in der Regel nur einmal nötig sein)</small></strong></p>
<p><br/></p>
<p>cd <span style="font-weight: bold; color:darkred;">./verzeichnis-mit-dem-eben-heruntergeladenen-github-repository/</span></p>
<p><br/></p>
<p>git pull</p>
</div>
</section>

<h3 class="boxTitle">Flask herunterladen und starten</h3>
<section class="section">
<div class="sectionContent">
<p style="font-weight: 400;">sudo apt install python3 python3-pip python3-venv libapache2-mod-wsgi-py3</p>
<p><small><i>Dies gilt für Ubuntu. Die Warhrscheinlichkeit, dass Debian mehr Pakete benötigt, ist gegeben.<i></small></p>
<p><br/></p>
<p>cd <span style="font-weight: bold; color:darkred;">/verzeichnis-in-dem-flask-ausgeführt werden soll/</span></p>
<p><br/></p>
<p>python3 -m venv venv</p>
<p><br/></p>
<p>source venv/bin/activate</p>
<p><br/></p>
<p>pip install Flask</p>
<p>pip install mysql-connector-python</p>
<p>pip install flask-restful</p>
<p><br/></p>
<p>deactivate</p>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/footer.inc.php");
?>