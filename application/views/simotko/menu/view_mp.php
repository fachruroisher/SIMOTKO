<div class="box">
    <header class="capitalize">
        <div class="icons"><i class="fa fa-user"></i></div>
        <h5>View <?=$posisi?></h5>
        <div class="toolbar">
        <a href="<?=site_url('mp_ad/'.$id_posisi)?>" class="btn btn-sm btn-primary"><i class="fa fa-chevron-left"></i>  Back Manage</a>
    </div>
    </header>            
    <div class="body clearfix">
        <h4 class="capitalize"><?=$nama?></h4>
        <div class="set-pict-mp">
        <?php if(!empty($foo)){ ?>
            <img class="profot-mp" src="<?=base_url('assets/file/'.$foo)?>">
        <?php }else{ ?>
            <img class="profot-mp" src="<?=base_url('assets/img/user.png')?>">
        <?php } ?>
        </div> 
        <table class="penulisan">
            <tr><td>NIK</td><td class="spasi">:</td><td><?=$nik; ?></td></tr>
            <tr><td>Alamat</td><td class="spasi">:</td><td><?=$alamat; ?></td></tr>
            <tr><td>Phone</td><td class="spasi">:</td><td><?=$phone; ?></td></tr>
            <tr><td>No. KTP</td><td class="spasi">:</td><td><?=$ktp; ?></td></tr>
            <tr><td>Join</td><td class="spasi">:</td><td><?=$tgl; ?></td></tr>
            <tr><td>Status</td><td class="spasi">:</td><td><?=$status; ?></td></tr>
            <tr><td>Posisi</td><td class="spasi">:</td><td><?=$posisi; ?></td></tr>
            <tr><td>Area Klien</td><td class="spasi">:</td><td><?=$area; ?></td></tr>
            <tr><td>Teamleader</td><td class="spasi">:</td><td><?=$tl; ?></td></tr>
        </table>
    </div>
</div>
