# testCodepi
Bonjour, bienvenue sur ma copie !
J'ai pu réaliser toutes les demandes y compris le bonus, en espérant que mes méthodes de développement sont convenables et vous satisferont.
Je pense pouvoir faire mieux, j'ai peut-être manqué de temps.

Quoi qu'il en soit voici le protocole pour installer tout ceci :  
  
- Installer une version récente de Wamp.  
- Posséder Composer.  

1 - La Base de données<br/>
Dans phpMyAdmin, il faut d'abord créer la BDD "shop". <br/>
A la racine du projet, il y a le script de la base données "shop.sql" à importer pour avoir des données.   
<br/>
2 - Laravel<br/>
Créer un dossier "shop" dans le dossier www de Wamp.<br/>
Copier tout le repository dans ce dossier "shop".<br/>
Ouvrir le dossier une fois la copie terminée.<br/>
<br/>
3 - Installation<br/>
Ouvrir un terminal Windows (Shift + clic droit dans le dossier) puis tapez ces commandes :
```
composer update
```
Puis ensuite : 
```
php artisan serve
```
Ouvrir un navigateur (de préférence Chrome) :
Et allez à l'adresse indiquée dans le terminal : http://127.0.0.1:8000
