# Canopée — V2

Site d'actualités en PHP avec MVC.

## Structure

- `index.php` — contrôleur
- `models/` — Article, Categorie (SQL)
- `views/` — HTML
- `config/db.php` — connexion BDD
- `fonctions.php`
- `css/style.css`

## Installation

1. Importer `database/schema.sql` dans phpMyAdmin
2. Connexion : `mglsi_news` / `mglsi_user` / `passer`
3. Ouvrir : http://localhost/mglsi_news/

## URLs

- Accueil : `index.php`
- Article : `index.php?route=article&id=3`
- Catégorie : `index.php?route=categorie&id=2`
