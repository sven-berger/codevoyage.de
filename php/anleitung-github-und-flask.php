<?php
    $bereich = 'PHP-Bereich';
    $pageTitle = 'Eine Kurzanleitung für GitHub und Flask';
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

<p>git clone https://github.com/username/repository.de.git <br/><span class="notice">Bei Bedarf - Das sollte aber in der Regel nur einmal nötig sein</span></p>
<p><br/></p>
<p>cd <span style="font-weight: bold; color:darkred;">./verzeichnis-mit-dem-eben-heruntergeladenen-github-repository/</span></p>
<p><br/></p>
<p>git pull</p>
</div>
</section>

<h3 class="boxTitle">Flask herunterladen und starten</h3>
<section class="section">
<div class="sectionContent">
<p>sudo apt install python3 python3-pip python3-venv libapache2-mod-wsgi-py3</p>
<p class="notice">Dies gilt für Ubuntu. Die Wahrscheinlichkeit, dass Debian mehr Pakete benötigt, ist gegeben</p>
<p><br/></p>
<p>cd <span style="font-weight: bold; color:darkred;">/verzeichnis-in-dem-python/flask-ausgeführt werden soll/</span></p>
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
</div>
</section>
<h3 class="boxTitle">FlaskApp konfigurieren</h3>
<section class="section">
<p style="font-weight: bold; color:darkred;">nano flaskapp.wsgi</p>
<div class="sectionContent">
<pre><code class="apache">
import sys
import logging

sys.path.insert(0, '<span style="font-weight: bold; color:darkred;">/verzeichnis-in-dem-python/flask-ausgeführt werden soll/')</span>
from app import app as application
logging.basicConfig(stream=sys.stderr)</code></pre>
</div>
</section>
<h3 class="boxTitle">App anlegen</h3>
<section class="section">
<p style="font-weight: bold; color:darkred;">nano app.py</p>
<div class="sectionContent">
<pre><code class="apache">
from flask import Flask
app = Flask(__name__)

@app.route('/')
def hello():
    return "Hello, World!"

if __name__ == '__main__':
    app.run(debug=True)</code></pre>
</div>
</section>
<h3 class="boxTitle">Apache-Konfiguration <span style="font-weight: bold;">anpassen</span></h3>
<section class="section">
<div class="sectionContent">
<pre><code class="apache">WSGIDaemonProcess flaskapp threads=5
WSGIScriptAlias / /verzeichnis-der-python/flask-instanz/flaskapp.wsgi

&lt;Directory /var/customers/webs/codevoyage/python&gt;
    Require all granted
&lt;/Directory&gt;</code></pre>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/footer.inc.php");
?>