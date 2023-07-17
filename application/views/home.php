<section class="sec1" id="sec1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <h2 class="display-4 text-primary mt-5 h2-sec1 text-center">Voting</h2>
            </div>
        </div>
        
        <div class="row">
            <?php foreach ($kandidat as $knd) : ?>
                <div class="col-md-4">
                    <div class="card mb-3" style="width: 19rem;">
                        <img src="<?php echo base_url('assets/img/' . $knd->foto); ?>" class="card-img-top" alt="...">
                        <div class="card-body">

                            <h5 class="card-title text-center text-primary font-weight-bold"><?php echo 
                            $knd->nama_kandidat ?></h5>
                            <p class="card-text text-center text-secondary"><?php echo $knd->nama_calon ?></p>
                            <div class="d-flex justify-content-between">

                                <a href="<?php echo site_url('home/visimisi/' . $knd->id); ?>"
                                 class="btn btn-primary btn-sm">Lihat Visi & Misi</a>
                               
                                <?php if ($user->status == 0) : ?>
                                    <a href="#" class="btn btn-success btn-sm" data-nama_kandidat="<?php 
                                    echo $knd->nama_kandidat ?>" data-id_user="<?php echo $this->session->userdata('id'); 
                                    ?>">Pilih <?php echo $knd->nama_kandidat ?></a>
                                <?php else : ?>
                                    <button Pilih class="btn btn-success btn-sm" disabled>Pilih <?php echo $knd->nama_kandidat ?></button>
                                <?php endif; ?>

                                
                                
                             </div>
                            </div>
                        </div>
                        
                    </div>
                    <?php endforeach; ?>
                
</section>