<html>
	<head>
		<title><?=$title?></title>
		<link rel="stylesheet" href="<?=base_url('assets/lib/bootstrap/css/bootstrap.css')?>">
		<link rel="stylesheet" href="<?=base_url('assets/css/main.css')?>"/>
	</head>
    <!-- onload="window.print()" -->
	<body onload="window.print()">
        <?php if ($form=='CetakPM') { ?>
        <div class="col-lg-10">
            <div class="body clearfix">
                <h3><i>Record Presensi <strong class="capitalize"><?=$mp_st[0]['nama_posisi']?></strong> at <?=$area[0]['nama_area']?></i></h3>        
                <h4><i>Posted by <strong><?=$mp_st[0]['fullname']?></strong> | <?=$mp_st[0]['tanggal']?> | <strong>Shift <?=$mp_st[0]['nama_shift']?></strong></i></h4><br/><br/>
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
                            <td><div style="color:blue;"><?=$key['status_presensi']?></div></td> 
                        </tr>
                        <?php $nom++; } ?>                    
                    </tbody>
                </table><br/>    
                <div class="form-actions">
                    <div class="col-lg-4">
                        <h4><i>Jumlah Karyawan: <strong><?=$total_hadir?></strong> Orang</i></h4>
                        <h4><strong><i>Detail:</i></strong></h4>
                        <ul>
                            <?php foreach ($sts as $k) { 
                            $p = $this->db->query("select * from presensi JOIN man_power ON man_power.nik_mp = presensi.nik_mp where man_power.id_gaji = $k[id_gaji] AND tanggal = '$tanggal' AND man_power.id_area = $id_area"); ?>
                            <li> <?=$p->num_rows()?> karyawan <?=$k['jenis_gaji']?></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <?php }elseif ($form=="CetakGaji") { ?>
        <div class="col-lg-10">
            <div class="body clearfix">
                <h2><i>Laporan Gaji Area <strong class="capitalize"><?=$area?></strong></i></h2>        
                <h4><i>Posted by <?=$teamleader?> | Periode <?=$bulan?> <?=$tahun?></i></h4><br/><br/>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>  
                            <th>NIK</th>
                            <th>Nama</th>   
                            <th>Posisi</th> 
                            <th>Status</th> 
                            <th>Total Gaji</th> 
                        </tr>                                            
                    </thead>
                    <tbody class="capitalize">                    
                        <?php $nom=1; foreach($content as $key) { ?>
                        <tr>
                            <td><?=$nom?></td>  
                            <td><?=$key['nik_mp']?></td>
                            <td><?=$key['nama_mp']?></td>
                            <td><?=$key['nama_posisi']?></td>
                            <td><?=$key['jenis_gaji']?></td>
                            <td>Rp. <?=$key['nominal']?>,-</td> 
                        </tr>
                        <?php $nom++; } ?>                    
                    </tbody>
                </table>
            </div>
        </div>
        <?php } ?>		  
	</body>
</html>