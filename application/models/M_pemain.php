<?php
class M_pemain extends CI_Model
{

    function getAll()
    {
        $hsl = $this->db->query("SELECT * FROM pemain")->result_array();
        return $hsl;
    }
    function getAllName()
    {
        $hsl = $this->db->query("SELECT nama FROM pemain")->result_array();
        return $hsl;
    }
    
     function getAllValue()
    {
        $hsl = $this->db->query("SELECT fisik,passing,dribbling,shooting,heading,kognitif FROM pemain")->result_array();
        return $hsl;
    }
    function getAllDataPemainTerpilih()
    {
        $hsl = $this->db->query("SELECT * FROM pemainterpilih")->result_array();
        return $hsl;
    }
    function getAllTblPerbandingan()
    {
        $hsl = $this->db->query("SELECT * FROM tblperbandingan")->result_array();
        return $hsl;
    }
    function add($data)
    {
        $this->db->insert('pemain', $data);
    }
    function update($where, $data)
    {
        $this->db->where('id', $where);
        $this->db->update('pemain', $data);
    }
    function delete($id)
    {
        $this->db->delete('pemain', array('id' => $id));
    }
    function deleteAll()
    {
        return $this->db->query("DELETE FROM pemain");
    }
    public function insertMultiple($data)
	{
		$this->db->insert_batch('pemain', $data);
	}
    public function updateMultiple($data)
	{
		$this->db->update_batch('pemain', $data, 'id');
	}
    public function rank()
    {
        $hsl = $this->db->query("SELECT nama,preferensi FROM pemain ORDER BY preferensi DESC")->result_array();
        return $hsl;
    }
    
}
