<?php
class ProductModel extends CI_Model
{
    public $result = [];
    public function __construct()
    {
        parent::__construct();
    }

    public function get(array $limit = null) /* ['offset', 'count'] */
    {
        $this->db->where('status', 'Published');
        if (count($limit) > 0 || $limit != null) {
            if ($limit['offset'] == 0) {
                $this->db->limit($limit['count']);
            } else {
                $this->db->limit($limit['offset'], $limit['count']);
            }
            $this->result = $this->db->get('ecm_products_dataset')->result();
        } else {
            $this->result = $this->db->get('ecm_products_dataset')->result();
        }
        return json_encode($this->result);
    }

    public function get_where(array $where)
    {
        // $this->db->where('status', 'Published');
        if (count($where) > 0 || $where != null) {
            $this->result = $this->db->get_where('ecm_products_dataset', $where)->row();
        }
        return json_encode($this->result);
    }

    public function get_like($keyword, array $limit = null)
    {
        // $this->db->where('status', 'Published');
        if ($limit != null) {
            if (count($limit) > 0) {
                if ($limit['offset'] == 0) {
                    $this->db->limit($limit['count']);
                } else {
                    $this->db->limit($limit['offset'], $limit['count']);
                }
            }
        }
        $this->db->like('name', $keyword);

        $this->result = $this->db->get('ecm_products_dataset')->result();
        return json_encode($this->result);
    }

    public function get_random($limit = null){
        $this->db->order_by('id','random');
        if ($limit != null) {
            if (count($limit) > 0) {
                if ($limit['offset'] == 0 || $limit['offset'] == null) {
                    $this->db->limit($limit['count']);
                } else {
                    $this->db->limit($limit['offset'], $limit['count']);
                }
            }
        }
        if($limit['count'] == 1){
            $this->result = $this->db->get('ecm_products_dataset')->row();
        }else{
            $this->result = $this->db->get('ecm_products_dataset')->result();
        }
        return json_encode($this->result);
    }
}
