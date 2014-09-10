<form action="<?= site_url('/').$access ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8" class="form-horizontal martop" id="block-validate">
    <input type="hidden" name="kode" value="<?=$kode?>">                    
    <div class="form-group">
        <label class="control-label col-lg-4">Username</label>
        <div class="col-lg-6">
            <input type="text" placeholder="Username gunakan NIK" id="digits" value="<?=$nameusr?>" name="digits" class="form-control" required readonly >
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-lg-4">Password</label>
        <div class="col-lg-7">
            <input type="password" placeholder="Password" id="password2" value="<?=$passusr?>" name="passusr" class="form-control" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-lg-4">Confirm Password</label>
        <div class="col-lg-7">
           <input type="password" placeholder="Confirm Password" id="confirm_password2" value="<?=$passusr?>" name="confirm_password2" class="form-control">                        
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-lg-4">Status User</label>
        <div class="col-lg-4">
            <select name="statususr" id="statususr" class="form-control capitalize" required>
                <?php if (!empty($statususr)) { ?>
                    <option value='<?=$statususr?>'><?=$statususr?></option>    
                <?php }else{ ?>
                    <option value=''>Pilih Status</option>    
                <?php } ?>                    
                <?php if($statususr == 'aktif'){ ?>                        
                    <option value='Tidak'>Tidak</option>
                <?php } elseif($statususr == 'tidak'){ ?>
                    <option value='Aktif'>Aktif</option>
                <?php } ?>                             
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-lg-4">Posisi</label>
        <div class="col-lg-5">
            <select name="levelusr" id="levelusr" class="form-control capitalize" required>
                <?php if (empty($levelusr)) { ?>
                    <option value=''>Pilih posisi user</option>
                <?php }else{ ?>
                    <option value='<?=$levelusr?>'><?=$levelusr?></option>
                <?php } ?>
                <?php if($levelusr == 'head of operation'){ ?>           
                    <option value='Service Manager'>Service Manager</option>
                    <option value='Supervisor'>Supervisor</option> 
                    <option value='Team Leader'>Team Leader</option> 
                    <option value='payroll'>Payroll</option> 
                <?php }elseif($levelusr == 'service manager'){ ?>                       
                    <option value='Head Of Operation'>Head Of Operation</option>
                    <option value='Supervisor'>Supervisor</option> 
                    <option value='team leader'>Team Leader</option> 
                    <option value='payroll'>Payroll</option> 
                <?php }elseif($levelusr == 'supervisor'){ ?>                    
                    <option value='Head Of Operation'>Head Of Operation</option>
                    <option value='Service Manager'>Service Manager</option> 
                    <option value='team leader'>Team Leader</option>
                    <option value='payroll'>Payroll</option> 
                <?php }elseif($levelusr == 'team leader'){ ?>                     
                    <option value='Head Of Operation'>Head Of Operation</option>
                    <option value='Service Manager'>Service Manager</option> 
                    <option value='Supervisor'>Supervisor</option>                                         
                    <option value='payroll'>Payroll</option>
                <?php }elseif($levelusr == 'payroll'){ ?>                       
                    <option value='Head Of Operation'>Head Of Operation</option>
                    <option value='Service Manager'>Service Manager</option> 
                    <option value='Supervisor'>Supervisor</option>                                         
                    <option value='Team Leader'>Team Leader</option>
                <?php }else{ ?>                         
                    <option value='Head Of Operation'>Head Of Operation</option>
                    <option value='Service Manager'>Service Manager</option> 
                    <option value='Supervisor'>Supervisor</option>  
                    <option value='payroll'>Payroll</option>
                    <option value='Team Leader'>Team Leader</option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="form-actions">
        <input type="submit" value="<?=$submit?>" class="btn btn-primary">
        <a href="<?=site_url('user_ad')?>" class="btn btn-warning ">Cancel</a>
    </div>
</form>
