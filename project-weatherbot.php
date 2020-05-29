<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="noindex">

	<link rel="icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

	<title>Lernen Sie mich näher kennen</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" href="css/prism.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
	<section id="header-impressum">
		<div class="fixed-nav goback">
				<div class="navbar-nav-fixed">
					<a class="nav-link-fixed" href="javascript:history.back()">Zurück</a>
				</div>
		</div>
		<div class="bg-white-impressum"></div>
		<div class="col-12 text-center">
			<h1>Wetterstation</h1>
		</div>
	</section>

	<div class="scrolltotop"><div class="scrolltotop-finger"></div></div>

	<div class="container project">
		<div class="row">
			<div class="col-12">
				<p>Programmiersprache: <span class="sprache python"></span> Python</p>
				<hr>
				<p>Wir erstellen uns eine Wetterstsation mit zwei Sensoren. Die Sensordaten werden mit Hilfe eines Bots im Telegram Messenger ausgelesen und ausgegeben. Ein Raspberry Pi fungiert dabei als Betriebsystem um die Sensordaten zu verarbeiten.<br><br>
				Dies ist eine Schritt für Schritt Anleitung, wie bei diesem Projekt vorgegangen wurde, damit auch du dieses Projekt mit Leichtigkeit nachstellen kannst.<br><br>
				Dieses Projekt findest du auch auf meinem <a href="https://github.com/woltersjoh/weatherbot" target="_blank" rel="nofollow noopener">GitHub-Profil</a> und darf verwendet werden.
				<h2>Zielsetzung</h2>
				<p>Eine Wetterstation bei der aktuelle Wetterdaten abgerufen werden können.</p>
				<hr>
				<h2>Zusammenfassung</h2>
				<ul>
					<li><a href="#install-raspberry"><p>Einrichtung des Raspberry Pi</p></a></li>
					<li><a href="#components"><p>Zusammensetzung der Komponenten</p></a></li>
					<li><a href="#write-sensors"><p>Programmierung der Sensoren</p></a></li>
					<li><a href="#create-bot"><p>Erstellung des Bots</p></a></li>
					<li><a href="#set-bot"><p>Einrichtung des Bots</p></a></li>
					<li><a href="#write-bot"><p>Programmierung des Bots</p></a></li>
				</ul>
				<hr>
				<h2>Verwendete Komponenten</h2>
				<ul class="component-list">
					<li><p>Raspberry Pi 3 Modell B+, Micro USB Netzteil 5V / 2,5A, 8GB Micro SD Speicherkarte</p></li>
					<li class="a"><p>Sensor BME280 für Temperatur, Luftfeuchtigkeit und Luftdruck</p></li>
					<li><p>Sensor GY-1145 für Beleuchtungsstärke, Infrarotstrahlung und UV-Strahlung</p></li>
					<li><p>Jumper Kabe</p></li>
					<li><p>Breadboard</p></li>
					<li><p>Gehäuse für Raspberry und Einbuchtung für Sensoren (mit 3D Drucker erstellt)</p></li>
				</ul>
				<hr id="install-raspberry"><br>
				<h2>Einrichtung des Raspberry Pi</h2>
				<div class="project-steps">
				<ul>
				<li class="steps">
					<h3>Betriebssystem</h3>
					<p>Um den neuen Raspberry Pi verwenden zu können, musste zunächst das Betriebssystem Raspbian installiert werden. Die aktuelle Version gibt es auf der offiziellen Website: <a href="https://www.raspberrypi.org/downloads/" target="_blank" rel="nofollow noopener">https://www.raspberrypi.org/downloads/</a><br><br>
					Bei der Datei handelt es sich um eine Image-Datei. Um diese auf die SD-Karte zu schreiben wurde <a href="https://www.balena.io/etcher/" target="_blank" rel="nofollow noopener">Etcher</a> verwendet. Die SD-Karte sollte zuvor formatiert werden. Hierfür kann der <a href="https://www.sdcard.org/downloads/formatter/" target="_blank" rel="nofollow noopener">SD Memory Card Formatter</a> verwendet werden.<br><br>
					Nun konnte mit dem Setup des Raspberry Pi begonnen werden. Nachdem die SD-Karte in die Platine, ein Monitor an den HDMI-Anschluss und der Raspberry mit dem Netzteil mit Strom versorgt wurde, fuhr er zum ersten mal hoch.
					</p><hr>
				</li>
				<li class="steps step-two">
					<h3>Einrichtung</h3>
					<p>Nach dem ersten Starten müssen die Standard Logindaten Benutzername <b>pi</b> und Passwort <b>raspbery</b> eingegeben werden.					</p>
					<img class="" src="img/projects/weatherbot/boot-screen.png"></img>
				</li>
				<hr>
				<li class="steps step-three">
					<h3>Konfiguration</h3>
					<p>Der Raspberry besitzt 40 programmierbare In- und Output Pins, der sogenannte GPIO. Damit der Raspberry auch die Sensordaten empfangen kann, wurden im Setup einige Interfacing Optionen ausgewählt.</p>
					<p>Für die benötigten Konfigurationen öffnen wir das sogenannte Raspberry Pi Software Configuration Tool. Um dieses zu öffnen geben wir im Terminal folgenden Befehl ein:</p>
						<pre><code class="language-command-line">sudo raspi-config</code></pre>
						<p>Das Tool öffnet sich und sieht im Aufbau wie folgt aus:</p>
						<pre><code class="language-command-line">
