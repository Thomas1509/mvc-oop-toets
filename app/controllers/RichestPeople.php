<?php

class RichestPeople extends Controller
{
    //properties
    private $richestpeopleModel;

    // Dit is de contructor van de controller
    public function __construct()
    {
        // Dit is de model van de controller
        $this->richestpeopleModel = $this->model('RichestPerson');
    }


    public function index()
    {
        $records = $this->richestpeopleModel->getRichestPerson();

        $rows = '';

        foreach ($records as $items) {
            $rows .= "<tr>
                        <td>$items->Id</td>
                        <td>$items->MyName</td>
                        <td>$items->Networth</td>
                        <td>$items->Age</td>
                        <td>$items->Company</td>
                        <td><a href='" . URLROOT . "/richestpeople/delete/$items->Id'>Delete</a></td>
                       </tr>";
        }

        // var_dump($records);
        $data = [
            'title' => 'Overzicht van alle rijke mensen',
            'rows' => $rows
        ];

        $this->view('richestpeople/index', $data);
    }

    public function delete($id = null)
    {
        $this->richestpeopleModel->deleteRichestPerson($id);
        echo 'Record is succesvol verwijderd';
        header("Refresh:3; " . URLROOT . "/richestpeople/index");
    }
}
