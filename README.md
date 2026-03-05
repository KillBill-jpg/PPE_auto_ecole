# PPE Auto-École Castellane-Auto

Application web de gestion d'auto-école développée en PHP avec architecture MVC.

## 📋 Prérequis

- PHP 7.4 ou supérieur
- MySQL 5.7 ou supérieur
- Serveur web (Apache/XAMPP/WAMP)

## 🚀 Installation

### 1. Importer la base de données

1. Ouvrez phpMyAdmin (http://localhost/phpmyadmin)
2. Créez une nouvelle base de données nommée `autoecole`
3. Importez le fichier `database.sql` fourni

**OU** exécutez directement le script SQL :

```sql
-- Copiez et exécutez le contenu du fichier database.sql
```

### 2. Configuration

1. Placez le dossier `PPE_auto_ecole` dans votre dossier web (htdocs pour XAMPP, www pour WAMP)
2. Vérifiez la configuration de connexion dans `modele/modele.php` :

```php
$url  = "mysql:host=localhost;dbname=autoecole";
$user = "root";
$mdp  = "";
```

### 3. Accès à l'application

Ouvrez votre navigateur et accédez à :
```
http://localhost/PPE_auto_ecole/index.php
```

## 🔑 Connexion par défaut

**Email :** admin@autoecole.fr  
**Mot de passe :** admin123

## 📁 Structure du projet

```
PPE_auto_ecole/
├── index.php                    # Point d'entrée de l'application
├── database.sql                 # Script de création de la BDD
├── controleur/
│   ├── controleur_class.php     # Classe contrôleur principal
│   ├── home.php                 # Page d'accueil
│   ├── gestion_candidats.php    # Gestion des candidats
│   ├── gestion_moniteurs.php    # Gestion des moniteurs
│   ├── gestion_vehicules.php    # Gestion des véhicules
│   ├── gestion_lecons.php       # Gestion des leçons
│   └── erreur.php               # Page d'erreur
├── modele/
│   └── modele.php               # Modèle (requêtes SQL)
├── vue/
│   ├── vue_connexion.php        # Formulaire de connexion
│   ├── vue_insert_candidat.php  # Formulaire candidat
│   ├── vue_select_candidat.php  # Liste candidats
│   ├── vue_update_candidat.php  # Modification candidat
│   ├── vue_insert_moniteur.php  # Formulaire moniteur
│   ├── vue_select_moniteur.php  # Liste moniteurs
│   ├── vue_update_moniteur.php  # Modification moniteur
│   ├── vue_insert_vehicule.php  # Formulaire véhicule
│   ├── vue_select_vehicule.php  # Liste véhicules
│   ├── vue_update_vehicule.php  # Modification véhicule
│   ├── vue_insert_lecon.php     # Formulaire leçon
│   ├── vue_select_lecon.php     # Liste leçons
│   └── vue_update_lecon.php     # Modification leçon
└── images/                      # Images du menu (à ajouter)
```

## ⚙️ Fonctionnalités

### ✅ Gestion des candidats
- Ajouter un candidat (élève)
- Modifier les informations d'un candidat
- Supprimer un candidat
- Voir le nombre de leçons par candidat

### ✅ Gestion des moniteurs
- Ajouter un moniteur
- Modifier les informations d'un moniteur
- Supprimer un moniteur

### ✅ Gestion des véhicules
- Ajouter un véhicule (voiture, moto, camion)
- Modifier les informations d'un véhicule
- Supprimer un véhicule
- Suivi du kilométrage

### ✅ Gestion des leçons
- Planifier une leçon de conduite
- Associer un candidat, un moniteur et un véhicule
- Gérer les leçons sans véhicule (Code, BSR)
- Ajouter des comptes-rendus
- Filtrer les leçons par candidat

## 📊 Base de données

### Tables principales :
- **user** : Utilisateurs du système (admins, gestionnaires)
- **candidat** : Élèves de l'auto-école
- **moniteur** : Moniteurs de conduite
- **vehicule** : Véhicules de l'auto-école
- **lecon** : Leçons de conduite planifiées

## 🔧 À faire / Améliorations possibles

- [ ] Ajouter des images pour le menu de navigation
- [ ] Créer un calendrier visuel des leçons
- [ ] Ajouter la gestion des examens
- [ ] Créer un front-office public
- [ ] Ajouter des statistiques et rapports
- [ ] Implémenter la gestion des rôles (admin vs moniteur)
- [ ] Ajouter la gestion des paiements
- [ ] Sécuriser les mots de passe (hashage)

## 🐛 Dépannage

### Erreur de connexion à la base de données
- Vérifiez que MySQL est démarré
- Vérifiez les identifiants dans `modele/modele.php`
- Assurez-vous que la base `auto_ecole` existe

### Page blanche
- Activez l'affichage des erreurs PHP :
  ```php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  ```

### Les images du menu ne s'affichent pas
- Créez le dossier `images/`
- Ajoutez vos images avec les noms correspondants
- Ou remplacez par du texte dans `index.php`

## 📝 Notes techniques

- Architecture MVC (Modèle-Vue-Contrôleur)
- PDO pour les requêtes SQL (sécurisé contre les injections SQL)
- Sessions PHP pour l'authentification
- Requêtes préparées pour toutes les interactions avec la BDD

## 👨‍💻 Développement

Ce projet a été développé dans le cadre d'un PPE (Projet Professionnel Encadré) pour la formation BTS SIO option SLAM.

---

**Version :** 1.0  
**Date :** Mars 2026  
**Auteur :** Votre nom
