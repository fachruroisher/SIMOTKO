<!-- .col-lg-6 -->
    <div class="col-lg-5">
        <div class="box">
            <header>
                <div class="icons"><i class="fa fa-th-list"></i></div>
                <h5>keterangan</h5>
            </header>
            <div class="body">
                Total Man Power:  <?=$jumlahMp?> Orang<br/>
                <i><strong>Detail :</strong></i>
               <ul class="capitalize">
                <?php foreach ($content as $key) { 
                    $jumlah = $this->db->query("select * from man_power where id_posisi= $key[id_posisi]")->num_rows();?>                   
                        <li><?=$key['nama_posisi']?> :  <strong><?=$jumlah?></strong></li>                  
                <?php } ?>
               </ul>
            </div>
        </div>
    </div>
    <!-- /.col-lg-6 -->