# TP MGLSI — Site d'actualités Canopée

Projet en **deux versions** pour montrer l'évolution d'un site PHP simple vers une architecture MVC.

---

## Les deux versions

| Version | Dossier | Architecture | URL locale |
|---------|---------|--------------|------------|
| **V1** | `v1/` | Sans MVC — SQL + HTML dans chaque page | http://localhost/mglsi_news/v1/ |
| **V2** | `v2/` | Avec MVC — Models, Views, Controller | http://localhost/mglsi_news/v2/ |

---

## Compte base de données (WAMP)

À configurer dans phpMyAdmin avant de lancer le site :

| Paramètre | Valeur |
|-----------|--------|
| Base de données | `mglsi_news` |
| Utilisateur MySQL | `mglsi_user` |
| Mot de passe | `passer` |
| Hôte | `localhost` |

**Installation :** importer le fichier `database/schema.sql` (crée la BDD, les tables et des données de démo).

```sql
-- Création de l'utilisateur (si besoin)
GRANT ALL PRIVILEGES ON mglsi_news.* TO 'mglsi_user'@'localhost' IDENTIFIED BY 'passer';
FLUSH PRIVILEGES;
```

Les identifiants sont aussi dans :
- V1 → `v1/config/db.php`
- V2 → `v2/config/db.php`

---

## Workflow Git (TP)

### Étape 1 — Créer le repo et pousser la V1

```bash
cd c:\wamp64\www\mglsi_news
git init
git add v1/ database/ README.md index.php .gitignore
git commit -m "V1 : site sans MVC"
git branch -M main
git remote add origin https://github.com/TON_USER/mglsi_news.git
git push -u origin main
```

> Pour le TP, on pousse d'abord **uniquement la V1**. Le dossier `v2/` reste en local pour l'instant.

### Étape 2 — Créer la branche V1 (tag de référence)

```bash
git checkout -b v1
git push -u origin v1
```

### Étape 3 — Passer à la V2 (MVC)

```bash
git checkout main
git add v2/
git commit -m "V2 : refactorisation MVC"
git checkout -b v2
git push -u origin v2
```

### Résumé des branches

```
main  → dernière version stable
v1    → version sans MVC (référence TP)
v2    → version avec MVC (référence TP)
```

---

## Ce qu'on montre au prof

**V1** : code simple mais limité
- Requêtes SQL répétées dans chaque page
- HTML et logique mélangés
- Difficile à maintenir si le site grossit

**V2** : même site, mieux organisé
- Modèles pour la BDD (réutilisables)
- Vues séparées (HTML propre)
- Un seul contrôleur (`index.php`) qui route les pages
- Carte article en partial (pas de duplication)

---

## Arborescence complète

```
mglsi_news/
├── index.php          → Redirige vers v1/
├── database/
│   └── schema.sql     → Script BDD partagé
├── v1/                → Version 1 (sans MVC)
└── v2/                → Version 2 (avec MVC)
```
