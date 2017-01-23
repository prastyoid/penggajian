<center>
	<h4>DOK KODJA BAHARI (PERSERO)</h4>
	<h4>KANTOR PUSAT</h4>
	<h4>DAFTAR PEMBAYARAN GAJI (<?php echo $divisi['nama_divisi']; ?>)</h4>
	<h4>Bulan : <?php echo $bulan." ".$tahun; ?></h4>
</center>
<table>
    <thead>
	  <tr>
	    <th rowspan="2">NO.</th>
	    <th rowspan="2">NIP</th>
	    <th rowspan="2">NAMA</th>
	    <th rowspan="2">Gol</th>
	    <th colspan="3" align="center">Penghasilan Tetap</th>
	    <th colspan="2" align="center">Penghasilan Tidak Tetap</th>
			<th rowspan="2" align="center">Lainnya</th>
	    <th rowspan="2" align="center">Uang Makan</th>
	    <th rowspan="2" align="center">Jumlah Kotor</th>
	    <th rowspan="2" align="center">Jumlah Potongan</th>
	    <th rowspan="2" align="center">Jumlah Bersih</th>
	  </tr>
	  <tr>
	  	<th align="center">G.Pokok</th>
	  	<th align="center">PKT</th>
	  	<th align="center">Jabatan</th>
	  	<th align="center">Ins.Jabatan</th>
	  	<th align="center">Pr.Hadir</th>
	  </tr>
	</thead>
	<tbody>
		<?php
			$no = 0;
			foreach ($karyawan as $loadkaryawan) {
				$no++;
				$query = $this->db->query("select sum(nilai) as jumlah from gaji where master='POG' and kode_karyawan='".$loadkaryawan['kode_karyawan']."' and bulan='".$bulan."' and tahun='".$tahun."'");
				$row = $query->row();
				$query1 = $this->db->query("select sum(nilai) as jumlah from gaji where master='PEG' and kode_karyawan='".$loadkaryawan['kode_karyawan']."' and bulan='".$bulan."' and tahun='".$tahun."'");
				$row1 = $query1->row();
				$pkt = intval($loadkaryawan['tperumahan']+$loadkaryawan['tkesehatan']+$loadkaryawan['ttransport']);
				$jumlahkotor1 = intval($loadkaryawan['gajipokok']+$pkt+$loadkaryawan['tjabatan']+$loadkaryawan['insjabatan']+$loadkaryawan['uangmakan']+$row1->jumlah);

				$query2 = $this->db->query("select count(*) as banyak,eventkehadiran.denda from rekamabsensi inner join eventkehadiran on rekamabsensi.kode_event = eventkehadiran.kode_event where kode_karyawan='".$loadkaryawan['kode_karyawan']."' and bulan='".$bulan."' and tahun='".$tahun."' group by rekamabsensi.kode_event");
				$row2 = $query2->row();
				$premihadir = 0;
				foreach ($this->global_model->query("select count(*) as banyak,eventkehadiran.denda from rekamabsensi inner join eventkehadiran on rekamabsensi.kode_event = eventkehadiran.kode_event where kode_karyawan='".$loadkaryawan['kode_karyawan']."' and bulan='".$bulan."' and tahun='".$tahun."' group by rekamabsensi.kode_event") as $loaded) {
						$premihadir = $premihadir + $loaded['banyak']*$loaded['denda'];
				}

				$premihadirasli = intval(880000-$premihadir);
				$jumlahkotor = $jumlahkotor1+$premihadirasli;
				$jumlahbersih = $jumlahkotor-$row->jumlah;
		?>
		<tr>
			<td width="10"><?php echo $no; ?></td>
			<td width="60"><?php echo $loadkaryawan['nip']; ?></td>
			<td width="150"><?php echo $loadkaryawan['nama']; ?></td>
			<td width="40"><?php echo $loadkaryawan['kode_golongan']; ?></td>
			<td align="center"><?php if(isset($loadkaryawan['gajipokok'])){ echo number_format ($loadkaryawan['gajipokok'], 2, ',', '.'); }else{ echo "0";} ?></td>
			<td align="center"><?php if(isset($pkt)){ echo number_format ($pkt, 2, ',', '.'); }else{ echo "0";} ?></td>
			<td align="center"><?php if(isset($loadkaryawan['tjabatan'])){ echo number_format ($loadkaryawan['tjabatan'], 2, ',', '.'); }else{ echo "0";} ?></td>
			<td align="center"><?php if(isset($loadkaryawan['insjabatan'])){ echo number_format ($loadkaryawan['insjabatan'], 2, ',', '.'); }else{ echo "0";} ?></td>
			<td align="center"><?php if(isset($premihadirasli)){ echo number_format ($premihadirasli, 2, ',', '.'); }else{ echo "0";} ?></td>
			<td align="center"><?php if(isset($row1->jumlah)){ echo number_format ($row1->jumlah, 2, ',', '.'); }else{ echo "0";} ?></td>
			<td align="center"><?php if(isset($loadkaryawan['uangmakan'])){ echo number_format ($loadkaryawan['uangmakan'], 2, ',', '.'); }else{ echo "0";} ?></td>
			<td align="center"><?php if(isset($jumlahkotor)){ echo number_format ($jumlahkotor, 2, ',', '.'); }else{ echo "0";} ?></td>
			<td align="center"><?php if(isset($row->jumlah)){ echo number_format ($row->jumlah, 2, ',', '.'); }else{ echo "0";} ?></td>
			<td align="center"><?php if(isset($jumlahbersih)){ echo number_format ($jumlahbersih, 2, ',', '.'); }else{ echo "0";} ?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
