# Audio_XH

Audio_XH ermöglicht die Darstellung von Audio-Playern auf einer CMSimple_XH Website.
Sie müssen eine MP3 und eine Ogg Vorbis Datei für jeden Player bereit stellen.
Wenn der Browser des Besuchers das AUDIO element unterstützt,
nutzt das Plugin dieses Feature, andernfalls wird ein Link zur MP3 Datei angezeigt.
JavaScript wird nicht benötigt.

- [Voraussetzungen](#voraussetzungen)
- [Download](#download)
- [Installation](#installation)
- [Verwendung](#verwendung)
- [Problembehebung](#problembehebung)
- [Lizenz](#lizenz)
- [Danksagung](#danksagung)

## Voraussetzungen

Audio_XH ist ein Plugin für [CMSimple_XH](https://cmsimple-xh.org/de/).
Es benötigt CMSimple_XH ≥ 1.7.0 und PHP ≥ 5.4.0.

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
Jede Audiodatei muss als MP3 (.mp3) *und* als Ogg Vorbis (.ogg) Version
hoch geladen werden; beide Dateien müssen im selben Ordner sein und den selben
Namen haben.

Um einen Audio-Player auf einer Seite darzustellen, fügen Sie einfach den
folgenden Pluginaufruf ein:

    {{{audio('DATEINAME')}}}

`DATEINAME` muss ein Dateipfad (ohne Dateieerweiterung) relativ zum
konfigurierten Media Ordner sein.

Wenn Sie also zum Beispiel musik.mp3 und musik.ogg direkt im Media-Ordner
abgelegt haben, verwenden Sie:

    {{{audio('musik')}}}

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
