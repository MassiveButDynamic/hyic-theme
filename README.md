# HYIC Wordpress Theme
#Hoffentlich wirds eine super Website!

## Wofür welche Dateien da sind
### index.php und style.css
Notwendige Dateien, damit Wordpress das Theme erkennt. Sonst nicht so richtig wichtig.

### footer.php
Der Inhalt des Footers. Hat auch ein Nav-Menü (logischerweise das, was 'footer' heißt). Da kommen auch die schließenden html-, und body-tags rein (als `</body>` und `</html>`)

### header.php
Der Inhalt des Headers. So ähnlich wie footer.php, aber halt oben und nicht unten. Hat das 'top'-Nav-Menü und auch den ganzen `<head>`.

Das `<?php wp_head() ?>` sorgt dafür, dass auch alle CSS- und Javascript-Dateien geladen werden, die registriert sind.

### functions.php
Ziemlich wichtig. Hier werden z.B. die Features, die das Theme unterstützt, oder die Menüs registriert. Auch die customizer.php wird hier eingebunden.

### customizer.php
Hier werden alle Sachen registriert, die man dann im Customizer von Wordpress einstellen kann.

### front-page.php
Die Homepage.