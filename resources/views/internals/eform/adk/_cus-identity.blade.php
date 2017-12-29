<div class="row">
    <div class="col-md-12" align="center">
        <div class="card-box">
            <form class="form-horizontal" role="form" action="{{route('verifikasi')}}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="eform_id" value="{{$detail['eform_id']}}" id="eform_id">
                <input type="hidden" name="is_verified" id="verifikasi">
                <table class="table table-bordered">
                    <thead class="bg-primary">
                        <tr align="center">
                            <th>Nomor</th>
                            <th>Dokumen</th>
                            <th>MYBRI</th>
                            <th>Dokumen Fisik</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td align="center">1</td>
                            <td>Kartu Tanda Penduduk</td>
                            <td><img src="<?php echo $detail['Url'].'/'.$detail['customer']['personal']['identity']; ?>" width="100" height="100"></td>
                            <td align="center">
                                <?php if($detail['flag_ktp'] == 1){ ?>
                                    <input type="checkbox" name="ktp" class="form-control" value="1" checked="true">
                                <?php } else { ?>
                                    <input type="checkbox" name="ktp" class="form-control">
                                <?php } ?>
                            </td>
                            <td><?php echo $detail['catatan_ktp']?></td>
                            <td align="center"><a href="javascript:void(0);" id="btn-ktp" class="btn btn-success">Update</a></td>
                        </tr>
                        <tr>
                            <td align="center">2</td>
                            <td>Nomor Pokok Wajib Pajak</td>
                            <td><img src="<?php echo $detail['Url'].'/'.$detail['NPWP_nasabah']; ?>" width="100" height="100"></td>
                            <td align="center">
                                <?php if($detail['flag_npwp'] == 1){ ?>
                                    <input type="checkbox" name="npwp" class="form-control" value="1" checked="true">
                                <?php } else { ?>
                                    <input type="checkbox" name="npwp" class="form-control">
                                <?php } ?>
                            </td>
                            <td><?php echo $detail['catatan_npwp']?></td>
                            <td align="center"><a href="#" id="btn-npwp" class="btn btn-success">Update</a></td>
                        </tr>
                        <tr>
                            <td align="center">3</td>
                            <td>Slip Gaji</td>
                            <td><img src="<?php echo $detail['Url'].'/'.$detail['SLIP_GAJI']; ?>" width="100" height="100"></td>
                            <td align="center">
                                <?php if($detail['flag_slip_gaji'] == 1){ ?>
                                    <input type="checkbox" name="slip_gaji" class="form-control" value="1" checked="true">
                                <?php } else { ?>
                                    <input type="checkbox" name="slip_gaji" class="form-control">
                                <?php } ?>
                            </td>
                            <td><?php echo $detail['catatan_gaji']?></td>
                            <td align="center"><a href="#" id="btn-gaji" class="btn btn-success">Update</a></td>
                        </tr>
                        <tr>
                            <td align="center">4</td>
                            <td>Kartu Keluarga</td>
                            <td><img src="<?php echo $detail['Url'].'/'.$detail['KK']; ?>" width="100" height="100"></td>
                            <td align="center">
                                <?php if($detail['flag_kk'] == 1){ ?>
                                    <input type="checkbox" name="kk" class="form-control" value="1" checked="true">
                                <?php } else { ?>
                                    <input type="checkbox" name="kk" class="form-control">
                                <?php } ?>
                            </td>
                            <td><?php echo $detail['catatan_kk']?></td>
                            <td align="center"><a href="#" id="btn-kk" class="btn btn-success">Update</a></td>
                        </tr>
                        <tr>
                            <td align="center">5</td>
                            <td>SK Pertama</td>
                            <td><img src="<?php echo $detail['Url'].'/'.$detail['SK_AWAL']; ?>" width="100" height="100"></td>
                            <td align="center">
                                <?php if($detail['flag_sk_awal'] == 1){ ?>
                                    <input type="checkbox" name="sk_awal" class="form-control" value="1" checked="true">
                                <?php } else { ?>
                                    <input type="checkbox" name="sk_awal" class="form-control">
                                <?php } ?>
                            </td>
                            <td><?php echo $detail['catatan_sk_awal']?></td>
                            <td align="center"><a href="#" id="btn-sk_awal" class="btn btn-success">Update</a></td>
                        </tr>
                        <tr>
                            <td align="center">6</td>
                            <td>SK Terakhir</td>
                            <td><img src="<?php echo $detail['Url'].'/'.$detail['SK_AKHIR']; ?>" width="100" height="100"></td>
                            <td align="center">
                                <?php if($detail['flag_sk_akhir'] == 1){ ?>
                                    <input type="checkbox" name="sk_akhir" class="form-control" value="1" checked="true">
                                <?php } else { ?>
                                    <input type="checkbox" name="sk_akhir" class="form-control">
                                <?php } ?>
                            </td>
                            <td><?php echo $detail['catatan_sk_akhir']?></td>
                            <td align="center"><a href="#" id="btn-sk_akhir" class="btn btn-success">Update</a></td>
                        </tr>
                        <tr>
                            <td align="center">7</td>
                            <td>Surat Rekomendasi</td>
                            <td><img src="<?php echo $detail['Url'].'/'.$detail['REKOMENDASI']; ?>" width="100" height="100"></td>
                            <td align="center">
                                <?php if($detail['flag_rekomendasi'] == 1){ ?>
                                    <input type="checkbox" name="surat_rekomendasi" class="form-control" value="1" checked="true">
                                <?php } else { ?>
                                    <input type="checkbox" name="surat_rekomendasi" class="form-control">
                                <?php } ?>
                            </td>
                            <td><?php echo $detail['catatan_rekomendasi']?></td>
                            <td align="center"><a href="#" id="btn-rekomendasi" class="btn btn-success">Update</a></td>
                        </tr>
                    <?php 
                    if($detail['Payroll'] == '1') {
                        if ($detail['customer']['personal']['status'] != '1') {
                    ?>
                        <tr>
                            <td align="center">8</td>
                            <td>KTP Pasangan</td>
                            <td><img src="<?php echo $detail['Url'].'/'.$detail['customer']['personal']['couple_identity']; ?>" width="100" height="100"></td>
                            <td align="center">
                                <?php if($detail['flag_couple_ktp'] == 1){ ?>
                                    <input type="checkbox" name="ktp_pasangan" class="form-control" value="1" checked="true">
                                <?php } else { ?>
                                    <input type="checkbox" name="ktp_pasangan" class="form-control">
                                <?php } ?>
                            </td>
                            <td><?php echo $detail['catatan_couple_ktp']?></td>
                            <td align="center"><a href="#" id="btn-couple_ktp" class="btn btn-success">Update</a></td>
                        </tr>
                        <tr>
                            <td align="center">9</td>
                            <td>SKPU</td>
                            <td><img src="<?php echo $detail['Url'].'/'.$detail['SKPG']; ?>" width="100" height="100"></td>
                            <td align="center">
                                <?php if($detail['flag_skpu'] == 1){ ?>
                                    <input type="checkbox" name="skpu" class="form-control" value="1" checked="true">
                                <?php } else { ?>
                                    <input type="checkbox" name="skpu" class="form-control">
                                <?php } ?>
                            </td>
                            <td><?php echo $detail['catatan_skpu']?></td>
                            <td align="center"><a href="#" id="btn-skpu" class="btn btn-success">Update</a></td>
                        </tr>
                    <?php   
                        } else {
                    ?>
                        <tr>
                            <td align="center">8</td>
                            <td>SKPU</td>
                            <td><img src="<?php echo $detail['Url'].'/'.$detail['SKPG']; ?>" width="100" height="100"></td>
                            <td align="center">
                                <?php if($detail['flag_skpu'] == 1){ ?>
                                    <input type="checkbox" name="skpu" class="form-control" value="1" checked="true">
                                <?php } else { ?>
                                    <input type="checkbox" name="skpu" class="form-control">
                                <?php } ?>
                            </td>
                            <td><?php echo $detail['catatan_skpu']?></td>
                            <td align="center"><a href="#" id="btn-skpu" class="btn btn-success">Update</a></td>
                        </tr>
                    <?php
                        } 
                    }
                    ?> 
                        <tr>
                            <td colspan="5"></td>
                            <td align="center">
                                <input type="submit" value="Tunda" class="btn btn-primary" id="btn-tunda">
                                <input type="submit" value="Verifikasi" class="btn btn-primary" id="btn-verifikasi">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
@include('internals.eform.adk._modal_catatan')