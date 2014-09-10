<?php if(!empty($daily_set)){?>
    <form action="<?= site_url('/'.$access)?>" method="post" class="form-horizontal martop" id="block-validate">
        <div class="body clearfix">
            <h3><i>Daily Report at <strong><?=$tanggal?></strong></i></h3>        
            <h5><i>Posted by <strong><?=$daily_set[0]['fullname']?></strong></i></h5>
            <input value="<?=$tanggal?>" type="hidden" name="tanggal">
            <input value="<?=$tl?>" type="hidden" name="tl">
            <?php foreach($daily_set as $key) { ?>        
            <input value="<?=$key['id_report']?>" type="hidden" name="kode[]">           
            <div class="form-group col-lg-12 ">                      
                <div class="bootstrap-timepicker col-lg-2 row ">
                    <input value="<?=$key['jam_mulai']?>" class="timepicker5 form-control" type="text" name="mulai[]" class="input-small form-control"><i class="icon-time"></i>
                </div> 
                <div class="col-lg-1 jarak">s/d</div>
                <div class="bootstrap-timepicker col-lg-2 row">
                    <input value="<?=$key['jam_selesai']?>" class="timepicker5 form-control" name="selesai[]" type="text" class="input-small form-control"><i class="icon-time"></i>
                </div>
                <div class="col-lg-5 row">
                    <div class="col-lg-12">
                        <input value="<?=$key['keterangan']?>" type="text" placeholder="Keterangan" name="isi[]" class="form-control" required>
                    </div>
                </div>
                <div class="col-lg-2 row">
                    <select name="status[]" class="form-control">
                        <option value="<?=$key['status_report']?>"><?=$key['status_report']?></option>
                        <option value="proses">Proses</option>
                        <option value="selesai">Selesai</option>
                    </select>
                </div>
                <div class="col-lg-1">
                    <a href="<?=site_url('d_vd/'.$key['id_report'])?>" class="btn btn-danger" onclick="return confirm('Yakin untuk Hapus Report ini ?')"><i class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <?php } ?>
            <div class="form-actions no-margin-bottom">
                <input type="submit" value="<?=$submit?>" class="btn btn-primary">
                <a href="<?=site_url('vd_ad')?>" class="btn btn-warning">Cancel</a>                
            </div>
        </div>
    </form>
<?php } ?>