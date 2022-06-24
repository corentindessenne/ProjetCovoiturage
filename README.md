# ProjetCovoiturage
Projet de plateforme de covoiturage pour le [Festival des Briques Rouges](https://www.lesbriquesrouges.fr)

[![License: GPL v3](https://img.shields.io/badge/License-GPL%20v3-blue.svg)](http://www.gnu.org/licenses/gpl-3.0)

## Auteurs
- [Corentin Dessenne](https://github.com/Corentin-Dessenne)
- [Adrien Mareel](https://github.com/AdriMareel)
- [Maxime Thuillier](https://github.com/Ayuukina)
- [Lucas Zhou](https://github.com/Lucas-Z-ok)

## Déploiement

Importer le fichier [lbrcovoiturage.sql](https://github.com/Corentin-Dessenne/ProjetCovoiturage/blob/main/lbrcovoiturage.sql) dans une base de donnée nommée **lbrcovoiturage**

**Important** : Nous avons utilisé une librairie de transport de mails, nommée **sendmail**, intégrée à XAMPP, que nous avons utilisé pour héberger un serveur Apache et MySQL. Pour que l'envoi de mails sur la plateforme fonctionne, veuillez suivre les instructions suivantes :
1. Dans le fichier ``header_mails.php``, à la ligne 3, modifier l'adresse mail avec votre adresse email (celle qui va envoyer les emails aux utilisateurs).
2. Dans les fichiers de configuration de **PHP** (``php.ini``), retrouver la section ``mail function`` (recherchez dans le document avec ``CTRL + F``), modifiez les paramètres suivants :
   ```txt
   SMTP=nom du serveur SMTP (Gmail, Outlook, ...)
   smtp_port=numéro du port SMTP (En général 587 ou 465, mais vérifiez les paramètres de votre serveur malgré tout)
   sendmail_from = adresse_d'expédition@exemple.com
   sendmail_path = "chemin\jusque\exécutable\sendmail.exe (A titre d'exemple : "\"C:\xampp\sendmail\sendmail.exe\" -t")
   ```
3. Dans les fichiers de configuration de **sendmail** (``sendmail.ini``), modifier les paramètres suivants :
   ```txt
   smtp_server=nom du serveur SMTP
   smtp_port=numéro du port SMTP
   error_logfile=error.log
   debug_logfile=debug.log
   auth_username=adresse_d'expédition@exemple.com
   auth_password=mot de passe
   force_sender=adresse_d'expédition@exemple.com (optionnel)
   ```
   > Depuis le mois de juin 2022, Google ne prend plus en charge les applications qui ne nécessitent plus que l'adresse mail et le mot de passe pour s'identifier.
   > 
   > Pour contourner cette limitation, il faut remplacer le mot de passe par un mot de passe d'application.
   > 
   > Voici la procédure à suivre pour en créer un : [Support Google](https://support.google.com/accounts/answer/185833?hl=fr&authuser=1#zippy=)
   > ! La 2FA doit être activée