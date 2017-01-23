<center>
	<h4>DOK KODJA BAHARI (PERSERO)</h4>
	<h4>KANTOR PUSAT</h4>
	<h4>DAFTAR POTONGAN GAJI (<?php echo $divisi['nama_divisi']; ?>)</h4>
	<h4>Bulan : <?php echo $bulan." ".$tahun; ?></h4>
</center>
<table>
    <thead>
	  <tr>
	    <th rowspan="2">NO.</th>
	    <th rowspan="2">NIP</th>
	    <th rowspan="2">NAMA</th>
	    <th rowspan="2">Gol</th>
			<?php
				$check = $this->global_model->query("select *from pengaturaninput where master='POG' group by data_master");
				foreach ($check as $ambilheader) {
					$nama = $this->global_model->find_by('jenispotongan', array('kode_jenispotongan' => $ambilheader['data_master']));
					$count = count($this->global_model->find_all_by('pengaturaninput', array('data_master' => $ambilheader['data_master'])));
			?>
	    <th colspan="<?php echo $count;?>" align="center"><?php echo $nama['nama_jenispotongan']; ?></th>
			<?php } ?>
	    <th rowspan="2" align="center">Jumlah Potongan</th>
	  </tr>
	  <tr>
			<?php
				foreach ($check as $ambilheader2) {
					foreach ($this->global_model->query("select *from pengaturaninput where data_master='".$ambilheader2['data_master']."'") as $ambilsub) {
						$namasub = $this->global_model->find_by('jenissubpotongan', array('kode_jenissubpotongan' => $ambilsub['sub_master']));
			?>
	  	<th align="center"><?php echo $namasub['nama_jenissubpotongan'] ?></th>
			<?php } } ?>
	  </tr>
	</thead>
	<tbody>
		<?php
			$no = 0;
			$getdivisi = $this->global_model->find_by('jabatan', array('kode_divisi' => $divisi['kode_divisi']));
			foreach ($this->global_model->find_all_by('karyawan',array('kode_jabatan' => $getdivisi['kode_jabatan'])) as $ambilkaryawan) {
				$no++;
				$query = $this->db->query("select sum(nilai) as jumlah from gaji where master='POG' and kode_karyawan='".$ambilkaryawan['kode_karyawan']."' and bulan='".$bulan."' and tahun='".$tahun."'");
				$row = $query->row();
		?>
		<tr>
			<td width="10"><?php echo $no;?></td>
			<td width="60"><?php echo $ambilkaryawan['nip'];?></td>
			<td width="150"><?php echo $ambilkaryawan['nama'];?></td>
			<td width="40"><?php echo $ambilkaryawan['kode_golongan'];?></td>
			<?php
			foreach ($check as $ambilheader3) {
				foreach ($this->global_model->query("select *from pengaturaninput where data_master='".$ambilheader3['data_master']."'") as $ambilsub2) {
					$gaji = $this->global_model->find_by('gaji', array('sub_master' => $ambilsub2['sub_master'],'bulan' => $bulan, 'tahun' => $tahun,'kode_karyawan' => $ambilkaryawan['kode_karyawan']));
			?>
			<td align="center"><?php if(isset($gaji['nilai'])){ echo number_format ($gaji['nilai'], 2, ',', '.');}else{ echo "0"; } ?></td>
			<?php } } ?>
			<td align="center"><?php if(isset($row->jumlah)){echo number_format ($row->jumlah, 2, ',', '.');}else{ echo "0";} ?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
