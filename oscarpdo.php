<?php
require_once("dbvezerlopdo.php");

class Oscar {
    private $oscars = [];
    private $db;

    public function __construct() {
        $this->db = new DBController();
        $query = "SELECT m_ID, title, m_desc, pic FROM movie";
        $this->oscars = $this->db->executeSelectQuery($query);
    }

    public function getAllOscars() {
        $query = 'SELECT m_ID, title, m_desc, pic FROM movie';
        return $this->db->executeSelectQuery($query);
    }

    public function getOscarsById($OscarId) {
        $query = "SELECT m_ID, title, m_desc, pic FROM movie WHERE m_ID = ?";
        return $this->db->executeSelectQuery($query, [$OscarId]);
    }

    public function getOscarsByType($Mt_name) {
        $query = "SELECT m_ID, title, m_desc, pic, movie_type.Mt_description
                  FROM movie
                  INNER JOIN movie_type ON movie_type.mt_ID = movie.m_type
                  WHERE movie_type.Mt_name = ?";
        return $this->db->executeSelectQuery($query, [$Mt_name]);
    }
}

?>