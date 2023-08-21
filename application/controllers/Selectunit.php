<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Selectunit extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Select_model', 'mselect');
 }

 public function index()
 {
    $getdata = $this->mselect->getdataUnit();
    $data['dataUnit'] = $getdata;
    $this->load->view('afdeling/select_unit', $data);
 }

 public function getdataAfdeling(){
  $id_unit = $this->input->post('unit');

  $getdataafd  = $this->mselect->getdataafd($id_unit);



  echo  json_encode($getdataafd);
}
}