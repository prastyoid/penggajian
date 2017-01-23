<center>
	<label class="label">DOK KODJA BAHARI (Persero)</label>
	<label>KANTOR PUSAT</label>
</center>
<br><br>
<table>
	<tr>
		<td>UNIT</td>
		<td>:</td>
		<td>KANTOR PUSAT</td>
	</tr>
	<tr>
		<td>SUB.UNIT</td>
		<td>:</td>
		<td><?php if(isset($fetchdata['divisi'])){echo $fetchdata['divisi'];}else{ echo "-";}?></td>
	</tr>
</table>
<div style="border:1px dotted black;"></div><br>
<table>
	<tr>
		<td>NAMA</td>
		<td>:</td>
		<td><?php if(isset($fetchdata['namakaryawan'])){echo $fetchdata['namakaryawan'];}else{ echo "-";}?></td>
	</tr>
	<tr>
		<td>GOLONGAN</td>
		<td>:</td>
		<td><?php if(isset($fetchdata['golongan'])){echo $fetchdata['golongan'];}else{ echo "-";}?></td>
	</tr>
	<tr>
		<td>STATUS</td>
		<td>:</td>
		<td><?php if(isset($fetchdata['status'])){echo $fetchdata['status'];}else{ echo "-";}?></td>
	</tr>
	<tr>
		<td>PERIODE</td>
		<td>:</td>
		<td><?php $a = $bulan." ".$tahun; echo strtoupper($a); ?></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>PENGHASILAN TETAP</td>
		<td></td>
	</tr>
	<tr>
		<td>G.POKOK</td>
		<td>: </td>
		<td>Rp. <?php if(isset($fetchdata['gajipokok'])){echo $fetchdata['gajipokok'];}else{ echo "-";}?></td>
	</tr>
	<tr>
		<td>T. PERUMAHAN</td>
		<td>: </td>
		<td>Rp. <?php if(isset($fetchdata['tperumahan'])){echo $fetchdata['tperumahan'];}else{ echo "-";}?></td>
	</tr>
	<tr>
		<td>T. KESEHATAN</td>
		<td>: </td>
		<td>Rp. <?php if(isset($fetchdata['tkesehatan'])){echo $fetchdata['tkesehatan'];}else{ echo "-";}?></td>
	</tr>
	<tr>
		<td>T. TRANSPORT</td>
		<td>: </td>
		<td>Rp. <?php if(isset($fetchdata['ttransport'])){echo $fetchdata['ttransport'];}else{ echo "-";}?></td>
	</tr>
	<tr>
		<td>T. JABATAN</td>
		<td>: </td>
		<td>Rp. <?php if(isset($fetchdata['tjabatan'])){echo $fetchdata['tjabatan'];}else{ echo "-";}?></td>
	</tr>
	<tr>
		<td><b>TOTAL</b></td>
		<td>: </td>
		<td>Rp. <?php if(isset($fetchdata['jumlahphslnttp'])){echo $fetchdata['jumlahphslnttp'];}else{ echo "-";}?></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>PENGHASILAN TIDAK TETAP</td>
		<td></td>
	</tr>
	<tr>
		<td>PREMI HADIR</td>
		<td>: </td>
		<td>Rp. <?php if(isset($fetchdata['premi'])){echo $fetchdata['premi'];}else{ echo "-";}?>
		</td>
	</tr>
	<tr>
		<td>LAIN - LAIN</td>
		<td>: </td>
		<td>Rp. <?php if(isset($fetchdata['pembayaranlain'])){echo $fetchdata['pembayaranlain'];}else{ echo "-";}?></td>
	</tr>
	<tr>
		<td>INSENT. JABATAN</td>
		<td>: </td>
		<td>Rp. <?php if(isset($fetchdata['insjabatan'])){echo $fetchdata['insjabatan'];}else{ echo "-";}?></td>
	</tr>
	<tr>
		<td>UANG MAKAN</td>
		<td>: </td>
		<td>Rp. <?php if(isset($fetchdata['uangmakan'])){echo $fetchdata['uangmakan'];}else{ echo "-";}?></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td><b>JUMLAH PENERIMAAN</b></td>
		<td>: </td>
		<td>Rp. <?php if(isset($fetchdata['jumlahpenerimaan'])){echo $fetchdata['jumlahpenerimaan'];}else{ echo "-";}?></td>
	</tr>
	<?php
		foreach ($this->global_model->find_all_by('pengaturaninput', array('master' => 'POG')) as $ambil) {
			$namadatamaster = $this->global_model->find_by('jenispotongan',array('kode_jenispotongan' => $ambil['data_master']));
			$namasubmaster = $this->global_model->find_by('jenissubpotongan',array('kode_jenissubpotongan' => $ambil['sub_master']));
	?>
	<tr>
		<td><?php echo $namadatamaster['nama_jenispotongan']." ".$namasubmaster['nama_jenissubpotongan'];?></td>
		<td>: </td>
		<td>Rp.
			<?php
				$nilai = $this->global_model->find_by('gaji', array('master'=>'POG','data_master' => $ambil['data_master'],'sub_master' => $ambil['sub_master'],'bulan' => $bulan,'tahun' => $tahun,'kode_karyawan' => $fetchdata['kodekaryawan']));
				if(isset($nilai['nilai'])){
					echo number_format ($nilai['nilai'], 2, ',', '.');
				}else{
					echo "-";
				}
			?>
		</td>
	</tr>
<?php } ?>
<tr>
	<td><b>JUMLAH KESELURUHAN</b></td>
	<td>: </td>
	<td>Rp. <?php if(isset($fetchdata['jumlahseluruh'])){echo $fetchdata['jumlahseluruh'];}else{ echo "-";}?></td>
</tr>
</table>
