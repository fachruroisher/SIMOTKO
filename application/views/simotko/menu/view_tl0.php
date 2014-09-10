<div class="box">
    <header>                                                                <div class="icons"><i class="fa fa-list"></i></div>
        <ul id="myTab" class="nav nav-tabs">
            <li class="dropdown">
                <a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown">Area <b class="caret"></b></a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">
                    <?php foreach ($area_set as $key) { ?>
                        <li><a href="#<?=$key['id_area']?>"  data-toggle="tab"><?=$key['nama_area']?></a></li>
                    <?php } ?>
                </ul>
            </li>
        </ul>
    </header>
    <div class="body">      
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade in active">
                <p>Daftar List Man power berdasarkan area</p>
            </div>
            <?php foreach ($area_set as $key) { ?>
            <div class="tab-pane fade" id="<?=$key['id_area']?>">
                <h4><?=$key['nama_area']?></h4>
                <table class="table table-striped responsive-table">
                    <tr>
                        <td>No</td>
                        <td>Nama</td>
                        <td>Posisi</td>
                    </tr>
                    <?php $tab=1; $mpo_set = $this->db->query("select * from man_power where id_area= $key[id_area]")->result_array();
                    foreach($mpo_set as $mp) { $po_set = $this->db->query("select * from posisi where id_posisi= $mp[id_posisi]")->result_array(); ?>
                    <tr>
                        <td><?=$tab?></td>
                        <td><a href="<?=site_url('mp_vd/'.$mp['nik_mp'])?>"><?=$mp['nama_mp'] ?></a></td>
                        <td><?=$po_set[0]['nama_posisi'] ?></td>
                    </tr>
                    <?php $tab++; } ?>   
                </table>
            </div>
            <?php } ?>                      
        </div>                         
    </div>
</div>
           