┌───────────────────┤ Raspberry Pi Software Configuration Tool (raspi-config) ├────────────────────┐
│                                                                                                  │
│        1 Change User Password Change password for the current user                               │
│        2 Network Options      Configure network settings                                         │
│        3 Boot Options         Configure options for start-up                                     │
│        4 Localisation Options Set up language and regional settings to match your location       │
│        5 Interfacing Options  Configure connections to peripherals                               │
│        6 Overclock            Configure overclocking for your Pi                                 │
│        7 Advanced Options     Configure advanced settings                                        │
│        8 Update               Update this tool to the latest version                             │
│        9 About raspi-config   Information about this configuration tool                          │
│                                                                                                  │
│                                                                                                  │
│                                                                                                  │
│                           &lt;Select&gt;                           &lt;Finish&gt;                            │
│                                                                                                  │
└──────────────────────────────────────────────────────────────────────────────────────────────────┘
						</code></pre>
						<p>Wir wählen Punkt 5 - <b>Interfacing Optionen</b></p>
						<p>Für unser Projekt müssen folgende Interfacing Optionen freigeschaltet sein:</p>
						<pre><code class="language-command-line">P2 SSH				Enable
P3 VNC				Enable
P5 I2C				Enable
P8 Remoute GPIO		Enable</code></pre>
						<p>Mit SSH können wir den Raspberry über eine Kommandozeile am Computer fernsteuern. VNC ermöglicht es uns den Raspberry mit einer grafischen Ansicht des Raspberry Desktops fernsteuern. I2C und der GPIO wird zur Kommunikation mit den verwendeten Sensoren benötigt.</p>
						<hr>
						<li class="steps step-four">
							<h3>Fernsteuern des Raspberry Pi</h3>
							<p>Damit der Raspberry später alleinstehend als Wetterstation draußen stehen kann und wir auf Ihm per fernsteuerung zugreifen zu können, um eventuelle Fehler oder Optimierungen durchführen zu können, installieren wir auf dem Computer das kostenlose Programm <a href="https://www.putty.org/" target="_blank" rel="nofollow noopener">PuTTY</a>.</p>
							<p>Um auch eine grafische Oberfläche vom Raspberry darzustellen kann <a href="https://www.realvnc.com/de/connect/download/viewer/" target="_blank" rel="nofollow noopener">realVNC</a> auf dem Computer installiert werden.</p>
						</li>
						<hr>
						<li class="steps step-five">
							<h3>Projektordner erstellen</h3>
							<p>Nach dem ersten Starten müssen die Standard Logindaten Benutzername <b>pi</b> und Passwort <b>raspbery</b> eingegeben werden.					</p>
							<img width="100%" src="img/projects/weatherbot/create-folder.png"></img>
						</li>
				</li>
			</ul>
		</div>
			<hr id="components"><br>

			<h2>Zusammensetzung der Komponenten</h2>
			<div class="project-steps">
				<ul>
					<li class="steps">
						<h3>Löten</h3>
						<p>Standardgemäß sind die Kontakte nicht an den Sensoren befestigt. Daher müssen diese gelötet werden.</p>
					</li>
					<li class="steps step-two">
						<h3>Aufbau und Verkabelung</h3>
						<p>Der Aufbau der Verkabelung sieht wie folgt aus:</p>
						<pre style="background: none;"><code class="language-python" style="color: #212529; text-shadow: none; font-weight: bold;">VIN ○──┐
