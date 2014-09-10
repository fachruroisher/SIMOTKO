<div class="body clearfix">
    <h4>Pilih Status Presensi</h4>
    <form action="<?= site_url('/').$access ?>" enctype="multipart/form-data" method="post" class="form-horizontal martop" id="block-validate">
        <div class="col-lg-2 margin-right">       
            <div class="form-group">
                <select name="posisi" class="form-control" required>
                    <option value="">Pilih posisi</option>
                    <?php foreach ($val0 as $key) { ?>                        
                        <option value="<?=$key['id_posisi']?>"><?=$key['nama_posisi']?></option>
                    <?php } ?>                    
                </select>
            </div>
        </div>
        <div class="col-lg-3 margin-right">       
            <div class="form-group">
                <select name="area" class="form-control" required>
                    <option value="">Pilih Area</option>
                    <?php foreach ($val1 as $key) { ?>                        
                        <option value="<?=$key['id_area']?>"><?=$key['nama_area']?></option>
                    <?php } ?>                    
                </select>
            </div>
        </div>
        <div class="col-lg-2 margin-right">
            <div class="form-group">
                <select name="shift" class="form-control" required>
                    <option value="">Pilih Shift</option>
                    <?php foreach ($val2 as $key) { ?>
                        <option value="<?=$key['id_shift']?>"><?=$key['nama_shift']?></option>
                    <?php } ?>                    
                </select>
            </div>
        </div>
        <div class="col-lg-1 ">
            <div class="form-group">
                <input type="submit" value="<?=$submit?>" class="btn btn-success">
            </div>
        </div>
    </form>
</div>                  
