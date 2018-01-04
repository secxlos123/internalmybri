<table width="100%" border="1">
	<tr>
		<td colspan="2" align="right">Form Permohonan <b>BRIGUNA</b></td>
	</tr>
	<tr>
		<td colspan="2"><b>&nbsp;&nbsp;DATA PRIBADI</b></td>
	</tr>
    <tr>
    	<td width="50%">
    		<table width="100%">
    			<tr>
    				<td>
	    				<table width="100%">
	    					<tr>
	    						<td width="35%">&nbsp;<font size="1">NAMA LENGKAP (SESUAI KTP)</font></td>
			    				<td width="1%">:</td>
				      			<td><font size="1">{{$data_sph['nama_debitur']}}</font></td>
	    					</tr>
	    				</table>
	    			</td>
    			</tr>
    			<tr>
    				<td>
    					<table width="100%">
    						<tr>
    							<td width="10%">&nbsp;<font size="1">NO KTP</font></td>
			    				<td width="1%">:</td>
				      			<td><font size="1">{{$data_sph['ktp']}}</font></td>
				      			<td width="20%"><font size="1">BERLAKU SAMPAI</font></td>
			    				<td width="1%">:</td>
				      			<td><font size="1">{{$data_sph['ktp']}}</font></td>
    						</tr>
    					</table>
    				</td>
    			</tr>
    			<tr>
    				<td>
	    				<table width="100%">
	    					<tr>
			    				<td width="45%">&nbsp;<font size="1">ALAMAT RUMAH TINGGAL (SESUAI KTP)</font></td>
				      			<td width="1%">:</td>
				      			<td><font size="1">{{$data_sph['alamat']}}</font></td>
				      		</tr>
				      	</table>
				    </td>
    			</tr>
    			<tr>
    				<td>
    					<table width="100%">
    						<tr>
    							<td width="15%">&nbsp;<font size="1">KELURAHAN</font></td>
			    				<td width="2%">:</td>
				      			<td><font size="1">{{$data_sph['ktp']}}</font></td>
				      			<td width="5%"><font size="1">KOTA</font></td>
			    				<td width="2%">:</td>
				      			<td><font size="1">{{$data_sph['ktp']}}</font></td>
				      			<td width="15%"><font size="1">KODE POS</font></td>
			    				<td width="2%">:</td>
				      			<td><font size="1">{{$data_sph['ktp']}}</font></td>
    						</tr>
    					</table>
    				</td>
    			</tr>
    			<tr>
    				<td>
    					<table width="100%">
    						<tr>
    							<td width="10%">&nbsp;<font size="1">RT</font></td>
			    				<td width="2%">:</td>
				      			<td><font size="1">{{$data_sph['ktp']}}</font></td>
				      			<td width="5%"><font size="1">RW</font></td>
			    				<td width="2%">:</td>
				      			<td><font size="1">{{$data_sph['ktp']}}</font></td>
    						</tr>
    					</table>
    				</td>
    			</tr>
    			<tr>
    				<td>
    					<table width="100%">
    						<tr>
    							<td width="20%">&nbsp;<font size="1">TELEPON RUMAH</font></td>
			    				<td width="2%">:</td>
				      			<td><font size="1">{{$data_sph['ktp']}}</font></td>
				      			<td width="5%"><font size="1">HP</font></td>
			    				<td width="2%">:</td>
				      			<td><font size="1">{{$data_sph['ktp']}}</font></td>
    						</tr>
    					</table>
    				</td>
    			</tr>
    			<tr>
    				<td>
	    				<table width="100%">
	    					<tr>
			    				<td width="30%">&nbsp;<font size="1">PENDIDIKAN TERAKHIR</font></td>
			    				<td width="1%">:</td>
				      			<td>
				      				<table>
				      					<tr>
				      						<td>
				      							<font size="1"><input type="checkbox" checked="true"></font>
				      						</td>
				      						<td><font size="1">&nbsp;&nbsp;SMA</font></td>
				      						<td>
							      				<font size="1">&nbsp;<input type="checkbox" checked="true"></font>
							      			</td>
							      			<td><font size="1">&nbsp;&nbsp;DIPLOMA</font></td>
							      			<td>
							      				<font size="1">&nbsp;<input type="checkbox" checked="true"></font>
							      			</td>
							      			<td><font size="1">&nbsp;&nbsp;S1/S2/S3</font></td>
							      			<td>
							      				<font size="1">&nbsp;<input type="checkbox" checked="true"></font>
							      			</td>
							      			<td><font size="1">&nbsp;&nbsp;LAINNYA</font></td>
				      					</tr>
				      				</table>
				      			</td>
				      		</tr>
				      	</table>
				    </td>			
    			</tr>
    			<tr>
    				<td>
	    				<table width="100%">
	    					<tr>
			    				<td width="30%">&nbsp;<font size="1">STATUS PERKAWINAN</font></td>
			    				<td width="1%">:</td>
				      			<td>
				      				<table>
				      					<tr>
				      						<td>
				      							<font size="1"><input type="checkbox" checked="true"></font>
				      						</td>
				      						<td><font size="1">&nbsp;&nbsp;LAJANG</font></td>
				      						<td>
							      				<font size="1">&nbsp;<input type="checkbox" checked="true"></font>
							      			</td>
							      			<td><font size="1">&nbsp;&nbsp;MENIKAH</font></td>
							      			<td>
							      				<font size="1">&nbsp;<input type="checkbox" checked="true"></font>
							      			</td>
							      			<td><font size="1">&nbsp;&nbsp;CERAI (DUDA/JANDA)</font></td>
				      					</tr>
				      				</table>
				      			</td>
				      		</tr>
				      	</table>
				    </td>			
    			</tr>
    			<tr>
    				<td>
	    				<table width="100%">
	    					<tr>
			    				<td width="30%">&nbsp;<font size="1">JUMLAH TANGGUNGAN</font></td>
			    				<td width="1%">:</td>
				      			<td>
				      				<table>
				      					<tr>
				      						<td><font size="1">{{$data_sph['nama_debitur']}}</font></td>
				      						<td>
				      							<font size="1">ORANG</font>
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
	    				<table width="100%">
	    					<tr>
			    				<td width="40%">&nbsp;<font size="1">ALAMAT DOMISILI (DIISI APABILA ALAMAT BEDA DENGAN KTP)</font></td>
				      			<td width="1%">:</td>
				      			<td><font size="1">{{$data_sph['alamat']}}</font></td>
				      		</tr>
				      	</table>
				    </td>
    			</tr>
    			<tr>
    				<td>
    					<table width="100%">
    						<tr>
    							<td width="15%">&nbsp;<font size="1">KELURAHAN</font></td>
			    				<td width="2%">:</td>
				      			<td><font size="1">{{$data_sph['ktp']}}</font></td>
				      			<td width="5%"><font size="1">KOTA</font></td>
			    				<td width="2%">:</td>
				      			<td><font size="1">{{$data_sph['ktp']}}</font></td>
				      			<td width="15%"><font size="1">KODE POS</font></td>
			    				<td width="2%">:</td>
				      			<td><font size="1">{{$data_sph['ktp']}}</font></td>
    						</tr>
    					</table>
    				</td>
    			</tr>
    			<tr>
    				<td>
	    				<table width="100%">
	    					<tr>
			    				<td width="20%">&nbsp;<font size="1">TELEPON RUMAH</font></td>
				      			<td width="1%">:</td>
				      			<td><font size="1">{{$data_sph['alamat']}}</font></td>
				      		</tr>
				      	</table>
				    </td>
    			</tr>
    			<tr>
    				<td>
	    				<table width="100%">
	    					<tr>
			    				<td width="20%">&nbsp;<font size="1">STATUS RUMAH</font></td>
			    				<td width="1%">:</td>
				      			<td>
				      				<table>
				      					<tr>
				      						<td>
				      							<font size="1"><input type="checkbox" checked="true"></font>
				      						</td>
				      						<td><font size="1">&nbsp;&nbsp;MILIK SENDIRI</font></td>
				      						<td>
							      				<font size="1">&nbsp;<input type="checkbox" checked="true"></font>
							      			</td>
							      			<td><font size="1">&nbsp;&nbsp;KELUARGA</font></td>
							      			<td>
							      				<font size="1">&nbsp;<input type="checkbox" checked="true"></font>
							      			</td>
							      			<td><font size="1">&nbsp;&nbsp;MILIK PERUSAHAAN</font></td>
							      			<td>
							      				<font size="1">&nbsp;<input type="checkbox" checked="true"></font>
							      			</td>
							      			<td><font size="1">&nbsp;&nbsp;SEWA/KONTRAK</font></td>
				      					</tr>
				      				</table>
				      			</td>
				      		</tr>
				      	</table>
				    </td>			
    			</tr>
    			<tr>
    				<td>
	    				<table width="100%">
	    					<tr>
			    				<td width="25%">&nbsp;<font size="1">ALAMAT PENGIRIMAN SURAT</font></td>
			    				<td width="1%">:</td>
				      			<td>
				      				<table>
				      					<tr>
				      						<td>
				      							<font size="1"><input type="checkbox" checked="true"></font>
				      						</td>
				      						<td><font size="1">&nbsp;&nbsp;ALAMAT DOMISILI SEKARANG</font></td>
				      						<td>
							      				<font size="1">&nbsp;<input type="checkbox" checked="true"></font>
							      			</td>
							      			<td><font size="1">&nbsp;&nbsp;KANTOR</font></td>
							      			<td>
							      				<font size="1">&nbsp;<input type="checkbox" checked="true"></font>
							      			</td>
							      			<td><font size="1">&nbsp;&nbsp;ALAMAT KANTOR</font></td>
							      			<td>
							      				<font size="1">&nbsp;<input type="checkbox" checked="true"></font>
							      			</td>
							      			<td><font size="1">&nbsp;&nbsp;ALAMAT SESUAI KTP</font></td>
				      					</tr>
				      				</table>
				      			</td>
				      		</tr>
				      	</table>
				    </td>			
    			</tr>
    		</table>
    	</td>
	    <td width="50%">
	    	<table width="100%">
    			<tr>
    				<td>
    					<table width="100%">
    						<tr>
    							<td width="20%">&nbsp;<font size="1">JENIS KELAMIN</font></td>
			    				<td width="1%">:</td>
				      			<td width="20%">
				      				<table>
				      					<tr>
				      						<td>
				      							<font size="1"><input type="checkbox" checked="true"></font>
				      						</td>
				      						<td><font size="1">&nbsp;&nbsp;&nbsp;&nbsp;PRIA</font></td>
				      						<td>
							      				<font size="1">&nbsp;&nbsp;&nbsp;<input type="checkbox" checked="true"></font>
							      			</td>
							      			<td><font size="1">&nbsp;&nbsp;&nbsp;&nbsp;WANITA</font></td>
				      					</tr>
				      				</table>
				      			</td>
    						</tr>
    					</table>
    				</td>
    					      			
    			</tr>
    			<tr>
    				<td>
    					<table width="100%">
    						<tr>
			    				<td width="20%">&nbsp;<font size="1">TEMPAT & TANGGAL LAHIR (tgl/bln/th)</font></td>
			    				<td width="1%">:</td>
				      			<td width="20%">&nbsp;<font size="1">{{$data_sph['ktp']}}</font></td>
				      		</tr>
				      	</table>
				    </td>
    			</tr>
    			<tr>
    				<td>
    					<table width="100%">
    						<tr>
			    				<td width="20%">&nbsp;<font size="1">NAMA GADIS IBU KANDUNG</font></td>
			    				<td width="1%">:</td>
				      			<td width="20%">&nbsp;<font size="1">{{$data_sph['ktp']}}</font></td>
				      		</tr>
				      	</table>
				    </td>
    			</tr>
    			<tr>
    				<td>
    					<table width="100%">
    						<tr>
			    				<td width="20%">&nbsp;<font size="1">KEWARGANEGARAAN</font></td>
			    				<td width="1%">:</td>
				      			<td width="20%">&nbsp;<font size="1">{{$data_sph['ktp']}}</font></td>
				      		</tr>
				      	</table>
				    </td>
    			</tr>
    			<tr>
    				<td>
    					<table width="100%">
    						<tr>
			    				<td width="20%">&nbsp;<font size="1">EMAIL</font></td>
			    				<td width="1%">:</td>
				      			<td width="20%">&nbsp;<font size="1">{{$data_sph['ktp']}}</font></td>
				      		</tr>
				      	</table>
				    </td>
    			</tr>
    			<tr>
    				<td>
	    				<table width="100%">
	    					<tr>
			    				<td width="20%">&nbsp;<font size="1">LAMA TINGGAL</font></td>
			    				<td width="1%">:</td>
				      			<td>
				      				<table>
				      					<tr>
				      						<td>
				      							<font size="1">{{$data_sph['nama_debitur']}}</font>
				      						</td>
				      						<td><font size="1">&nbsp;&nbsp;TAHUN</font></td>
				      						<td>
							      				<font size="1">&nbsp;&nbsp;<input type="checkbox" checked="true"></font>
							      			</td>
							      			<td><font size="1">&nbsp;&nbsp;BULAN</font></td>
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
</table>