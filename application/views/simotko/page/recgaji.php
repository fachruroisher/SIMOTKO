
<?php if($form=='hasil'){ ?>
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="col-lg-12">
                <h3><i>Laporan Gaji Area <strong><?=$area?></strong></i></h3>
                <h5><i>Posted by <?=$teamleader?> | Periode <?=$bulan?> <?=$tahun?></i></h5>
            </div>
            <header>
                <h5>Daftar man power</h5>
            </header> 
            <div class="body">
                <table class="table responsive-table">
                    <thead>
                        <tr>
                            <th>No</th>  
                            <th>Nama</th>
                            <th>Posisi</th>
                            <th>Status</th>
                            <th>Total Gaji</th>
                        </tr>                                            
                    </thead>
                    <tbody>
                    <?php $nomor=1;
                    foreach ($total as $key) { ?>
                        <tr class="capitalize">
                            <td><?=$nomor?></td> 
                            <td><?=$key['nama_mp']?></td>
                            <td><?=$key['nama_posisi']?></td> 
                            <td><?=$key['jenis_gaji']?></td>
                            <td>Rp. <?=$key['total_gaji']?>,-</td>
                        </tr>
                    <?php $nomor++; } ?>
                    </tbody>
                </table>
                <a href="<?=site_url('rg_ad')?>" class="btn btn-primary"> Back</a>
                <a target="_blank" href="<?=site_url('print_rg/'.$key['id_area'].'/'.$key['bulan_penerimaan'].'/'.$key['tahun_penerimaan'])?>" class="btn btn-warning"><i class="glyphicon glyphicon-print"></i>  Print</a>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<div class="row">
    <div class="col-lg-12">
<div class="box">
    <header class="penulisan">
        <h5><?=$title?></h5>
        <?php if($form=='index'){ ?>
            <div class="toolbar">     
                <a href="#<?=$id_button?>" class="butmar accordion-toggle btn btn-sm btn-primary " data-toggle="collapse"><?=$button?></a>                                       
            </div>
        <?php } ?>
    </header>      
    <div id="<?=$id_button?>" class="collapse out">
        <?php include'/../menu/form_add_rg.php'; ?>
    </div>  
    <div class="body">
        <table id="dataTable" class="table table-striped responsive-table">
            <thead>
                <tr>
                    <th>No</th>  
                    <th>Area</th>
                    <th>Bulan</th>
                    <th>Tahun</th>
                    <th>Action</th> 
                </tr>                                            
            </thead>
            <tbody>
            <?php $nomor=1; foreach ($content as $key) { 
                $bulan = $key['bulan_penerimaan'];
                if($bulan==01){
                    $c = "Januari";
                }elseif ($bulan==02) {
                    $c = "Februari";
                }elseif ($bulan==03) {
                    $c = "Maret";
                }elseif ($bulan==04) {
                    $c = "April";
                }elseif ($bulan==05) {
                    $c = "Mei";
                }elseif ($bulan==06) {
                    $c = "Juni";
                }elseif ($bulan==07) {
                    $c = "Juli";
                }elseif ($bulan==08) {
                    $c = "Agustus";
                }elseif ($bulan==09) {
                    $c = "September";
                }elseif ($bulan==10) {
                    $c = "Oktober";
                }elseif ($bulan==11) {
                    $c = "November";
                }elseif ($bulan==12) {
                    $c = "Desember";
                };
            ?>
            <tr class="capitalize">
                <td><?=$nomor?></td> 
                <td><?=$key['nama_area']?></td>
                <td><?=$c?></td> 
                <td><?=$key['tahun_penerimaan']?></td>
                <td>
                    <a title="View" class='btn btn-success btn-grad btnDetail fa fa-search' href="<?=site_url('rg_cetak/'.$key['id_area'].'/'.$bulan.'/'.$key['tahun_penerimaan'])?>"></a>
                </td>                                                  
            </tr>
            <?php $nomor++; } ?>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>