<?= $this->extend('layouts/default'); ?>

<?= $this->section('contents'); ?>
<h1>Purchase</h1>
<h3 class="m-3 text-center">please fill the information below</h3>

<div class="container">
    <div class="row">
        <div class="col order-last">
            <label for="exampleInputEmail1" class="form-label">Date</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="col order-first">
            <label for="exampleInputPassword1" class="form-label">Refference</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
    </div>
</div>
<div class="container">
    <label for="inputPassword5" class="form-label"></label>
    <input type="password" id="inputPassword5" class="form-control mb-3" aria-describedby="passwordHelpBlock"
        placeholder="search here">

</div>
<div class="container">
    <table border="1" width="100%" class="text-center">
        <tr>
            <th>Products</th>
            <th>Quantity</th>
            <th>Unit Cost</th>
            <th>Total</th>
            <th><i class="fa-solid fa-circle-trash"></i></th>
        </tr>

        <tr>
            <td>SSD</td>
            <td>1</td>
            <td>2250</td>
            <td>2250</td>
            <td><i class="fa-solid fa-circle-trash"></i></td>
        </tr>

        <tr>
            <th>Total</th>
            <th></th>
            <th></th>
            <th>0.0</th>
        </tr>
    </table>
</div>
<div class="container mt-3">
    <div class="row">
        <div class="col order-last">
            <select id="disabledSelect" class="form-select">
                <option>Supplier</option>
                <option>Supplier2</option>
                <option>Supplier3</option>
                <option>Supplier4</option>
            </select>
        </div>
        <div class="col order-first">
            <select id="disabledSelect" class="form-select">
                <option>Received</option>
                <option>Pending</option>
            </select>
        </div>
    </div>
</div>
<div class="container content-center mt-4">
    <label class="form-label" for="customFile">Attachment</label>
    <input type="file" class="form-control" id="customFile" />
    <br>
    <div class="form-outline mb-4">
        <label class="form-label" for="textAreaExample6">Description</label>
        <textarea class="form-control" id="textAreaExample6" rows="3"></textarea>
        
      </div>
      <div class="d-grid gap-2 d-md-block mt-2">
        <button class="btn btn-primary" type="button">submit</button>
        <button class="btn btn-danger" type="button">Cancel</button>
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