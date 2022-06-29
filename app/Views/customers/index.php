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
                <h3 class="card-title">Customers</h3>
                <div class="card-options">
                    <!-- <a href="<?= base_url('/'); ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-file-csv"></i> CSV</a> -->
                    <?php echo anchor('customers/csv', "<i class='fa-solid fa-file-csv'> CSV</i>", ['class' => 'btn btn-primary btn-sm']) ?>
                    <!-- <a href="<?= base_url('/'); ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-file-excel"></i> Excel</a> -->
                    <a href="<?= base_url('/'); ?>" class="btn btn-primary btn-sm" id="btnPrint"><i class="fa-solid fa-print"></i> Print</a>
                    <!-- <?php echo anchor('customers/print',"<i class='fa-solid fa-print'></i>", ['class' => 'btn btn-primary btn-sm']) ?> -->
                    <!-- <a href="<?= base_url('/'); ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-file-pdf"></i> PDF</a> -->
                    <?php echo anchor('customers/download', "<i class='fa-solid fa-file-pdf'> PDF</i>", ['class' => 'btn btn-primary btn-sm']) ?>
                    <a href="<?= base_url('customers/create'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add Customer</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="customers">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Address</th>
                                <th>Expense</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($customers as $customer) : ?>
                                <tr>
                                    <td><?= $customer['name']; ?></td>
                                    <td><?= $customer['email']; ?></td>
                                    <td><?= $customer['mobile']; ?></td>
                                    <td><?= $customer['address']; ?></td>
                                    <td><?= $customer['expense']; ?></td>
                                    <td class="d-flex justify-content-center">
                                        <a href="<?= base_url('customers/edit/' . $customer['id']); ?>" class="btn btn-sm btn-warning me-1"><i class="fa fa-edit"></i></a>
                                        <!-- onsubmit="return confirm('Are you sure you want to submit this form?');" -->
                                        <?php echo form_open("customers/delete/".$customer['id'],['onsubmit'=>"return confirm('Are you sure you want to submit this form?');"]) ?>
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                        <?php echo form_close(); ?>
                                        <!-- <a href="<?= base_url('customers/delete/' . $customer['id']); ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a> -->
                                    </td>
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
        $('#customers').DataTable();
    } );
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