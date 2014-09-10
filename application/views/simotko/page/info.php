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
            <?php include '/../menu/form_ae_info.php'; ?>
        </div>    
    <?php }elseif($form=='edit'){ ?>
        <div class="collapse in">
            <?php include '/../menu/form_ae_info.php'; ?>
        </div>    
    <?php } ?>
    <div class="body">
        <table id="dataTable" class="table table-striped responsive-table">
            <thead>
                <tr>
                    <th>No</th>  
                    <th>Tanggal</th>
                    <th>Posted</th>
                    <th>Keterangan</th>
                    <th>Status</th> 
                    <th>Action</th> 
                </tr>                                            
            </thead>
            <tbody class="normal-text">
            <?php $nomor=1;
            foreach ($content as $key) { 
                $id         = $key['id_info'];
                $confirm    = 'info dari '.$key['fullname'];?>
                <tr class="capitalize">
                    <td><?=$nomor?></td> 
                    <td><?=$key['tanggal']?></td>
                    <td><?=$key['fullname']?></td> 
                    <td class="batas"><?=$key['keterangan']?>  </td>
                    <td><?=$key['status_info']?></td> 
                    <td>
                        <a title="Edit" class='btn btn-primary btn-grad btnDetail glyphicon glyphicon-edit' href="<?=site_url('inf_ad/'.$id)?>"></a>
                        <a title="Delete" class='btn btn-danger btn-grad btnDetail glyphicon glyphicon-remove' href="<?=site_url('dai_ad/'.$id)?>" onclick="return confirm('Yakin untuk Hapus Data <?=$confirm?> ?')"></a>
                    </td>                                                  
                </tr>
            <?php $nomor++; } ?>
            </tbody>
        </table>
    </div>
</div>
