<?php

interface Table{

    function getHTML();
    function addHeader($label);
    function addData($data);
}


class HTMLTable implements Table{

    private $headers, $columns;

    function __construct(){
        $this->headers = array();
        $this->columns = array();
    }

    function getHTML()
    {
        $html = "<table>";

        // make headers
        $tableHeaders = array();

        $html .= "<tr>";

        foreach ($this->headers as $header){
            $html .= $this->buildTableHeader($header);
        }

        $html .= "</tr>";


        foreach ($this->columns as $column){
            $html .= "<tr>";

            foreach ($this->headers as $header){
                $html .= "<td>".$column[$header]."</td>";
            }

            $html .= "</tr>";
        }


        return $html."</table>";

    }

    private function buildTableRow($labels){
        $html = "<tr>";

        foreach ($labels as $label){
            $html .= $label;
        }

        return $html. "</tr>";

    }

    private function buildTableData($label){
        return "<td>" .$label. "</td>";
    }

    private function buildTableHeader($label){
        return "<th>". strtoupper($label )."</th>";
    }

    public function addHeader($label)
    {
        array_push($this->headers, $label);
        return $this;
    }

    public function setDatas($datas){
        $this->columns = $datas;
        return $this;
    }

    // Data is an array
    public function addData($data)
    {
        array_push($this->columns, $data);
        return $this;
    }
}

class UserHTMLTable extends HTMLTable{


}



?>