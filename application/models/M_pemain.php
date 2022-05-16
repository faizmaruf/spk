<?php
class M_pemain extends CI_Model
{

    function getAll()
    {
        $hsl = $this->db->query("SELECT * FROM pemain")->result_array();
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
}
