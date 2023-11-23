<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Header -->
<div class="header bg-indigo pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Kelola Order Customer</h6>
        </div>
        <div class="col-lg-6 col-5 text-right">
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item active" aria-current="page">Order</li>
            </ol>
          </nav>
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
          <h3 class="mb-0">Kelola Order</h3>
          <button class="btn btn-primary" onclick="printReport()">Cetak Laporan</button>
        </div>

        <?php if (count($orders) > 0) : ?>
          <div class="card-body p-0">
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Jumlah Item</th>
                    <th scope="col">Jumlah Harga</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($orders as $order) : ?>
            <tr>
                <th scope="col">
                    <?php echo anchor('admin/orders/view/' . $order->id, '#' . $order->order_number); ?>
                </th>
                <td><?php echo $order->customer; ?></td>
                <td>
                    <?php echo get_formatted_date($order->order_date); ?>
                </td>
                <td>
                    <?php echo $order->total_items; ?>
                </td>
                <td>
                    Rp <?php echo format_rupiah($order->total_price); ?>
                </td>
                <td><?php echo get_order_status($order->order_status, $order->payment_method); ?></td>
                <td>
                    <?php echo anchor('admin/orders/delete/' . $order->id, '<i class="fa fa-trash"></i>', array('class' => 'btn btn-danger btn-sm')); ?>
                </td>
            </tr>
        <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>

          <div class="card-footer">
            <?php echo $pagination; ?>
          </div>
        <?php else : ?>
          <div class="card-body">
            <div class="alert alert-primary">
              Belum ada order
            </div>
          </div>
        <?php endif; ?>
      </div>
      <!-- Tambahkan kelas .d-print-none pada elemen sidebar -->
<div class="sidebar d-print-none">
    <!-- Isi sidebar -->
    <!-- ... -->
</div>

    </div>
  </div>
</div>

<!-- Tambahkan JavaScript untuk tombol cetak -->
<script>
function printReport() {
    var originalContents = document.body.innerHTML;

    // Sembunyikan tombol hapus dan sidebar sebelum mencetak
    var deleteButtons = document.querySelectorAll('.btn-danger');
    deleteButtons.forEach(function(button) {
        button.classList.add('d-print-none');
    });

    var sidebar = document.querySelector('.sidebar');
    if (sidebar) {
        sidebar.classList.add('d-print-none');
    }

    // Cetak laporan
    var printContents = `
        <h1>Laporan Lesehan Raihan</h1>
        <h2>Jl. WR. Supratman, Kandang Limun, Kec. Muara Bangka Hulu, Kota Bengkulu, Bengkulu 38119</h2>
        ${document.querySelector('.table.align-items-center.table-flush').outerHTML}
    `;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;

    // Tampilkan kembali tombol hapus dan sidebar setelah mencetak
    deleteButtons.forEach(function(button) {
        button.classList.remove('d-print-none');
    });

    if (sidebar) {
        sidebar.classList.remove('d-print-none');
    }
}

</script>

<!-- Tambahkan CSS untuk tata letak cetak -->
<!-- Tambahkan CSS untuk tata letak cetak -->
<style>
@media print {
    body {
        font-family: Arial, sans-serif;
        width: 21cm;
        height: 29.7cm;
        margin: 10mm 10mm 10mm 10mm; /* Sesuaikan margin sesuai keinginan Anda */
        background-color: #f5f5f5;
        border: 1px solid #ccc;
    }

    .navbar, .breadcrumb, .card-footer, .btn {
        display: none;
    }

    .header {
        text-align: center;
        margin-bottom: 20px;
    }

    .header h1 {
        font-size: 36px;
        color: #333;
        margin: 0;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 10px;
        background-color: #fff;
    }

    th, td {
        border: 1px solid #ccc;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
    }

    td {
        text-align: center;
    }

    .card-header {
        display: none;
    }

    .d-print-none {
        display: none !important;
    }
}
</style>




