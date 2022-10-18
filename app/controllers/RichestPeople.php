<?php

class RichestPeople extends Controller
{
    //properties
    private $richestpeopleModel;

    // Dit is de contructor van de controller
    public function __construct()
    {
        // Dit is de model van de controller
        $this->richestpeopleModel = $this->model('Richestpeople');
    }


    public function index()
    {
        $records = $this->richestpeopleModel->getRichestPerson();

        $rows = '';

        foreach ($records as $items) {
            $rows .= "<tr>
                        <td>$items->id</td>
                        <td>$items->Name</td>
                        <td>$items->CapitalCity</td>
                        <td>$items->Continent</td>
                        <td>$items->Population</td>
                        <td><a href='" . URLROOT . "/richestpeople/delete/$items->id'>Delete</a></td>
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
        header("Location: " . URLROOT . "/richestpeople/index");
    }
}
