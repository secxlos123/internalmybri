<div class="row">
    <div class="col-md-12" align="center">
        <div class="card-box">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%">
                    <thead class="bg-primary">
                        <tr align="center">
                            <th>Nomor</th>
                            <th>Dokumen</th>
                            <th>MYBRI</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td align="center">1</td>
                            <td>Kartu Tanda Penduduk</td>
                            <td>
                                <?php
                                    $image = substr($detail['customer']['personal']['identity'], 0,4);
                                    if ($image == 'http') {
                                ?>
                                <a href="<?php echo $detail['customer']['personal']['identity']; ?>" class="thumbnail">
                                    <img src="<?php echo $detail['customer']['personal']['identity']; ?>" width="100" height="100">
                                </a>
                                <?php } elseif(empty($detail['customer']['personal']['identity']) || $detail['customer']['personal']['identity'] == '' || $detail['customer']['personal']['identity'] == 'null') {?>
                                <a href="#" class="thumbnail">
                                    <img src="{{asset('assets/images/no-image.jpg')}}" width="100" height="100">
                                </a>
                                <?php } else {
                                    $pdf = substr($detail['customer']['personal']['identity'], -4);
                                    if ($pdf == '.pdf') {
                                ?>
                                    Data PDF Kartu Tanda Penduduk
                                    <a href="<?php echo $detail['Url'].$detail['nik'].'/'.$detail['customer']['personal']['identity']; ?>" target="_blank"><img src="{{ asset('assets/images/download.png') }}" width="50" class="img-responsive"></a>
                                <?php
                                    } else {
                                ?>
                                <a href="<?php echo $detail['Url'].$detail['nik'].'/'.$detail['customer']['personal']['identity']; ?>" class="thumbnail">
                                    <img src="<?php echo $detail['Url'].$detail['nik'].'/'.$detail['customer']['personal']['identity']; ?>" width="100" height="100">
                                </a>
                                <?php } } ?>
                            </td>
                            <td><?php echo $detail['catatan_ktp']?></td>
                        </tr>
                        <tr>
                            <td align="center">2</td>
                            <td>Nomor Pokok Wajib Pajak</td>
                            <td>
                                <?php
                                    $image = substr($detail['NPWP_nasabah'], 0,4);
                                    if ($image == 'http') {
                                ?>
                                <a href="<?php echo $detail['NPWP_nasabah']; ?>" class="thumbnail">
                                    <img src="<?php echo $detail['NPWP_nasabah']; ?>" width="100" height="100">
                                </a>
                                <?php } elseif(empty($detail['NPWP_nasabah']) || $detail['NPWP_nasabah'] == 'null' || $detail['NPWP_nasabah'] == '') {?>
                                <a href="#" class="thumbnail">
                                    <img src="{{asset('assets/images/no-image.jpg')}}" width="100" height="100">
                                </a>
                                <?php } else {
                                    $pdf = substr($detail['NPWP_nasabah'], -4);
                                    if ($pdf == '.pdf') {
                                ?>
                                    Data PDF Nomor Pokok Wajib Pajak
                                    <a href="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['NPWP_nasabah']; ?>" target="_blank"><img src="{{ asset('assets/images/download.png') }}" width="50" class="img-responsive"></a>
                                <?php
                                    } else {
                                ?>
                                <a href="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['NPWP_nasabah']; ?>" class="thumbnail">
                                    <img src="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['NPWP_nasabah']; ?>" width="100" height="100">
                                </a>
                                <?php } } ?>
                            </td>
                            <td><?php echo $detail['catatan_npwp']?></td>
                        </tr>
                        <tr>
                            <td align="center">3</td>
                            <td>Slip Gaji</td>
                            <td>
                                <?php
                                    $image = substr($detail['SLIP_GAJI'], 0,4);
                                    if ($image == 'http') {
                                ?>
                                <a href="<?php echo $detail['SLIP_GAJI']; ?>" class="thumbnail">
                                    <img src="<?php echo $detail['SLIP_GAJI']; ?>" width="100" height="100">
                                </a>
                                <?php } elseif(empty($detail['SLIP_GAJI']) || $detail['SLIP_GAJI'] == '' || $detail['SLIP_GAJI'] == 'null') {?>
                                <a href="#" class="thumbnail">
                                    <img src="{{asset('assets/images/no-image.jpg')}}" width="100" height="100">
                                </a>
                                <?php } else {
                                    $pdf = substr($detail['SLIP_GAJI'], -4);
                                    if ($pdf == '.pdf') {
                                ?>
                                    Data PDF Slip Gaji
                                    <a href="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['SLIP_GAJI']; ?>" target="_blank"><img src="{{ asset('assets/images/download.png') }}" width="50" class="img-responsive"></a>
                                <?php
                                    } else {
                                ?>
                                <a href="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['SLIP_GAJI']; ?>" class="thumbnail">
                                    <img src="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['SLIP_GAJI']; ?>" width="100" height="100">
                                </a>
                                <?php } } ?>
                            </td>
                            <td><?php echo $detail['catatan_gaji']?></td>
                        </tr>
                        <tr>
                            <td align="center">4</td>
                            <td>Kartu Keluarga</td>
                            <td>
                                <?php
                                    $image = substr($detail['KK'], 0,4);
                                    if ($image == 'http') {
                                ?>
                                <a href="<?php echo $detail['KK']; ?>" class="thumbnail">
                                    <img src="<?php echo $detail['KK']; ?>" width="100" height="100">
                                </a>
                                <?php } elseif(empty($detail['KK']) || $detail['KK'] == '' || $detail['KK'] == 'null') {?>
                                <a href="#" class="thumbnail">
                                    <img src="{{asset('assets/images/no-image.jpg')}}" width="100" height="100">
                                </a>
                                <?php } else {
                                    $pdf = substr($detail['KK'], -4);
                                    if ($pdf == '.pdf') {
                                ?>
                                    Data PDF Kartu Keluarga
                                    <a href="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['KK']; ?>" target="_blank"><img src="{{ asset('assets/images/download.png') }}" width="50" class="img-responsive"></a>
                                <?php
                                    } else {
                                ?>
                                <a href="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['KK']; ?>" class="thumbnail">
                                    <img src="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['KK']; ?>" width="100" height="100">
                                </a>
                                <?php } }?>
                            </td>
                            <td><?php echo $detail['catatan_kk']?></td>
                        </tr>
                        <tr>
                            <td align="center">5</td>
                            <td>SK Pertama</td>
                            <td>
                                <?php
                                    $image = substr($detail['SK_AWAL'], 0,4);
                                    if ($image == 'http') {
                                ?>
                                <a href="<?php echo $detail['SK_AWAL']; ?>" class="thumbnail">
                                    <img src="<?php echo $detail['SK_AWAL']; ?>" width="100" height="100">
                                </a>
                                <?php } elseif(empty($detail['SK_AWAL']) || $detail['SK_AWAL'] == '' || $detail['SK_AWAL'] == 'null') {?>
                                <a href="#" class="thumbnail">
                                    <img src="{{asset('assets/images/no-image.jpg')}}" width="100" height="100">
                                </a>
                                <?php } else {
                                    $pdf = substr($detail['SK_AWAL'], -4);
                                    if ($pdf == '.pdf') {
                                ?>
                                    Data PDF SK Pertama
                                    <a href="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['SK_AWAL']; ?>" target="_blank"><img src="{{ asset('assets/images/download.png') }}" width="50" class="img-responsive"></a>
                                <?php
                                    } else {
                                ?>
                                <a href="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['SK_AWAL']; ?>" class="thumbnail">
                                    <img src="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['SK_AWAL']; ?>" width="100" height="100">
                                </a>
                                <?php } } ?>
                            </td>
                            <td><?php echo $detail['catatan_sk_awal']?></td>
                        </tr>
                        <tr>
                            <td align="center">6</td>
                            <td>SK Terakhir</td>
                            <td>
                                <?php
                                    $image = substr($detail['SK_AKHIR'], 0,4);
                                    if ($image == 'http') {
                                ?>
                                <a href="<?php echo $detail['SK_AKHIR']; ?>" class="thumbnail">
                                    <img src="<?php echo $detail['SK_AKHIR']; ?>" width="100" height="100">
                                </a>
                                <?php } elseif(empty($detail['SK_AKHIR']) || $detail['SK_AKHIR'] == '' || $detail['SK_AKHIR'] == 'null') {?>
                                <a href="#" class="thumbnail">
                                    <img src="{{asset('assets/images/no-image.jpg')}}" width="100" height="100">
                                </a>
                                <?php } else {
                                    $pdf = substr($detail['SK_AKHIR'], -4);
                                    if ($pdf == '.pdf') {
                                ?>
                                    Data PDF SK Terakhir
                                    <a href="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['SK_AKHIR']; ?>" target="_blank"><img src="{{ asset('assets/images/download.png') }}" width="50" class="img-responsive"></a>
                                <?php
                                    } else {
                                ?>
                                <a href="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['SK_AKHIR']; ?>" class="thumbnail">
                                    <img src="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['SK_AKHIR']; ?>" width="100" height="100">
                                </a>
                                <?php } } ?>
                            </td>
                            <td><?php echo $detail['catatan_sk_akhir']?></td>
                        </tr>
                        <tr>
                            <td align="center">7</td>
                            <td>Surat Rekomendasi</td>
                            <td>
                                <?php
                                    $image = substr($detail['REKOMENDASI'], 0,4);
                                    if ($image == 'http') {
                                ?>
                                <a href="<?php echo $detail['REKOMENDASI']; ?>" class="thumbnail">
                                    <img src="<?php echo $detail['REKOMENDASI']; ?>" width="100" height="100">
                                </a>
                                <?php } elseif(empty($detail['REKOMENDASI']) || $detail['REKOMENDASI'] == '' || $detail['REKOMENDASI'] == 'null') {?>
                                <a href="#" class="thumbnail">
                                    <img src="{{asset('assets/images/no-image.jpg')}}" width="100" height="100">
                                </a>
                                <?php } else {
                                    $pdf = substr($detail['REKOMENDASI'], -4);
                                    if ($pdf == '.pdf') {
                                ?>
                                    Data PDF Surat Rekomendasi
                                    <a href="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['REKOMENDASI']; ?>" target="_blank"><img src="{{ asset('assets/images/download.png') }}" width="50" class="img-responsive"></a>
                                <?php
                                    } else {
                                ?>
                                <a href="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['REKOMENDASI']; ?>" class="thumbnail">
                                    <img src="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['REKOMENDASI']; ?>" width="100" height="100">
                                </a>
                                <?php } } ?>
                            </td>
                            <td><?php echo $detail['catatan_rekomendasi']?></td>
                        </tr>


                        <tr>
                                <td align="center">8</td>
                                <td>Pas Foto / Selfie</td>
                                <td>
                                    <?php
                                        $image = substr($detail['customer']['personal']['identity_selfie'], 0,4);
                                        if ($image == 'http') {
                                    ?>
                                    <a href="<?php echo $detail['customer']['personal']['identity_selfie']; ?>" class="thumbnail">
                                        <img src="<?php echo $detail['customer']['personal']['identity_selfie']; ?>" width="100" height="100">
                                    </a>
                                    <?php } elseif(empty($detail['customer']['personal']['identity_selfie']) || $detail['customer']['personal']['identity_selfie'] == '' || $detail['customer']['personal']['identity_selfie'] == 'null') {?>
                                    <a href="#" class="thumbnail">
                                        <img src="{{asset('assets/images/no-image.jpg')}}" width="100" height="100">
                                    </a>
                                    <?php } else {
                                        $pdf = substr($detail['customer']['personal']['identity_selfie'], -4);
                                        if ($pdf == '.pdf') {
                                    ?>
                                        Data PDF Foto Selfie
                                        <a href="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['customer']['personal']['identity_selfie']; ?>" target="_blank"><img src="{{ asset('assets/images/download.png') }}" width="50" class="img-responsive"></a>
                                    <?php
                                        } else {
                                    ?>
                                    <a href="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['customer']['personal']['identity_selfie']; ?>" class="thumbnail">
                                        <img src="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['customer']['personal']['identity_selfie']; ?>" width="100" height="100">
                                    </a>
                                    <?php } } ?>
                                </td>
                                <td>
                                    <!-- <p id="lab-rekomendasi"><?php echo $detail['catatan_rekomendasi']?></p> -->
                                </td>
                            </tr>



                        <?php 
                        if($detail['Payroll'] == '2') {
                        ?>
                            <tr>
                                <td align="center">9</td>
                                <td>SKPU</td>
                                <td>
                                    <?php
                                        $image = substr($detail['SKPG'], 0,4);
                                        if ($image == 'http') {
                                    ?>
                                    <a href="<?php echo $detail['SKPG']; ?>" class="thumbnail">
                                        <img src="<?php echo $detail['SKPG']; ?>" width="100" height="100">
                                    </a>
                                    <?php } elseif(empty($detail['SKPG']) || $detail['SKPG'] == '' || $detail['SK_AWAL'] == 'null') {?>
                                    <a href="#" class="thumbnail">
                                        <img src="{{asset('assets/images/no-image.jpg')}}" width="100" height="100">
                                    </a>
                                    <?php } else {
                                        $pdf = substr($detail['SKPG'], -4);
                                        if ($pdf == '.pdf') {
                                    ?>
                                        Data PDF SKPU
                                        <a href="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['SKPG']; ?>" target="_blank"><img src="{{ asset('assets/images/download.png') }}" width="50" class="img-responsive"></a>
                                    <?php
                                        } else {
                                    ?>
                                    <a href="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['SKPG']; ?>" class="thumbnail">
                                        <img src="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['SKPG']; ?>" width="100" height="100">
                                    </a>
                                    <?php } } ?>
                                </td>
                                <td><?php echo $detail['catatan_skpu']?></td>
                            </tr>
                        <?php
                            if ($detail['customer']['personal']['status'] == '2') {
                        ?>
                            <tr>
                                <td align="center">10</td>
                                <td>KTP Pasangan</td>
                                <td>
                                    <?php
                                        $image = substr($detail['customer']['personal']['couple_identity'], 0,4);
                                        if ($image == 'http') {
                                    ?>
                                    <a href="<?php echo $detail['customer']['personal']['couple_identity']; ?>" class="thumbnail">
                                        <img src="<?php echo $detail['customer']['personal']['couple_identity']; ?>" width="100" height="100">
                                    </a>
                                    <?php } elseif(empty($detail['customer']['personal']['couple_identity']) || $detail['customer']['personal']['couple_identity'] == '' || $detail['customer']['personal']['couple_identity'] == 'null') {?>
                                    <a href="#" class="thumbnail">
                                        <img src="{{asset('assets/images/no-image.jpg')}}" width="100" height="100">
                                    </a>
                                    <?php } else {
                                        $pdf = substr($detail['customer']['personal']['couple_identity'], -4);
                                        if ($pdf == '.pdf') {
                                    ?>
                                        Data PDF KTP Pasangan
                                        <a href="<?php echo $detail['Url'].$detail['nik'].'/'.$detail['customer']['personal']['couple_identity']; ?>" target="_blank"><img src="{{ asset('assets/images/download.png') }}" width="50" class="img-responsive"></a>
                                    <?php
                                        } else {
                                    ?>
                                    <a href="<?php echo $detail['Url'].$detail['nik'].'/'.$detail['customer']['personal']['couple_identity']; ?>" class="thumbnail">
                                        <img src="<?php echo $detail['Url'].$detail['nik'].'/'.$detail['customer']['personal']['couple_identity']; ?>" width="100" height="100">
                                    </a>
                                    <?php } }?>
                                </td>
                                <td><?php echo $detail['catatan_couple_ktp']?></td>
                            </tr>

                            <tr>
                                <td align="center">11</td>
                                <td>Pas Foto / Selfie Pasangan</td>
                                <td>
                                    <?php
                                        $image = substr($detail['customer']['personal']['couple_identity_selfie'], 0,4);
                                        if ($image == 'http') {
                                    ?>
                                    <a href="<?php echo $detail['customer']['personal']['couple_identity_selfie']; ?>" class="thumbnail">
                                        <img src="<?php echo $detail['customer']['personal']['couple_identity_selfie']; ?>" width="100" height="100">
                                    </a>
                                    <?php } elseif(empty($detail['customer']['personal']['couple_identity_selfie']) || $detail['customer']['personal']['couple_identity_selfie'] == '' || $detail['customer']['personal']['couple_identity_selfie'] == 'null') {?>
                                    <a href="#" class="thumbnail">
                                        <img src="{{asset('assets/images/no-image.jpg')}}" width="100" height="100">
                                    </a>
                                    <?php } else {
                                        $pdf = substr($detail['customer']['personal']['couple_identity_selfie'], -4);
                                        if ($pdf == '.pdf') {
                                    ?>
                                        Data PDF Foto Selfie
                                        <a href="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['customer']['personal']['couple_identity_selfie']; ?>" target="_blank"><img src="{{ asset('assets/images/download.png') }}" width="50" class="img-responsive"></a>
                                    <?php
                                        } else {
                                    ?>
                                    <a href="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['customer']['personal']['couple_identity_selfie']; ?>" class="thumbnail">
                                        <img src="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['customer']['personal']['couple_identity_selfie']; ?>" width="100" height="100">
                                    </a>
                                    <?php } } ?>
                                </td>
                                <td>
                                    <!-- <p id="lab-rekomendasi"><?php echo $detail['catatan_rekomendasi']?></p> -->
                                </td>
                            </tr>
                        <?php   
                            }
                        } else {
                            if ($detail['customer']['personal']['status'] == '2') {
                        ?>
                            <tr>
                                <td align="center">8</td>
                                <td>KTP Pasangan</td>
                                <td>
                                    <?php
                                        $image = substr($detail['customer']['personal']['couple_identity'], 0,4);
                                        if ($image == 'http') {
                                    ?>
                                    <a href="<?php echo $detail['customer']['personal']['couple_identity']; ?>" class="thumbnail">
                                        <img src="<?php echo $detail['customer']['personal']['couple_identity']; ?>" width="100" height="100">
                                    </a>
                                    <?php } elseif(empty($detail['customer']['personal']['couple_identity']) || $detail['customer']['personal']['couple_identity'] == '' || $detail['customer']['personal']['couple_identity'] == 'null') {?>
                                    <a href="#" class="thumbnail">
                                        <img src="{{asset('assets/images/no-image.jpg')}}" width="100" height="100">
                                    </a>
                                    <?php } else {
                                        $pdf = substr($detail['customer']['personal']['couple_identity'], -4);
                                        if ($pdf == '.pdf') {
                                    ?>
                                        Data PDF KTP Pasangan
                                        <a href="<?php echo $detail['Url'].$detail['nik'].'/'.$detail['customer']['personal']['couple_identity']; ?>" target="_blank"><img src="{{ asset('assets/images/download.png') }}" width="50" class="img-responsive"></a>
                                    <?php
                                        } else {
                                    ?>
                                    <a href="<?php echo $detail['Url'].$detail['nik'].'/'.$detail['customer']['personal']['couple_identity']; ?>" class="thumbnail">
                                        <img src="<?php echo $detail['Url'].$detail['nik'].'/'.$detail['customer']['personal']['couple_identity']; ?>" width="100" height="100">
                                    </a>
                                    <?php } }?>
                                </td>
                                <td><?php echo $detail['catatan_couple_ktp']?></td>
                            </tr>

                            <tr>
                                <td align="center">9</td>
                                <td>Pas Foto / Selfie Pasangan</td>
                                <td>
                                    <?php
                                        $image = substr($detail['customer']['personal']['couple_identity_selfie'], 0,4);
                                        if ($image == 'http') {
                                    ?>
                                    <a href="<?php echo $detail['customer']['personal']['couple_identity_selfie']; ?>" class="thumbnail">
                                        <img src="<?php echo $detail['customer']['personal']['couple_identity_selfie']; ?>" width="100" height="100">
                                    </a>
                                    <?php } elseif(empty($detail['customer']['personal']['couple_identity_selfie']) || $detail['customer']['personal']['couple_identity_selfie'] == '' || $detail['customer']['personal']['couple_identity_selfie'] == 'null') {?>
                                    <a href="#" class="thumbnail">
                                        <img src="{{asset('assets/images/no-image.jpg')}}" width="100" height="100">
                                    </a>
                                    <?php } else {
                                        $pdf = substr($detail['customer']['personal']['couple_identity_selfie'], -4);
                                        if ($pdf == '.pdf') {
                                    ?>
                                        Data PDF Foto Selfie
                                        <a href="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['customer']['personal']['couple_identity_selfie']; ?>" target="_blank"><img src="{{ asset('assets/images/download.png') }}" width="50" class="img-responsive"></a>
                                    <?php
                                        } else {
                                    ?>
                                    <a href="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['customer']['personal']['couple_identity_selfie']; ?>" class="thumbnail">
                                        <img src="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['customer']['personal']['couple_identity_selfie']; ?>" width="100" height="100">
                                    </a>
                                    <?php } } ?>
                                </td>
                                <td>
                                    <!-- <p id="lab-rekomendasi"><?php echo $detail['catatan_rekomendasi']?></p> -->
                                </td>
                            </tr>
                        <?php
                            }
                        }
                        ?>
                        <tr>
                            <td align="center">Foto Lainnya</td>
                            <td>
                                <?php
                                    if (!empty($detail['lainnya1']) || $detail['lainnya1'] != '') {
                                        $lainnya1 = pathinfo($detail['Url'].$detail['id_foto'].'/'.$detail['lainnya1']);
                                        echo str_replace('-', ' ', $lainnya1['filename']);
                                ?>
                                <a href="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['lainnya1']; ?>" class="thumbnail">
                                    <img src="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['lainnya1']; ?>" width="100" height="100">
                                </a>
                                <?php } else {?>
                                <a href="#" class="thumbnail">
                                    <img src="{{asset('assets/images/no-image.jpg')}}" width="100" height="100">
                                </a>
                                <?php 
                                    }
                                    if (!empty($detail['lainnya2']) || $detail['lainnya2'] != '') {
                                        $lainnya2 = pathinfo($detail['Url'].$detail['id_foto'].'/'.$detail['lainnya2']);
                                        echo str_replace('-', ' ', $lainnya2['filename']);
                                ?>
                                <a href="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['lainnya2']; ?>" class="thumbnail">
                                    <img src="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['lainnya2']; ?>" width="100" height="100">
                                </a>
                                <?php } else {?>
                                <a href="#" class="thumbnail">
                                    <img src="{{asset('assets/images/no-image.jpg')}}" width="100" height="100">
                                </a>
                                <?php 
                                    } 
                                    if (!empty($detail['lainnya3']) || $detail['lainnya3'] != '') {
                                        $lainnya3 = pathinfo($detail['Url'].$detail['id_foto'].'/'.$detail['lainnya3']);
                                        echo str_replace('-', ' ', $lainnya3['filename']);
                                ?>
                                <a href="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['lainnya3']; ?>" class="thumbnail">
                                    <img src="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['lainnya3']; ?>" width="100" height="100">
                                </a>
                                <?php } else {?>
                                <a href="#" class="thumbnail">
                                    <img src="{{asset('assets/images/no-image.jpg')}}" width="100" height="100">
                                </a>
                                <?php } ?>
                            </td>
                            <td>
                                <?php
                                    if (!empty($detail['lainnya4']) || $detail['lainnya4'] != '') {
                                        $lainnya4 = pathinfo($detail['Url'].$detail['id_foto'].'/'.$detail['lainnya4']);
                                        echo str_replace('-', ' ', $lainnya4['filename']);
                                ?>
                                <a href="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['lainnya4']; ?>" class="thumbnail">
                                    <img src="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['lainnya4']; ?>" width="100" height="100">
                                </a>
                                <?php } else {?>
                                <a href="#" class="thumbnail">
                                    <img src="{{asset('assets/images/no-image.jpg')}}" width="100" height="100">
                                </a>
                                <?php 
                                    }
                                    if (!empty($detail['lainnya5']) || $detail['lainnya5'] != '') {
                                        $lainnya5 = pathinfo($detail['Url'].$detail['id_foto'].'/'.$detail['lainnya5']);
                                        echo str_replace('-', ' ', $lainnya5['filename']);
                                ?>
                                <a href="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['lainnya5']; ?>" class="thumbnail">
                                    <img src="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['lainnya5']; ?>" width="100" height="100">
                                </a>
                                <?php } else {?>
                                <a href="#" class="thumbnail">
                                    <img src="{{asset('assets/images/no-image.jpg')}}" width="100" height="100">
                                </a>
                                <?php } ?>
                            </td>
                            <td>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>