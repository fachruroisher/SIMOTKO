<div class="box">
    <header class="penulisan">
        <h5><?=$title?></h5>
        <?php if($form=='index'){ ?>
            <div class="toolbar">     
                <a href="#<?=$id_button?>" class="butmar accordion-toggle btn btn-sm btn-primary " data-toggle="collapse"><?=$button?></a>                                       
            </div>
        <?php } ?>
    </header>      
    <?php if($form=='index'){ ?>
        <div id="<?=$id_button?>" class="collapse out">
            <?php include '/../menu/form_ae_wilayah.php'; ?>
        </div>    
    <?php }elseif($form=='edit'){ ?>
        <div class="collapse in">
            <?php include '/../menu/form_ae_wilayah.php'; ?>
        </div>    
    <?php } ?>
    <div class="body">
        <table id="dataTable" class="table table-striped responsive-table">
            <thead>
                <tr>
                    <th>No</th>  
                    <th>Wilayah</th>
                    <th>Action</th> 
                </tr>                                            
            </thead>
            <tbody>
            <?php $nomor=1;
            foreach ($content as $key) { 
                $id         = $key['id_wilayah'];
                $confirm    = $key['nama_wilayah']; ?>
                <tr class="capitalize">
                    <td><?=$nomor?></td> 
                    <td><?=$key['nama_wilayah']?></td>
                    <td>
                        <a title="Edit" class='btn btn-primary btn-grad btnDetail glyphicon glyphicon-edit' href="<?=site_url('wm_ad/'.$id)?>"></a>
                        <a title="Delete" class='btn btn-danger btn-grad btnDetail glyphicon glyphicon-remove' href="<?=site_url('da_wm/'.$id)?>" onclick="return confirm('Yakin untuk Hapus Data <?=$confirm?> ?')"></a>
                    </td>                                                  
                </tr>
            <?php $nomor++; } ?>
            </tbody>
        </table>
    </div>
</div>