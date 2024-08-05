<?php 
class Prodi_model extends CI_Model {
    public function get_all_prodi() {
        return $this->db->get('m_prodi')->result_array();
    }
}
?>