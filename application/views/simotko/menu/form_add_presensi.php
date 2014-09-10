<div class="body clearfix">
    <h4>Presensi Area <strong class="uppercase"><?=$area[0]['nama_area']?></strong></h4>
    <form action="<?= site_url('/').$access ?>" enctype="multipart/form-data" method="post" class="form-horizontal martop" id="block-validate">
        <div class="form-group">
            <div class="col-lg-2">
                <input type="hidden" name="area" value="<?=$area[0]['id_area']?>">
                <input type="date" id="date2" name="tgl" value="" class="form-control" required>
            </div>
            <div class="col-lg-3">  
                <input readonly type="text" value="Posisi <?=$posisi[0]['nama_posisi']?>" class="form-control capitalize">
            </div> 
            <div class="col-lg-2">
                <input type="hidden" name="shift" value="<?=$shift[0]['id_shift']?>">
                <input readonly type="text" value="Shift <?=$shift[0]['nama_shift']?>" class="form-control">
            </div> 
        </div>
        <div class="body">
            <table class="table table-striped responsive-table">
                <tr>
                    <td>No</td>
                    <td>NIK</td>
                    <td>Man Power</td>
                    <td>Status</td>
                </tr>
                <?php 
                $num=1;
                foreach ($mp_st as $key) { ?>
                <tr>
                    <td><?=$num?></td>
                    <td><input type="hidden" value="<?=$key['nik_mp']?>" name="nik[]"><?=$key['nik_mp']?></td>
                    <td><?=$key['nama_mp']?></td>
                    <td>
                        <div id="label-switch" class="make-switch switch-small" data-on-label=" Hadir " data-off-label=" Tidak ">
                            <input type="checkbox" name="status[]" checked>
                        </div>
                    </td>
                </tr>
                <?php $num++; } ?>                
            </table>
        </div>
        <?php if(!empty($mp_st)){ ?>
        <div class="form-actions">
            <input type="submit" value="<?=$submit?>" class="btn btn-primary">
            <a href="<?=site_url('pm_ad')?>" class="btn btn-warning">Cancel</a>
        </div>
        <?php }else{ ?>
        Belum ada data man power <a href="<?=site_url('pm_ad')?>" class="btn btn-sm btn-warning">Back</a>
        <?php } ?>
    </form>
</div>                  
