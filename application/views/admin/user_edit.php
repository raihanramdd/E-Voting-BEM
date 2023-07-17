<section class="content">

<div class="box">
            <div class="box-header">
              <?php echo $this->session->flashdata('message'); ?>
                <h3 class="box-title"><?php echo $title  ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form action="<?php echo site_url('admin/user/update'); ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $row->id ?>">

                <div class="form-group">
                    <label for="id_kelas">Kelas</label>
                    <select name="id_kelas" id="id_kelas" class="form-control">
                        <?php foreach ($kelas as $kls) : ?>
                            <option value="<?php echo $kls->id ?>" <?php echo $row->id_kelas == $kls->id ? 'selected' : '' ?>><?php echo $kls->nama ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="password">Nama *</label>
                    <input type="text" name="nama" id="nama" class="form-control" required value="<?php echo $row->nama ?>">
                </div>

                <div class="form-group">
                    <label for="npm">NPM *</label>
                    <input type="number" name="npm" id="npm" class="form-control" required value="<?php echo $row->npm ?>">
                </div>

                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" name="email" id="email" class="form-control" requiredvalue="<?php echo $row->email ?>">
                </div>


                <div class="form-group">
                    <label for="level">Level</label>
                    <select name="level" id="level" class="form-control">
                        <option value="admin" <?php echo $row->level == 'admin' ? 'selected' : '' ?>>Admin</option>
                        <option value="siswa" <?php echo $row->level == 'siswa' ? 'selected' : '' ?>>Siswa</option>
                    </select>
                </div>

                <a href="<?php echo site_url('admin/user'); ?>" class="btn bg-blue mb-3"><i class="fa fa-arrow-left"></i> Kembali</a>
                <button type="submit" class="btn bg-navy"><i class="fa fa-save"></i> Update</button>
            </form> 
            </div>
    </div>  
</section>