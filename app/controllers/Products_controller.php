<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Products_controller extends Controller {

    public function __construct(){
        parent:: __construct();
        $this->call->model('Products_model');
    }

    public function DisplayData() {
        $data = [
            'products' => $this->Products_model->GetData(),
        ];

        $this->call->view('viewfile', $data);
    }

    public function Save() {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];

        if($id != null) {
            $result = $this->Products_model->UpdateData($id,$name,$description,$price);
            if($result) {
                $data = [
                    'products' => $this->Products_model->GetData(),
                    'msg' => 'Updated Sucessfully!',
                ];
                $this->call->view('viewfile', $data);
            }
            else{
                $data = [
                    'products' => $this->Products_model->GetData(),
                    'msg' => 'Something Went Wrong',
                ];
                $this->call->view('viewfile', $data);
            }
        }else{
            $result = $this->Products_model->SaveData($name,$description,$price);
            if($result) {
                $data = [
                    'products' => $this->Products_model->GetData(),
                    'msg' => 'Saved Sucessfully!',
                ];
                $this->call->view('viewfile', $data);
            }
            else{
                $data = [
                    'products' => $this->Products_model->GetData(),
                    'msg' => 'Something Went Wrong',
                ];
                $this->call->view('viewfile', $data);
            }
        };
    }

    public function Edit($id) {
        $ID = $id;
        $data = [
            'selected' => $this->Products_model->SelectedData($ID),
            'products' => $this->Products_model->GetData(),
        ];

        $this->call->view('viewfile', $data);
    }

    public function Delete($id) {
        $ID = $id;
        $result = $this->Products_model->DeleteData($ID);
        if($result) {
            $data = [
                'products' => $this->Products_model->GetData(),
                'msg' => 'Deleted Sucessfully!',
            ];
            $this->call->view('viewfile', $data);
        }
        else{
            $data = [
                'products' => $this->Products_model->GetData(),
                'msg' => 'Something Went Wrong',
            ];
            $this->call->view('viewfile', $data);
        }

    }

}
?>
