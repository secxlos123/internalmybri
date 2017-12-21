<div class="row">
    <div class="col-md-12" align="center">
        <div class="card-box">
            <form class="form-horizontal" role="form" action="{{route('verifikasi')}}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="eform_id" value="{{$detail['eform_id']}}">
                <input type="hidden" name="is_verified" id="verifikasi">
                <table class="table table-bordered">
                    <thead class="bg-primary">
                        <tr align="center">
                            <th>No</th>
                            <th>Dokumen Produk</th>
                            <th>MYBRI</th>
                            <th>Dokumen</th>
                            <th>Catatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>KK</td>
                            <td><img src="<?php echo $detail['Url'].'/'.$detail['KK']; ?>" width="100" height="100"></td>
                            <td>
                                <?php if($detail['flag_kk'] == 1){ ?>
                                    <input type="checkbox" name="kk" class="form-control" value="1" checked="true">
                                <?php } else { ?>
                                    <input type="checkbox" name="kk" class="form-control">
                                <?php } ?>
                            </td>
                            <td>
                                <?php if(!empty($detail['catatan_kk'])){ ?>
                                    <input type="text" name="catatan_kk" class="form-control" value="<?php echo $detail['catatan_kk']?>">
                                <?php } else { ?>
                                    <input type="text" name="catatan_kk" class="form-control">
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>KTP</td>
                            <td><img src="<?php echo $detail['Url'].'/'.$detail['customer']['personal']['identity']; ?>" width="100" height="100"></td>
                            <td>
                                <?php if($detail['flag_ktp'] == 1){ ?>
                                    <input type="checkbox" name="ktp" class="form-control" value="1" checked="true">
                                <?php } else { ?>
                                    <input type="checkbox" name="ktp" class="form-control">
                                <?php } ?>
                            </td>
                            <td>
                                <?php if(!empty($detail['catatan_ktp'])){ ?>
                                    <input type="text" name="catatan_ktp" class="form-control" value="<?php echo $detail['catatan_ktp']?>">
                                <?php } else { ?>
                                    <input type="text" name="catatan_ktp" class="form-control">
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>KTP Pasangan</td>
                            <td><img src="<?php echo $detail['Url'].'/'.$detail['customer']['personal']['couple_identity']; ?>" width="100" height="100"></td>
                            <td>
                                <?php if($detail['flag_couple_ktp'] == 1){ ?>
                                    <input type="checkbox" name="ktp_pasangan" class="form-control" value="1" checked="true">
                                <?php } else { ?>
                                    <input type="checkbox" name="ktp_pasangan" class="form-control">
                                <?php } ?>
                            </td>
                            <td>
                                <?php if(!empty($detail['catatan_couple_ktp'])){ ?>
                                    <input type="text" name="catatan_couple_ktp" class="form-control" value="<?php echo $detail['catatan_couple_ktp']?>">
                                <?php } else { ?>
                                    <input type="text" name="catatan_couple_ktp" class="form-control">
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>NPWP</td>
                            <td><img src="<?php echo $detail['Url'].'/'.$detail['NPWP_nasabah']; ?>" width="100" height="100"></td>
                            <td>
                                <?php if($detail['flag_npwp'] == 1){ ?>
                                    <input type="checkbox" name="npwp" class="form-control" value="1" checked="true">
                                <?php } else { ?>
                                    <input type="checkbox" name="npwp" class="form-control">
                                <?php } ?>
                            </td>
                            <td>
                                <?php if(!empty($detail['catatan_npwp'])){ ?>
                                    <input type="text" name="catatan_npwp" class="form-control" value="<?php echo $detail['catatan_npwp']?>">
                                <?php } else { ?>
                                    <input type="text" name="catatan_npwp" class="form-control">
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Slip Gaji</td>
                            <td><img src="<?php echo $detail['Url'].'/'.$detail['SLIP_GAJI']; ?>" width="100" height="100"></td>
                            <td>
                                <?php if($detail['flag_slip_gaji'] == 1){ ?>
                                    <input type="checkbox" name="slip_gaji" class="form-control" value="1" checked="true">
                                <?php } else { ?>
                                    <input type="checkbox" name="slip_gaji" class="form-control">
                                <?php } ?>
                            </td>
                            <td>
                                <?php if(!empty($detail['catatan_gaji'])){ ?>
                                    <input type="text" name="catatan_gaji" class="form-control" value="<?php echo $detail['catatan_gaji']?>">
                                <?php } else { ?>
                                    <input type="text" name="catatan_gaji" class="form-control">
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>SK Pertama</td>
                            <td><img src="<?php echo $detail['Url'].'/'.$detail['SK_AWAL']; ?>" width="100" height="100"></td>
                            <td>
                                <?php if($detail['flag_sk_awal'] == 1){ ?>
                                    <input type="checkbox" name="sk_awal" class="form-control" value="1" checked="true">
                                <?php } else { ?>
                                    <input type="checkbox" name="sk_awal" class="form-control">
                                <?php } ?>
                            </td>
                            <td>
                                <?php if(!empty($detail['catatan_sk_awal'])){ ?>
                                    <input type="text" name="catatan_sk_awal" class="form-control" value="<?php echo $detail['catatan_sk_awal']?>">
                                <?php } else { ?>
                                    <input type="text" name="catatan_sk_awal" class="form-control">
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>SK Terakhir</td>
                            <td><img src="<?php echo $detail['Url'].'/'.$detail['SK_AKHIR']; ?>" width="100" height="100"></td>
                            <td>
                                <?php if($detail['flag_sk_akhir'] == 1){ ?>
                                    <input type="checkbox" name="sk_akhir" class="form-control" value="1" checked="true">
                                <?php } else { ?>
                                    <input type="checkbox" name="sk_akhir" class="form-control">
                                <?php } ?>
                            </td>
                            <td>
                                <?php if(!empty($detail['catatan_sk_akhir'])){ ?>
                                    <input type="text" name="catatan_sk_akhir" class="form-control" value="<?php echo $detail['catatan_sk_akhir']?>">
                                <?php } else { ?>
                                    <input type="text" name="catatan_sk_akhir" class="form-control">
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>SKPU</td>
                            <td><img src="<?php echo $detail['Url'].'/'.$detail['SKPG']; ?>" width="100" height="100"></td>
                            <td>
                                <?php if($detail['flag_skpu'] == 1){ ?>
                                    <input type="checkbox" name="skpu" class="form-control" value="1" checked="true">
                                <?php } else { ?>
                                    <input type="checkbox" name="skpu" class="form-control">
                                <?php } ?>
                            </td>
                            <td>
                                <?php if(!empty($detail['catatan_skpu'])){ ?>
                                    <input type="text" name="catatan_skpu" class="form-control" value="<?php echo $detail['catatan_skpu']?>">
                                <?php } else { ?>
                                    <input type="text" name="catatan_skpu" class="form-control">
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Surat Rekomendasi</td>
                            <td><img src="<?php echo $detail['Url'].'/'.$detail['REKOMENDASI']; ?>" width="100" height="100"></td>
                            <td>
                                <?php if($detail['flag_rekomendasi'] == 1){ ?>
                                    <input type="checkbox" name="surat_rekomendasi" class="form-control" value="1" checked="true">
                                <?php } else { ?>
                                    <input type="checkbox" name="surat_rekomendasi" class="form-control">
                                <?php } ?>
                            </td>
                            <td>
                                <?php if(!empty($detail['catatan_rekomendasi'])){ ?>
                                    <input type="text" name="catatan_rekomendasi" class="form-control" value="<?php echo $detail['catatan_rekomendasi']?>">
                                <?php } else { ?>
                                    <input type="text" name="catatan_rekomendasi" class="form-control">
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4"></td>
                            <td>
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