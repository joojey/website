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
			<h1>Verschlüsselung</h1>
		</div>
	</section>

	<div class="scrolltotop"><div class="scrolltotop-finger"></div></div>

	<div class="container project">
		<div class="row">
			<div class="col-12">
				<p>Programmiersprache: <span class="sprache java"></span> Java</p>
				<hr>
				<p>Ver- und Entschlüsselungsalgorithmen begegnen uns überall in unserer digitalen Welt. Datensicherheit ist für technische Entwicklungen dabei der wichtigste Faktore. Selbst wenn wir eine Nachricht an unsere Freunde senden, soll nur der entsprechende Empfänger diese lesen können.
					Dieses Projekt erstellt ein Programm, welches beliebige Texteingaben mit einfachen Algorithmen verschlüsseln oder entschlüsseln kann. Ein Schlüssel stellt dabei die Berechtigung zur Verschlüsselung und den Grad der Verschlüsselung dar. Das Projekt vermittelt Grundprinzipien der Kryptographie in der Programmierung und setzt daher Grundkenntnisse in Java, oder einer anderen Programmiersprache voraus. Dieses Projekt stellte mein erstes umfangreicheres Projekt bei der Erlernung von Java dar und ist zur besseren Verständnis in einzelne Abschnitte unterteilt.<br><br>
				Dieses Projekt findest du auch auf meinem <a href="https://github.com/woltersjoh/encryption-decryption" target="_blank" rel="nofollow noopener">GitHub-Profil</a> und darf verwendet werden.</p>
				<h2>Zielsetzung</h2>
				<p>Das Ziel ist ein Programm, welches über die Kommandozeile (Konsole) einen beliebigen Text mithilfe zwei wählbarer Verschlüsselungsmethoden entweder verschlüsselt oder entschlüsselt. Der Anweder soll die Möglichkeit besitzen seinen Text entweder direkt über die Konsole oder über eine Datei einzugeben. Die Ausgabe des Endergebnisses soll in der Konsole oder in einer neuen Datei erfolgen.</p>
				<br>
				<img class="" src="img/projects/encryption/program.gif"></img>
				<hr><br>
				<h2>Zusammenfassung</h2>
				<ul>
					<li><a href="#caesar-cipher"><p>Caesar-Verschlüsselung</p></a></li>
					<li><a href="#encryption-algorithm"><p>Verschlüsselungsalgorithmus</p></a></li>
					<li><a href="#unicode-decryption"><p>Unicode und Methoden</p></a></li>
					<li><a href="#command-line"><p>Kommandozeile</p></a></li>
					<li><a href="#run-program"><p>Programm ausführen</p></a></li>
					<li><a href="#files-exception-handling"><p>Dateien und Ausnahmebehandlung</p></a></li>
					<li><a href="#choose-algorithm"><p>Erweiterung mit Interface und Klassen</p></a></li>
					<li><a href="#result"><p>Endergebnis</p></a></li>
				</ul><br>
				<hr class="section-end" id="caesar-cipher"><br>
				<h2>Caesar-Verschlüsselung</h2>
				<p>Die erste verwendete Verschlüsselungsmethode ist die sogenannte Caesar-Verschlüsselung. Sie verschiebt einen Buchstaben eines geordneten Alphabets zyklisch um eine bestimmte Stelle nach rechts. Zyklisch bedeutet dabei, dass bei einer Verschiebung über Z hinaus wieder bei A angefangen wird. Dabei wird ein sogenannter Schlüssel verwendet, der zur Anzahl der zu verschiebenen Zeichen (in diesem Projekt mit <b>character</b> beschrieben) dient.</p>
				<br>
				<img class="" src="img/projects/encryption/caesar-cipher.png"></img>
				<p><i>Die Abbildung stellt eine Verschiebung mit einem Schlüssel von 3 dar.</i></p>
				<p>In diesem Projekt wird fortlaufend folgender Beispieltext verwenden:</p>
				<pre><code class="language-command-line">Ich habe eine Schatzkarte gefunden!</code></pre>
				<p><i>Beispiel:</i> Nutzen wir die Caesar-Verschlüsselung, um die character dieses Satzes mit einen Schlüssel von 3 zu verschieben:</p>
				<pre><code class="language-command-line">Lfk kdeh hlqh Vfkdwcnduwh jhixqghq!</code></pre>
				<br>
			<hr class="section-end" id="encryption-algorithm"><br>

			<h2>Verschlüsselungsalgorithmus</h2>
			<img class="" src="img/projects/encryption/algorithm.png"></img>
			<br><br>
			<p>Setzen wir diesen Algorithmus in einen Java Code um. Beschreiben wir zunächst sogenannte Fields unser zwei benötigten Werte. Der Text wird in einem String als <b>data</b> beschrieben, der Schlüssel als Integer mit <b>key</b>. Da ein String nur einen Wert darstellt, wir aber jedes einzelne Zeichen (character) benötigen, übertragen wir den Wert von <b>data</b> in ein Array vom Datentyp char (Unicode-Zeichen), indem wir die Methode <b>.toCharArray()</b> verwenden. Dieses <b>char[]</b> deklarieren wir mit dem Namen <b>chars</b>. Die Werte im Array sehen danach wie folgt aus: { 'I', 'c', 'h', ' ', 'h', 'a', 'b', 'e', ' ', 'e', 'i', 'n', 'e', ' ', 'S', 'c', 'h', 'a', 't', 'z', 'k', 'a', 'r', 't', 'e', ' ', 'g', 'e', 'f', 'u', 'n', 'd', 'e', 'n', '!' };</p>
			<pre><code class="language-java">String data ="Ich habe eine Schatzkarte gefunden!";
