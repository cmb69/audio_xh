# Audio_XH

Audio_XH ermöglicht die Darstellung von Audio-Playern auf einer CMSimple_XH Website.
Sie können mehrere Audioformate für jeden Player bereit stellen.
Unterstützt der Browser des Besuchers das `<audio>` Element
(das von allen wichtigen Browsern seit 2015 unterstüzt wird),
und eines der angebotenen Audioformate, wird ein Audio-Player angezeigt.
Andernfalls wird ein Download-Link angezeigt.

- [Voraussetzungen](#voraussetzungen)
- [Download](#download)
- [Installation](#installation)
- [Verwendung](#verwendung)
  - [Audio-Formate](#audio-formate)
  - [Meta-Daten](#meta-daten)
- [Problembehebung](#problembehebung)
- [Lizenz](#lizenz)
- [Danksagung](#danksagung)

## Voraussetzungen

Audio_XH ist ein Plugin für [CMSimple_XH](https://cmsimple-xh.org/de/).
Es benötigt CMSimple_XH ≥ 1.7.0 und PHP ≥ 7.1.0.
Audio_XH benötigt weiterhin [Plib_XH](https://github.com/cmb69/plib_xh) ≥ 1.3;
ist dieses noch nicht installiert (siehe `Einstellungen` → `Info`),
laden Sie das [aktuelle Release](https://github.com/cmb69/plib_xh/releases/latest)
herunter, und installieren Sie es.

## Download

Das [aktuelle Release](https://github.com/cmb69/audio_xh/releases/latest)
kann von Github herunter geladen werden.

## Installation

Die Installation erfolgt wie bei vielen anderen CMSimple\_XH-Plugins auch.

1. Sichern Sie die Daten auf Ihrem Server.
1. Entpacken Sie die ZIP-Datei auf Ihrem Rechner.
1. Laden Sie das ganze Verzeichnis `audio/` auf Ihren Server
   in das `plugins/` Verzeichnis von CMSimple\_XH hoch.
1. Vergeben Sie falls nötig Schreibrechte für die Unterverzeichnisse
   `css/` und `languages/`.
<!-- 1. Gehen Sie zu `Plugins` → `Audio` im Administrationsbereich,
   um zu prüfen, ob alle Voraussetzungen erfüllt sind. -->

## Verwendung

Da Audio_XH keine solche Möglichkeit anbietet, müssen Sie Ihre Audio-Dateien
in den konfigurierten Media-Ordner per FTP, dem Filebrowser oder
[Uploader_XH](https://github.com/cmb69/uploader_xh) hoch laden.
Jedes Audio kann in mehreren Formaten hoch geladen werden;
alle diese Dateien müssen im selben Ordner liegen,
und den selben Basisnamen haben.

Um einen Audio-Player auf einer Seite darzustellen, fügen Sie einfach den
folgenden Pluginaufruf ein:

    {{{audio('DATEINAME')}}}

`DATEINAME` muss ein Dateipfad (ohne Dateieerweiterung) relativ zum
konfigurierten Media Ordner sein.

Wenn Sie also zum Beispiel goldberg.mp3 und goldberg.ogg direkt im Media-Ordner
abgelegt haben, verwenden Sie:

    {{{audio('goldberg')}}}

Um einen Audio-Player auf allen Seiten darzustellen, fügen Sie einfach
folgendes in Ihr Template ein:

    <?=audio('DATEINAME')?>

Die automatische Wiedergabe ("Autoplay") wird durch Hinzufügen des Arguments 1
zum Aufruf aktiviert:

    . . . audio('DATEINAME', 1) . . .

Die Wiedergabe als Endlosschleife ("Loop") wird durch Hinzufügen eines weiteren Arguments 1
zum Aufruf aktiviert, z.B. mit Autoplay:

. . . audio('DATEINAME', 1, 1) . . .

oder ohne Autoplay:

. . . audio('DATEINAME', 0, 1) . . .

Beachten Sie, dass es möglich ist mehrere Audio-Player mit aktiviertem
Autoplay auf einer Seite einzubinden, aber dass das i.d.R. nicht wünschenswert
ist.

### Audio-Formate

Audiodateien können in verschiedenen Formaten kodiert werden
(die technischen Begriffe sind *Codec* und *Container*).
Diese Formate haben ihre Vor- und Nachteile bezüglich
Kompression/Qualität und Abspielunterstützung.
Zur Zeit unterstützt Audio_XH die folgenden Formate:

| Codec      | Container |
|------------|-----------|
| Opus       | .webm     |
| AAC        | .m4a      |
| Ogg Vorbis | .ogg      |
| MP3        | .mp3      |

Sie können beliebige von diesen zur Verfügung stellen,
aber zumindest `.mp3` wird für beste Portabilität empfohlen.

### Meta-Daten

Sie können optional Meta-Daten für die Audio-Dateien bereits stellen,
indem sie eine Datei `audio.csv` in den `content/` Ordner
von CMSimple_XH hoch laden.
Diese Datei muss im CSV-Format vorliegen
(UTF-8 kodiert, durch Kommma getrennte Werte),
und die folgenden Spalten enthalten (eine Kopfzeile ist optional):

1. `id`: der Dateiname der Audio-Datei, wie im Pluginaufruf angegeben
1. `name`: der Name des Audios
1. `description`: die Beschreibung des Audios

Ein `audio.csv` Beispiel (mit Kopfzeile):

    ID,Name,Description
    goldberg,Goldberg-Variationen,"Die Goldberg-Variationen sind ein Werk Johann Sebastian Bachs (BWV 988) für Cembalo. Im von Bach selbst veranlassten Erstdruck aus dem Jahr 1741 wurde es als Clavier Ubung bestehend in einer ARIA mit verschiedenen Verænderungen vors Clavicimbal mit 2 Manualen bezeichnet. Die Benennung nach Johann Gottlieb Goldberg entstand posthum aufgrund einer Anekdote."

Sie können einen Texteditor oder Ihre bevorzugte Tabellenkalkulation
verwenden, um diese Datei zu erstellen und zu warten.

Sind Meta-Daten für das Audio verfügbar, werden diese verwendet um
[Microdata](https://en.wikipedia.org/wiki/Microdata_(HTML)),
konform zu [schema.org AudioObjects](https://schema.org/AudioObject),
zu generieren, was für Suchmaschinen nützlich ist.
Weiterhin wird eine `<figcaption>` mit dem `name`
oberhalb des Audio-Players eingefügt.

## Problembehebung

Melden Sie Programmfehler und stellen Sie Supportanfragen entweder auf
[Github](https://github.com/cmb69/audio_xh/issues)
oder im [CMSimple\_XH Forum](https://cmsimpleforum.com/).

## Lizenz

Audio_XH ist freie Software. Sie können es unter den Bedingungen
der GNU General Public License, wie von der Free Software Foundation
veröffentlicht, weitergeben und/oder modifizieren, entweder gemäß
Version 3 der Lizenz oder (nach Ihrer Option) jeder späteren Version.

Die Veröffentlichung von Audio_XH erfolgt in der Hoffnung, daß es
Ihnen von Nutzen sein wird, aber *ohne irgendeine Garantie*, sogar ohne
die implizite Garantie der *Marktreife* oder der *Verwendbarkeit für einen
bestimmten Zweck*. Details finden Sie in der GNU General Public License.

Sie sollten ein Exemplar der GNU General Public License zusammen mit
Audio_XH erhalten haben. Falls nicht, siehe
<https://www.gnu.org/licenses/>.

Copyright © Christoph M. Becker

## Danksagung

Dieses Plugin wurde von *jop* angeregt.

Das Plugin-Icon wurde von [YelloIcon](http://www.yellowicon.com/) gestaltet.
Vielen Dank für die Veröffentlichung dieses Icons unter GPL.

Vielen Dank an die Gemeinschaft im [CMSimple_XH Forum](https://cmsimpleforum.com/)
für Tipps, Vorschläge und das Testen.
Mein besonderer Dank geht an *Ulrich* für sein frühes Feedback, und an
*svasti* für die Realisierung des Autoplay.

Und zu guter letzt vielen Dank an
[Peter Harteg](https://www.harteg.dk/), den „Vater“ von CMSimple,
und allen Entwicklern von [CMSimple\_XH](https://www.cmsimple-xh.org/de/)
ohne die es dieses phantastische CMS nicht gäbe.
