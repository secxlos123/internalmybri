<style type="text/css">
	#padding {
		padding: 5px 10px 5px 10px;
	}

	#padding2 {
		padding: 2px 5px 2px 5px;
	}

	#padding6 {
		padding: 0 10px 0 10px;
	}

	#head6 {
		margin-top: 0px;
		border-top: 1px solid;
	}

	#head_color {
		background-color: yellow;
	}

	.justify {
		text-align: justify;
	}
	.right {
		text-align: right;
	}
</style>
<p class="right"><font size="0">
1/3
</font></p>
<table width="100%" border="1">
	<tr>
		<td colspan="2" align="right" id="head_color">
			No. Ref Aplikasi : <b>{{$data_sph['ref_number']}}</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Form Permohonan <b>BRIGUNA</b>
		</td>
	</tr>
	<tr>
		<td colspan="2" id="head_color"><b>&nbsp;&nbsp;DATA PRIBADI</b></td>
	</tr>
    <tr>
    	<td width="50%" id="padding2">
    		<table width="100%">
    			<tr>
    				<td>
	    				<table width="100%" cellpadding=0 cellspacing=0 align="center">
	    					<tr>
	    						<td width="30%"><font size="0">NAMA LENGKAP (SESUAI KTP)</font></td>
			    				<td width="2%"><font size="0">:</font></td>
				      			<td width="68%"><font size="0">{{$data_sph['nama_debitur']}}</font></td>
	    					</tr>
	    				</table>
	    			</td>
    			</tr>
    			<tr>
    				<td>
    					<table width="100%" cellpadding=0 cellspacing=0 align="center">
    						<tr>
    							<td width="10%"><font size="0">NO KTP</font></td>
			    				<td width="2%"><font size="0">:</font></td>
				      			<td><font size="0">{{$data_sph['ktp']}}</font></td>
				      			<td width="20%"><font size="0">BERLAKU SAMPAI</font></td>
			    				<td width="2%"><font size="0">:</font></td>
				      			<td><font size="0">31-12-2099</font></td>
    						</tr>
    					</table>
    				</td>
    			</tr>
    			<tr>
    				<td>
	    				<table width="100%" cellpadding=0 cellspacing=0 align="center">
	    					<tr>
			    				<td width="40%"><font size="0">ALAMAT RUMAH TINGGAL (SESUAI KTP)</font></td>
				      			<td width="2%"><font size="0">:</font></td>
				      			<td width="58%"><font size="0">{{$data_sph['alamat']}}</font></td>
				      		</tr>
				      	</table>
				    </td>
    			</tr>
    			<tr>
    				<td>
    					<table width="100%" cellpadding=0 cellspacing=0 align="center">
    						<tr>
    							<td width="15%"><font size="0">KELURAHAN</font></td>
			    				<td width="2%"><font size="0">:</font></td>
				      			<td><font size="0">{{$data_sph['kelurahan']}}</font></td>
				      			<td width="10%"><font size="0">KOTA</font></td>
			    				<td width="2%"><font size="0">:</font></td>
				      			<td><font size="0">{{$data_sph['kota']}}</font></td>
				      			<td width="15%"><font size="0">KODE POS</font></td>
			    				<td width="2%"><font size="0">:</font></td>
				      			<td><font size="0">{{$data_sph['kode_pos']}}</font></td>
    						</tr>
    					</table>
    				</td>
    			</tr>
    			<tr>
    				<td>
    					<table width="100%" cellpadding=0 cellspacing=0 align="center">
    						<tr>
    							<td width="20%"><font size="0">RT</font></td>
			    				<td width="2%"><font size="0">:</font></td>
				      			<td><font size="0"></font></td>
				      			<td width="5%"><font size="0">RW</font></td>
			    				<td width="2%"><font size="0">:</font></td>
				      			<td><font size="0"></font></td>
    						</tr>
    					</table>
    				</td>
    			</tr>
    			<tr>
    				<td>
    					<table width="100%" cellpadding=0 cellspacing=0 align="center">
    						<tr>
    							<td width="20%"><font size="0">TELEPON RUMAH</font></td>
			    				<td width="2%"><font size="0">:</font></td>
				      			<td><font size="0">{{$data_sph['tlp_rumah']}}</font></td>
				      			<td width="5%"><font size="0">HP</font></td>
			    				<td width="2%"><font size="0">:</font></td>
				      			<td><font size="0">{{$data_sph['handphone']}}</font></td>
    						</tr>
    					</table>
    				</td>
    			</tr>
    			<tr>
    				<td>
	    				<table width="100%" cellpadding=0 cellspacing=0 align="center">
	    					<tr>
			    				<td width="25%"><font size="0">PENDIDIKAN TERAKHIR</font></td>
			    				<td width="1%"><font size="0">:</font></td>
				      			<td width="74%">
				      				<table>
				      					<tr>
				      						<td>
				      							<?php if($data_sph['pendidikan_terakhir'] == '0100') {?>
				      							<font size="0"><input type="checkbox" checked="true"></font>
				      							<?php } else { ?>
				      								<font size="0"><input type="checkbox"></font>
				      							<?php } ?>
				      						</td>
				      						<td><font size="0">&nbsp;&nbsp;SMA</font></td>
				      						<td>
							      				<?php if($data_sph['pendidikan_terakhir'] == '0101' || $data_sph['pendidikan_terakhir'] == '0102' || $data_sph['pendidikan_terakhir'] == '0103') {?>
				      							<font size="0">&nbsp;<input type="checkbox" checked="true"></font>
				      							<?php } else { ?>
				      								<font size="0">&nbsp;<input type="checkbox"></font>
				      							<?php } ?>
							      			</td>
							      			<td><font size="0">&nbsp;&nbsp;DIPLOMA</font></td>
							      			<td>
							      				<?php if($data_sph['pendidikan_terakhir'] == '0104') {?>
				      							<font size="0">&nbsp;<input type="checkbox" checked="true"></font>
				      							<?php } else { ?>
				      								<font size="0">&nbsp;<input type="checkbox"></font>
				      							<?php } ?>
							      			</td>
							      			<td><font size="0">&nbsp;&nbsp;S1</font></td>
							      			<td>
							      				<?php if($data_sph['pendidikan_terakhir'] == '0105') {?>
				      							<font size="0">&nbsp;<input type="checkbox" checked="true"></font>
				      							<?php } else { ?>
				      								<font size="0">&nbsp;<input type="checkbox"></font>
				      							<?php } ?>
							      			</td>
							      			<td><font size="0">&nbsp;&nbsp;S2</font></td>
							      			<td>
							      				<?php if($data_sph['pendidikan_terakhir'] == '0106') {?>
				      							<font size="0">&nbsp;<input type="checkbox" checked="true"></font>
				      							<?php } else { ?>
				      								<font size="0">&nbsp;<input type="checkbox"></font>
				      							<?php } ?>
							      			</td>
							      			<td><font size="0">&nbsp;&nbsp;S3</font></td>
							      			<td>
							      				<?php if($data_sph['pendidikan_terakhir'] == 'LAINNYA') {?>
				      							<font size="0">&nbsp;<input type="checkbox" checked="true"></font>
				      							<?php } else { ?>
				      								<font size="0">&nbsp;<input type="checkbox"></font>
				      							<?php } ?>
							      			</td>
							      			<td><font size="0">&nbsp;&nbsp;LAINNYA</font></td>
				      					</tr>
				      				</table>
				      			</td>
				      		</tr>
				      	</table>
				    </td>			
    			</tr>
    			<tr>
    				<td>
	    				<table width="100%" cellpadding=0 cellspacing=0 align="center">
	    					<tr>
			    				<td width="25%"><font size="0">STATUS PERKAWINAN</font></td>
			    				<td width="1%"><font size="0">:</font></td>
				      			<td width="74%">
				      				<table>
				      					<tr>
				      						<td>
				      							<?php if($data_sph['status'] == '1') {?>
				      							<font size="0"><input type="checkbox" checked="true"></font>
				      							<?php } else { ?>
				      								<font size="0"><input type="checkbox"></font>
				      							<?php } ?>
				      						</td>
				      						<td><font size="0">&nbsp;&nbsp;LAJANG</font></td>
				      						<td>
							      				<?php if($data_sph['status'] == '2') {?>
				      							<font size="0"><input type="checkbox" checked="true"></font>
				      							<?php } else { ?>
				      								<font size="0"><input type="checkbox"></font>
				      							<?php } ?>
							      			</td>
							      			<td><font size="0">&nbsp;&nbsp;MENIKAH</font></td>
							      			<td>
							      				<?php if($data_sph['status'] == '3') {?>
				      							<font size="0"><input type="checkbox" checked="true"></font>
				      							<?php } else { ?>
				      								<font size="0"><input type="checkbox"></font>
				      							<?php } ?>
							      			</td>
							      			<td><font size="0">&nbsp;&nbsp;CERAI (DUDA/JANDA)</font></td>
				      					</tr>
				      				</table>
				      			</td>
				      		</tr>
				      	</table>
				    </td>			
    			</tr>
    			<tr>
    				<td>
	    				<table width="100%" cellpadding=0 cellspacing=0 align="center">
	    					<tr>
			    				<td width="25%"><font size="0">JUMLAH TANGGUNGAN</font></td>
			    				<td width="1%"><font size="0">:</font></td>
				      			<td width="74%">
				      				<table>
				      					<tr>
				      						<td><font size="0">{{$data_sph['jml_tanggungan']}}</font></td>
				      						<td>
				      							<font size="0">ORANG</font>
				      						</td>
				      					</tr>
				      				</table>
				      			</td>
				      		</tr>
				      	</table>
				    </td>			
    			</tr>
    			<tr>
    				<td>
	    				<table width="100%" cellpadding=0 cellspacing=0 align="center">
	    					<tr>
			    				<td width="25%"><font size="0">ALAMAT PENGIRIMAN SURAT</font></td>
			    				<td width="1%"><font size="0">:</font></td>
				      			<td width="74%">
				      				<table>
				      					<tr>
				      						<td>
				      							<font size="0"><input type="checkbox"></font>
				      						</td>
				      						<td><font size="0">&nbsp;&nbsp;ALAMAT DOMISILI</font></td>
				      						<td>
							      				<font size="0">&nbsp;<input type="checkbox"></font>
							      			</td>
							      			<td><font size="0">&nbsp;&nbsp;KANTOR</font></td>
							      			<td>
							      				<font size="0">&nbsp;<input type="checkbox"></font>
							      			</td>
							      			<td><font size="0">&nbsp;&nbsp;ALAMAT KANTOR</font></td>
							      			<td>
							      				<font size="0">&nbsp;<input type="checkbox"></font>
							      			</td>
							      			<td><font size="0">&nbsp;&nbsp;ALAMAT KTP</font></td>
				      					</tr>
				      				</table>
				      			</td>
				      		</tr>
				      	</table>
				    </td>			
    			</tr>
    		</table>
    	</td>
	    <td width="50%" id="padding2">
	    	<table width="100%">
    			<tr>
    				<td>
    					<table width="100%" cellpadding=0 cellspacing=0 align="center">
    						<tr>
    							<td width="15%"><font size="0">JENIS KELAMIN</font></td>
			    				<td width="1%"><font size="0">:</font></td>
				      			<td width="15%">
				      				<table>
				      					<tr>
				      						<td>
				      							<?php if($data_sph['jenis_kelamin'] == 'L') {?>
				      							<font size="0"><input type="checkbox" checked="true"></font>
				      							<?php } else { ?>
				      								<font size="0"><input type="checkbox"></font>
				      							<?php } ?>
				      						</td>
				      						<td><font size="0">&nbsp;&nbsp;&nbsp;&nbsp;PRIA</font></td>
				      						<td>
							      				<?php if($data_sph['jenis_kelamin'] == 'P') {?>
				      							<font size="0">&nbsp;&nbsp;&nbsp;<input type="checkbox" checked="true"></font>
				      							<?php } else { ?>
				      								<font size="0">&nbsp;&nbsp;&nbsp;<input type="checkbox"></font>
				      							<?php } ?>
							      			</td>
							      			<td><font size="0">&nbsp;&nbsp;&nbsp;&nbsp;WANITA</font></td>
				      					</tr>
				      				</table>
				      			</td>
    						</tr>
    					</table>
    				</td>      			
    			</tr>
    			<tr>
    				<td>
    					<table width="100%" cellpadding=0 cellspacing=0 align="center">
    						<tr>
			    				<td width="15%"><font size="0">TEMPAT & TANGGAL LAHIR (tgl/bln/th)</font></td>
			    				<td width="1%"><font size="0">:</font></td>
				      			<td width="15%"><font size="0">
				      				<?php 
				      				if (!empty($data_sph['tgl_lahir_deb'])) {
				      					echo $data_sph['tmpt_lahir_deb'].', '.date('d-m-Y',strtotime($data_sph['tgl_lahir_deb']));
				      				} else {
				      					echo $data_sph['tmpt_lahir_deb'].', -';
				      				}
				      				?></font></td>
				      		</tr>
				      	</table>
				    </td>
    			</tr>
    			<tr>
    				<td>
    					<table width="100%" cellpadding=0 cellspacing=0 align="center">
    						<tr>
			    				<td width="15%"><font size="0">NAMA GADIS IBU KANDUNG</font></td>
			    				<td width="1%"><font size="0">:</font></td>
				      			<td width="15%"><font size="0">{{$data_sph['nama_ibu']}}</font></td>
				      		</tr>
				      	</table>
				    </td>
    			</tr>
    			<tr>
    				<td>
    					<table width="100%" cellpadding=0 cellspacing=0 align="center">
    						<tr>
			    				<td width="15%"><font size="0">KEWARGANEGARAAN</font></td>
			    				<td width="1%"><font size="0">:</font></td>
				      			<td width="15%"><font size="0">{{$data_sph['kewarganegaran']}}</font></td>
				      		</tr>
				      	</table>
				    </td>
    			</tr>
    			<tr>
    				<td>
    					<table width="100%" cellpadding=0 cellspacing=0 align="center">
    						<tr>
			    				<td width="15%"><font size="0">EMAIL</font></td>
			    				<td width="1%"><font size="0">:</font></td>
				      			<td width="15%"><font size="0">{{$data_sph['email']}}</font></td>
				      		</tr>
				      	</table>
				    </td>
    			</tr>
    			<tr>
    				<td>
	    				<table width="100%" cellpadding=0 cellspacing=0 align="center">
	    					<tr>
			    				<td width="15%"><font size="0">LAMA TINGGAL</font></td>
			    				<td width="1%"><font size="0">:</font></td>
				      			<td width="15%">
				      				<table>
				      					<tr>
				      						<td>
				      							<font size="0">{{$data_sph['lama_tinggal']}}</font>
				      						</td>
				      						<td><font size="0">&nbsp;&nbsp;TAHUN</font></td>
				      						<td>
							      				<font size="0">&nbsp;&nbsp;</font>
							      			</td>
							      			<td><font size="0">&nbsp;&nbsp;BULAN</font></td>
				      					</tr>
				      				</table>
				      			</td>
				      		</tr>
				      	</table>
				    </td>			
    			</tr>
    			<tr>
    				<td>
	    				<table width="100%" cellpadding=0 cellspacing=0 align="center">
	    					<tr>
			    				<td width="15%"><font size="0">TELEPON RUMAH</font></td>
				      			<td width="1%"><font size="0">:</font></td>
				      			<td width="15%"><font size="0">{{$data_sph['tlp_rumah']}}</font></td>
				      		</tr>
				      	</table>
				    </td>
    			</tr>
    			<tr>
    				<td>
	    				<table width="100%" cellpadding=0 cellspacing=0 align="center">
	    					<tr>
			    				<td width="35%"><font size="0">ALAMAT DOMISILI (DIISI APABILA ALAMAT BEDA DENGAN KTP)</font></td>
				      			<td width="2%"><font size="0">:</font></td>
				      			<td width="35%"><font size="0">{{$data_sph['alamat_dom']}}</font></td>
				      		</tr>
				      	</table>
				    </td>
    			</tr>
    			<tr>
    				<td>
    					<table width="100%" cellpadding=0 cellspacing=0 align="center">
    						<tr>
    							<td width="15%"><font size="0">KELURAHAN</font></td>
			    				<td width="2%"><font size="0">:</font></td>
				      			<td><font size="0">{{$data_sph['kelurahan_dom']}}</font></td>
				      			<td width="5%"><font size="0">KOTA</font></td>
			    				<td width="2%"><font size="0">:</font></td>
				      			<td><font size="0">{{$data_sph['kota_dom']}}</font></td>
				      			<td width="15%"><font size="0">KODE POS</font></td>
			    				<td width="2%"><font size="0">:</font></td>
				      			<td><font size="0">{{$data_sph['kode_pos_dom']}}</font></td>
    						</tr>
    					</table>
    				</td>
    			</tr>
    			<tr>
    				<td>
	    				<table width="100%" cellpadding=0 cellspacing=0 align="center">
	    					<tr>
			    				<td width="10%"><font size="0">STATUS RUMAH</font></td>
			    				<td width="1%"><font size="0">:</font></td>
				      			<td width="50%">
				      				<table>
				      					<tr>
				      						<td>
				      							<?php if($data_sph['status_rumah'] == '0') {?>
				      							<font size="0"><input type="checkbox" checked="true"></font>
				      							<?php } else { ?>
				      								<font size="0"><input type="checkbox"></font>
				      							<?php } ?>
				      						</td>
				      						<td><font size="0">&nbsp;&nbsp;&nbsp;MILIK SENDIRI</font></td>
				      						<td>
							      				<?php if($data_sph['status_rumah'] == '2') {?>
				      							<font size="0">&nbsp;<input type="checkbox" checked="true"></font>
				      							<?php } else { ?>
				      								<font size="0">&nbsp;<input type="checkbox"></font>
				      							<?php } ?>
							      			</td>
							      			<td><font size="0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;KELUARGA</font></td>
							      			<td>
							      				<?php if($data_sph['status_rumah'] == '1') {?>
				      							<font size="0">&nbsp;<input type="checkbox" checked="true"></font>
				      							<?php } else { ?>
				      								<font size="0">&nbsp;<input type="checkbox"></font>
				      							<?php } ?>
							      			</td>
							      			<td><font size="0">&nbsp;&nbsp;&nbsp;MILIK PERUSAHAAN</font></td>
							      			<td>
							      				<?php if($data_sph['status_rumah'] == '3') {?>
				      							<font size="0">&nbsp;<input type="checkbox" checked="true"></font>
				      							<?php } else { ?>
				      								<font size="0">&nbsp;<input type="checkbox"></font>
				      							<?php } ?>
							      			</td>
							      			<td><font size="0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SEWA/KONTRAK</font></td>
				      					</tr>
				      				</table>
				      			</td>
				      		</tr>
				      	</table>
				    </td>			
    			</tr>
    		</table>
	    </td>
    </tr>
    <tr id="head_color">
		<td><b>&nbsp;&nbsp;DATA SUAMI/ISTRI</b></td>
		<td><b>&nbsp;&nbsp;DATA INSTANSI/PERUSAHAAN</b></td>
	</tr>
	<tr>
		<td id="padding2">
			<table width="100%">
				<tr>
					<td>
						<table width="100%" cellpadding=0 cellspacing=0 align="center">
							<tr>
								<td width="40%"><font size="0">NAMA SUAMI/ISTRI (SESUAI DENGAN KTP)</font></td>
								<td width="2%"><font size="0">:</font></td>
								<td width="58%"><font size="0">{{$data_sph['nama_pasangan']}}</font></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<table width="100%" cellpadding=0 cellspacing=0 align="center">
							<tr>
								<td width="40%"><font size="0">TANGGAL LAHIR</font></td>
								<td width="2%"><font size="0">:</font></td>
								<td width="58%"><font size="0"><?php 
									if (!empty($data_sph['tgl_pasangan'])) {
				      					echo date('d-m-Y',strtotime($data_sph['tgl_pasangan']));
				      				} else {
				      					echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
				      				}
								?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(TGL/BLN/TH)</font></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<table width="100%" cellpadding=0 cellspacing=0 align="center">
							<tr>
								<td width="40%"><font size="0">NO. KTP</font></td>
								<td width="2%"><font size="0">:</font></td>
								<td width="58%"><font size="0">{{$data_sph['ktp_pasangan']}}</font></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
    				<td>
    					<table width="100%" cellpadding=0 cellspacing=0 align="center">
    						<tr>
    							<td width="15%"><font size="0">HP</font></td>
			    				<td width="2%"><font size="0">:</font></td>
				      			<td><font size="0"></font></td>
    							<td width="20%"><font size="0">TELEPON KANTOR</font></td>
			    				<td width="2%"><font size="0">:</font></td>
				      			<td><font size="0"></font></td>
    						</tr>
    					</table>
    				</td>
    			</tr>
			</table>
		</td>
		<td id="padding2">
			<table width="100%">
				<tr>
					<td>
						<table width="100%" cellpadding=0 cellspacing=0 align="center">
							<tr>
								<td width="30%"><font size="0">NAMA INSTANSI/PERUSAHAAN</font></td>
								<td width="2%"><font size="0">:</font></td>
								<td width="68%"><font size="0">{{$data_sph['instansi']}}</font></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<table width="100%" cellpadding=0 cellspacing=0 align="center">
							<tr>
								<td width="30%"><font size="0">NAMA ATASAN LANGSUNG</font></td>
								<td width="2%"><font size="0">:</font></td>
								<td width="68%"><font size="0">{{$data_sph['nama_atasan']}}</font></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<table width="100%" cellpadding=0 cellspacing=0 align="center">
							<tr>
								<td width="30%"><font size="0">JABATAN ATASAN</font></td>
								<td width="2%"><font size="0">:</font></td>
								<td width="68%"><font size="0">{{$data_sph['jabatan_atasan']}}</font></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<table width="100%" cellpadding=0 cellspacing=0 align="center">
							<tr>
								<td width="30%"><font size="0">ALAMAT</font></td>
								<td width="2%"><font size="0">:</font></td>
								<td width="68%"><font size="0"></font></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<table width="100%" cellpadding=0 cellspacing=0 align="center">
							<tr>
								<td width="15%"><font size="0">KOTA</font></td>
			    				<td width="2%"><font size="0">:</font></td>
				      			<td><font size="0"></font></td>
    							<td width="20%"><font size="0">KODE POS</font></td>
			    				<td width="2%"><font size="0">:</font></td>
				      			<td><font size="0"></font></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<table width="100%" cellpadding=0 cellspacing=0 align="center">
							<tr>
								<td width="15%"><font size="0">TELEPON</font></td>
			    				<td width="2%"><font size="0">:</font></td>
				      			<td><font size="0"></font></td>
    							<td width="20%"><font size="0">FACSIMILE</font></td>
			    				<td width="2%"><font size="0">:</font></td>
				      			<td><font size="0"></font></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<table width="100%" border="1">
	<tr id="head_color">
		<td width="50%"><b>&nbsp;&nbsp;DATA PEKERJAAN DAN PENGHASILAN PEMOHON</b></td>
		<td width="50%"><b>&nbsp;&nbsp;PERMOHONAN</b></td>
	</tr>
	<tr>
		<td id="padding2">
			<table width="100%">
				<tr>
    				<td>
	    				<table width="100%" cellpadding=0 cellspacing=0 align="center">
	    					<tr>
				      			<td width="100%">
				      				<table>
				      					<tr>
				      						<td>
				      							<font size="0"><input type="checkbox"></font>
				      						</td>
				      						<td><font size="0">&nbsp;&nbsp;&nbsp;PNS</font></td>
				      						<td>
							      				<font size="0">&nbsp;<input type="checkbox"></font>
							      			</td>
							      			<td><font size="0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TNI/POLRI</font></td>
							      			<td>
							      				<font size="0">&nbsp;<input type="checkbox"></font>
							      			</td>
							      			<td><font size="0">&nbsp;&nbsp;&nbsp;KARYAWAN BUMN</font></td>
							      			<td>
							      				<font size="0">&nbsp;<input type="checkbox"></font>
							      			</td>
							      			<td><font size="0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;KARYAWAN SWASTA</font></td>
				      					</tr>
				      				</table>
				      			</td>
				      		</tr>
				      	</table>
				    </td>			
    			</tr>
    			<tr>
					<td>
						<table width="100%" cellpadding=0 cellspacing=0 align="center">
							<tr>
								<td width="40%"><font size="0">NOMOR INDUK PEGAWAI(NIP)</font></td>
								<td width="2%"><font size="0">:</font></td>
								<td width="58%"><font size="0">{{$data_sph['nip']}}</font></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
    				<td>
	    				<table width="100%" cellpadding=0 cellspacing=0 align="center">
	    					<tr>
			    				<td width="10%"><font size="0">JABATAN</font></td>
			    				<td width="2%"><font size="0">:</font></td>
				      			<td width="88%">
				      				<table>
				      					<tr>
				      						<td>
				      							<font size="0">{{$data_sph['jabatan']}}</font>
				      						</td>
				      						<td><font size="0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LAMA BEKERJA</font></td>
				      						<td>
							      				<font size="0">&nbsp;{{$data_sph['lama_kerja']}}</font>
							      			</td>
							      			<td><font size="0">TAHUN</font></td>
							      			<td>
							      				<font size="0">&nbsp;{{$data_sph['lama_kerja_bln']}}</font>
							      			</td>
							      			<td><font size="0">BULAN</font></td>
				      					</tr>
				      				</table>
				      			</td>
				      		</tr>
				      	</table>
				    </td>			
    			</tr>
				<tr>
    				<td>
	    				<table width="100%" cellpadding=0 cellspacing=0 align="center">
	    					<tr>
			    				<td width="15%"><font size="0">STATUS PEKERJAAN</font></td>
			    				<td width="1%"><font size="0">:</font></td>
				      			<td width="50%">
				      				<table>
				      					<tr>
				      						<td>
				      							<?php if($data_sph['status_kerja'] == '0') {?>
				      							<font size="0"><input type="checkbox" checked="true"></font>
				      							<?php } else { ?>
				      								<font size="0"><input type="checkbox"></font>
				      							<?php } ?>
				      						</td>
				      						<td><font size="0">&nbsp;&nbsp;&nbsp;TETAP</font></td>
				      						<td>
							      				<?php if($data_sph['status_kerja'] == '1') {?>
				      							<font size="0"><input type="checkbox" checked="true"></font>
				      							<?php } else { ?>
				      								<font size="0"><input type="checkbox"></font>
				      							<?php } ?>
							      			</td>
							      			<td><font size="0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;KONTRAK</font></td>
							      			<td><font size="0">&nbsp;BERAKHIR</font></td>
							      			<td>
							      				<font size="0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(TGL/BLN/TH)</font>
							      			</td>
				      					</tr>
				      				</table>
				      			</td>
				      		</tr>
				      	</table>
				    </td>			
    			</tr>
    			<tr>
					<td>
						<table width="100%" cellpadding=0 cellspacing=0 align="center">
							<tr>
								<td width="40%"><font size="0">NO. NPWP PRIBADI</font></td>
								<td width="2%"><font size="0">:</font></td>
								<td width="58%"><font size="0">{{$data_sph['npwp']}}</font></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<table width="100%" cellpadding=0 cellspacing=0 align="center">
							<tr>
								<td width="40%"><font size="0">PENGHASILAN/GAJI BERSIH PER BULAN</font></td>
								<td width="2%"><font size="0">:</font></td>
								<td width="58%"><font size="0">Rp. {{number_format($data_sph['gaji'], 2, ",", ".")}}</font></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<table width="100%" cellpadding=0 cellspacing=0 align="center">
							<tr>
								<td width="40%"><font size="0">PENGHASILAN LAIN-LAIN</font></td>
								<td width="2%"><font size="0">:</font></td>
								<td width="58%"><font size="0">Rp. {{number_format($data_sph['gaji_lainnya'], 2, ",", ".")}}</font></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
		<td id="padding2">
			<table width="100%">
				<tr>
					<td>
						<table width="100%" cellpadding=0 cellspacing=0 align="center">
							<tr>
			    				<td width="10%"><font size="0">JENIS PINJAMAN</font></td>
			    				<td width="2%"><font size="0">:</font></td>
				      			<td width="88%">
				      				<table>
				      					<tr>
				      						<td>
				      							<?php if($data_sph['jenis_pinjaman'] == '1') {?>
				      							<font size="0"><input type="checkbox" checked="true"></font>
				      							<?php } else { ?>
				      								<font size="0"><input type="checkbox"></font>
				      							<?php } ?>
				      						</td>
				      						<td><font size="0">&nbsp;BRIGUNA KARYA</font></td>
				      						<td>
							      				<font size="0">&nbsp;<input type="checkbox"></font>
							      			</td>
							      			<td><font size="0">&nbsp;BRIGUNA PURNA</font></td>
							      			<td>
							      				<font size="0">&nbsp;<input type="checkbox"></font>
							      			</td>
							      			<td><font size="0">&nbsp;&nbsp;BRIGUNA</font></td>
				      					</tr>
				      				</table>
				      			</td>
				      		</tr>
				      		<tr>
			    				<td width="10%"><font size="0">TUJUAN PENGGUNAAN</font></td>
			    				<td width="2%"><font size="0">:</font></td>
				      			<td width="88%">
				      				<table>
				      					<tr>
				      						<td>
				      							<font size="0"><input type="checkbox"></font>
				      							<font size="0">PENDIDIKAN</font>
				      						</td>
				      						<td>
							      				<font size="0">&nbsp;<input type="checkbox"></font>
							      				<font size="0">KESEHATAN</font>
							      			</td>
							      			<td>
							      				<font size="0">&nbsp;<input type="checkbox"></font>
							      				<font size="0">RENOVASI</font>
							      			</td>
							      			<td>
							      				<font size="0">&nbsp;<input type="checkbox"></font>
							      				<font size="0">USAHA</font>
							      			</td>
							      			<td>
							      				<font size="0">&nbsp;<input type="checkbox"></font>
							      				<font size="0">LAINNYA</font>
							      			</td>
				      					</tr>
				      				</table>
				      			</td>
				      		</tr>
							<tr>
								<td width="55%"><font size="0">JUMLAH PINJAMAN YANG DIAJUKAN</font></td>
								<td width="2%"><font size="0">:</font></td>
								<td width="43%"><font size="0">Rp. {{number_format($data_sph['pinjam_ajukan'], 2, ",", ".")}}</font></td>
							</tr>
							<tr>
								<td width="10%"><font size="0">JANGKA WAKTU</font></td>
								<td width="2%"><font size="0">:</font></td>
								<td width="88%"><font size="0">{{$data_sph['jangka_waktu']}}&nbsp; BULAN</font></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<p class="right" style="margin-top: 39px"><font size="0">
