<?php if($form!='index'){ ?>
<div class="row">
    <div class="col-lg-6">
        <div class="box">
            <header class="capitalize">
                <div class="icons"><i class="fa fa-edit"></i></div>
                <h5><?=$title?></h5>
                <div class="toolbar">
                    <a href="<?=site_url('user_ad')?>" class="btn btn-sm btn-primary"><i class="fa fa-chevron-left"></i></a>
                </div>
            </header>   
            <div class="body clearfix">  
                 <?php include '/../menu/form_ev_user.php'; ?>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <?php include '/../menu/info.php'; 
        if($form=='edit'){
            include '/../menu/view_user.php'; 
        } ?>
    </div>
</div>
<?php } ?>

<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <header class="capitalize">
                <div class="icons"><i class="fa fa-list"></i></div>
                <h5><?php if($form=='index'){ ?><?=$title?><?php }else{ ?><?=$direct?><?php } ?></h5>
                <?php if($form=='index'){ ?>
                    <div class="toolbar">     
                        <a href="#<?=$id_button?>" class="butmar accordion-toggle btn btn-sm btn-primary " data-toggle="collapse"><?=$button?></a>                                       
                    </div>
                <?php } ?>
            </header>      
            <?php if($form=='index'){ ?>
                <div id="<?=$id_button?>" class="collapse out">
                    <?php include '/../menu/form_ae_user.php'; ?>
                </div>   
            <?php } ?>
            <div class="body">
                <table id="dataTable" class="table table-striped responsive-table">
                    <thead>
                        <tr>
                            <th>No</th>  
                            <th>Username</th>
                            <th>Name</th>
                            <th>Posisi</th>
                            <th>Status</th>  
                            <th>Action</th> 
                        </tr>                                            
                    </thead>
                    <tbody>
                    <?php $nomor=1;
                    foreach ($content as $key) { 
                        $id         = $key['id_user'];
                        $confirm    = $key['fullname'];?>
                        <tr class="capitalize">
                            <td><?=$nomor?></td> 
                            <td><?=$key['username']?></td>
                            <td><?=$key['fullname']?></td>
                            <td><?=$key['level']?></td>
                            <td><?=$key['status_user']?></td>   
                            <td>
                                <a title="Edit" class='btn btn-primary btn-grad btnDetail glyphicon glyphicon-edit' href="<?=site_url('user_ad/'.$id)?>"></a>
                                <a title="Delete" class='btn btn-danger btn-grad btnDetail glyphicon glyphicon-remove' href="<?=site_url('dau_ad/'.$id)?>" onclick="return confirm('Yakin untuk Hapus Data <?=$confirm?> ?')"></a>
                            </td>                                                  
                        </tr>
                    <?php $nomor++; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
