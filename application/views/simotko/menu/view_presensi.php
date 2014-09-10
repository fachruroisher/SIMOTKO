  
        <div class="body clearfix">
            <h3><i>Record Presensi <strong class="capitalize"><?=$mp_st[0]['nama_posisi']?></strong> at <?=$area[0]['nama_area']?></i></h3>        
            <h5><i>Posted by <strong><?=$mp_st[0]['fullname']?></strong> | <?=$mp_st[0]['tanggal']?> | <strong>Shift <?=$mp_st[0]['nama_shift']?></strong></i></h5>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>  
                        <th>NIK</th>
                        <th>Nama</th>   
                        <th>Status</th> 
                        <th>Kehadiran</th> 
                    </tr>                                            
                </thead>
                <tbody class="capitalize">                    
                    <?php $nom=1; foreach($mp_st as $key) { ?>
                    <tr>
                        <td><?=$nom?></td>  
                        <td><?=$key['nik_mp']?></td>
                        <td><?=$key['nama_mp']?></td>
                        <td><?=$key['jenis_gaji']?></td>
                        <td><?=$key['status_presensi']?></td> 
                    </tr>
                    <?php $nom++; } ?>                    
                </tbody>
            </table>
            <div class="form-actions">
                <div class="col-lg-8 spasi-top">
                    <a href="<?=site_url('pm_ad')?>" class="btn btn-primary">Back</a>
                    <a target="_blank" href="<?=site_url('print_pm/'.$tanggal.'/'.$id_area)?>" class="btn btn-warning"><i class="glyphicon glyphicon-print"></i>  Print</a>
                </div>
                <div class="col-lg-4">
                    <h5><i>Jumlah Karyawan: <strong><?=$ada->num_rows();?></strong> Orang</i></h5>
                    <h5><i>Detail:</i></h5>
                    <ul>
                        <?php foreach ($sts as $k) { 
                            $p = $this->db->query("select * from presensi JOIN man_power ON man_power.nik_mp = presensi.nik_mp where man_power.id_gaji = $k[id_gaji] AND tanggal = '$tanggal' AND man_power.id_area = $id_area"); ?>
                            <li> <?=$p->num_rows()?> karyawan <?=$k['jenis_gaji']?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>   
