<?php
include_once 'Eintrag.php';

class Tagebuch
{
    /**
     * @param string $content
     * @return void
     */
    public function newEntry(string $content): void
    {
        $dbh = DbConn::get();
        $stmt = $dbh->prepare("INSERT INTO `eintrag` VALUES (NULL, NOW(), NOW(), :content)");
        $stmt->bindParam(':content', $content);
        $stmt->execute();
    }

    /**
     * @param int $id
     * @return void
     */
    public function deleteEntry(int $id): void
    {
        $dbh = DbConn::get();
        $stmt = $dbh->prepare("DELETE FROM `eintrag` WHERE `id` = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    /**
     * @param int $id
     * @param string $content
     * @return void
     */
    public function updateEntry(int $id, string $content): void
    {
        $dbh = DbConn::get();
        $stmt = $dbh->prepare("UPDATE `eintrag` SET `editDate` = NOW(), `content` = :content WHERE `id` = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':content', $content);
        $stmt->execute();
    }

    /**
     * @param int $id
     * @return Eintrag
     */
    public function getEntryById(int $id): Eintrag
    {
        $dbh = DbConn::get();
        $stmt = $dbh->prepare("SELECT * FROM `eintrag` WHERE `id` = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(
            PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,
            'Eintrag',
            [intval('id'), 'createDate', 'editDate', 'content']
        );
        return $stmt->fetch();
    }

    /**
     * @return Eintrag[]
     */
    public function getAllEntries(): array
    {
        $dbh = DbConn::get();
        $stmt = $dbh->prepare("SELECT * FROM `eintrag` ORDER BY `createDate` DESC");
        $stmt->execute();
        $stmt->setFetchMode(
            PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,
            'Eintrag',
            [intval('id'), 'createDate', 'editDate', 'content']
        );
        return $stmt->fetchAll();
    }
}