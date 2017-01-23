<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Golongan extends CI_Controller {

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

 		$data['golongan'] = $this->global_model->query("select *from golongan where kode_golongan like '%00'");

 		//load tampilan html
 		$this->load->view('head/dash/index');
 		$this->load->view('konten/golongan/index', $data);
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

 			$tingkatan = $this->input->post('tingkatan');
 			$jenistingkatan = $this->input->post('jenistingkatan');
 			$banyak = $this->input->post('banyak');
 			$nama = $this->input->post('nama_golongan');

 			$sample = $tingkatan."-".$jenistingkatan;

 			if($tingkatan == "" || $jenistingkatan == "" || $banyak == "" || $banyak == "0" || $nama == ""){
 				$this->message('danger','data tidak boleh kosong','indexgolongan');
 			}else{
 				//cek data sama atau tidak
 				$check = $this->global_model->query("select *from golongan where kode_golongan like '".$sample."%'");

 				if($check != Null){
 					$this->message('danger','tingkatan sudah tersedia','indexgolongan');
 				}else{
 					$data = $this->input->post();
 					unset($data['simpandata']);
 					//simpan ke dalam database
 					for($i = 0; $i < intval($banyak); $i++){

 						if ($i >= 0 and $i <= 9){
							$a = $sample."0".$i;
			 			}else if($i >= 10 and $i <= 99){
			 				$a = $sample.$i;
			 			}

 						$kumpuldata = array(
 							'kode_golongan' => $a,
 							'nama_golongan' => $nama,
 							'gajipokok' => $this->input->post('gajipokok'),
 							'tperumahan' => $this->input->post('tperumahan'),
 							'tkesehatan' => $this->input->post('tkesehatan'),
 							'ttransport' => $this->input->post('ttransport'),
 							'uangmakan' => $this->input->post('uangmakan'));

 						$this->global_model->create('golongan', $kumpuldata);
 					}

 					$this->message('success','data berhasil di tambah','indexgolongan');
 				}

 			}

 		}

 		redirect(site_url('golongan'));

 	}

 	public function edit($id){
 		if($this->input->post('editdata')){

 			$tingkatan = $this->input->post('tingkatan');
 			$jenistingkatan = $this->input->post('jenistingkatan');
 			$banyak = $this->input->post('banyak');
 			$nama = $this->input->post('nama_golongan');

 			$sample = $tingkatan."-".$jenistingkatan;

 			$checkdata = $this->global_model->query("select *from golongan where kode_golongan like '".$id."%'");
 			$jumlahcheck = count($checkdata);

 			$masukdata1 = array();

 			if($tingkatan == "" || $jenistingkatan == "" || $banyak == "" || $banyak == "0" || $nama == ""){
 				$this->message('danger','data tidak boleh kosong','indexgolongan');
 			}else{
 				//cek data sama atau tidak
 				$check = $this->global_model->query("select *from golongan where kode_golongan like '".$sample."%'");

 				if($check != Null && $sample != $id){
 					$this->message('danger','tingkatan sudah tersedia','indexgolongan');
 				}else{

 					foreach ($checkdata as $key) {
 						$masukdata1[] = $key['kode_golongan'];
 					}

 					//update kode golongan
 					for($j = 0; $j < $jumlahcheck; $j++){
 						$c = intval($j);
 						if ($c >= 0 and $c <= 9){

							$b = $sample."0".$c;
				 		}else if($c >= 10 and $c <= 99){
				 			$b = $sample.$c;
				 		}

 						$update = array(
 							'kode_golongan' => $b,
 							'nama_golongan' => $nama,
 							'gajipokok' => $this->input->post('gajipokok'),
 							'tperumahan' => $this->input->post('tperumahan'),
 							'tkesehatan' => $this->input->post('tkesehatan'),
 							'ttransport' => $this->input->post('ttransport'),
 							'uangmakan' => $this->input->post('uangmakan'));

 						$this->global_model->update('golongan',$update, array('kode_golongan' => $masukdata1[$j]));
 					}
 					/*jika ada perubahan data + -*/
 					//jika lebih banyak maka event tambah, sebaliknya maka event hapus
	 				if(intval($banyak) > $jumlahcheck){
	 					for($i = $jumlahcheck+1; $i <= intval($banyak); $i++){
	 						if ($i >= 0 and $i <= 9){
								$a = $sample."0".$i;
				 			}else if($i >= 10 and $i <= 99){
				 				$a = $sample.$i;
				 			}

				 			$insertdata = array(
 							'kode_golongan' => $a,
 							'nama_golongan' => $nama,
 							'gajipokok' => $this->input->post('gajipokok'),
 							'tperumahan' => $this->input->post('tperumahan'),
 							'tkesehatan' => $this->input->post('tkesehatan'),
 							'ttransport' => $this->input->post('ttransport'),
 							'uangmakan' => $this->input->post('uangmakan'));

 							$this->global_model->create('golongan', $insertdata);
	 					}

	 				}

	 				if(intval($banyak) < $jumlahcheck){

	 					for ($j= intval($banyak); $j < $jumlahcheck; $j++) {

		 					if ($j >= 0 and $j <= 9){
								$cari = $sample."0".$j;
					 		}else if($j >= 10 and $j <= 99){
					 			$cari = $sample.$j;
					 		}

					 		$hapusdata = array(
	 						'kode_golongan' => $cari);

		 					$this->global_model->delete('golongan', $hapusdata);
	 					}
	 				}

	 				$this->message('success','data berhasil di edit','indexgolongan');

 				}
 			}

 		}

 		redirect(site_url('golongan'));

 	}

 	public function tampil($id){
 		$sql = "select *from golongan where kode_golongan like '$id%'";
 		$query = $this->db->query($sql);
 		$row = $query->row();

 		$pisah = explode('-', $row->kode_golongan);
        $gettingkat = $pisah[0];
        $getletter = substr($pisah[1], 0,1);
        $banyak = count($this->global_model->query($sql));

 		$data = array(
 			'tingkatan' => $gettingkat,
 			'jenistingkatan' => $getletter,
 			'banyak' => $banyak,
 			'nama' => $row->nama_golongan,
 			'gajipokok' => $row->gajipokok,
 			'tperumahan' => $row->tperumahan,
 			'tkesehatan' => $row->tkesehatan,
 			'ttransport' => $row->ttransport,
 			'uangmakan' => $row->uangmakan);

 		echo json_encode($data);
 	}

 	public function hapus(){
 		$chkbox = $this->input->post('check');
 		if(is_array($chkbox)){
 			for($i= 0; $i < count($chkbox);$i++){
 				foreach ($this->global_model->query("select *from golongan where kode_golongan like '$chkbox[$i]%'") as $key) {
 					$this->global_model->delete('golongan', array('kode_golongan' => $key['kode_golongan']));
 				}
 			}

 			$this->message('success','data berhasil di hapus','indexgolongan');
 		}

 		redirect(site_url('golongan'));

 	}

}
