<?php

namespace Projet4\Model\Frontend;

require_once 'Model/Manager.php';

use Projet4\Model\Manager;

/**
  * Manage calls to db for the books
  *
  * @author  David Roche <davidroche83400@gmail.com
  *
*/
class BooksManager extends Manager
{
    /**
     * Return the books list
     *
     * @return [mixed]
     */
    public function getBooks()
    {
        $sql = 'SELECT id, author, bookImage, title, content, DATE_FORMAT(parutionDate, \'%d/%m/%Y\') AS parutionFrDate FROM books ORDER BY id DESC';
        $books = $this->executeRequest($sql);
        return $books;
    }

    /**
     * Return the requested book
     *
     * @param [int] $bookId
     * @return [mixed]
     */
    public function getBook($bookId)
    {
        $sql = 'SELECT id, author, bookImage, title, content, DATE_FORMAT(parutionDate, \'%d/%m/%Y\') AS parutionFrDate FROM books WHERE id = ?';
        $book = $this->executeRequest($sql, array($bookId));
        if ($book->rowCount() > 0)
        {
            return $book->fetch(); // Accès à la première ligne de résultat
        }
        else
        {
            throw new \exception ("Aucun roman ne correspond à l'identifiant '$bookId'");
        }
    }

    /**
     * Return the last four books
     * 
     *  @return [mixed]
     */
    public function getLastBooks()
    {
        $sql = 'SELECT id, author, bookImage, title, content, DATE_FORMAT(parutionDate, \'%d/%m/%Y\') AS parutionFrDate FROM books ORDER BY id DESC LIMIT 4';
        $lastBooks = $this->executeRequest($sql);
        return $lastBooks;
    }
}