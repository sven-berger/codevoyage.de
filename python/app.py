import sys
from flask import Flask, render_template
import flask
app = Flask(__name__)

@app.context_processor
def inject_versions():
    return dict(
        python_version=get_python_version(),
        flask_version=get_flask_version()
    )

def get_python_version():
    version_info = sys.version_info
    return f"{version_info.major}.{version_info.minor}.{version_info.micro}"

def get_flask_version():
    return flask.__version__

@app.route('/')
def hallo():
    return render_template('index.html', bereich='Python-Bereich', pageTitle='Startseite der Python-Instanz')

if __name__ == '__main__':
    app.run(debug=True)