
   
        <div class="body clearfix">
            <h3><i>Daily Report on <strong><?=$tanggal?></strong></i></h3>        
            <h5><i>Posted by <strong><?=$daily_set[0]['fullname']?></strong></i></h5>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>  
                        <th>Mulai</th>
                        <th>Selesai</th>
                        <th>Status</th>   
                        <th>Activity</th> 
                    </tr>                                            
                </thead>
                <tbody class="capitalize">                    
                    <?php $nom=1; foreach($daily_set as $key) { ?>
                    <tr>
                        <td><?=$nom?></td>  
                        <td><?=$key['jam_mulai']?></td>
                        <td><?=$key['jam_selesai']?></td>
                        <td><?=$key['status_report']?></td>   
                        <td><?=$key['keterangan']?></td>
                    </tr>
                    <?php $nom++; } ?>                    
                </tbody>
            </table>
            <div class="form-actions">
                <a href="<?=site_url('vd_ad')?>" class="btn btn-primary">Back</a>
               
            </div>
        </div>