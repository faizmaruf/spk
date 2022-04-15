<?php
class M_pemain extends CI_Model
{

    function getAll()
    {
        $hsl = $this->db->query("SELECT * FROM pemain")->result_array();
        return $hsl;
    }
}
