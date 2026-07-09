# Version 1 — Sans MVC

Version simple du site **Canopée**. Pas de modèles, pas de contrôleur : chaque page PHP fait tout elle-même.

## Structure

```
v1/
├── index.php          → Accueil (SQL + HTML dans le même fichier)
├── article.php        → Détail article
├── categorie.php      → Articles par catégorie
├── config/db.php      → Fonction getConnection()
├── includes/
│   ├── header.php     → En-tête commun
│   ├── footer.php     → Pied de page
│   └── functions.php  → e(), formatDate(), excerpt()
└── css/style.css
```

## Différence avec la V2

| V1 (ce dossier) | V2 (dossier v2/) |
|-----------------|------------------|
| SQL écrit dans chaque page | SQL dans les Models |
| 3 fichiers PHP séparés | 1 front controller (index.php) |
| Pas de classes | Classes Article, Categorie, Model |
| HTML mélangé avec la logique | Vues séparées dans views/ |

## Lancer la V1

```
http://localhost/mglsi_news/v1/
```

## Base de données

Importer `../database/schema.sql` dans phpMyAdmin.

Identifiants dans `config/db.php` :
- Base : `mglsi_news`
- Utilisateur : `mglsi_user`
- Mot de passe : `passer`
