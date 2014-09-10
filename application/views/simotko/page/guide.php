<?php if($form=='edit'){ ?>
    <div class="row">
        <div class="col-lg-7">
            <div class="box">
                <header class="penulisan">
                    <h5>Edit User Guide</h5>
                </header>
                <div class="body">                    
                    <div class="collapse in">
                        <?php include '/../menu/form_ae_guide.php'; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <?php include '/../menu/info.php';?>
        </div>
    </div>
<?php } ?>

<div class="row">
    <div class="col-lg-12">
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
                    
                        <?php include '/../menu/form_ae_guide.php'; ?>
                    
                </div>    
            <?php }?>
            <div class="body">
                <table id="dataTable" class="table table-striped responsive-table">
                    <thead>
                        <tr>
                            <th>No</th>  
                            <th>Keterangan</th>
                            <th>File</th> 
                            <th>Action</th> 
                        </tr>                                            
                    </thead>
                    <tbody class="normal-text">
                    <?php $nomor=1;
                    foreach ($content as $key) { 
                        $id         = $key['id_guide'];
                        $confirm    = $key['ket_guide'];?>
                        <tr class="capitalize">
                            <td><?=$nomor?></td> 
                            <td><?=$key['ket_guide']?></td>
                            <td>
                                <?php if(empty($key['file'])){
                                    echo"No File";
                                }else{ ?>
                                    <a target="_blank" href="<?=base_url('assets/document/'.$key['file'])?>" title="<?=$key['file']?>" class="btn btn-sm btn-default"><i class="fa fa-download">  File</i></a>
                                <?php } ?>
                            </td>
                            <td>
                                <a title="Edit" class='btn btn-primary btn-grad btnDetail glyphicon glyphicon-edit' href="<?=site_url('g_ad/'.$id)?>"></a>
                                <a title="Delete" class='btn btn-danger btn-grad btnDetail glyphicon glyphicon-remove' href="<?=site_url('da_g/'.$id)?>" onclick="return confirm('Yakin untuk Hapus Data <?=$confirm?> ?')"></a>
                            </td>                                                  
                        </tr>
                    <?php $nomor++; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
