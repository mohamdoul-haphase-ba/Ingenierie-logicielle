<?php

require_once __DIR__ . '/Model.php';

class Article extends Model
{
    protected string $table = 'Article';

    public function findAllWithCategorie(): array
    {
        $sql = 'SELECT a.id, a.titre, a.contenu, a.dateCreation, a.dateModification,
                       c.id AS categorieId, c.libelle AS categorieLibelle
                FROM Article a
                INNER JOIN Categorie c ON a.categorie = c.id
                ORDER BY a.dateCreation DESC';

        return $this->db->query($sql)->fetchAll();
    }

    public function findByCategorie(int $categorieId): array
    {
        $sql = 'SELECT a.id, a.titre, a.contenu, a.dateCreation, a.dateModification,
                       c.id AS categorieId, c.libelle AS categorieLibelle
                FROM Article a
                INNER JOIN Categorie c ON a.categorie = c.id
                WHERE c.id = ?
                ORDER BY a.dateCreation DESC';

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$categorieId]);
        return $stmt->fetchAll();
    }

    public function findByIdWithCategorie(int $id): array|false
    {
        $sql = 'SELECT a.id, a.titre, a.contenu, a.dateCreation, a.dateModification,
                       c.id AS categorieId, c.libelle AS categorieLibelle
                FROM Article a
                INNER JOIN Categorie c ON a.categorie = c.id
                WHERE a.id = ?';

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}
