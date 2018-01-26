<div class="row">
    <div class="col-md-12" align="center">
        <div class="card-box">
            <div class="tab-scroll">
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
                                <?php } else {?>
                                <a href="<?php echo $detail['Url'].$detail['nik'].'/'.$detail['customer']['personal']['identity']; ?>" class="thumbnail">
                                    <img src="<?php echo $detail['Url'].$detail['nik'].'/'.$detail['customer']['personal']['identity']; ?>" width="100" height="100">
                                </a>
                                <?php } ?>
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
                                <?php } else {?>
                                <a href="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['NPWP_nasabah']; ?>" class="thumbnail">
                                    <img src="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['NPWP_nasabah']; ?>" width="100" height="100">
                                </a>
                                <?php } ?>
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
                                <?php } else {?>
                                <a href="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['SLIP_GAJI']; ?>" class="thumbnail">
                                    <img src="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['SLIP_GAJI']; ?>" width="100" height="100">
                                </a>
                                <?php } ?>
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
                                <?php } else {?>
                                <a href="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['KK']; ?>" class="thumbnail">
                                    <img src="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['KK']; ?>" width="100" height="100">
                                </a>
                                <?php } ?>
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
                                <?php } else {?>
                                <a href="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['SK_AWAL']; ?>" class="thumbnail">
                                    <img src="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['SK_AWAL']; ?>" width="100" height="100">
                                </a>
                                <?php } ?>
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
                                <?php } else {?>
                                <a href="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['SK_AKHIR']; ?>" class="thumbnail">
                                    <img src="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['SK_AKHIR']; ?>" width="100" height="100">
                                </a>
                                <?php } ?>
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
                                <?php } else {?>
                                <a href="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['REKOMENDASI']; ?>" class="thumbnail">
                                    <img src="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['REKOMENDASI']; ?>" width="100" height="100">
                                </a>
                                <?php } ?>
                            </td>
                            <td><?php echo $detail['catatan_rekomendasi']?></td>
                        </tr>
                        <?php 
                        if($detail['Payroll'] == '2') {
                            if ($detail['customer']['personal']['status'] != '1') {
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
                                    <?php } else {?>
                                    <a href="<?php echo $detail['Url'].$detail['nik'].'/'.$detail['customer']['personal']['couple_identity']; ?>" class="thumbnail">
                                        <img src="<?php echo $detail['Url'].$detail['nik'].'/'.$detail['customer']['personal']['couple_identity']; ?>" width="100" height="100">
                                    </a>
                                    <?php } ?>
                                </td>
                                <td><?php echo $detail['catatan_couple_ktp']?></td>
                            </tr>
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
                                    <?php } else {?>
                                    <a href="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['SKPG']; ?>" class="thumbnail">
                                        <img src="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['SKPG']; ?>" width="100" height="100">
                                    </a>
                                    <?php } ?>
                                </td>
                                <td><?php echo $detail['catatan_skpu']?></td>
                            </tr>
                        <?php   
                            }
                        } else {
                        ?>
                            <tr>
                                <td align="center">8</td>
                                <td>SKPU</td>
                                <td>
                                    <?php
                                        $image = substr($detail['SKPG'], 0,4);
                                        if ($image == 'http') {
                                    ?>
                                    <a href="<?php echo $detail['SKPG']; ?>" class="thumbnail" width="100" height="100">
                                        <img src="<?php echo $detail['SKPG']; ?>" width="100" height="100">
                                    </a>
                                    <?php } else {?>
                                    <a href="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['SKPG']; ?>" class="thumbnail">
                                        <img src="<?php echo $detail['Url'].$detail['id_foto'].'/'.$detail['SKPG']; ?>" width="100" height="100">
                                    </a>
                                    <?php } ?>
                                </td>
                                <td><?php echo $detail['catatan_skpu']?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>