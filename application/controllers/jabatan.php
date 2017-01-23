<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jabatan extends CI_Controller {

	function __construct()
 	{
 		parent::__construct();
 		$this->load->model('global_model');
 		$this->load->helper('url');
 		$this->load->library('session');

		if(!$this->session->userdata('namalengkap','namauser','status'))
    {
      redirect(site_url('/'));
    }
		
 	}

 	public function index(){

 		$data['jabatan'] = $this->global_model->find_all('jabatan');
 		$data['divisi']	= $this->global_model->find_all('divisi');

 		//load tampilan html
 		$this->load->view('head/dash/index');
 		$this->load->view('konten/jabatan/index', $data);
 		$this->load->view('footer/dash/index');

 	}

 	//fungsi ini untuk generate message
 	public function message($mode,$text,$active)
 	{
 		//generate message
 		$messagesession = array(
 			'messagemode' => $mode,
 			'messagetext' => $text,
 			'messageactive' => $active);

 		$this->session->set_flashdata($messagesession);
 	}

 	public function tambah(){
 		if($this->input->post('simpandata')){

 			$kode = $this->input->post('kode_jabatan');
 			$nama = $this->input->post('nama_jabatan');

 			$data = $this->input->post();

 			//variable untuk cek
 			$listfield = array('kode_jabatan', 'nama_jabatan');

 			$listdata = array($kode,$nama);

 			$listtext = array('kode','nama');

 			//variable untuk error
 			$texterror = "";

 			if($kode == "" || $nama == ""){
 				$this->message('danger','kode atau nama jabatan tidak boleh kosong','indexjabatan');
 			}else{
 				//cek data sama atau tidak
 				for($i = 0; $i < count($listfield); $i++){
 					$sql = $this->global_model->find_all_by('jabatan', array($listfield[$i] => $listdata[$i]));
 					if(count($sql) > 0){
 						$texterror = $texterror." ".$listtext[$i];
 					}
 				}

 				if($texterror != ""){
 					$this->message('danger',$texterror.' jabatan sudah tersedia','indexjabatan');

 				}else if($texterror == ""){
 					//simpan ke dalam database
 					$data = $this->input->post();
 					unset($data['simpandata']);
 					$data['kode_jabatan'] = strtoupper($kode);

 					$this->global_model->create('jabatan', $data);

 					$this->message('success','data berhasil di tambah','indexjabatan');
 				}
 			}

 		}

 		redirect(site_url('jabatan'));

 	}

 	public function edit($id){
 		if($this->input->post('editdata')){

 			$kode = $this->input->post('kode_jabatan');
 			$nama = $this->input->post('nama_jabatan');

 			$data = $this->input->post();

 			//variable untuk cek
 			$listfield = array('kode_jabatan', 'nama_jabatan');

 			$listdata = array($kode,$nama);

 			$listtext = array('kode','nama');

 			//variable untuk texterror
 			$texterror = "";

 			$getdata = $this->global_model->find_by('jabatan', array('kode_jabatan' => $id));

 			if($kode == "" || $nama == ""){
 				$this->message('danger','kode atau nama jabatan tidak boleh kosong','indexjabatan');
 			}else{
 				//cek data sama atau tidak
 				for($i = 0; $i < count($listfield); $i++){
 					$sql = $this->global_model->find_by('jabatan', array($listfield[$i] => $listdata[$i]));
 					if(count($sql) > 0 && $sql['kode_jabatan'] != $id && $sql['nama_jabatan'] != $getdata['nama_jabatan']){
 						$texterror = $texterror." ".$listtext[$i];
 					}
 				}

 				if($texterror != ""){
 					$this->message('danger',$texterror.' jabatan sudah tersedia','indexjabatan');

 				}else if($texterror == ""){
 					//simpan ke dalam database
 					$data = $this->input->post();
 					unset($data['editdata']);
 					$data['kode_jabatan'] = strtoupper($kode);

 					$this->global_model->update('jabatan', $data, array('kode_jabatan' => $id));

 					$this->message('success','data berhasil di edit','indexjabatan');
 				}
 			}

 		}

 		redirect(site_url('jabatan'));

 	}

 	public function tampil($id){
 		$sql = $this->global_model->find_by('jabatan', array('kode_jabatan' => $id));
 		echo json_encode($sql);

 	}

 	public function hapus(){
	 	$chkbox = $this->input->post('check');
	 		if(is_array($chkbox)){
	 			for($i = 0; $i < count($chkbox); $i++){
	 				$this->global_model->delete('jabatan', array('kode_jabatan' => $chkbox[$i]));

	 			}
	 			$this->message('success','data berhasil di hapus','indexjabatan');
	 		}

	 		redirect(site_url('jabatan'));
 	}
}
