<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="<?php echo base_url('assets/'); ?>js/popper.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>sweetalert/sweetalert2.all.min.js"></script>


<script>
    $(document).ready(function () {
        // $('.nav-active').on('click', function () {

        // });
        $('.btn-success').on('click', function () {
            let nama_kandidat = $(this).data('nama_kandidat');
            let id_user = $(this).data('id_user');

            Swal.fire({
                title: 'Yakin pilih dia?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yakin!'
            }).then((result) => {
                // console.log(result);
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'post',
                        url: '<?php echo site_url('home/pilih_kandidat') ?>',
                        dataType: 'json',
                        data: {
                            'nama_kandidat': nama_kandidat,
                            'id_user': id_user,
                        },

                        success: function (result) {
                            if (result.success == true) {
                                Swal.fire({
                                    title: 'Terimakasih sudah berpartisipasi',
                                    icon: 'success',
                                    showCancelButton: false,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Ok'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        location.reload();
                                    }
                                })
                            }
                        }
                    })
                }
            })

        });

        // $('.btn-success').on('click', function () {
        //     let nama_kandidat = $(this).data('nama_kandidat');
        //     let id_user = $(this).data('id_user');
        //     console.log('ok')

        //     Swal.fire({
        //         title: 'Yakin pilih dia?',
        //         icon: 'question',
        //         showCancelButton: true,
        //         confirmButtonColor: '#3085d6',
        //         cancelButtonColor: '#d33',
        //         confirmButtonText: 'Yakin!'
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             $.ajax({
        //                 type: 'post',
        //                 url: '<?php echo site_url('home/pilih_kandidat') ?>',
        //                 dataType: 'json',
        //                 data: {
        //                     'nama_kandidat': nama_kandidat,
        //                     'id_user': id_user,
        //                 },

        //                 success: function(result){
        //                     if (result.success == true) {
        //                         alert('ok');
        //                     }
        //                 }
        //             })
        //     })
        // })
    });
</script>
</body>

</html>