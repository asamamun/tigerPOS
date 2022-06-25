<?= $this->extend('layouts/default'); ?>

<?= $this->section('contents'); ?>
<h1>Dashboard</h1>
<div class="row ">
    <div class="col-sm-3 btn btn-light">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">User</h5>
                <p>Total: 12564</p>
            </div>
        </div>
    </div>
    <div class="col-sm-3 btn btn-light">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Products</h5>
                <p>Total: 12565464</p>
            </div>
        </div>
    </div>

    <div class="col-sm-3 btn btn-light">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Sales</h5>
                <p>Total: 12565464</p>
            </div>
        </div>
    </div>
    <div class="col-sm-3 btn btn-light">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Purchase</h5>
                <p>Total: 12565464</p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>



<?= $this->section('scripts'); ?>
<script>
    // $(document).ready(function() {
    //     $('#users').DataTable();
    // } );
</script>
<?= $this->endSection(); ?>