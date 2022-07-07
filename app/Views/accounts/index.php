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
                <h3 class="card-title">Accounts</h3>
                <div class="card-options">
                    <!-- <a href="<?= base_url('/'); ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-file-csv"></i> CSV</a> -->
                    <?php echo anchor('accounts/csv', "<i class='fa-solid fa-file-csv'> CSV</i>", ['class' => 'btn btn-primary btn-sm']) ?>
                    <!-- <a href="<?= base_url('/'); ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-file-excel"></i> Excel</a> -->
                    <a href="<?= base_url('/'); ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-print"></i> Print</a>
                    <!-- <a href="<?= base_url('/'); ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-file-pdf"></i> PDF</a> -->
                    <?php echo anchor('accounts/download', "<i class='fa-solid fa-file-pdf'> PDF</i>", ['class' => 'btn btn-primary btn-sm']) ?>
                    <a href="<?= base_url('accounts/create'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add Account</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="accounts">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Account Number</th>
                                <th>Balance</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php $i = 1; ?>
                            <?php foreach ($accounts as $account) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $account['name']; ?></td>
                                    <td><?= $account['account_number']; ?></td>
                                    <td><?= $account['balance']; ?></td>
                                    <td class="d-flex justify-content-center">
                                        <a href="<?= base_url('accounts/edit/' . $account['id']); ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                        <?php echo form_open("accounts/delete/" . $account['id'], ['onsubmit' => "return confirm('Are you sure you want to submit this form?');"]) ?>
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                        <?php echo form_close(); ?>
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
        $('#accounts').DataTable();
    } );
</script>
<?= $this->endSection(); ?>