<?= $this->extend('layouts/default'); ?>

<?= $this->section('contents'); ?>
<h1>Customers</h1>
<table class="table table-striped table-responsive" id="customers">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Address</th>
            <th>Total Expense</th>
            <th>Created</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($customers as $customer) : ?>
            <tr>
                <td><?= $customer['id']; ?></td>
                <td><?= $customer['name']; ?></td>
                <td><?= $customer['email']; ?></td>
                <td><?= $customer['mobile']; ?></td>
                <td><?= $customer['address']; ?></td>
                <td><?= $customer['expense']; ?></td>
                <td><?= $customer['created']; ?></td>
                <td>
                    <a href="<?= base_url('customers/edit/' . $customer['id']); ?>" class="btn btn-primary">Edit</a>
                    <a href="<?= base_url('customers/delete/' . $customer['id']); ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<?= $this->endSection(); ?>




<?= $this->section('scripts'); ?>
<script>
    $(document).ready(function() {
        $('#customers').DataTable();
    } );
</script>
<?= $this->endSection(); ?>