GND ○──│─┐
SCL ○──│─│─┐
SDA ○──│─│─│─┐
  	   │ │ │ │
VIN ○──┤ │ │ │
GND ○──│─┤ │ │
SCL ○──│─│─┤ │
SDA ○──│─│─│─┤
  	   │ │ │ │
  	   │ │ │ │
  	   │ │ │ │
+5V ○──┘ │ │ │
GND ○────┘ │ │
SCL ○──────┘ │
SDA ○────────┘</code></pre>
						<p>Beide gelöteten Sensoren werden auf das Breadboard gesteckt. Die Jumperkabel müssen beim Raspberry Pi 3 Modell B+ wie folgt verteilt sein:<br><br>
						<i>Das entsprechende Pinout vom GPIO kann bei <a href="https://www.raspberrypi.org/documentation/usage/gpio/" target="_blank" rel="nofollow noopener">Raspberry</a> aufgerufen werden.</i></p>
						<img src="img/projects/weatherbot/project-structure.png"></img>
						<br><br>
					</li>
				</ul>
			</div>
			<hr id="write-sensors"><br>
				<h2>Programmierung der Sensoren</h2>
				<div class="project-steps">
					<ul>
					<li class="steps">
						<h3>Sensor BME280</h3>
						<p>Für die Messung von Temperatur, Luftfeuchtigkeit und Luftdruck wurde der Sensor <a href="https://www.az-delivery.de/products/gy-bme280" target="_blank" rel="nofollow noopener">BME280</a> gewählt. Diesen Sensor gibt es von verschiednen Herstellern. Das Hardware-Unternehmen Adafruit hat zu diesem Sensor eine Python Libary auf GitHub zur Verfügung gestellt, die wir verwenden werden: <a href="https://github.com/adafruit/Adafruit_Python_BME280">Adafruit BME 280 Libary</a></p>
						<p>Bei beiden Libarys müssen wir die Position von I2C feststellen, dafür suchen wir im Code:</p>
						<pre><code class="language-python">DEVICE = 0x76 # Default device I2C address</code></pre>
						<p>I2C ist notwendig, damit die Sensordaten an den Raspberry Pi getragen werden.</p><hr>
					</li>
					<li class="steps step-two">
						<h3>Sensor GY-1145</h3>
						<p>Für diesen Sensor gibt es auch bereits eine Python Libary, jedoch ist diese mehr als 5 Jahre alt und funktioniert seit dieser Zeit auch nicht mehr. <a href="https://github.com/adafruit/Adafruit_Python_BME280" target="_blank" rel="nofollow noopener">Adafruit BME 280 Libary</a></p>
						<pre><code class="language-python">SI1145_ADDR                             = 0x60</code></pre><hr>
					</li>
					<li class="steps step-three">
						<h3>Test der Sensoren</h3>
						<p>Um zu sehen, ob die Sensoren richtig angeschlossen sind und funktionieren, sollte die Position des I2C überprüft werden. I2C hat insgesamt 200 Slot.</p>
						<p>Dafür geben wir im Terminal des Raspberry Pi folgenden Befehl ein:</p>
												<pre><code class="language-command-line">i2cdetect -y l</code></pre>
						<p>Ausgegeben wird folgende Auflistung:</p>
						<pre><code class="language-command-line"> 0   1   2   3   4  5  6  7  8  9  a  b  c  d  e  f
00: -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
10: -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
20: -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
30: -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
40: -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
50: -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
60: 60 -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
70: -- -- -- -- -- -- 76 --</code></pre>
					<p>Sensor BME280 befindet sich auf Slot 76 und GY-1145 auf 60, wie in den Libarys angegeben.</p>
					<p>Wir sollten also nun Daten der <b>Sensoren auslesen können</b>.</p>
					<p>Dafür geben wir folgenden Befehl ein:</p>
					<pre><code class="language-command-line">python bme280.py</code></pre>
					<p>Dies gibt er uns zurück:</p>
					<pre><code class="language-command-line">Temperature : 21.61 C
