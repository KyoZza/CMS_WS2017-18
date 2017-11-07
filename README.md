# CMS_WS2017-18 #
## Content Management System project for the corresponding course at OTHAW WS 2017-18 ##


### Vorbereitung ###
* __xampp__ 
    * [Download](https://www.apachefriends.org/de/index.html)
    * Apache und MySql laufen lassen
    * __update httpd-vhosts file__
    `\apache\conf\extra\httpd-vhosts`
    
    Füge das folgende hinzu :
    ```
    <VirtualHost *:80>
        DocumentRoot "C:/xampp/htdocs/"
        ServerName localhost
    </VirtualHost>

    <VirtualHost *:80>
        DocumentRoot "C:/xampp/htdocs/cmsapp/public"
        ServerName cmsapp.dev
    </VirtualHost>
    ```
   * __update httpd-vhosts file__
    `\Windows\System32\drivers\etc\hosts`

    Füge das folgende hinzu : 
    ```
    127.0.0.1 localhost
    127.0.0.1 cmsapp.dev
    ```

* __project__ 
    * cmsapp.7z Datei im entpacken und damit den vorhandenen cmsapp-Order überschreiben. (GitHub hat irgendwie nicht alle Dateien bekommen)
    * Ordner 'Storage' unter cmsapp/public löschen

* __PhpMyAdmin__
    * Neue Datenbank mit dem Namen cmsapp anlegen
    * Passwort für root user '12345' einrichten. Dieses muss auch in der `config.inc.php` Datei stehen. Alternativ auch ein anderes. Wir müssen nur alle drei das gleiche PW benutzen. Es sei denn jeder führt eine eigene .env-Datei mit seinen eigenen Login Daten und excludiert diese bei Git-Commits. 

* __cmd__
    * CD in cmsapp Order. Führe folgende Befehle aus:
    * `php artisan migrate`
    * `php artisan db:seed`
    * `php artisan storage:link`

* __Evtl muss noch Node.js und Composer heruntergeladen werden__
    * [Composer](https://getcomposer.org/download/)
    * [Node.js](https://nodejs.org/en/download/) 

* __GitHub Sync__

### Ordnerstruktur ###


### To be continued ###



### Nützliche Links ###
__Tutorials:__
* [Laravel: From Scratch](https://www.youtube.com/watch?v=H3uRXvwXz1o&t=715s) Laravel Einstiegstutorial. __Bitte ansehen!!!!__
* [PHP : Creating a CMS in 1 HOUR](https://www.youtube.com/watch?v=QNxU3Qa6QZs) PHP CMS Einstiegstutorial
* [Build A CMS Admin Bootstrap Theme From Scratch](https://www.youtube.com/watch?v=pXbEcGUtHgo) Bootstrap Einstiegstutorial zum designen eines Admin-Themes
* [markdown cheatsheet](https://github.com/tchapi/markdown-cheatsheet/blob/master/README.md) Formatierung von README.md Dateien

__Sonstiges:__
* [Color Scheme Editor](https://work.smarchal.com/twbscolor/) Automatisch generierte CSS-Regeln für ein Farbschema der Bootstrap-Navbar
* [Bootswatch](https://bootswatch.com/) Freie Bootstrap Themes
* ..
