from flask import Flask, render_template
app = Flask(__name__)

@app.route('/')
def siteindex():
     return render_template("frontpage.html")

if __name__ == '__main__':
    app.run()