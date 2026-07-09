-- Base de données MGLSI News
-- Utilisateur : mglsi_user / passer

CREATE DATABASE IF NOT EXISTS mglsi_news
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE mglsi_news;

CREATE TABLE IF NOT EXISTS Categorie (
    id       INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    libelle  VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS Article (
    id               INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    titre            VARCHAR(255) NOT NULL,
    contenu          TEXT NOT NULL,
    dateCreation     DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    dateModification DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    categorie        INT UNSIGNED NOT NULL,
    CONSTRAINT fk_article_categorie
        FOREIGN KEY (categorie) REFERENCES Categorie(id)
        ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Données de démonstration
INSERT INTO Categorie (libelle) VALUES
    ('Sport'),
    ('Culture'),
    ('Politique'),
    ('Technologie');

INSERT INTO Article (titre, contenu, categorie) VALUES
    ('Victoire historique en finale', 'L''équipe nationale a remporté une victoire mémorable ce week-end, devant des milliers de supporters en liesse. Un match intense qui restera dans les annales du sport français.', 1),
    ('Nouvelle exposition au musée', 'Le musée d''art moderne inaugure une exposition consacrée aux peintres contemporains africains. Une rétrospective unique à ne pas manquer jusqu''à la fin du mois.', 2),
    ('Réforme adoptée au Parlement', 'Les députés ont adopté en première lecture le projet de réforme attendu depuis plusieurs mois. Les débats ont été vifs mais le texte a finalement été approuvé.', 3),
    ('L''IA révolutionne le journalisme', 'Les rédactions s''équipent d''outils d''intelligence artificielle pour assister les journalistes dans la recherche et la rédaction. Une révolution discrète mais profonde.', 4),
    ('Marathon de Paris : les résultats', 'Plus de 50 000 coureurs ont pris le départ dimanche matin sous un soleil radieux. Le vainqueur a établi un nouveau record sur le parcours parisien.', 1);
