# Canopée — V1

Site d'actualités en PHP (sans MVC).

Chaque page fait les requêtes SQL et affiche le HTML.

## Installation

1. Importer `database/schema.sql` dans phpMyAdmin
2. Connexion : `mglsi_news` / `mglsi_user` / `passer`
3. Ouvrir : http://localhost/mglsi_news/

## Fichiers

- `index.php` — accueil
- `article.php` — détail d'un article
- `categorie.php` — articles d'une catégorie
- `config/db.php` — connexion BDD
- `includes/` — header, footer, fonctions
- `css/style.css`
