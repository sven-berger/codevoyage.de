from flask import Flask, render_template
app = Flask(__name__)

@app.route('/')
def hallo():
    return render_template('index.html', bereich='Python-Bereich', pageTitle='Startseite der Python-Instanz')

if __name__ == '__main__':
    app.run(debug=True)