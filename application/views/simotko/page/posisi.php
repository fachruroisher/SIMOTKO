<?php if($form=='edit'){ ?>
<div class="row">
    <div class="col-lg-6">
        <div class="box">
            <header class="penulisan">
                <h5><?=$title?></h5>
            </header>   
            <div class="body clearfix">  
                <?php include '/../menu/form_ae_posisi.php'; ?>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <?php include '/../menu/info.php'; ?>
    </div>
</div>
<?php } ?>

<div class="row">
    <div class="col-lg-12">
<div class="box">
    <header class="capitalize">
        <h5><?php if($form=='index'){ ?><?=$title?><?php }else{ ?><?=$direct?><?php } ?></h5>
        <?php if($form=='index'){ ?>
            <div class="toolbar">     
                <a href="#<?=$id_button?>" class="butmar accordion-toggle btn btn-sm btn-primary " data-toggle="collapse"><?=$button?></a>                                       
            </div>
        <?php } ?>
    </header>      
    <?php if($form=='index'){ ?>
        <div id="<?=$id_button?>" class="collapse out">
            <div class="body clearfix"> 
                <div class="col-lg-6">
                    <?php include '/../menu/form_ae_posisi.php'; ?>
                </div> 
            </div> 
        </div>   
    <?php } ?>
    <div class="body">
        <table id="dataTable" class="table table-striped responsive-table">
            <thead>
                <tr>
                    <th>No</th>  
                    <th>Posisi</th>
                    <th>Deskripsi</th> 
                    <th>Action</th> 
                </tr>                                            
            </thead>
            <tbody>
            <?php $nomor=1;
            foreach ($content as $key) { 
                $id         = $key['id_posisi'];
                $confirm    = $key['nama_posisi'];?>
                <tr class="capitalize">
                    <td><?=$nomor?></td> 
                    <td><?=$key['nama_posisi']?></td>
                    <td><?=$key['deskripsi']?></td>
                    <td>
                        <a title="Edit" class='btn btn-primary btn-grad btnDetail glyphicon glyphicon-edit' href="<?=site_url('pos_ad/'.$id)?>"></a>
                        <a title="Delete" class='btn btn-danger btn-grad btnDetail glyphicon glyphicon-remove' href="<?=site_url('da_pos/'.$id)?>" onclick="return confirm('Yakin untuk Hapus Data <?=$confirm?> ?')"></a>
                    </td>                                                  
                </tr>
            <?php $nomor++; } ?>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>