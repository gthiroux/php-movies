<?php

namespace Models;

use Exception;
use PDO;

class Movie extends Database
{
    private $id;
    private $title;
    private $type;
    private $genre;
    private $rating;
    private $is_watched;
    public $allMovies;

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($value)
    {
        if (empty($value)) throw new Exception('Title is required');
        if (strlen($value) < 0 && strlen($value) > 255) throw new Exception('Title must be under 255 characters');

        $this->title = htmlspecialchars($value);
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($value)
    {
        $value = strtolower($value);
        if (empty($value)) throw new Exception('Type is required');
        if ($value != 'film' && $value != 'serie') throw new Exception('Type must be film or serie');

        $this->type = htmlspecialchars($value);
    }
    public function getRating()
    {
        return $this->rating;
    }

    public function setRating($value)
    {
        if ($value >= 1 && $value <= 5 && !empty($value)) throw new Exception('Rating is must be between 1 and 5');
        if (empty($value)) {
            $value = NULL;
        }

        $this->rating = $value;
    }

    public function getIsWatched()
    {
        return $this->is_watched;
    }

    public function setIsWatched($value)
    {
        $value = strtoupper($value);
        if (empty($value)) throw new Exception('Information of watching or not is required');
        if ($value != 'Y' && $value != 'N') throw new Exception('This information is must be Y for yes or N for no');
        if ($value == 'Y') {

            $this->is_watched = True;
        }
        if ($value == 'N') {

            $this->is_watched = False;
        }
    }
    public function getGenre()
    {
        return $this->genre;
    }

    public function setGenre($value)
    {
        if ($value >= 1 && $value <= 5 && !empty($value)) throw new Exception('Rating is must be between 1 and 5');

        $this->genre = htmlspecialchars($value);
    }

    public function getAll()
    {
        $sql = "SELECT * FROM `movies` ORDER BY 'created_at' DESC";

        $queryExecute = $this->db->prepare($sql);
        $queryExecute->execute();
        return $queryExecute->fetchAll();
    }
    public function saveMovie()
    {
        $queryExecute = $this->db->prepare("INSERT INTO `movies`(`title`, `type`, `genre`,`rating`, `is_watched`) 
			VALUES (:title, :type, :genre, :rating , :is_watched)");

        $queryExecute->bindValue(':title', $this->title, PDO::PARAM_STR);
        $queryExecute->bindValue(':type', $this->type, PDO::PARAM_STR);
        $queryExecute->bindValue(':genre', $this->genre, PDO::PARAM_STR);
        $queryExecute->bindValue(':rating', $this->rating, PDO::PARAM_INT);
        $queryExecute->bindValue(':is_watched', $this->is_watched, PDO::PARAM_BOOL);

        return $queryExecute->execute();
    }
}