2/3
</font></p>
<table width="100%" border="1" id="head6">

	<tr id="head_color">
		<td width="50%"><b>&nbsp;&nbsp;PERSETUJUAN FASILITAS (DIISI OLEH BANK)</b></td>
		<td width="50%"><b>&nbsp;&nbsp;DATA PINJAMAN DI BANK LAIN</b></td>
	</tr>
	<tr>
		<td id="padding">
			<table width="100%">
				<tr>
					<td>
						<table width="100%" cellpadding=0 cellspacing=0 align="center">
							<tr>
								<td width="35%"><font size="0">KREDIT YANG DISETUJUI</font></td>
								<td width="2%"><font size="0">:</font></td>
								<td width="63%"><font size="0">Rp. {{number_format($data_sph['pinjaman'], 2, ",", ".")}}</font></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<table width="100%" cellpadding=0 cellspacing=0 align="center">
							<tr>
								<td width="35%"><font size="0">TERBILANG</font></td>
								<td width="2%"><font size="0">:</font></td>
								<td width="63%"><font size="0">({{$data_sph['bil_pinjaman']}} Rupiah)</font></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<table width="100%" cellpadding=0 cellspacing=0 align="center">
							<tr>
								<td width="35%"><font size="0">JANGKA WAKTU</font></td>
								<td width="2%"><font size="0">:</font></td>
								<td width="63%"><font size="0">{{$data_sph['jangka_waktu']}}&nbsp;BULAN</font></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
    				<td>
    					<table width="100%" cellpadding=0 cellspacing=0 align="center">
    						<tr>
    							<td width="35%"><font size="0">BUNGA</font></td>
			    				<td width="2%"><font size="0">:</font></td>
				      			<td width="63%"><font size="0">{{$data_sph['suku_bunga']}} %</font></td>
    						</tr>
    					</table>
    				</td>
    			</tr>
    			<tr>
					<td>
						<table width="100%" cellpadding=0 cellspacing=0 align="center">
							<tr>
								<td width="35%"><font size="0">ANGSURAN PER BULAN</font></td>
								<td width="2%"><font size="0">:</font></td>
								<td width="63%"><font size="0">Rp. {{number_format($data_sph['angsuran'], 2, ",", ".")}}</font></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
		<td id="padding">
			<table width="100%">
				<tr>
					<td>
						<table width="100%" cellpadding=0 cellspacing=0 align="center">
							<tr>
								<td width="20%"><font size="0">NAMA BANK</font></td>
								<td width="2%"><font size="0">:</font></td>
								<td width="78%"><font size="0"></font></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
    				<td>
    					<table width="100%" cellpadding=0 cellspacing=0 align="center">
    						<tr>
    							<td width="15%"><font size="0">JENIS PINJAMAN</font></td>
			    				<td width="2%"><font size="0">:</font></td>
				      			<td width="20%"><font size="0"></font></td>
    							<td width="20%"><font size="0">JUMLAH PINJAMAN</font></td>
			    				<td width="2%"><font size="0">:</font></td>
				      			<td width="20%">&nbsp;<font size="0">Rp </font></td>
    						</tr>
    					</table>
    				</td>
    			</tr>
    			<tr>
					<td>
						<table width="100%" cellpadding=0 cellspacing=0 align="center">
							<tr>
								<td width="20%"><font size="0">NAMA BANK</font></td>
								<td width="2%"><font size="0">:</font></td>
								<td width="78%"><font size="0"></font></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
    				<td>
    					<table width="100%" cellpadding=0 cellspacing=0 align="center">
    						<tr>
    							<td width="15%"><font size="0">JENIS PINJAMAN</font></td>
			    				<td width="2%"><font size="0">:</font></td>
				      			<td width="20%"><font size="0"></font></td>
    							<td width="20%"><font size="0">JUMLAH PINJAMAN</font></td>
			    				<td width="2%"><font size="0">:</font></td>
				      			<td width="20%">&nbsp;<font size="0">Rp </font></td>
    						</tr>
    					</table>
    				</td>
    			</tr>
			</table>
		</td>
	</tr>
