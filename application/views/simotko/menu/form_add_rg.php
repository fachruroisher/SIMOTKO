<div class="body clearfix">
    <h4>Pilih Status Gaji</h4>
    <form action="<?= site_url('/').$access ?>" enctype="multipart/form-data" method="post" class="form-horizontal martop" id="block-validate">
        <div class="col-lg-2 margin-right">       
            <div class="form-group">
                <select name="area" class="form-control" required>
                    <option value="">Pilih area</option>
                    <?php foreach ($area as $key) { ?>                        
                        <option value="<?=$key['id_area']?>"><?=$key['nama_area']?></option>
                    <?php } ?>                    
                </select>
            </div>
        </div>
        <div class="col-lg-3 margin-right">       
            <div class="form-group">
                <select name="bulan" class="form-control" required>
                    <option value="">Pilih bulan</option>
                    <option value="01">Januari</option>                  
                    <option value="02">Februari</option>                  
                    <option value="03">Maret</option>                  
                    <option value="04">April</option>
                    <option value="05">Mei</option>
                    <option value="06">Juni</option>
                    <option value="07">Juli</option>
                    <option value="08">Agustus</option>
                    <option value="09">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
            </div>
        </div>
        <div class="col-lg-2 margin-right">
            <div class="form-group">
                <select name="tahun" class="form-control" required>
                    <option value="">Pilih tahun</option>
                    <option vlaue="2014">2014</option>
                    <option vlaue="2015">2015</option>
                    <option vlaue="2016">2016</option>
                    <option vlaue="2017">2017</option>
                    <option vlaue="2018">2018</option>
                    <option vlaue="2019">2019</option>
                    <option vlaue="2020">2020</option>
                </select>
            </div>
        </div>
        <div class="col-lg-1">
            <div class="form-group">
                <input type="submit" value="<?=$submit?>" class="btn btn-success">
            </div>
        </div>
    </form>
    <div class="col-lg-8">
        <h6><i>*Data Gaji man power yang ditampilkan hanya yang sesuai dengan presensi pada bulan dan tahun yang sudah tersimpan di database</i></h6>
    </div>
</div>                  
