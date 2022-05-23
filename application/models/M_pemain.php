<?php
class M_pemain extends CI_Model
{

    function getAll()
    {
        $hsl = $this->db->query("SELECT * FROM pemain")->result_array();
        return $hsl;
    }
    
     function getAllValue()
    {
        $hsl = $this->db->query("SELECT fisik,passing,dribbling,shooting,heading,kognitif FROM pemain")->result_array();
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
    public function insert_multiple($data)
	{
		$this->db->insert_batch('pemain', $data);
	}
    public function update_multiple($data)
	{
		$this->db->update_batch('pemain', $data, 'id');
	}
    public function rank()
    {
        $hsl = $this->db->query("SELECT nama,preferensi FROM pemain ORDER BY preferensi DESC")->result_array();
        return $hsl;
    }
    
}
