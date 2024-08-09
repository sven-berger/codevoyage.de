<?php
    $bereich = 'PHP-Bereich';
    $pageTitle = 'Eine Kurzanleitung für Flask';
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/header.inc.php");
?>

<h3 class="boxTitle">Flask und alle nötigen Pakete herunterladen und starten</h3>
<pre><code class="language-bash">sudo apt install python3 python3-pip python3-venv libapache2-mod-wsgi-py3</code></pre>
<p class="notice">Dies gilt für Ubuntu. Die Wahrscheinlichkeit, dass Debian mehr Pakete benötigt, ist gegeben</p>
<pre><code class="language-bash">cd <span style="font-weight: bold; color:darkred;">/verzeichnis-in-dem-python-flask-ausgeführt werden soll/</span>
python3 -m venv venv
source venv/bin/activate
pip install Flask
pip install mysql-connector-python
pip install flask-restful
deactivate</code></pre>

<h3 class="boxTitle">FlaskApp konfigurieren</h3>
<p style="font-weight: bold; color:darkred;">nano flaskapp.wsgi</p>
<pre><code class="language-python">import sys
import logging

sys.path.insert(0, '<span style="font-weight: bold; color:darkred;">/verzeichnis-in-dem-python-flask-ausgeführt werden soll/</span>')
from app import app as application
logging.basicConfig(stream=sys.stderr)</code></pre>

<h3 class="boxTitle">App anlegen</h3>
<p style="font-weight: bold; color:darkred;">nano app.py</p>
<pre><code class="language-python">from flask import Flask
app = Flask(__name__)

@app.route('/')
def hello():
    return "Hallo Welt!"

if __name__ == '__main__':
    app.run(debug=True)</code></pre>

<h3 class="boxTitle">Apache-Konfiguration <span style="font-weight: bold;">anpassen</span></h3>
<pre><code class="apache">WSGIDaemonProcess flaskapp threads=5
WSGIScriptAlias / /verzeichnis-der-python-flask-instanz/flaskapp.wsgi</code></pre>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/footer.inc.php");
?>