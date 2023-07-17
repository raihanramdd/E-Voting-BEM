<section class="content">

<div class="box">
            <div class="box-header">
              <?php echo $this->session->flashdata('message'); ?>
              <h3 class="box-title"><?php echo $title ?></h3>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Kandidat</th>
                  <th>Nama Calon</th>
                  <th>Foto</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    <?php $no =1;
                    foreach ($rows as $row) :
                    ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row->nama_kandidat ?></td>
                            <td><?php echo $row->nama_calon ?></td>
                            <td>
                                <img src="<?php echo site_url('assets/img/'.$row->foto); ?>" width="100">
                            </td>
                            <td>
                            <a href="<?php echo site_url('admin/kandidat/edit/'.$row->id); ?>" 
                            class="btn btn-sm btn-info"><i class="fa fa-pencil-square-o"></i></a>
                        
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
               </table>
        </div>
    </div>  
</section>