<section class="content">

<div class="box">
            <div class="box-header">
            <h3 class="box-title"><?php echo $title ?></h3>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php echo form_open_multipart('admin/kandidat/update');?>
            <input type="hidden" name="id" value="<?php echo $row->id ?>">

            <div class="row">
                <div class="col-md-3">
                    <img src="<?php echo site_url('assets/img/' . $row->foto); ?>" class="img-fluid">
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="nama_kandidat">Nama Kandidat</label>
                        <input type="text" name="nama_kandidat" id="nama_kandidat" class="form-control" value="<?php echo $row->nama_kandidat ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="nama_calon">Nama Calon</label>
                        <input type="text" name="nama_calon" id="nama_calon" class="form-control" value="<?php echo $row->nama_calon ?>">
                    </div>

                    <div class="form-group">
                        <label for="Foto">Ganti Foto</label>
                        <input type="file" name="foto" id="foto" class="form-control">
                    </div>
                </div>
            </div>

                <a href="<?php echo site_url('admin/kandidat'); ?>" class="btn bg-blue mb-3"><i class="fa fa-arrow-left">                  
              </i> Kembali</a>
                <button type="submit" class="btn bg-navy"><i class="fa fa-save"></i> Update</button>
            </form> 
            </div>
    </div>  
</section>