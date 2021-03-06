<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jenispembayaran extends CI_Controller {

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

 		$data['jenispembayaran'] = $this->global_model->find_all('jenispembayaran');
 		//load tampilan html
 		$this->load->view('head/dash/index');
 		$this->load->view('konten/jenispembayaran/index', $data);
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

 			$kode = $this->input->post('kode_jenispembayaran');
 			$nama = $this->input->post('nama_jenispembayaran');

 			$data = $this->input->post();

 			//variable untuk cek
 			$listfield = array('kode_jenispembayaran', 'nama_jenispembayaran');

 			$listdata = array($kode,$nama);

 			$listtext = array('kode','nama');

 			//variable untuk texterror
 			$texterror = "";

 			if($kode == "" || $nama == ""){
 				$this->message('danger','kode atau nama jenis pembayaran tidak boleh kosong','indexjenispembayaran');
 			}else{
 				//cek data sama atau tidak
 				for($i = 0; $i < count($listfield); $i++){
 					$sql = $this->global_model->find_all_by('jenispembayaran', array($listfield[$i] => $listdata[$i]));
 					if(count($sql) > 0){
 						$texterror = $texterror." ".$listtext[$i];
 					}
 				}

 				if($texterror != ""){
 					$this->message('danger',$texterror.' jenis pembayaran sudah tersedia','indexjenispembayaran');

 				}else if($texterror == ""){
 					//simpan ke dalam database
 					$data = $this->input->post();
 					unset($data['simpandata']);
 					$data['kode_jenispembayaran'] = strtoupper($kode);

 					$this->global_model->create('jenispembayaran', $data);

 					$this->message('success','data berhasil di tambah','indexjenispembayaran');
 				}
 			}

 		}

 		redirect(site_url('jenispembayaran'));

 	}

 	public function edit($id){
 		if($this->input->post('editdata')){
 			$kode = $this->input->post('kode_jenispembayaran');
 			$nama = $this->input->post('nama_jenispembayaran');

 			$data = $this->input->post();

 			//variable untuk cek
 			$listfield = array('kode_jenispembayaran', 'nama_jenispembayaran');

 			$listdata = array($kode,$nama);

 			$listtext = array('kode','nama');

 			//variable untuk texterror
 			$texterror = "";

 			$getdata = $this->global_model->find_by('jenispembayaran', array('kode_jenispembayaran' => $id));

 			if($kode == "" || $nama == ""){
 				$this->message('danger','kode atau nama jenis pembayaran tidak boleh kosong','indexjenispembayaran');
 			}else{
 				//cek data sama atau tidak
 				for($i = 0; $i < count($listfield); $i++){
 					$sql = $this->global_model->find_by('jenispembayaran', array($listfield[$i] => $listdata[$i]));
 					if(count($sql) > 0 && $sql['kode_jenispembayaran'] != $id && $sql['nama_jenispembayaran'] != $getdata['nama_jenispembayaran']){
 						$texterror = $texterror." ".$listtext[$i];
 					}
 				}

 				if($texterror != ""){
 					$this->message('danger',$texterror.' jenis pembayaran sudah tersedia','indexjenispembayaran');

 				}else if($texterror == ""){
 					//simpan ke dalam database
 					$data = $this->input->post();
 					unset($data['editdata']);
 					$data['kode_jenispembayaran'] = strtoupper($kode);

 					$this->global_model->update('jenispembayaran', $data, array('kode_jenispembayaran' => $id));

 					$this->message('success','data berhasil di edit','indexjenispembayaran');
 				}
 			}
 		}

 		redirect(site_url('jenispembayaran'));

 	}

 	public function tampil($id){
 		$sql = $this->global_model->find_by('jenispembayaran', array('kode_jenispembayaran' => $id));
 		echo json_encode($sql);
 	}

 	public function hapus(){
 		$chkbox = $this->input->post('check');
 		if(is_array($chkbox)){
 			for($i = 0; $i < count($chkbox); $i++){
 				$this->global_model->delete('jenispembayaran', array('kode_jenispembayaran' => $chkbox[$i]));
 			}

 			$this->message('success','data berhasil di hapus','indexjenispembayaran');
 		}

 		redirect(site_url('jenispembayaran'));

 	}
}
