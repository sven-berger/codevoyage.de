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
<div class="sectionContent">
<p>nano flaskapp.wsgi</p>
<div class="codeContent">
<p>import sys</p>
<p>import logging</p>
<p><br/></p>
<p>sys.path.insert(0, '<span style="font-weight: bold; color:darkred;">/verzeichnis-in-dem-python/flask-ausgeführt werden soll/</span>')</p>
<p>from app import app as application</p>
<p>logging.basicConfig(stream=sys.stderr)</p>
</div>
</section>
<h3 class="boxTitle">App anlegen</h3>
<section class="section">
<div class="sectionContent">
<p>nano app.py</p>
<div class="codeContent">
<p>from flask import Flask</p>
<p><br/></p>
<p>app = Flask(__name__)</p>
<p><br/></p>
<p>@app.route('/')</p>
<p>def hello():</p>
<p>    return "Hello, World!"</p>
<p><br/></p>
<p>if __name__ == '__main__':</p>
<p>    app.run(debug=True)</p>
</div>
</section>
<h3 class="boxTitle">Apache-Konfiguration <span style="font-weight: bold;">anpassen</span></h3>
<section class="section">
<div class="sectionContent">
<pre class="codeContent">
<code>
WSGIDaemonProcess flaskapp threads=5
WSGIScriptAlias / /verzeichnis-der-python/flask-instanz/ flaskapp.wsgi

<Directory /var/customers/webs/codevoyage/python>
    Require all granted</p>
</Directory>
</code>
</pre>

<pre><code class="python">def beispiel_funktion():
    print("Hallo Welt")
    for i in range(5):
        print(i)</code></pre>

    <!-- Highlight.js JavaScript -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.0/highlight.min.js"></script>
    <script>hljs.highlightAll();</script>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/footer.inc.php");
?>