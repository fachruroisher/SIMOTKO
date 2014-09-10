
    
<?php if($this->session->flashdata('success') || $this->session->flashdata('warning') || $this->session->flashdata('ubah') || $this->session->flashdata('hapus') || $this->session->flashdata('kosong')){ ?>

    <?php if($this->session->flashdata('success') == true){?>
        <div class="alert alert-success" style="margin-top:10px;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Selamat!</strong> Data berhasil disimpan.
        </div>
    <?php }elseif($this->session->flashdata('ubah')==true){ ?>
        <div class="alert alert-success" style="margin-top:10px;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Selamat!</strong> Data berhasil diubah.
        </div>
    <?php }elseif($this->session->flashdata('hapus')==true){ ?>
        <div class="alert alert-success" style="margin-top:10px;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Selamat!</strong> Data berhasil dihapus.
        </div>
    <?php }elseif($this->session->flashdata('warning')==true){ ?>
        <div class="alert alert-warning" style="margin-top:10px;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Ups!</strong> Data sudah ada, ganti yang lain.
        </div>
    <?php }elseif($this->session->flashdata('kosong')==true){ ?>
        <div class="alert alert-warning" style="margin-top:10px;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Ups..!</strong> Data belum tersedia, silahkan coba lagi...
        </div>
    <?php } ?>

<?php } ?>

