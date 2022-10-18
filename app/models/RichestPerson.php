<?php

/**
 * Dit is de model van de controller
 */

class RichestPerson
{
    //properties
    private $db;
    // Dit is een contsructor van de RichestPerson model class
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getRichestPeople()
    {
        $this->db->query('SELECT * FROM RichestPeople');
        return $this->db->resultSet();
    }

    public function getSingleRichestPerson($id)
    {
        $this->db->query('SELECT * FROM RichestPeople WHERE id = :id');
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->single();
    }

    public function deleteRichestPerson($id)
    {
        $this->db->query("DELETE FROM RichestPeople WHERE id = :id");
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->execute();
    }
}
