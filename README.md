# Canopée — V2 (MVC)

Site d'actualités en PHP avec architecture MVC.

## Structure

- `index.php` — contrôleur (décide quelle page afficher)
- `models/` — classes Article et Categorie (requêtes SQL)
- `views/` — fichiers HTML
- `config/db.php` — connexion à la base
- `fonctions.php` — petites fonctions utiles

## Installation

1. Importer `database/schema.sql` dans phpMyAdmin
2. Connexion : `mglsi_news` / `mglsi_user` / `passer`
3. Ouvrir : http://localhost/mglsi_news/

## URLs

- Accueil : `index.php`
- Article : `index.php?route=article&id=3`
- Catégorie : `index.php?route=categorie&id=2`
