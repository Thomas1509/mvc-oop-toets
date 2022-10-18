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

    public function getRichestPerson()
    {
        $this->db->query('SELECT * FROM RichestPeople ORDER BY Networth DESC;');
        return $this->db->resultSet();
    }

    public function deleteRichestPerson($id)
    {
        $this->db->query("DELETE FROM RichestPeople WHERE Id = :Id");
        $this->db->bind(':Id', $id, PDO::PARAM_INT);
        return $this->db->execute();
    }
}
