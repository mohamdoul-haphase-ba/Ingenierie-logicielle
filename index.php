<?php

require_once __DIR__ . '/config/db.php';
require_once __DIR__ . '/models/Article.php';
require_once __DIR__ . '/models/Categorie.php';
require_once __DIR__ . '/fonctions.php';

$articleModel   = new Article();
$categorieModel = new Categorie();
$categories     = $categorieModel->findAll();

$route = $_GET['route'] ?? 'accueil';

// --- Accueil ---
if ($route === 'accueil') {
    $articles        = $articleModel->findAllWithCategorie();
    $pageTitle       = 'Canopée — Accueil';
    $categorieActive = null;

    require 'views/header.php';
    require 'views/accueil.php';
    require 'views/footer.php';
    exit;
}

// --- Article ---
if ($route === 'article') {
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    if (!$id) {
        header('Location: index.php');
        exit;
    }

    $article = $articleModel->findByIdWithCategorie($id);
    if (!$article) {
        header('Location: index.php');
        exit;
    }

    $pageTitle       = 'Canopée — ' . $article['titre'];
    $categorieActive = $article['categorieId'];

    require 'views/header.php';
    require 'views/article.php';
    require 'views/footer.php';
    exit;
}

// --- Catégorie ---
if ($route === 'categorie') {
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    if (!$id) {
        header('Location: index.php');
        exit;
    }

    $categorie = $categorieModel->findById($id);
    if (!$categorie) {
        header('Location: index.php');
        exit;
    }

    $articles        = $articleModel->findByCategorie($id);
    $pageTitle       = 'Canopée — ' . $categorie['libelle'];
    $categorieActive = $categorie['id'];

    require 'views/header.php';
    require 'views/categorie.php';
    require 'views/footer.php';
    exit;
}

// --- Page inconnue ---
header('Location: index.php');
exit;
