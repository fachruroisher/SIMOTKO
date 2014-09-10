<?php if($form=='edit' OR $form=='view'){ ?>
<div class="row">
    <div class="col-lg-6">
        <div class="box">
            <header class="penulisan">
                <div class="icons"><i class="fa fa-search"></i></div>
                <h5><?=$title?></h5>
                <div class="toolbar">
                    <a title="Back" href="<?=site_url('am_ad')?>" class="btn btn-sm btn-primary"><i class="fa fa-chevron-left"></i></a>
                </div>
            </header>   
            <div class="body clearfix">  
                <?php if ($form=='edit' AND $show_level=='admin') {
                    include '/../menu/form_ae_area.php';
                }elseif ($form=='view') {
                    include '/../menu/view_area.php';
                } ?>
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
            <header class="penulisan">
                <div class="icons"><i class="fa fa-th-list"></i></div>
                <h5><?php if($form=='index'){ ?><?=$title?><?php }else{ ?><?=$direct?><?php } ?></h5>
                <?php if($form=='index' AND $show_level=='admin'){ ?>
                    <div class="toolbar">     
                        <a href="#<?=$id_button?>" class="butmar accordion-toggle btn btn-sm btn-primary " data-toggle="collapse"><?=$button?></a>                                       
                    </div>
                <?php } ?>
            </header>      
            <?php if($form=='index' AND $show_level=='admin'){ ?>
                <div id="<?=$id_button?>" class="collapse out">
                    <div class="body clearfix"> 
                        <div class="col-lg-6">
                            <?php include '/../menu/form_ae_area.php'; ?>
                        </div>
                    </div> 
                </div>   
            <?php } ?>
            <div class="body">
                <table id="dataTable" class="table table-striped responsive-table">
                    <thead>
                        <tr>
                            <th>No</th>  
                            <th>Area</th>
                            <th>Team Leader</th>
                            <th>Phone Area</th>
                            <th>Wilayah</th>  
                            <th>Action</th> 
                        </tr>                                            
                    </thead>
                    <tbody class="normal-text">
                    <?php $nomor=1;
                    foreach ($content as $key) { 
                        $id         = $key['id_area'];
                        $confirm    = $key['nama_area'];?>
                        <tr class="capitalize">
                            <td><?=$nomor?></td> 
                            <td><?=$key['nama_area']?></td>
                            <td><?=$key['fullname']?></td> 
                            <td><?=$key['phone_area']?></td>
                            <td><?=$key['nama_wilayah']?></td>
                            <td>
                                <a title="View" class='btn btn-success btn-grad btnDetail fa fa-search' href="<?=site_url('am_vd/'.$id)?>"></a>
                                <?php if($show_level=='admin'){ ?>
                                <a title="Edit" class='btn btn-primary btn-grad btnDetail glyphicon glyphicon-edit' href="<?=site_url('am_ad/'.$id)?>"></a>
                                <a title="Delete" class='btn btn-danger btn-grad btnDetail glyphicon glyphicon-remove' href="<?=site_url('d3_ad/'.$id)?>" onclick="return confirm('Yakin untuk Hapus Data <?=$confirm?> ?')"></a>
                                <?php } ?>
                            </td>                                                  
                        </tr>
                    <?php $nomor++; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>