<div class="col-lg-12">    
    <div class="box">
        <div class="body">
            <form action="<?= site_url('/').$access ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8" class="form-horizontal martop" id="block-validate">
                <div class="form-group">
                    <label class="control-label col-lg-2">Username</label>
                    <div class="col-lg-4">
                        <input type="text" placeholder="Username gunakan NIK" id="username" value="" name="username" class="form-control" required <?= $read?> >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Password</label>
                    <div class="col-lg-4">
                        <input type="password" placeholder="Password" id="password2" value="" name="passusr" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Confirm Password</label>
                    <div class="col-lg-4">
                        <input type="password" placeholder="Confirm Password" id="confirm_password2" value="" name="confirm_password2" class="form-control">                        
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Status User</label>
                    <div class="col-lg-4">
                        <select name="statususr" id="statususr" class="form-control" required>
                            <option value=''>Pilih Status User</option>
                            <option value='aktif'>aktif</option>
                            <option value='tidak'>Tidak</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Posisi</label>
                    <div class="col-lg-4">
                        <select name="levelusr" id="levelusr" class="form-control" required>
                            <option value=''>Pilih Level User</option>                                    
                            <option value='Head Of Operation'>Head Of Operation</option>
                            <option value='Service Manager'>Service Manager</option> 
                            <option value='Supervisor'>Supervisor</option>  
                            <option value='payroll'>Payroll</option>
                            <option value='Team Leader'>Team Leader</option>";
                        </select>
                    </div>
                </div>
                <div class="form-actions">
                    <input type="submit" value="<?=$submit?>" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>