</table>
<table width="100%" border="1" style="margin-bottom: 200px;">
	<tr id="head_color">
		<td width="50%"><b>&nbsp;&nbsp;PERSYARATAN *)</b></td>
		<td width="50%">&nbsp;<b>DIISI OLEH BANK</b></td>
	</tr>
	<tr>
		<td id="padding">
			<table border="1" align="center" width="100%">
				<tr>
					<td align="center"></td>
					<td><font size="0"><b>Dokumen yang diperlukan</b></font></td>
					<td align="center"><font size="0"><b>Pekerja BRI</b></font></td>
				</tr>
				<tr>
					<td align="center"><font size="0">1</font></td>
					<td><font size="0">Fotocopy Identitas (suami/Istri)</font></td>
					<td align="center"></td>
				</tr>
				<tr>
					<td align="center"><font size="0">2</font></td>
					<td><font size="0">Fotocopy Kartu Keluarga</font></td>
					<td align="center"></td>
				</tr>
				<tr>
					<td align="center"><font size="0">3</font></td>
					<td><font size="0">Slip Upah Terakhir</font></td>
					<td align="center"></td>
				</tr>
				<tr>
					<td align="center"><font size="0">4</font></td>
					<td><font size="0">Surat Rekomendasi Atasan</font></td>
					<td align="center"></td>
				</tr>
				<tr>
					<td align="center"><font size="0">5</font></td>
					<td><font size="0">Surat Pernyataan</font></td>
					<td align="center"></td>
				</tr>
				<tr>
					<td align="center"><font size="0">6</font></td>
					<td><font size="0">Copy Rekening Tabungan</font></td>
					<td align="center"></td>
				</tr>
				<tr>
					<td align="center"><font size="0">7</font></td>
					<td><font size="0">Surat Kuasa Debet Rekening</font></td>
					<td align="center"></td>
				</tr>
				<tr>
					<td align="center"><font size="0">8</font></td>
					<td><font size="0">Pas Foto Ymp/ Suami/Istri</font></td>
					<td align="center"></td>
				</tr>
				<tr>
					<td align="center"><font size="0">9</font></td>
					<td><font size="0">Form AFT/AGF</font></td>
					<td align="center"></td>
				</tr>
			</table>
			<br>
			<font size="0">*) Untuk permohonan pinjaman yang ditujukan untuk take-over KPR atau KKB di Bank lain mengikuti ketentuan yang berlaku.</font>
		</td>
		<td id="padding">
			<table width="100%" cellpadding=0 cellspacing=0 align="center">
				<tr>
    				<td colspan="3"><font size="0">Konfirmasi persetujuan kredit dan nomor rekening calon debitur oleh petugas Bank.</font></td>
	      		</tr>
				<tr>
					<td width="30%"><font size="0">Nama Account Officer / Mantri</font></td>
					<td width="2%"><font size="0">:</font></td>
					<td width="68%"><font size="0">{{$data_sph['nama_ao']}}</font></td>
				</tr>
				<tr>
					<td width="30%"><font size="0">Tanggal Realisasi</font></td>
					<td width="2%"><font size="0">:</font></td>
					<td width="68%"><font size="0"><?php echo date('d-m-Y');?>&nbsp; (Tanggal/Bulan/Tahun)</font></td>
				</tr>
				<tr>
					<td width="30%"><font size="0">Yang berhutang telah mengetahui dan setuju</font></td>
					<td width="2%"><font size="0">:</font></td>
					<td width="68%"><font size="0"></font></td>
				</tr>
			</table>
			<table cellpadding=0 cellspacing=0>
				<tr>
					<td></td>
					<td><font size="0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;YA</font></td>
					<td><font size="0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TIDAK</font></td>
				</tr>
				<tr>
					<td><font size="0">&nbsp;&nbsp;Jumlah Pinjaman</font></td>
					<td><font size="0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox"></font></td>
					<td><font size="0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox"></font></td>
				</tr>
				<tr>
					<td><font size="0">&nbsp;&nbsp;Suku Bunga</font></td>
					<td><font size="0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox"></font></td>
					<td><font size="0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox"></font></td>
				</tr>
				<tr>
					<td><font size="0">&nbsp;&nbsp;Jangka Waktu Kredit</font></td>
					<td><font size="0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox"></font></td>
					<td><font size="0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox"></font></td>
				</tr>
				<tr>
					<td><font size="0">&nbsp;&nbsp;Besarnya angsuran/bulan</font></td>
					<td><font size="0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox"></font></td>
					<td><font size="0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox"></font></td>
				</tr>
				<tr>
					<td><font size="0">&nbsp;&nbsp;Biaya Provisi dan Administrasi</font></td>
					<td><font size="0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox"></font></td>
					<td><font size="0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox"></font></td>
				</tr>
				<tr>
					<td><font size="0">&nbsp;&nbsp;Denda dan Pinalty</font></td>
					<td><font size="0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox"></font></td>
					<td><font size="0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox"></font></td>
				</tr>
				<tr>
					<td><font size="0">&nbsp;&nbsp;Ketentuan Bayar Maju Lunas</font></td>
					<td><font size="0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox"></font></td>
					<td><font size="0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox"></font></td>
				</tr>
				<tr>
					<td><font size="0">&nbsp;&nbsp;Informasi Lainnya</font></td>
					<td><font size="0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox"></font></td>
					<td><font size="0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox"></font></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<p class="right" style="margin-top: 0px"><font size="0">
