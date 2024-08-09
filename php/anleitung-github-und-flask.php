<?php
    $bereich = 'PHP-Bereich';
    $pageTitle = 'Eine Kurzanleitung für GitHub und Flask';
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/header.inc.php");
?>

<h3 class="boxTitle">AUF GITHUB HOCHLADEN</h3>
<pre><code class="language-bash">
git add XXX.<i>file</i>

git commit -m "Das und das wurde bearbeitet"

git push
</code></pre>

<h3 class="boxTitle">MIT SERVER VERBINDEN UND VON GITHUB HERUNTERLADEN</h3>
<pre><code class="language-bash">
ssh user@hostname.tld / IP
cd <span style="font-weight: bold; color:darkred;">/verzeichnis-in-das-das-github-repository-kommen-soll/</span>

git clone https://github.com/username/repository.de.git
</code></pre>
<p class="notice">Bei Bedarf - Das sollte aber in der Regel nur einmal nötig sein</p>
<pre><code class="language-bash">
cd <span style="font-weight: bold; color:darkred;">./verzeichnis-mit-dem-eben-heruntergeladenen-github-repository/</span>
git pull
</code></pre>

<h3 class="boxTitle">Flask herunterladen und starten</h3>
<pre><code class="language-bash">
sudo apt install python3 python3-pip python3-venv libapache2-mod-wsgi-py3
</code></pre>
<p class="notice">Dies gilt für Ubuntu. Die Wahrscheinlichkeit, dass Debian mehr Pakete benötigt, ist gegeben</p>
<pre><code class="language-bash">
cd <span style="font-weight: bold; color:darkred;">/verzeichnis-in-dem-python/flask-ausgeführt werden soll/</span>
python3 -m venv venv
source venv/bin/activate
pip install Flask
pip install mysql-connector-python
pip install flask-restful
deactivate
</code></pre>

<h3 class="boxTitle">FlaskApp konfigurieren</h3>
<p style="font-weight: bold; color:darkred;">nano flaskapp.wsgi</p>
<pre><code class="apache">
import sys
import logging

sys.path.insert(0, '<span style="font-weight: bold; color:darkred;">/verzeichnis-in-dem-python/flask-ausgeführt werden soll/')</span>
from app import app as application
logging.basicConfig(stream=sys.stderr)
</code></pre>

<h3 class="boxTitle">App anlegen</h3>
<p style="font-weight: bold; color:darkred;">nano app.py</p>
<pre><code class="apache">
from flask import Flask
app = Flask(__name__)

@app.route('/')
def hello():
    return "Hello, World!"

if __name__ == '__main__':
    app.run(debug=True)
</code></pre>

<h3 class="boxTitle">Apache-Konfiguration <span style="font-weight: bold;">anpassen</span></h3>
<pre><code class="apache">
WSGIDaemonProcess flaskapp threads=5
WSGIScriptAlias / /verzeichnis-der-python/flask-instanz/flaskapp.wsgi

&lt;Directory /var/customers/webs/codevoyage/python&gt;
    Require all granted
&lt;/Directory&gt;
</code></pre>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/footer.inc.php");
?>