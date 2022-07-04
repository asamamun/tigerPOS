<?= $this->extend('layouts/default'); ?>

<?= $this->section('contents'); ?>

<?php if (session()->getFlashdata('message')) : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('message'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title">Invoice Details List</h3>
                <div class="card-options">
                    <!-- <a href="<?= base_url('/'); ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-file-csv"></i> CSV</a> -->
                    <?php echo anchor('customers/csv', "<i class='fa-solid fa-file-csv'> CSV</i>", ['class' => 'btn btn-primary btn-sm']) ?>
                    <!-- <a href="<?= base_url('/'); ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-file-excel"></i> Excel</a> -->
                    <a href="<?= base_url('/'); ?>" class="btn btn-primary btn-sm" id="btnPrint"><i class="fa-solid fa-print"></i> Print</a>
                    <!-- <?php echo anchor('customers/print', "<i class='fa-solid fa-print'></i>", ['class' => 'btn btn-primary btn-sm']) ?> -->
                    <!-- <a href="<?= base_url('/'); ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-file-pdf"></i> PDF</a> -->
                    <?php echo anchor('customers/download', "<i class='fa-solid fa-file-pdf'> PDF</i>", ['class' => 'btn btn-primary btn-sm']) ?>
                    <a href="<?= base_url('pos'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add Sale</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="invoicedetails">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>#</th>
                                <th>Invoice No</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                                <th>Order Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($invoicedetails as $invoicedetail) : ?>
                                <tr>
                                    <td class="d-flex justify-content-center">
                                        <a href="<?= base_url('' . $invoicedetail['id']); ?>" class="btn btn-sm btn-warning me-1"><i class="fa-solid fa-print"></i></a>
                                        <a href="<?= base_url('' . $invoicedetail['id']); ?>" class="btn btn-sm btn-warning me-1"><i class="fa-solid fa-file-pdf"></i></a>
                                    </td>
                                    <td><?= $invoicedetail['id']; ?></td>
                                    <td><?= $invoicedetail['invoice_id']; ?></td>
                                    <td><?= $invoicedetail['product_name']; ?></td>
                                    <td><?= $invoicedetail['quantity']; ?></td>
                                    <td><?= $invoicedetail['price']; ?></td>
                                    <td><?= $invoicedetail['total']; ?></td>
                                    <td><?= $invoicedetail['created']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>







<?= $this->section('scripts'); ?>
<script>
    $(document).ready(function() {
        $('#invoicedetails').DataTable();
    });
</script>
<script>
    $("#btnPrint").on("click", function() {
        //alert($(window).height());
        var ht = $(window).height();
        var wt = $(window).width();
        var divContents = $("#customers").html();
        var printWindow = window.open('', '', 'height=' + ht + 'px,width=' + wt + 'px');
        printWindow.document.write('<html><head><title>All Customers</title>');
        printWindow.document.write('<link href="<?= base_url() ?>web_assets/css/bootstrap.css" rel="stylesheet" media="screen">  <link href="<?= base_url() ?>web_assets/css/custom.css" rel="stylesheet" media="screen">');
        printWindow.document.write('</head><body>');
        printWindow.document.write(divContents);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    });
</script>
<?= $this->endSection(); ?>