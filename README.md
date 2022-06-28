<h1 align="center">:chess_pawn: Bienvenue sur Jeux Partage ! :game_die:</h1>

![screenshot](https://github.com/celine-trv/jeux_partage/blob/master/screenshot.jpg)

Projet final de la formation Développeur Web et Web Mobile.


## Qu'est-ce que c'est ?

JEUX PARTAGE est un site de mise en relation de personnes adeptes des jeux de société et qui souhaitent partager les leurs ainsi que leur passion commune.

Le concept initial est limité aux habitants des Yvelines afin de faciliter les prêts.

Chacun est libre de s'y inscrire, d'emprunter les jeux qui l'intéresse et d'ajouter ses propres jeux au catalogue commun afin que d'autres puissent les emprunter pour s'amuser, et ce gratuitement.
Une messagerie privée entre les deux utilisateurs concernés par un prêt (l'emprunteur et le possesseur du jeu) leur permet de s'organiser pour l'échange.

Le principe est fondé sur la convivialité, en vue de longues parties animées.

Alors à vos marques, prêts ? Jouez !


## Quelles Technos ?

Ce projet est réalisé avec Symfony 5.2.4 (PHP 7.4).
Utilisation de HTML5/CSS3, JavaScript/jQuery, Twig et Bootstrap pour le front.
Gestion des données dans une base de données relationnelle SQL de 5 tables.
Certaines fonctionnalités back-end ont été développées en Ajax (messagerie).


## Qui l'a fait ?

3 développeuses web junior en l'espace de 10 jours :

* Céline
  - Conception du design et de la charte graphique
  - Intégration du Front et Back Office
  - Développement des fonctionnalités et de la logique du Back Office
* Aurélie
  - Développement de la logique du Front Office
  - Développement des fonctionnalités d'inscription et de connexion
  - Développement de la fonctionnalité de messagerie instantanée 
* Véronique
  - Intégration du Front et Back Office
  - Développement de la logique du Back Office


## Quelles améliorations possibles ?

* Envoi d'email de confirmation d'inscription avec lien de vérification
* Réinitialisation du mot de passe en cas d'oubli
* Envoi notifications en cas de messages (suite à un emprunt)
* Option de recherche des jeux par nom ou autre caractéristique
* Intégration d'une API Google Map sur le détail des jeux pour afficher leur localisation
* Système de réservation en cas d'indisponibilité d'un jeu
* Permettre de suspendre/rétablir la disponibilité d'un jeu ou d'un compte utilisateur (et de tous les jeux qu'il possède, en cas de vacances par exemple)
* Système de rating entre membres pour évaluer le sérieux d'un emprunteur/prêteur, avec système de bannissement provisoir ou permanent en cas de rating trop bas
* Forum entre membres pour permettre les discussions sur les jeux, organiser des rencontres, etc ...
* Élargir le concept au niveau national


## Installation

_Pour installer le site en local :_
*	$ git pull origin master 
*	$ cd jeux_partage
*	$ composer install

_Configuration connexion BDD dans le fichier .env :_
* DATABASE_URL="mysql://root:@127.0.0.1:3306/jeux_partage?" pour le serveur Xampp

_Création de la BDD et importation des tables :_
* $ php bin/console doctrine:database:create
* Dans phpMyAdmin, importer la BDD avec le fichier "jeux_partage.sql"
