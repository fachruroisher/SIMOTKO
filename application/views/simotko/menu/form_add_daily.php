<form action="<?= site_url('/'.$access)?>" method="post" class="form-horizontal martop" id="block-validate">
    <input type="hidden" name="tl" value="<?=$id_tl?>">
    <div class="col-lg-11">
        <div class="form-group">
            <label class="control-label col-lg-1">Tanggal</label>
            <div class="col-lg-3">
                <input type="date" name="date2" class="form-control" required>
            </div>
        </div>
        <div class="form-group col-lg-12 ">                          
            <div class="bootstrap-timepicker col-lg-2 row ">
                <input class="timepicker5 form-control" type="text" name="mulai[]" class="input-small form-control"><i class="icon-time"></i>
            </div> 
            <div class="col-lg-1 jarak">s/d</div>
            <div class="bootstrap-timepicker col-lg-2 row">
                <input class="timepicker5 form-control" name="selesai[]" type="text" class="input-small form-control"><i class="icon-time"></i>
            </div>
            <div class="col-lg-6 row">
                <div class="col-lg-12">
                    <input type="text" placeholder="Keterangan" name="isi[]" class="form-control" required>
                </div>
            </div>
            <div class="col-lg-2 row">
                <select name="status[]" class="form-control">
                    <option value="">Status</option>
                    <option value="proses">Proses</option>
                    <option value="selesai">Selesai</option>
                </select>
            </div>
        </div>        
        <div class="form-test"></div>
        <div class="btn btn-primary" id="add_input"><i class="glyphicon glyphicon-plus"></i> Tambah</div>
        <br/><br/>
        <div class="form-actions no-margin-bottom">
            <input type="submit" value="<?=$submit?>" class="btn btn-primary">
        </div>
    </div>
</form>