Pressure : 995.3425410606744 hPa
Humidity : 38.58560116023337</code></pre>
					<p>Das gleiche kann nun auch mit dem anderen Script durchgeführt werden.</p>
					</li>
				</ul>
				</div>
				<hr id="create-bot"><br>

			<h2>Erstellung des Bots</h2>
			<div class="project-steps">
				<ul>
				<li class="steps">
					<h3>Erstellung des Bots</h3>
					<p>In diesem Projekt verwenden wir einen Bot aus dem Instant-Messaging-Dienst <a href="https://telegram.org/" target="_blank" rel="nofollow noopener">Telegram</a>.
						Hierzu laden wir die Desktop-Version herunter und installieren diese.
					 Nach öffnen, suchen wir in der Suchleiste nach dem <b>@BotFather</b>, der uns bei der Erstellung des Bots behilflich sein wird. Dieser ist mit einem Zertifizierungssymbol gekennzeichnet:</p>
					 <img src="img/projects/weatherbot/search-bot.png"></img>
					 <br><br>
					 <p>Nun können wir Ihn anschreiben. Um all seine Funktionen in einer Übersicht zu erhalten, kann im Chat <b>/help</b> eingegeben werden.</p>
					 <p>Um einen Bot zu erstellen geben wir im Chat <b>/newbot</b> ein.</p>
					 <p>Drauf können wir dem Bot einen Namen geben. Jetzt müssen wir Ihm nur noch einen Usernamen zuteilen, der noch nicht bereits vergeben wurde. Fertig!</p>
					 <img src="img/projects/weatherbot/create-bot.png"></img>
					 <p><b>Der uns zugeteilte Token sollte sorgfältig aufbewahrt werden, da wir diesen zu einem späteren Zeitpunkt in unserem Programm benötien. Der Token sollte nicht öffentlich gemacht werden, da sonst jeder auf den Bot zugreifen und ihn verändern kann.</b></p>
				</li>
				<hr>
				<li class="steps step-two">
					<h3>Bot-Privacy abschalten</h3>
					<p>Nun da wir unseren Bot erstellt haben, könnten wir Ihm bereits befehle zuweisen. Diese müssten aber mit einem <b>/</b> starten. Dies ist umständlich. Damit der Bot aber später auch normale Wörter erkennt und seinen Befehl ausführt, werden wir dies deaktivieren.<br><br>
					Dazu schreiben wir wieder dem BotFather, unzwar mit dem Befehl <b>/setprivacy</b></p>
					<p>Wir wählen unseren Bot aus, es erscheinen zwei Eingabefelder - enable und disable. Wir wählen <b>disable</b>.</p>
					<img src="img/projects/weatherbot/set-privacy.png"></img>
				</li>
				<hr>
				<li class="steps step-three">
					<h3>Erstellung der Gruppe</h3>
					<p>Dieser Schritt ist Optional. Man könnte den Bot auch dierkt anschreiben, aber damit mehrere Personen die abgerufenen Daten sehen können, erstellen wir eine Gruppe. Wir wählen in Telegram den oberen linken Menüpunkt und wählen <b>Neue Gruppe</b></b>.</p>
					<p>Es öffnet sich ein Fenster, in dem wir den gewünschten Gruppennamen eingeben:</p>
					<img src="img/projects/weatherbot/create-group.png"></img>
					<br><br>
					<p>Darauf suchen wir noch die Personen, die in der Gruppe sein sollen:</p>
					<img src="img/projects/weatherbot/add-members.png"></img>
					<br><br>
					<p>Nun haben wir den Bot und die Gruppe erstellt. Der Bot kann aber noch keine Befehle ausführen.</p>
				</li>
			</ul>
			</div>
			<hr id="set-bot"><br>

		<h2>Einrichtung des Bots</h2>
		<div class="project-steps">
			<ul>
			<li class="steps">
				<h3>Libary</h3>
				<p>Damit der Bot funktioniert, nutzen wir eine bereits bestehende Libary für einen Bot in Telegram. Unseren Bot an sich schreiben wir jedoch selbst.<br><br>
					Die verwendete Libary ist der <a href="https://github.com/python-telegram-bot/python-telegram-bot" target="_blank" rel="nofollow noopener">python-telegram-bot</a>, der bei GitHub zu finden ist.<br><br>Um diese zu installieren, führen wir den folgenden Befehl im Shell des Computers aus:</p>
					<pre><code class="language-command-line">pip install python-telegram-bot --upgrade</code></pre>
					<p><i>Dies setzt natürlich voraus, dass Python bereits installiert ist.</i></p>
			</li>
			<hr>
		<li class="steps step-two">
			<h3>Syntax</h3>
			<p>Die grundsätzliche Syntax des Bots sieht wie folgt aus:</p>
			<pre><code class="language-python">#Mit den Statements from und import importieren wir classen aus der Libary.
