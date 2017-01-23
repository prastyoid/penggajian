<center>
	<h4>DOK KODJA BAHARI (PERSERO)</h4>
	<h4>KANTOR PUSAT</h4>
	<h4>DAFTAR Premi Hadir (<?php echo $divisi['nama_divisi']; ?>)</h4>
	<h4>Bulan : <?php echo $bulan." ".$tahun; ?></h4>
</center>
<table>
    <thead>
	  <tr>
	    <th rowspan="2">NO.</th>
	    <th rowspan="2">NIP</th>
	    <th rowspan="2">NAMA</th>
			<?php
				$check = $this->global_model->find_all('eventkehadiran');
				foreach ($check as $ambilheader) {
			?>
	    <th colspan="2" align="center"><?php echo $ambilheader['keterangan']; ?></th>
			<?php } ?>
			<th rowspan="2" align="center">Jumlah</th>
			<th rowspan="2" align="center">Premi hadir</th>
	  </tr>
	  <tr>
			<?php
				foreach ($check as $ambilheader2) {
			?>
	  	<th align="center">Kali</th>
			<th align="center">Harga</th>
			<?php } ?>
	  </tr>
	</thead>
	<tbody>
		<?php
			$no = 0;
			foreach($karyawan as $loadkaryawan){
				$no++;
		?>
		<tr>
			<td width="10"><?php echo $no; ?></td>
			<td width="60"><?php echo $loadkaryawan['nip'];?></td>
			<td width="150"><?php echo $loadkaryawan['nama'];?></td>
			<?php
				foreach ($check as $ambilheader3) {
					$query = $this->db->query("select count(*) as jumlah from rekamabsensi where kode_karyawan='".$loadkaryawan['kode_karyawan']."' and bulan='".$bulan."' and tahun='".$tahun."' and kode_event='".$ambilheader3['kode_event']."'");
					$row = $query->row();
					$denda = $ambilheader3['denda'];
					$harga = intval($row->jumlah*$denda);

					$premihadir = 0;
					foreach ($this->global_model->query("select count(*) as banyak,eventkehadiran.denda from rekamabsensi inner join eventkehadiran on rekamabsensi.kode_event = eventkehadiran.kode_event where kode_karyawan='".$loadkaryawan['kode_karyawan']."' and bulan='".$bulan."' and tahun='".$tahun."' group by rekamabsensi.kode_event") as $loaded) {
							$premihadir = $premihadir + $loaded['banyak']*$loaded['denda'];
					}

					$premihadirasli = intval(880000-$premihadir);
			?>
	  	<td align="center"><?php if(isset($row->jumlah)){ echo $row->jumlah; }else{ echo "0";}?></td>
			<td align="center"><?php if(isset($harga)){ echo number_format ($harga, 2, ',', '.'); }else{ echo "0";}?></td>
			<?php } ?>
			<td align="center"><?php if(isset($premihadir)){ echo number_format ($premihadir, 2, ',', '.'); }else{ echo "0";}?></td>
			<td align="center"><?php if(isset($premihadirasli)){ echo number_format ($premihadirasli, 2, ',', '.'); }else{ echo "0";}?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
