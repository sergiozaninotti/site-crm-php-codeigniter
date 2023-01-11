<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cms_model extends CI_Model
{

    function  __construct()
    {
        parent::__construct();
    }

    public function get_data_array($table, $order = NULL, $by = NULL)
    {

        if (empty($order)) :
            return $results = $this->db->get($table)->result_array();
        else :
            return $results = $this->db
                ->order_by($order, $by)
                ->get($table)->result_array();
        endif;
    }

    public function get_data($table, $column, $user_id = NULL)
    {
        $this->db
            ->select($column)
            ->from($table)
            ->where("user_id", $user_id);
        $result = $this->db->get();

        if ($result->num_rows() > 0) :
            return $result->row();
        else :
            return NULL;
        endif;
    }

    public function get_anyData($table, $column, $where, $filter)
    {
        $this->db
            ->select($column)
            ->from($table)
            ->where($where, $filter);
        $result = $this->db->get();

        if ($result->num_rows() > 0) :
            return $result->row();
        else :
            return NULL;
        endif;
    }

    public function get_allData($table, $where, $filter)
    {
        $result = $this->db
            ->where($where, $filter)
            ->get($table);

        if ($result->num_rows() > 0) :
            return $result->row();
        else :
            return NULL;
        endif;
    }

    public function insert($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function update($table, $user_id, $data)
    {
        $this->db
            ->set($data)
            ->where('user_id', $user_id)
            ->update($table);
    }

    public function updateAny($table, $where, $filter, $data)
    {
        $this->db
            ->set($data)
            ->where($where, $filter)
            ->update($table);
    }

    public function delete($table, $user_id)
    {
        $this->db
            ->where('user_id', $user_id)
            ->delete($table);
    }

    public function count($table)
    {
        return $this->db->count_all_results($table);
    }
}
