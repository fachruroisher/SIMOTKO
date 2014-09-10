
<div class="row">
    <div class="col-lg-12">
        <h4>Hasil pencarian dengan kata kunci " <strong><i><?=$hasil?></i></strong> "</h4>
        <div class="box">
            <header>
                <div class="icons"><i class="fa fa-search"></i></div>
                <h5><?=$title?></h5>
            </header> 
            <div class="body">
                <table id="dataTable" class="table table-striped responsive-table">
                    <thead>
                        <tr>
                            <th>No</th>  
                            <th>Name</th>
                            <th>Email</th> 
                            <th>Phone</th>
                            <th>Posisi</th>
                            <th>Status</th>
                            <th>Last Login</th> 
                        </tr>                                            
                    </thead>
                    <tbody class="normal-text">
                    <?php $nomor=1;
                    foreach ($content as $key) { ?>
                        <tr>
                            <td><?=$nomor?></td> 
                            <td class="capitalize"><?=$key['fullname']?></td> 
                            <td><a title="Kirim Pesan" href="mailto:<?=$key['email']?>"><?=$key['email']?></a></td>
                            <td><?=$key['telephone']?></td>
                            <td><?=$key['level']?></td>
                            <td class="capitalize"><?=$key['status_user']?></td> 
                            <td><?=$key['last_access']?></td>                                              
                        </tr>
                    <?php $nomor++; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