from telegram.ext import Updater, CommandHandler


#Dann erstellen wir eine Funktion, in der wir beschreiben
#was der Bot bei einem bestimmten Befehl machen soll.
def hello(update, context):
    update.message.reply_text('Hello')


#Hier fügen wir den Token ein, den wir zuvor bei der Erstellung des Bots erhalten haben.
updater = Updater('TOKEN HIER HIN', use_context=True)

#Hier beschreiben wir mit einem Handler, auf was der Bot reagieren soll.
updater.dispatcher.add_handler(CommandHandler('hello', hello))

#Fragt Updates von Telegram ab.
updater.start_polling()
			</code></pre>
			</li>
			<hr>
			<li class="steps step-three">
				<h3>Manuelles Starten und Beenden des Bots</h3>
				<p>Nachdem wir die Datei erstellt und in diesem Beispiel mit dem Namen bot abgespeichert haben, führen wir folgenden Befehl in Shell aus um das Script zu starten und zu testen:</p>
				<pre><code class="language-command-line">python bot.py</code></pre>
				<p>Um das Programm wieder zu beenden geben wir die folgende Tastenkombination in der Shell ein:<br><br>
				<kbd>Strg</kbd> + <kbd>C</kbd></p>
				<p>Wenn KeyboardInterrupt nicht funktioniert, kann die folgende Tastenkombination ausgeführt werden:<br><br>
					<kbd>Strg</kbd> + <kbd>Pause</kbd>
				</p>
			</li>
			<hr>
			<li class="steps step-four">
				<h3>Der erste Befehl</h3>
				<p>Vom oben gezeigt Beispiel, antwortet uns unser Bot. Probieren wir es direkt aus, indem wir den Befehl <b>/hello</b> schreiben:</p>
				<img src="img/projects/weatherbot/first-command.png"></img>
			</li>
	</ul>
	</div>
	<hr id="write-bot"><br>

	<h2>Programmierung des Bots</h2>
	<p>Nun da unser Bot grundsätzlich funktioniert, können wir anfangen ihn zu programmieren und mit den Sensoren zu verknüpfen.</p>
	<p>Fügen wir zunächst ein, wem der Bot antwortet, indem wir den Usernamen hinter den Befehl setzen:</p>
<pre><code class="language-python">def hello(update, context):
    update.message.reply_text(
        'Hallo {} 👋'.format(update.message.from_user.first_name))
</code></pre>
<br>
<img src="img/projects/weatherbot/hello-user.png"></img>
	<hr>
	<p>Nun da unser Bot grundsätzlich funktioniert, können wir anfangen ihn zu programmieren und mit den Sensoren zu verknüpfen.</p>

	<pre><code class="language-python">from telegram.ext import Updater
from telegram.ext import CommandHandler, CallbackQueryHandler, MessageHandler, Filters
from telegram import InlineKeyboardButton, InlineKeyboardMarkup
import BME280
from SI1145 import SI1145
si1145 = SI1145()

updater = Updater(token='TOKEN', use_context=True)
dispatcher = updater.dispatcher

# bot listeners
def start(update, context):
    context.bot.send_message(chat_id=update.effective_chat.id, text='Hello {} 👋'.format(update.message.from_user.first_name))
    context.bot.send_message(chat_id=update.effective_chat.id, text=selection_message(), reply_markup=selection_keyboard())

def help(update, context):
    context.bot.send_message(chat_id=update.effective_chat.id, text=overview_message())

def handle_message(update, context):
    text = update.message.text
    if text == 'hello':
        context.bot.send_message(chat_id=update.effective_chat.id, text='Hallo {} 👋'.format(update.message.from_user.first_name))

# bot messages
def summary(update, context):
    getTemperature(update, context)
    getHumidity(update, context)
    getPressure(update, context)
    getUltraviolet(update, context)
    getIlluminance(update, context)
    getInfrared(update, context)

def selection(bot, update):
    query = update.callback_query
    bot.edit_message_text(chat_id=query.message.chat_id,
                          message_id=query.message.message_id,
                          text=selection_message(),
                          reply_markup=first_menu())

def selection_message():
    return 'Was mÃ¶chtest du Ã¼ber das aktuelle Wetter wissen? 🌤'

