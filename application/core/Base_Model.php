<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 */
abstract class Base_Model extends Super_Base_Model
{

    public static $is_active = array(
        1 => "Yes",
        0 => "No"
    );

    public static $admin_type = array(
        1 => "Superadmin",
        2 => "Admin",
        3 => "Viewer",
    );

    /**
     * Constructor, use child implementation to set protected class variables.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * this function is for private use only, to get query result as a single row only.
     */
    protected function _get_row()
    {
        $result = $this->db->get()->row_array();

        //special section to get admin / admin name for the last_updated_by and deleted_by.
        $this->load->model('admin/Admin_model');
        $param = array(
            "row_array" => true,
            "select" => "name"
        );

        if (isset($result['created_by']) && $result['created_by'] != 0) {
            $param["conditions"] = array("admin_id" => $result['created_by']);
            $admin_name = $this->Admin_model->get_all_data($param)['datas'];
            $result['created_by_name'] = $admin_name ? $admin_name['name'] : "";
        }

        if (isset($result['last_updated_by']) && $result['last_updated_by'] != 0) {
            $param["conditions"] = array("admin_id" => $result['last_updated_by']);
            $admin_name = $this->Admin_model->get_all_data($param)['datas'];
            $result['last_updated_by_name'] = $admin_name ? $admin_name['name'] : "";
        }

        if (isset($result['deleted_by']) && $result['deleted_by'] != 0) {
            $param["conditions"] = array("admin_id" => $result['deleted_by']);
            $admin_name = $this->Admin_model->get_all_data($param)['datas'];
            $result['deleted_by_name'] = $admin_name ? $admin_name['name'] : "";
        }

        if (isset($result['is_active']) && array_key_exists($result['is_active'], self::$is_active) === TRUE) {
            $result['is_active_name'] = self::$is_active[$result['is_active']];
        }

        if (isset($result['admin_type']) && array_key_exists($result['admin_type'], self::$admin_type) === TRUE) {
            $result['admin_type_name'] = self::$admin_type[$result['admin_type']];
        }

        //execute extends in child class.
        $result = $this->_extend_get_row($result);

        return $result;
    }

    /**
     * this function is for private use only, to get query result as array.
     */
    protected function _get_array()
    {
        $result = $this->db->get()->result_array();

        if (count($result) > 0) {
			foreach ($result as $key => $data) {
                //special section to get admin / admin name for the last_updated_by and deleted_by.
                $this->load->model('admin/Admin_model');
                $param = array(
                    "row_array" => true,
                    "select" => "name"
                );

                if (isset($data['created_by']) && $data['created_by'] != 0) {
                    $param["conditions"] = array("admin_id" => $data['created_by']);
                    $admin_name = $this->Admin_model->get_all_data($param)['datas'];
                    $result[$key]['created_by_name'] = $admin_name ? $admin_name['name'] : "";
                }

                if (isset($data['last_updated_by']) && $data['last_updated_by'] != 0) {
                    $param["conditions"] = array("admin_id" => $data['last_updated_by']);
                    $admin_name = $this->Admin_model->get_all_data($param)['datas'];
                    $result[$key]['last_updated_by_name'] = $admin_name ? $admin_name['name'] : "";
                }

                if (isset($result[$key]['deleted_by']) && $result[$key]['deleted_by'] != 0) {
                    $param["conditions"] = array("admin_id" => $result[$key]['deleted_by']);
                    $admin_name = $this->Admin_model->get_all_data($param)['datas'];
                    $result[$key]['deleted_by_name'] = $admin_name ? $admin_name['name'] : "";
                }

                if (isset($data['is_active']) && array_key_exists($data['is_active'], self::$is_active) === TRUE) {
                    $result[$key]['is_active_name'] = self::$is_active[$data['is_active']];
                }

                if (isset($data['admin_type']) && array_key_exists($data['admin_type'], self::$admin_type) === TRUE) {
                    $result[$key]['admin_type_name'] = self::$admin_type[$data['admin_type']];
                }


            }
		}

        //execute extends in child class.
        $result = $this->_extend_get_array($result);

        return $result;
    }

}