int key = 5;
char[] chars = data.toCharArray();</code></pre>
			<p>Die Caeser-Verschlüsselung verwendet nur Zeichen des Alphabets. Die im deutschen Alphabet vorhandenen drei Umlaute (Ä, Ö, Ü), sowie das Eszett (ß) werden nicht berücktsichtigt. Deklarieren wir den Anfang, das Ende und die Größe des Alphabets, mit Groß- und Kleinbuchstaben:</p>
			<pre><code class="language-java">char a = 'a';
char z = 'z';
char A = 'A';
char Z = 'Z';
int size = 26;</code></pre>
			<p>Verschieben wir die einzelnen <b>chars</b> nun mit dem deklarierten <b>key</b> um 5. Hierfür wird ein <b>for-each</b> loop verwendet, der die einzelnen chars im Array durchgeht. Wir erstellen hierfür einen neuen char Namens <b>item</b> im Loop. Dieser wird für den Loop benötigt um die chars im Array durchzugehen.</p>
			<pre><code class="language-java">for (char item : chars) {</code></pre>
				<p>Im Loop fügen wir eine Bedingung mit einem <b>if-Statment</b> ein, die die darin enthaltene Funktion zur Verschiebung nur ausgeführt, wenn sich der character innerhalb des Alphabets befindet. Andernfalls soll der character, ohne das eine Verschiebung angewendet wird, wieder ausgegeben werden.</p>
			<pre><code class="language-java">if (item >= a && item <= z) {</code></pre>
			<p>Den neuen character beschreiben wir mit <b>shiftItem</b>. Das Ergebnis der Berechnung wird mit (char) gecastet, da sonst durch die Verwendung der Integer eine Fehlermeldung entsteht. Die Funktion der Verschlüsselung e(x) lautet: <b>e(x) = (x + key)</b>. x ist das Zeichen das verschlüsselt wird, also <b>item</b>. Da im Programm aber der Zyklus des Alphabets berücksichtigt werden muss, ist diese Funktion nicht anwendbar. Die Funktion muss den char <b>a</b> und die Größe des Alphabets <b>size</b> enthalten. Die richtige Funktion lautet also: <b>(((item - a + key) % size) + a)</b>. Mit der <b>print()</b> Methode geben wir das Zeichen mit shiftItem aus.</p>
<pre><code class="language-java">for (char item : chars) {
  if (item >= a && item <= z) {
      char shiftItem = (char) (((item - a + key) % size) + a);
      System.out.print(shiftItem);
  } else {
      System.out.print(item);
  }
}</code></pre>
<p>Damit auch Großbuchstaben berücksichtigt werden, fügen wir die gleiche If-Anweisung noch einmal für Großbuchstaben ein.</p>
			<hr>
			<p><b>Das vollständige Programm:</b></p>
			<pre><code class="language-java">public class Main {
  public static void main(String[] args) {
      String data ="Ich habe eine Schatzkarte gefunden!";
      char[] chars = data.toCharArray();
      int key = 5;

      char a = 'a';
      char z = 'z';
      char A = 'A';
      char Z = 'Z';
      int size = 26;

      for (char item : chars) {
          if (item >= a && item <= z) {
              char shiftItem = (char) (((item - a + key) % size) + a);
              System.out.print(shiftItem);
          } else if (item >= A && item <= Z) {
              char shiftItem = (char) (((item - A + key) % size) + A);
              System.out.print(shiftItem);
          } else {
              System.out.print(item);
          }
      }
  }
}</code></pre>
<br>
<p><b>Nach Ausführung wird ausgegeben:</b></p>
<pre><code class="language-command-line">Nhm mfgj jnsj Xhmfyepfwyj ljkzsijs!</code></pre>
<p>Das Programm liest das <b>chars</b> Array von <b>data</b>, sowie den <b>key</b> und verschiebt jedes Zeichen (character) um den entsprechenden Schlüssel (key). Dabei wird auf den Zyklus des Alphabets geachtet, der wieder bei A beginnt, wenn das Alphabet endet. Das Ausrufezeichen und die Leerzeichen werden unverändert ausgegeben.</p>

				<hr class="section-end" id="unicode-decryption"><br>

			<h2>Unicode und Methoden</h2>
			<img class="" src="img/projects/encryption/unicode.png"></img>
			<p>Damit auch alle anderen Zeichen ver- und entschlüsselt werden, werden wir nun und in den nächsten Abschnitten zunächst die zweite Verschlüsselungsmethode anwenden. Diese funktioniert über die Unicode-Tabelle. Die Unicode-Tabelle ist ein Standard der alle Schriftzeichen und Textelemente als digitalen Code festlegt.<br><br>

				In diesem Schritt fügen wir auch die Möglichkeit zur Entschlüsselung hinzu. Zur Ver- und Entschlüsselung erstellen wir zwei Methoden, die die Argumente von der Main Methode lesen. Dazu erstellen wir einen String als Argument, welches <b>mode</b> genannt wird, sowie zwei Bedingungen <b>enc</b> und <b>dec</b>, die je nach Gegebenheit die entpsrechende Methode aufruft.</p>
				<p>Daraus ergibt sich eine Bedingung:</p>
				<ul>
				<li><p>Gibt der Anweder (User) keine der beiden Methoden ein, soll <b>enc</b> ausgeführt werden. Den String zum mode deklarieren wir daher mit dem Wert enc.</p></li>
			</ul>
				<pre><code class="language-java">String data ="Ich habe eine Schatzkarte gefunden!";
String mode = "enc";
char[] chars = data.toCharArray();
int key = 5;</code></pre>
			<p>Zunächst erstellen wir die Methoden zur Verschlüsselung und Entschlüsselung. Diese werden wir <b>decrypt</b> und <b>encrypt</b> benennen. Damit die Methoden funktionieren, benötigen wir das <b>chars</b> Array und den <b>key</b> und deklarieren diese als Argumente wie folgt:</p>
				<pre><code class="language-java">public static void decrypt(char[] chars, int key) {</code></pre>
				 <p>Der for-each Loop ist durch die Verwendung der Unicode-Tabelle vereinfacht, da kein Zyklus berücksichtigt wird. Die einzige Veränderung die wir bei der Funktion zur Entschlüsselung verändern müssen, ist die Subtraktion statt Addition des Schlüssels.</p>
				 <pre><code class="language-java">public static void decrypt(char[] chars, int key) {
	for (char item : chars) {
	 	char shiftItem = (char) (item - key);
	 	System.out.print(shiftItem);
	}
}

public static void encrypt(char[] chars, int key) {
	for (char item : chars) {
		char shiftItem = (char) (item + key);
	 	System.out.print(shiftItem);
	}
}</code></pre>
			<p>Um nun die entsprechende Methode je nach Wert des <b>mode</b> auszuführen, wird eine switch Anweisung auf mode angewendet. Sie entspricht einer Mehrfachverzweigung mit if. Mit dem <b>switch</b> Statement beschreiben wir, dass der entsprechende Code Block (die Methoden) ausgeführt wird, je nachdem welcher <b>case</b> (enc oder dec) besteht. Um das Programm nach Ausführung der Methode zu stoppen, wird <b>break</b> verwendet. Ist keiner der beiden Werte (enc oder dec) vorhanden, wird standardmäßig mit <b>default</b> eine simple Mitteilung ausgegeben.</p>
<pre><code class="language-java">switch (mode) {
	case "enc":
		encrypt(chars, key);
		break;
	case "dec":
		decrypt(chars, key);
		break;
	default:
		System.out.println("Unknown operation");
		break;
}</code></pre>
		<hr>
		<p><b>Das vollständige Programm:</b></p>
			<pre><code class="language-java">public class Main {
  public static void main(String[] args) {
      String data ="Ich habe eine Schatzkarte gefunden!";
      String mode = "enc";
      char[] chars = data.toCharArray();
      int key = 5;

      switch (mode) {
          case "enc":
              encrypt(chars, key);
              break;
          case "dec":
              decrypt(chars, key);
              break;
          default:
              System.out.println("Unknown operation");
              break;
      }
  }

  public static void decrypt(char[] chars, int key) {
      for (char item : chars) {
          char shiftItem = (char) (item - key);
          System.out.print(shiftItem);
      }
  }

  public static void encrypt(char[] chars, int key) {
      for (char item : chars) {
          char shiftItem = (char) (item + key);
          System.out.print(shiftItem);
      }
  }
}</code></pre>
<br>
<p><b>Ausgabe:</b></p>
<pre><code class="language-command-line">Nhm%mfgj%jnsj%Xhmfy␡pfwyj%ljkzsijs&</code></pre>
<p>Das Programm besitzt jetzt drei Methoden - main, decrypt und encrypt.</p>
<p>Wird bei <b>data</b> <kbd>Nhm%mfgj%jnsj%Xhmfy␡pfwyj%ljkzsijs&</kbd> und bei <b>mode</b> <kbd>dec</kbd> eingegeben, wird der Ausgangstext <kbd>Ich habe eine Schatzkarte gefunden!</kbd> ausgegeben. Die Entschlüsselung funktioniert.</p>
			<hr id="command-line"><br>
		<h2>Kommandozeile</h2>
		<p>Bei der Nutzung eines Programms, verwendet der Anweder i.d.R. eine grafische Benutzeroberfläche (GUI) und braucht daher nicht mit Code in Berührung zu kommen. Als Oberfläche werden wir die Konsole verwenden, die in jedem Betriebssystem vorhanden ist. Der Code muss also angepasst werden, sodass der User nur noch seine Eingaben tätigen muss.</p>
		<img class="" src="img/projects/encryption/cmd.png"></img>
		<p>Dadurch muss das Programm nun sogenannte Argumente lesen:</p>
			<ul>
			<li><p>Die Verschlüsselungsmethode <b>-mode</b>.</p></li>
			<li><p>Den Schlüssel <b>-key</b>.</p></li>
			<li><p>Der Text der verschlüsselt oder entschlüsselt werden soll <b>-data</b>.</p></li>
		</ul>
			<p>Statt wie bisher die Argumente direkten in den Code zu schreiben, wird das Programm nun so konzipiert, dass beliebige Argumente in einem Eingabefenster, in diesem Fall die Kommandozeile geschrieben werden können.<br><br>
			Da das Programm nicht wissen kann, in welcher Reihenfolge ein User die Argumente schreibt, muss die Reihenfolge der Argumente unabhängig sein. Zudem muss das Programm ebenfalls funktionieren, wenn ein oder mehrere Argumente nicht vom User mitgeteilt werden. Im Code müssen daher mehrere Bedingungen berücksichtigt werden:</p>
			<ul>
			<li><p>Wenn kein <b>-mode</b> angegeben wurde, soll das Programm im <b>enc</b> Modus ausgeführt werden.<br><br><pre><code class="language-java">String mode = "enc";</code></pre><br></p></li>
			<li><p>Wenn kein <b>-key</b> angegeben wird, soll einen Schlüssel von 0 verwendet werden.<br><br><pre><code class="language-java">int key = 0;</code></pre><br></p></li>
			<li><p>Wenn kein <b>-data</b> besteht, soll das Programm den Wert als einen leeren String annehmen.<br><br><pre><code class="language-java">String data = "";</code></pre></p></li>
		</ul>
		<br>
		<p>Da das Programm die Werte erst vom Anweder erhält, muss das Programm um einen Loop erweitert werden. Bei den Argumenten, die der User eingibt wird immer ein Bindestrich vorangestellt <b>-argument</b>. Nach einem Argument muss der Anweder den entsprechenden Wert eingeben. Wir verwenden die Argumente als ein Paar, bestehend aus Argument Name und Argument Wert. Beispiel: key und 6. Der Loop dient zum lesen aller vom Anweder geschriebenen Eingaben, genannt <b>args</b>. Um das Programm mit den Argumenten ausführen zu können, übergeben wir die Argumente in das String Array args der main Method. Damit der Loop die gesamte Eingabe durchläuft wird die Methode <b>.length</b> verwendet. Erkennt der Loop das entsprechende beschriebene Argument, als Beispiel <i>key</i> - <kbd>if (args[i].equals("-key")</kbd>, wird der nächste Wert der Eingabe verwendet. Diesen erhalten wir, indem wir das Argument +1 rechnen.- <kbd>ersteEingabe = args[i+1];</kbd>.</p>
		<pre><code class="language-java">for (int i = 0; i < args.length; i ++) {
  if (args[i].equals("-mode")) {
      mode = args[i+1];

  } else if (args[i].equals("-key")) {
      key = Integer.parseInt(args[i+1]);

  } else if (args[i].equals("-data")) {
      data = args[i+1];
  }
}</code></pre>
			<hr>
			<p><b>Das vollständige Programm:</b></p>
		<pre><code class="language-java">public class Main {
  public static void main(String[] args) {
      String mode = "enc";
      int key = 0;
      String data = "";

      // Über die Argumente loopen und die fields mit den Werten befüllen die gefunden werden.
      for (int i = 0; i < args.length; i ++) {
          if (args[i].equals("-mode")) {
              mode = args[i+1];

          } else if (args[i].equals("-key")) {
              key = Integer.parseInt(args[i+1]);

          } else if (args[i].equals("-data")) {
              data = args[i+1];
          }
      }

      // Überprüfen ob das Programm im Ver- oder Entschlüsselungsmodus ausgeführt werden soll.
      switch (mode) {
          case "enc":
              encrypt(data, key);
              break;
          case "dec":
              decrypt(data, key);
              break;
          default:
              System.out.println("Unknown operation");
              break;
      }
  }

  // Entschlüsselungsmethode
  public static void decrypt(String data, int key) {
      for (char item : data.toCharArray()) {
          char shiftItem = (char) (item - key);
          System.out.print(shiftItem);
      }
  }

  // Verschlüsselungsmethode
  public static void encrypt(String data, int key) {
      for (char item : data.toCharArray()) {
          char shiftItem = (char) (item + key);
          System.out.print(shiftItem);
      }
  }
}</code></pre>
<hr class="section-end" id="run-program"><br>
<h2>Programm ausführen</h2>
<p>Um das Programm nun ausführen zu können, muss der aktuell sogenannte source code compiled werden. Auf dem Computer sollte Java installiert sein. Um den Code in Bytecode zu compilen, wird das Javac Tool genutzt. Den Befehl geben wir direkt in die Kommandozeile ein. Die Datei wird in diesem Fall standardgemäß Main.java genannt.</p>
<pre><code class="language-command-line">javac Main.java</code></pre>
<p>Nun kann das Programm mit der Angabe des Dateinamen und den Argumenten mit dem Befehl <b>java</b> ausgeführt werden. Der zu verarbeitende Text muss immer innerhalb von Ausrufezeichen stehen.</p>
<pre><code class="language-command-line">java Main -mode enc -key 5 -data "Ich bin bei der Schatzsuche dabei!"</code></pre>
<p>Das Programm ermöglicht die Eingabe der Argumente in verschiedener Reihenfolge. So kann beispielsweise das Argument -key 5 am Anfang, in der Mitte oder am Ende stehen.</p>
<img class="" src="img/projects/encryption/runprogram.gif"></img>
<br><br>
		<hr class="section-end" id="files-exception-handling"><br>
		<h2>Dateien und Ausnahmebehandlung</h2>
		<p>Erweitern wir das Programm um Werte aus einer Datei zu verarbeiten und ggf. in eine neuen Datei ausgeben zu können. Die Möglichkeit den Text über die Kommandazeile mit <b>-data</b> zu verarbeiten soll bestehen bleiben. Dementsprechend gibt es weitere Argumente:</p>
		<ul>
		<li><p>Der Pfad zur Datei <b>-in</b>.</p></li>
		<li><p>Das Ergebnis in einer neuen Datei <b>-out</b>.</p></li>
	</ul>
		<img class="" src="img/projects/encryption/createfile.gif"></img>
		<p>Bei der Eingabe von Dateinamen muss immer die <b>Dateiendung</b> angegeben werden.</b></p>
	<p>Es ergeben sich weitere notwendige Bedingung:</p>
	<ul>
		<li><p>Wenn kein <b>-data</b> und kein <b>-in</b> besteht, soll das Programm den Wert als einen leeren String annehmen.</p></li>
		<li><p>Wenn beide Argumente <b>-data</b> und <b>-in</b> vorhanden sind, soll <b>-data</b> bevorzugt werden.</p></li>
		<li><p>Wenn kein <b>-out</b> besteht, soll das Ergebnis nur in der Kommandozeile (standard ouput) ausgegeben werden.</p></li>
		<li><p>Wenn der User <b>-data</b> und <b>-in</b> verwendet, soll <b>-data</b> bevorzugt werden</b>.</p></li>
		<li><p>Wenn es weder eine Inputdatei noch einen Wert als Argument gibt, soll das Programm nicht fehlschlagen. Stattdessen soll das Programm eine klare Nachricht über das Problem ausgegeben und dann stoppen. Hierfür importieren wir als erstes eine Ausnahme:<br><br><pre><code class="language-java">import java.io.IOException;</code></pre><br><p>Die entsprechenden Fehlerbehandlungen werden in den einzelnen Methoden beschrieben.</p></li>
	</ul>
	<p>Um Dateien zu verarbeiten, werden Klassen importiert, die breits die grundlegenden Funktionen beinhalten.</p>
	<pre><code class="language-java">import java.nio.file.Files;
import java.nio.file.Paths;
import java.io.File;
import java.io.FileWriter;</code></pre>
	<br>

	<p>Darauf erstellen wir eine Methode zum Lesen einer Datei. Diese nennen wir <b>readFile</b>. Da alle Dateioperationen eine <b>IOException</b> (Eingabe- und Ausgabefehler) auslösen können, wird eine <b>throws</b> Klausel eingefügt die ausdrückt, dass eine Exception nicht lokal abgefangen wird. Die Fehlerbehandlung wird dem Aufrufer überlassen. Mit <b>return</b> geben wir den Inhalt der Datei als neuen String aus, den wir <b>fileName</b> nennen. Der neue String wird mit der Methode <b>Files.readAllByes()</b> angewendet. Als Argument erhält die readAllBytes Methode Paths.get(), die die Variable Filename benötigt. Diese gibt den Inhalt der Datei zum Pathnamen wieder.</p>
	<pre><code class="language-java">public static String readFile(String fileName) throws IOException {
	return new String(Files.readAllBytes(Paths.get(fileName)));
}</code></pre>
	<p>Wenn der Anwender keinen Wert in die Konsole eingibt (kein <b>data</b>), aber jedoch eine Datei besteht, soll der Inhalt der Datei angewandt werden. Dies beschreiben wir mit einem if-Statement <kbd>if (data.equals("") && !in.equals("")</kbd>. Nun führen wir die Methode <b>readFile()</b> aus, die wir bereits zuvor mit <b>java.io.File</b> importiert haben, um den leeren String <b>in</b> mit dem Path (Werten) der Datei zu befüllen. Der String data erhält nun den Inhalt der Datei. Die readFile Methode besitzt die Parameter der deklarierten fileName Variable. </p>
	<pre><code class="language-java">String in = "";

if (data.equals("") && !in.equals("")) {
  try {
      readFile(in);
      data = readFile(in);
  } catch (IOException e) {
      System.out.println(e.getMessage());
  }
}</code></pre>
			<p>Erstellen wir als nächstes eine Methode um eine Datei zu schreiben. Diese nennen wir <b>writeFile</b>. Wir erstellen zwei neue String Objekte output und out. Diese beiden werden später in den beiden Ver- und Entschlüsselungsmethoden integriert. Diese werden benötigt um die Ausgabe einem Objekt hinzuzufügen. Zunächst übermitteln wir diese Objekte der Methode. In der Methode erstellen wir mit <b>new File</b> eine neue Datei, die zunächst mit dem leeren String out keine Werte besitzt. Nun erstellen wir eine <b>try-catch</b>-Anweisung um auftretene Programmfehler abzufangen. Um die char in eine Datei zu schreiben, benötigen wir die Klasse <b>FileWriter</b>, die wir mit java.io.FileWriter zuvor importiert haben. Mit <b>.write()</b> fügen wir die Werte von <b>output</b> der Datei hinzu. Tritt ein Fehler auf, geben wir mit <b>.getMessage()</b> die entsprechende Ausnahme aus.</p>
		<pre><code class="language-java">String output = "";
String out = "";

public static void writeFile(String output, String out) {
  File filewrite = new File(out);
  try (FileWriter writer = new FileWriter(filewrite)) {
      writer.write(output);
  } catch (IOException e) {
      System.out.println(e.getMessage());
  }
}</code></pre>
		<p>Nun müssen wir unseren zwei Ver- und Entschlüsselungsmethoden noch die weiteren Argumente output und out hinzufügen. In dieser Fügen wir noch ein if-Statment ein, um die Ausgabe direkt in der Konsole auszugeben, wenn keine Datei besteht, andernfalls soll Sie in output schreiben.</p>
	<pre><code class="language-java">public static void decrypt(String data, int key, String output, String out) {
  for (char item : data.toCharArray()) {
      char shiftItem = (char) (item - key);
      output += shiftItem;
  }
  if (out.equals("")) {
      System.out.println(output);
  } else {
      writeFile(output, out);
  }
}</code></pre>
<hr>
		<p><b>Das vollständige Programm:</b></p>
		<pre><code class="language-java">import java.nio.file.Files;
import java.nio.file.Paths;
import java.io.File;
import java.io.FileWriter;
import java.io.IOException;

public class Main {

    public static void main(String[] args) {
        String mode = "enc";
        int key = 0;
        String data = "";
        String out = "";
        String in = "";
        String output = "";

        // Über die Argumente loopen und die fields mit den Werten befüllen die gefunden werden.
        for (int i = 0; i < args.length; i ++) {
            if (args[i].equals("-mode")) {
                mode = args[i + 1];
            } else if (args[i].equals("-key")) {
                key = Integer.parseInt(args[i + 1]);
            } else if (args[i].equals("-data")) {
                data = args[i + 1];
            } else if (args[i].equals("-out")) {
                out = args[i + 1];
            } else if (args[i].equals("-in")) {
                in = args[i + 1];
            }
        }

        // Datei lesen und Werte dieser Datei in den String data einfügen.
        if (data.equals("") && !in.equals("")) {
            try {
                readFile(in);
                data = readFile(in);
            } catch (IOException e) {
                System.out.println(e.getMessage());
            }
        }

        // Überprüfen ob das Programm im Ver- oder Entschlüsselungsmodus ausgeführt werden soll.
        switch (mode) {
            case "enc":
                encrypt(data, out, key, output);
                break;
            case "dec":
                decrypt(data, out, key, output);
                break;
            default:
                System.out.println("Unknown operation");
                break;
        }
    }

    // Datei lesen und Werte zurückgeben.
    public static String readFile(String fileName) throws IOException {
        return new String(Files.readAllBytes(Paths.get(fileName)));
    }

    // Datei schreiben.
		public static void writeFile(String output, String out) {
				File filewrite = new File(out);
				try (FileWriter writer = new FileWriter(filewrite)) {
						writer.write(output);
				} catch (IOException e) {
						System.out.println(e.getMessage());
				}
		}

    // Entschlüsselungsmethode
    public static void decrypt(String data, String out, int key, String output) {
        for (char item : data.toCharArray()) {
            char shiftItem = (char) (item - key);
            output += shiftItem;
        }
        if (out.equals("")) {
            System.out.println(output);
        } else {
            writeFile(output, out);
        }
    }

    // Verschlüsselungsmethode
    public static void encrypt(String data, String out, int key, String output) {
        for (char item : data.toCharArray()) {
            char shiftItem = (char) (item + key);
            output += shiftItem;
        }
        if (out.equals("")) {
            System.out.println(output);
        } else {
            writeFile(output, out);
        }
    }
}</code></pre>
<hr class="section-end" id="choose-algorithm"><br>
<h2>Erweiterung mit Interface und Klassen</h2>
<p>Im letzten Schritt werden wir das Programm dynamisch machen, sodass es stetig erweitert werden kann. Alle Verschlüsselungsmethoden werden nun in Klassen und in seperaten Dateien abgespeichert und mit Hilfe eines <b>Interface</b> aufgerufen. Wir fügen die Möglichkeit hinzu zwischen den Verschlüsselungsalgorithmen zu wählen. Der Anweder kann zum einen wieder, wie im ersten Abschnitt die Caeser-Verschlüsselung anwenden - diese nennen wir <b>shit</b>. Die zweite Verschlüsselung ist, wie in den vorherigen Schritten angewendet, basierend auf dem Unicode - diese nennen wir <b>unicode</b>. Das Argument zur Wahl des Algorithmus nennen wir <b>-alg</b>. Dies ist also ein weiteres Argument.</p>
<ul>
<li><p>Der gewählte Algorithmus <b>-alg</b>.</p></li>
</ul>
<p>Folgende weitere Bedingung ergibt sich:</p>
<ul>
<li><p>Wenn vom User kein Algorithmus <b>shift</b> und <b>unicode</b> angegeben wird, soll <b>shift</b> ausgeführt werden.</p></li>
</ul>
<p>Das finale Programm wird 4 Klassen verarbeiten:</p>
<ul>
	<li><p><b>Main</b></p></li>
	<li><p><b>Algorithm</b></p></li>
	<li><p><b>Shift</b></p></li>
	<li><p><b>Unicode</b></p></li>
</ul>
<div class="project-steps">
<ul>
<li class="steps">
<h3>Algorithm Klasse</h3>
<p>Die erste Klasse (Datei) die wir erstellen ist das Interface, welches wir <b>Algorithm</b> nennen. Diese soll die Ver- oder Entschlüsselungsmethoden in den jeweiligen Klassen aufrufen. Die dazu benötigen Arugmente fügen wir hinzu.</p>
<pre><code class="language-java">public interface Algorithm {
    String decrypt(String data, int key);
    String encrypt(String data, int key);
}</code></pre>
</li>
<li class="steps step-two">
	<h3>Unicode Klasse</h3>
<p>Für jede Verschlüsselungsmethode erstellen wir ebenso eine Klasse. Zunächst die bereits erstellte Methode über den Unicode. Diese werden wir aus unserer Main Datei entfernen und in eine neue Datei einfügen. Damit das Interface die Klasse abfruft, muss diese in jeder Klasse mit dem Keyword <b>implements</b> implementiert sein.</p>
<pre><code class="language-java">public class Unicode implements Algorithm {
	String output = "";

    public String decrypt(String data, int key) {
        for (char item : data.toCharArray()) {
            char shiftItem = (char) (item - key);
            output += shiftItem;
        }
        return output;
    }

    public String encrypt(String data, int key) {
        for (char item : data.toCharArray()) {
            char shiftItem = (char) (item + key);
            output += shiftItem;
        }
        return output;
    }
}</code></pre>
</li>
<li class="steps step-three">
	<h3>Shift Klasse</h3>
<p>Zunächst erstellen wir mit final zwei konstante Strings, in denen jeweils das Alphabet in Groß- und Kleinbuchstaben enthalten ist. Jetzt erstellen wir die encrpyt Methode. Da wir Variablen erhalten werden, die wir in einen String speichern möchten, müssen wir eine neue Instanz der Klasse <b>StringBuilder</b> erstellen, die wir <b>result</b> nennen. Der Loop geht, wie bekannt über jeden einzelnen character von data. Für jeden character der gefunden wird, wird nachgesehen, ob dieser ein Klein- oder Großbuchstabe ist. Darauf erstellen wir zwei neue int Variablen, in der wir mit der Methode <b>.indexOf()</b>, den Index vom Alphabet in char speichern. Ist data also bspw. a ist der Index 1, da a in der ersten Stelle des Strings LOWERCASE_ALPHABET steht. Ist ein character nicht in den beiden Strings enthalten, wird ein Index von -1 ausgegeben. Hierfür erstellen wir if-Abfragen. Mit der Methode <b>charAt()</b> geben wir den character an einem bestimmten Index wieder. Mit der Methode <b>append()</b> aus der Klasse StringBuilder, setzen wir bei die Ausgabe wieder in einen String um. Ist der character von data weder ein Klein- oder Großbuchstabe des Alphabets wird er einfach wieder ausgegeben (Sonderzeichen, Umlaute, etc.). Nach dem Loop geben wir mit <kbd>return result.toString();</kbd> den fertigen String des StringBuilders result aus.</p>
<pre><code class="language-java">public class Shift implements Algorithm {

  private final String LOWERCASE_ALPHABET = "abcdefghijklmnopqrstuvwxyz";
  private final String UPPERCASE_ALPHABET = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

  public String encrypt (String data, int key) {
      StringBuilder result = new StringBuilder();

      for (char chars: data.toCharArray()) {
          int indexLowercase = LOWERCASE_ALPHABET.indexOf(chars);
          int indexUppercase = UPPERCASE_ALPHABET.indexOf(chars);

          if (indexLowercase > -1) {
              char replacement = LOWERCASE_ALPHABET.charAt((indexLowercase + key) % LOWERCASE_ALPHABET.length());
              result.append(replacement);
          } else if (indexUppercase > -1) {
              char replacement = UPPERCASE_ALPHABET.charAt((indexUppercase + key) % UPPERCASE_ALPHABET.length());
              result.append(replacement);
          } else {
              result.append(chars);
          }
      }
      return result.toString();
  }

  // Hier wird die decrypt Methode eingefügt.
}
</code></pre>
<p>Bei der decrypt Methode müssen wir noch ein weiteres int Field in den if-Abfragen beschreiben. Dieses nennen wir <b>replacementKey</b> der verwendet wird, um die Anzahl die vom key angegeben wird im Alphabet zurück zu gehen.</p>
<pre><code class="language-java">public String decrypt (String data, int key) {
  StringBuilder result = new StringBuilder();

  for (char chars: data.toCharArray()) {
      int indexLowercase = LOWERCASE_ALPHABET.indexOf(chars);
      int indexUppercase = UPPERCASE_ALPHABET.indexOf(chars);

      if (indexLowercase > -1) {
          int replacementKey = (indexLowercase - key) % LOWERCASE_ALPHABET.length();

          if (replacementKey < 0) {
              replacementKey = LOWERCASE_ALPHABET.length() + replacementKey;
          } else if (replacementKey > LOWERCASE_ALPHABET.length()) {
              replacementKey = replacementKey - LOWERCASE_ALPHABET.length();
          }
          char replacement = LOWERCASE_ALPHABET.charAt((replacementKey) % LOWERCASE_ALPHABET.length());
          result.append(replacement);

      } else if (indexUppercase > -1) {
          int replacementKey = (indexUppercase - key) % UPPERCASE_ALPHABET.length();

          if (replacementKey < 0) {
              replacementKey = UPPERCASE_ALPHABET.length() + replacementKey;
          } else if (replacementKey > UPPERCASE_ALPHABET.length()) {
              replacementKey = replacementKey - UPPERCASE_ALPHABET.length();
          }
          char replacement = UPPERCASE_ALPHABET.charAt((replacementKey) % UPPERCASE_ALPHABET.length());
          result.append(replacement);

      } else {
          result.append(chars);
      }
  }
  return result.toString();
}</code></pre>
<li class="steps step-four">
	<h3>Die Main Klasse</h3>
<p>Jetzt müssen wir in unserer Main den Aufruf der Klassen und Methoden hinzufügen. Fügen wir dem for-Loop, der die Argumente args abfragt, zunächst unser neues Argument hinzu.</p>
<pre><code class="language-java">if (args[i].equals("-alg")) {
		alg = args[i + 1];
}</code></pre>
<p>Nun erstellen wir für unser neues Argument <b>alg</b> eine switch Anweisung. Zuvor erstellen wir eine Instanz vom Interface Algorithm. Für die jeweiligen Ent- und Verschlüsselungsmethoden nutzen wir die Schnittstelle (Interface), mit der wir die jeweiligen Methoden aufrufen. Als default verwenden wir die shift Methode, da diese ausgeführt werden soll, wenn keines der beiden Argumente angegeben wird.</p>
<pre><code class="language-java">Algorithm algorithm;

switch (alg) {
    case "unicode":
        algorithm = new Unicode();
        break;
    default:
        algorithm = new Shift();
        break;
}</code></pre>
<p>Die switch Anweisung für mode wird ebenso angepasst.</p>
<pre><code class="language-java">switch (mode) {
  case "dec":
      if (out.equals("")) {
          System.out.println(algorithm.decrypt(data, key));
          break;
      } else {
          writeFile(algorithm.decrypt(data, key), out);
          break;
      }
  default:
      if (out.equals("")) {
          System.out.println(algorithm.encrypt(data, key));
          break;
      } else {
          writeFile(algorithm.encrypt(data, key), out);
          break;
      }
}</code></pre>
</li>
</ul>
</div>
<p><b>Das vollständige Programm:</b></p>
<p>Das vollständige, finale Programm findest auf meinem <a href="https://github.com/joojey/encryption-decryption" target="_blank" rel="nofollow noopener">GitHub-Profil</a>. Es wäre zu lang, um es hier aufzuführen.</p>
<hr class="section-end" id="result"><br>
<h2>Endergebnis</h2>
<img class="" src="img/projects/encryption/program.gif"></img>
<br><br>
<h3>Installation</h3>
<p>Es wird keine Installation benötigt.</p>
<p>Das vollständige Programm befindet sich auf meinem <a href="https://github.com/woltersjoh/encryption-decryption" target="_blank" rel="nofollow noopener">GitHub-Profil</a> und kann dort heruntergeladen werden.</p>
<hr><br>
<h3>Verwendung</h3>
<p>Bitte beachten, dass der Code von meinem GitHub-Profil zuvor noch compiled werden muss.</p>
<pre><code class="language-command-line">javac Main.java</code></pre>
<p>Um das Programm auszuführen, zunächst den Befehl <b>java</b>, darauf den Dateinamen (in diesem Projekt - Main) und anschließend die Argumente in die Konsole eingeben.</p>
<img class="" src="img/projects/encryption/cmd.png"></img>
<br><hr><br>
<h3>Die Argumente</h3>
<p>Bei Eingabe der Argumente muss immer der Name eines Arguments und darauf ein Wert angegeben werden. Die Reihenfolge der Argumente ist frei wählbar.</p>
<p><b>Beispiele: -key 5, -in einedatei.txt, -data "Mein geheimer Text", -mode enc</b></p>
<p>Es können folgende Argumente verwendet werden:</p>
	<table class="project-table">
		<thead>
			<tr>
					<th>Argumentname</th>
					<th>Argumentwert</th>
					<th>Verwendung</th>
			</tr>
		</thead>
				<tr class="row-grey">
						<td>-data</td>
						<td>Beliebige character des Unicodes innerhalb von Ausrufezeichen gesetzt</td>
						<td>Der Text der verschlüsselt oder entschlüsselt wird.</td>
				</tr>
        <tr>
            <td>-key</td>
            <td>Eine Nummer von 0 bis 2³¹-1.</td>
						<td>Die Anzahl der gewünschten Verschiebungen der character.</td>
        </tr>
        <tr class="row-grey">
            <td>-mode</td>
            <td>enc oder dec</td>
						<td>Verschlüsseln oder entschlüsseln</td>
        </tr>
        <tr>
            <td>-in</td>
            <td>Pfad zu einer Datei</td>
						<td>Wenn Text aus einer Datei verschlüsselt oder entschlüsselt werden soll.</td>
        </tr>
        <tr class="row-grey">
					<td>-out</td>
					<td>Pfad zur ausgebender Datei</td>
					<td>Erstellt die Datei mit angegebenem Pfad.</td>
        </tr>
				<tr>
					<td>-alg</td>
					<td>shift oder unicode</td>
					<td>Wahl des Algorithmus zur Verschlüsselung.</td>
        </tr>
</table>
<hr><br>
<h3>Die Bedingungen</h3>
<p>1. Wenn kein -mode angegeben wird, wird enc ausgeführt.<br>
2. Wird kein -key angegeben, wird einen Schlüssel von 0 verwendet.<br>
3. Besteht kein -data, nimmt das Programm den Wert als einen leeren String an.<br>
4. Wird kein -data und kein -in angegeben, wird das Programm den Wert als einen leeren String annehmen.<br>
5. Sind beide Argumente -data und -in vorhanden, wird -data bevorzugt.<br>
6. Ist kein -out angegeben, wird das Ergebnis nur in der Kommandozeile ausgegeben.<br>
7. Wird -data und -in verwendet, wird -data bevorzugt.<br>
8. Wird kein Algorithmus (shift oder unicode) angegeben, wird shift ausgeführt.<br>
9. Wenn es weder eine Inputdatei, noch einen Wert als Argument gibt, erfolgt eine Fehlermeldung.</p>
<hr>
<h3>Nutzungsbeispiele</h3>
<p><b>Beispiel 1 - Verschlüsselung in der Konsole mit unicode</b></p>
<p>Eingabe:</p>
<pre><code class="language-command-line" style="color: #ddd;">java Main -data "Dies ist eine geheime Nachricht" -key 3 -mode enc -alg unicode</code></pre>
<p>Ausgabe:</p>
<pre><code class="language-command-line">Glhv#lvw#hlqh#jhkhlph#Qdfkulfkw</code></pre>
<br><br>
<p><b>Beispiel 2 - Entschlüsselung in der Konsole mit shift</b></p>
<p>Eingabe:</p>
<pre><code class="language-command-line">java Main -data "Ijw Xhmfye gjknsijy xnhm zsyjw jnsjr Xyjns" -key 5 -mode dec -alg shift</code></pre>
<p>Ausgabe:</p>
<pre><code class="language-command-line">Der Schatz befindet sich unter einem Stein</code></pre>
<br><br>
<p><b>Beispiel 3 - Verschlüsselung zu einer Datei</b></p>
<p>Eingabe:</p>
<pre><code class="language-command-line">java Main -in meinedatei.txt -key 12 -mode enc -alg unicode -out neuedatei.txt</code></pre>
<p>Ausgabe:<br><br>
<b>Der Inhalt der Datei (meinedatei) wird in die neu erstellte Datei (neuedatei) verschlüsselt ausgegeben.<b></p>
			<br><br><br><br><br>
			</div>
		</div>
	</div>

	<?php include("footer.html");?>

	<script src="js/custom.js"></script>
	<script src="js/prism.js"></script>
</body>
</html>