def overview_message():
    return 'Telegram-Weather-Bot 🌤⛈☀\n Ich kann dich mit den folgenden Kommandos unterstÃ¼tzen:\n\n▪ /start\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tEine Gesamtansicht bekommst du mit:\n▪ /weather\t\t\t\t\t\t\t\tEine Zusammenfassung von deinem aktuellen Wetter.\n\nFür eine Beschreibung des Bots besuche:\n/https://github.com/woltersjoh/weatherbot

# buttons
def getTemperature(update, context):
    temperature = BME280.readTemperature()

    if temperature < 25 and > 5:
        normal = "MÃ¶chtest du mehr über das aktuelle Wetter erfahren? 🙂"
        normal_icon = "⛅"
    elif temperature <= 5:
        cold = "Winterjacke ✔ Schal ✔ Dicke Socken ✔ - Nicht das du dir eine ErkÃ¤ltung holst 🙏"
        cold_icon = "🥶"
    elif temperature >= 25:
        warm = "Oh und vergiss bitte nicht deine Sonnencreme aufzutragen 😎🏝"
        warm_icon = "☀"

    context.bot.send_message(chat_id=update.effective_chat.id, text='Die aktuelle Temepratur liegt %f Â°C' %temperature )
    context.bot.send_message(chat_id=update.effective_chat.id, text='{w.warm}{w.cold}'.format(w=getTemperature()))

def getHumidity(update, context):
    humidity = BME280.readHumidity()
    context.bot.send_message(chat_id=update.effective_chat.id, text='Die Luftfeuchte liegt bei %f Prozent' %humidity )

def getPressure(update, context):
    pressure = BME280.readPressure()
    context.bot.send_message(chat_id=update.effective_chat.id, text='Der Luftdruck liegt bei %f hPa' %pressure )

def getUltraviolet(update, context):
    ultraviolet = si1145.readUV()
    context.bot.send_message(chat_id=update.effective_chat.id, text='Die WellenlÃ¤nge der elektromagnetischen Strahlung liegt bei %f nm' %ultraviolet )

def getIlluminance(update, context):
    illuminance = si1145.readVisible()
    context.bot.send_message(chat_id=update.effective_chat.id, text='Die LichtstÃ¤rke betrÃ¤gt %f lx' %illuminance )

def getInfrared(update, context):
    infrared = si1145.readIR()
    context.bot.send_message(chat_id=update.effective_chat.id, text='Die UV-Strahlung liegt bei %f nm' %infrared)

# keyboard
def selection_keyboard():
    keyboard = [
        [InlineKeyboardButton('Temperatur', callback_data='temperature')],
        [InlineKeyboardButton('Luftfeuchtigkeit', callback_data='humidity')],
        [InlineKeyboardButton('Luftdruck', callback_data='pressure')],
        [InlineKeyboardButton('IR-Strahlung', callback_data='infrared')],
        [InlineKeyboardButton('Beleuchtungsstärke', callback_data='illuminance')],
        [InlineKeyboardButton('UV-Strahlung', callback_data='ultraviolet')]
    ]
    return InlineKeyboardMarkup(keyboard)

# updater
updater.dispatcher.add_handler(CommandHandler('start', start))
updater.dispatcher.add_handler(CommandHandler('hilfe', help))
updater.dispatcher.add_handler(CommandHandler('Ã¼berblick', summary))
updater.dispatcher.add_handler(MessageHandler(filters=Filters.text, callback=handle_message))
updater.dispatcher.add_handler(CallbackQueryHandler(temperature_button, pattern='temperature'))
updater.dispatcher.add_handler(CallbackQueryHandler(humidity_button, pattern='humidity'))
updater.dispatcher.add_handler(CallbackQueryHandler(pressure_button, pattern='pressure'))
updater.dispatcher.add_handler(CallbackQueryHandler(infrared_button, pattern='infrared'))
updater.dispatcher.add_handler(CallbackQueryHandler(illuminance_button, pattern='illuminance'))
updater.dispatcher.add_handler(CallbackQueryHandler(ultraviolet_button, pattern='ultraviolet'))

updater.start_polling()
</code></pre>
		<br><br><br><br><br><br>
			</div>
		</div>
	</div>

	<?php include("footer.html");?>

	<script src="js/custom.js"></script>
	<script src="js/prism.js"></script>
</body>
</html>
