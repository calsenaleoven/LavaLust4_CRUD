<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Products_model extends Model {

    public function GetData(){
        $data = $this->db->table('products')->get_all();
		return $data;
    }

    public function SelectedData($id){
        $ID = $id;
        $data = $this->db->table('products')->where('id',$ID)->get();
		return $data;
    }

    public function DeleteData($id){
        $ID = $id;
        $data = $this->db->table('products')->where('id',$ID)->delete();
		return $data;
    }

    public function SaveData($name,$description,$price){

        $bind = [
            'name' => $name,
            'description' => $description,
            'price' => $price,
        ];

        return $this->db->table('products')->insert($bind);
    }
    public function UpdateData($Id,$name,$description,$price){
        $ID = $Id;
        $bind = [
            'name' => $name,
            'description' => $description,
            'price' => $price,
        ];

        return $this->db->table('products')->where('id',$ID)->update($bind);
    }
}
?>