3/3
</font></p>
<table width="100%" border="1" id="head6">
	<tr id="head_color">
		<td width="50%"><b>&nbsp;&nbsp;PERNYATAAN DAN KUASA</b></td>
		<td width="50%"><b>&nbsp;&nbsp;PENAMBAHAN FASILITAS KARTU KREDIT BRI</b></td>
	</tr>
	<tr>
		<td id="padding6">
			<table width="100%">
				<tr>
					<td>
						<p class="justify">
							<font size="1">
							Saya yang bertandatangan di bawah ini adalah Pemohon kredit BRIGUNA pada PT Bank Rakyat Indonesia (Persero) Tbk Kanca/KCP/BRI Unit {{$data_sph['kantor_cabang']}} dan apabila permohonan saya telah mendapatkan persetujuan dari BRI, maka dengan ini saya sebagai debitur menyatakan bersedia untuk:
							<ol>
								<li>
									Melunasi seluruh pinjaman yang kami terima dengan cara mengangsur/dipotong gaji/upah/uang pensiun ke BRI setiap bulan sesuai dengan ketentuan, sampai dengan pinjaman lunas.
								</li>
								<li>
									Mengutamakan pemotongan gaji/upah/uang pensiun untuk pembayaran angsuran Briguna ke PT Bank rakyat Indonesia (Persero)Tbk (untuk selanjutnya disebut BRI/Bank/Bank BRI) sebelum melakukan angsuran pinjaman lainnya.
								</li>
								<li>
									Bersedia untuk memberikan informasi kepada BRI apabila saya mempunyai pinjaman lain yang sumber pembayarannya sama dengan sumber pembayaran untuk angsuran Briguna baik sebelum maupun sesudah pengajuan Briguna. 
								</li>
								<li>
									Bersedia dan memberikan persetujuan kepada BRI untuk mempergunakan hak-hak pekerja saya termasuk namun tidak terbatas pada uang gaji/upah, uang pesangon, uang jasa, uang ganti kerugian maupun penerimaan lainnya yang dapat dipersamakan dengan itu guna pembayaran angsuran Briguna atas nama saya sampai dengan hutang tersebut lunas.
								</li>
								<li>
									Apabila saya berhenti/diberhentikan dari pekerjaan/mengalami Pemutusan Hubungan Kerja (PHK), saya bersedia untuk segera melunasi pinjaman saya dan mengutamakan hak-hak yang saya terima untuk membayar sisa pinjaman dan apabila masih terdapat kekurangan, akan saya lunasi dari sumber pembayaran yang lain.
								</li>
								<li>
									Apabila saya, atas kehendak sendiri atau karena dinas tugasnya untuk pindah/mutasi/alih tugas, maka saya bersedia untuk :
									<ol type="a">
										<li>
											Melunasi seluruh sisa pinjaman sebelum pelaksanaan pindah/mutasi/alih tugas tersebut dilaksanakan, atau
										</li>
										<li>
											Dalam hal BRI memindahkan tempat pengelolaan BRIGUNA atas nama saya ke Kanca/KCP/BRI Unit lain, maka saya tetap akan menyelesaikan kewajiban saya, serta :
											<ol type="i">
												<li>
													menyelesaikan tunggakan terlebih dahulu (jika ada) sebelum dimutasikan
												</li>
												<li>
													aktif dan berinisiatif untuk menyetorkan sendiri angsuran Briguna ke Kanca/KCP/Unit asal atau Kanca/KCP/Unit tujuan pelimpahan.
												</li>
												<li>
													aktif dan berinisiatif dalam memberikan informasi menyangkut segala hal yang berkaitan dengan pindah/mutasi/alih tugas dan pinjaman saya sampai pemotongan angsuran dapat berjalan sesuai ketentuan.
												</li>
											</ol>
										</li>
									</ol>
								</li>
								<li>
									Tunduk pada ketentuan yang berlaku di BRI. Pernyataan ini dibuat dengan sebenarnya, apabila secara sengaja saya tidak mengikuti pernyataan ini saya bersedia untuk dikenakan sanksi sesuai ketentuan yang berlaku.
								</li>
								<li>
									Memberikan kuasa pada Bank untuk tabungan saya dengan nomor rekening: ....................................... di Bank BRI Cabang ......................................................., serta kuasa mendebet tersebut untuk keperluan pembayaraan biaya-biaya provisi, administrasi serta angsuran rekening Kredit atau biaya-biaya lain yang mungkin timbul di kemudian hari terkait dengan fasilitas Briguna yang saya terima dan kuasa yang saya berikan ini berlaku sampai dengan fasilitas Briguna saya dinyatakan lunas oleh Bank. Apabila gaji/upah/uang pensiun saya disalurkan melalui Bank BRI, maka saya memberikan kuasa kepada Bank untuk melakukan pemotongan gaji saya untuk kepentingan tersebut di atas. Kuasa ini tidak dapat ditarik kembali serta tidak akan berakhir oleh karena sebab-sebab yang termaktub dalam pasal 1813, 1814, dan 1816 Kitab Undang Hukum Perdata dan saya membebaskan Bank dari segala tanggung jawab atas kerugian/biaya apapun sehubungan pemberian kuasa tersebut di atas.
								</li>
							</ol>
							</font>
						</p>
					</td>
				</tr>
			</table>
		</td>
		<td id="padding6">
			<table width="100%">
				<tr>
					<td>
						<table width="100%">
							<tr id="head_color">
								<td><b>PERLINDUNGAN ASURANSI JIWA</b></td>
							</tr>
							<tr>
								<td>
									<p class="justify">
										<font size="0">
											Dengan ini saya menyatakan bahwa saya ingin mendapatkan perlindungan asuransi jiwa dari perusahaan asuransi rekanan BRI*) :
										</font>
										<table>
											<tr>
												<td>
													<font size="0"><input type="checkbox"></font>
												</td>
												<td><font size="0">&nbsp;&nbsp;&nbsp;PT BRINGIN JIWA SEJAHTERA</font></td>
												<td>
													<font size="0">&nbsp;<input type="checkbox"></font>
									  			</td>
									  			<td><font size="0">&nbsp;PT HEKSA EKALIFE INSURANCE</font></td>
									  			<td>
									  				<font size="0">&nbsp;<input type="checkbox"></font>
									  			</td>
									  			<td><font size="0">&nbsp;&nbsp;&nbsp;Lain-lain</font></td>
											</tr>
										</table>
										<font size="0">
											untuk membantu menyelesaikan kewajiban saya atas fasilitas Kredit BRIGUNA di Bank BRI karena meninggal dunia. Dengan ini saya menyatakan bahwa saat ini berada dalam keadaan sehat jasmani dan rohani.<br>
											*) Dipilih Salah satu
										</font>
									</p>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<p class="justify"><font size="0">
							Saya menyatakan bersedia menerima fasilitas tambahan berupa Kartu Kredit BRI dengan limit sesuai ketentuan yang ditetapkan oleh BANK.
						</font></p>
						<table align="left">
							<tr>
								<td>..............., ..................</td>
							</tr>
							<tr>
								<td><br><br><br></td>
							</tr>
							<tr>
								<td><font size="0">(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</font></td>
							</tr>
						</table>
						<table align="right">
							<tr>
								<td><font size="0">(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</font></td>
							</tr>
							<tr>
								<td><br><br><br></td>
							</tr>
							<tr>
								<td><font size="0">({{$data_sph['nama_debitur']}})</font></td>
							</tr>
						</table>
						<br><br><br><br><br><br><br>
					</td>
				</tr>
				<tr>
					<td>
						<table width="100%">
							<tr>
								<td width="30%"><font size="0">Nama Lengkap Emergency Contact (keluarga tidak serumah)<b>*</b></font></td>
								<td width="2%"><font size="0">:</font></td>
								<td width="68%"><font size="0">{{$data_sph['nama_emergency']}}</font></td>
							</tr>
							<tr>
								<td><font size="0">Alamat Emergency Contact <b>**)</b></font></td>
								<td><font size="0">:</font></td>
								<td><font size="0"></font></td>
							</tr>
							<tr>
								<td><font size="0">Telepon Emergency Contact <b>**)</b></font></td>
								<td><font size="0">:</font></td>
								<td><font size="0">{{$data_sph['tlp_emergency']}} / {{$data_sph['tlp_emergency']}}</font></td>
							</tr>
						</table><br>
						<font size="0"><b>**) wajib diisi apabila anda menyetujui pernyataan diatas</b></font>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>