# CMS_WS2017-18 #
## Content Management System project for the corresponding course at OTHAW WS 2017-18 ##


### Vorbereitung ###
* __xampp__ 
    * [Download](https://www.apachefriends.org/de/index.html)
    * Installieren
    * __Document Root__ anpassen: 
      Innerhalb der httpd.conf des Apache -
      `DocumentRoot "C:/xampp/htdocs"
      <Directory "C:/xampp/htdocs">`

      Diese Pfade anpassen damit sie auf _ *../CMS_WS2017-18/Projekt* zeigen. -> Aufruf von Localhost startet die sich darin befindene index.php Datei

      Beispiel
      `DocumentRoot "C:/xampp/htdocs/CMS_WS2017-18/Projekt"
      <Directory "C:/xampp/htdocs/CMS_WS2017-18/Projekt">`
    * ...
* __Testumgebung__
  Hier befinden sich Ordner für jedes Gruppenmitglied, in denen nach Herzenslust entwickelt werden kann. Beispielsweise um Features zu testen oder PHP zu üben, ohne das Hauptprojekt zu beeinflussen/zuzumüllen.

  Start der Test index.php Datei unter *localhost/Testumgebung/DeinName*
* __...__

### Ordnerstruktur ###
*Ordnernamen, sowie -Struktur müssen natürlich noch nicht endgültig so feststehen.*

* __CMS_WS2017-18__: Root
    * __Entwurf__: Ablage für mögliche Entwurfsartefakte
    * __Projekt__: Beihaltet das zu bearbeitende Projekt
        * __src__: Ablage diverser Quellcodedateien, zB php-Dateien mit allgemeinen Funktionalitäten zum inkludieren oder welche in keinen anderen spezifischen Ordnern untergebracht werden.
        * __styles__: Für CSS-Stylesheets
        * ...
        * __Testumgebung__: Umgebung für Gruppenteilnehmer zum Testen von Funktionen, bzw allgemein zur Übung von PHP usw.
    * ...

### To be continued ###


### Nützliche Links ###
__Tutorials:__
* [PHP : Creating a CMS in 1 HOUR](https://www.youtube.com/watch?v=QNxU3Qa6QZs) PHP CMS Einstiegstutorial
* [Build A CMS Admin Bootstrap Theme From Scratch](https://www.youtube.com/watch?v=pXbEcGUtHgo) Bootstrap Einstiegstutorial zum designen eines Admin-Themes
* [markdown cheatsheet](https://github.com/tchapi/markdown-cheatsheet/blob/master/README.md) Formatierung von README.md Dateien

__Sonstiges:__
* [Color Scheme Editor](https://work.smarchal.com/twbscolor/) Automatisch generierte CSS-Regeln für ein Farbschema der Bootstrap-Navbar
* ..
