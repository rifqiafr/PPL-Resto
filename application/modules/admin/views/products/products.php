<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <!-- Header -->
    <div class="header bg-indigo pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Kelola Produk</h6>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="<?php echo site_url('admin/products/add_new_product'); ?>" class="btn btn-sm btn-neutral">Tambah</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header">
              <h3 class="mb-0">Kelola Produk</h3>
            </div>

            <?php if ( count($products) > 0) : ?>
            <div class="card-body">
                <div class="row">
                <?php foreach ($products as $product) : ?>
                    <div class="col-md-3">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-heading"><?php echo $product->name; ?></h3>
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <img alt="<?php echo $product->name; ?>" class="img img-fluid rounded" src="<?php echo base_url('assets/uploads/products/'. $product->picture_name); ?>" style="width: 1000px; max-height: 800px">
                                    <br>
                                    <br>
                                    <?php echo ($product->stock > 0) ? $product->stock .' '. $product->product_unit: '<span class="text-danger"><em>Stok habis</em></span>'; ?> / Rp <?php echo format_rupiah($product->price); ?>
                                </div>
                                
                            </div>
                            <div class="card-footer text-center">
                                <a href="<?php echo site_url('admin/products/view/'. $product->id); ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                <a href="<?php echo site_url('admin/products/edit/'. $product->id); ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="#" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal-modal-dialog-centered modal-" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h6 class="modal-title" id="modal-title-default">Hapus Produk</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div>
          <form action="#" id="deleteProductForm" method="POST">
        
            <input type="hidden" name="id" value="<?php echo $product->id; ?>">

          <div class="modal-body">
              <p class="deleteText">Yakin ingin menghapus produk ini? Semua data yang terkait seperti data order juga akan dihapus. Tindakan ini tidak dapat dibatalkan.</p>
          </div>
          <div class="modal-footer">
              <button type="submit" class="btn btn-danger btn-delete">Hapus</button>
              <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Batal</button>
          </div>
          </form>
      </div>
  </div>
</div>
                <?php endforeach; ?>
                </div>
            </div>
            <div class="card-footer">
                <?php echo $pagination; ?>
            </div>
            <?php else : ?>
             <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="alert alert-primary">
                            Belum ada data produk yang ditambahkan. Silahkan menambahkan baru.
                        </div>
                    </div>
                    <div class="col-md-4">
                        <a href="<?php echo site_url('admin/products/add_new_product'); ?>"><i class="fa fa-plus"></i> Tambah produk baru</a>
                        <br>
                        <a href="<?php echo site_url('admin/products/category'); ?>"><i class="fa fa-list"></i> Kelola kategori</a>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            
          </div>
        </div>
      </div>


      <script>
    $('#deleteProductForm').submit(function(e) {
        e.preventDefault();

        var btn = $('.btn-delete');
        var data = $(this).serialize();

        btn.html('<i class="fa fa-spin fa-spinner"></i> Menghapus...').attr('disabled', true);

        $.ajax({
            method: 'POST',
            url: '<?php echo site_url('admin/products/product_api?action=delete_product'); ?>',
            data: data,
            success: function (res) {
                if (res.code == 204) {
                    setTimeout(function() {
                        btn.html('<i class="fa fa-check"></i> Terhapus!');
                        $('.deleteText').fadeOut(function() {
                            $(this).text('Produk berhasil dihapus')
                        }).fadeIn();
                    }, 2000);

                    setTimeout(function() {
                        $('.deleteText').fadeOut(function() {
                            $(this).text('Mengalihkan...')
                        }).fadeIn();
                    }, 4000);

                    setTimeout(function() {
                        window.location = '<?php echo site_url('admin/products'); ?>';
                    }, 6000);
                }
                else {
                    console.log('Terjadi kesalahan sata menghapus produk');
                }
            }
        })
    })
</script>