<?= $this->extend('layouts/default'); ?>

<?= $this->section('contents'); ?>

<?php if (session()->getFlashdata('message')) : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('message'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                Add Purchase
            </div>
            <div class="card-body">
                <div>
                    <?php echo form_open(''); ?>
                    <input type="text" class="form-control auto" id="productsearch" name="productsearch" placeholder="Enter Product Name/SKU/Scan Bar Code" />
                    <?php echo form_close(); ?>
                </div>
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Barcode</th>
                                <th>Product(s)</th>
                                <th>Unit Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>x</th>
                            </tr>
                        </thead>
                        <tbody id="dyn_tr">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div>
                    <input type="text" class="form-control auto" id="suppliersearch" name="suppliersearch" placeholder="Enter Supplier Name" />
                </div>
                <div id="dyn_supplier">
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-7">Total:</div>
                    <div class="col-md-5 text-end">&#2547; <span id="total"></span></div>

                    <div class="col-md-7">Discount:</div>
                    <div class="col-md-5 text-end"> <input id="discount" value="0" />&#2547;</div>
                    <hr>
                    <div class="col-md-7"><b>Grand Total: </b></div>
                    <div class="col-md-5 text-end">&#2547; <span id="grandtotal"></span></div>
                    <hr>
                    <div class="form-group">
                        <label for="payment_method">Payment Method:</label>
                        <?php echo form_dropdown('payment_method', $accounts, '4', ['class' => 'form-control', 'id' => 'payment_method']); ?>
                        <input type="text" name="trxId" id="trxId" class="d-none form-control mt-2" placeholder="Transaction ID">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div>
    <label for="purchasenote" class="form-label">Purchase Note</label>
    <textarea class="form-control" name="purchasenote" id="purchasenote"></textarea>
</div>
<div class=" text-center">
    <button type="button" id="saveBtn" class="btn btn-success m-2">Save</button>
    <button type="button" class="btn btn-info m-2">Save & Print</button>
</div>
<h3 id="responseMessage"></h3>

<?= $this->endSection(); ?>


<?= $this->section('scripts'); ?>
<script>
    var BASE_URL = "<?php echo base_url(); ?>";

    function financial(x) {
        return Number.parseFloat(x).toFixed(2);
    }
    $(document).ready(function() {
        //autocomplete
        $("#productsearch").autocomplete({
            source: BASE_URL + '/search',
            minLength: 1,
            select: function(event, ui) {
                console.log(ui);
                var id = ui.item.id;
                addProduct(id);
            }
        });

        function addProduct(id) {
            $.ajax({
                url: BASE_URL + '/addcart',
                type: 'post',
                data: {
                    id: id
                },
                success: function(response) {
                    // console.log(response);
                    // return;
                    response = JSON.parse(response);
                    $html = "<tr>";
                    $html += "<th class='productid'>" + response.id + "</th>";
                    $html += "<td class='barcode'>" + response.barcode + "</td>";
                    $html += "<td class='productname'>" + response.name + "</td>";
                    $html += "<td class='pprice'>" + response.price + "</td>";
                    $html += "<td><input class='qu' type='number' min='1' name='quantity' value='1'></td>";
                    $html += "<td class='itemtotal'>" + response.price + "</td>";
                    $html += "<td class='deleteproduct'><i class='fa-solid fa-circle-xmark'></i></td>";
                    $html += "</tr>";
                    $('#dyn_tr').append($html);
                    $("#productsearch").val("").focus();
                    updateTotal();
                }
            });
        }
        //delete product
        $(document).on('click', '.deleteproduct', function(e) {
            e.preventDefault();
            $(this).closest('tr').remove();
        });
        //update total
        $(document).on('blur change keyup', '.qu', function() {
            var $row = $(this).closest('tr');
            var qty = $row.find('.qu').val();
            var price = $row.find('.pprice').text();
            var itemtotal = qty * price;
            //console.log(itemtotal);
            $row.find('.itemtotal').text(financial(itemtotal));
            updateTotal();
        });

        function updateTotal() {
            //console.log($('.itemtotal'));
            var grandtotal = 0;
            $('.itemtotal').each(function() {
                grandtotal += parseFloat($(this).text());
            });
            $('#total').text(grandtotal);
            // alert($("#discount").val());
            $('#grandtotal').text(grandtotal - parseInt($("#discount").val()));
        }
        //
        $("#discount").keyup(function() {
            updateTotal();
        })

        //payment method
        $("#payment_method").change(function() {
            var payment_method = $(this).val();
            if (payment_method == 'cash') {
                $("#trxId").addClass('d-none');
            } else {
                $("#trxId").removeClass('d-none');
            }
        });

        //supplier autocomplete
        $("#suppliersearch").autocomplete({
            source: BASE_URL + '/suppliersearch',
            minLength: 1,
            select: function(event, ui) {
                // console.log(ui);
                $html2 = "";
                $html2 += "<div><strong>" + ui.item.name + "</strong></div>";
                $html2 += "<div>" + ui.item.address + "</div>";
                $html2 += "<div>" + ui.item.mobile + "</div>";
                $('#dyn_supplier').html($html2);
                $("#suppliersearch").val("").focus();

            }
        });


        // save button start
        $("#saveBtn").click(function() {
            $idArr = [];
            $quanArr = [];
            $priceArr = [];
            $totalArr = [];
            $(".productid").each(function() {
                $idArr.push($(this).text());
            })
            $(".qu").each(function() {
                $quanArr.push($(this).val());
            })
            $(".pprice").each(function() {
                $priceArr.push($(this).text());
            })
            $(".itemtotal").each(function() {
                $totalArr.push($(this).text());
            })

            //console.log($quanArr);
            //post data
            $.ajax({
                url: BASE_URL + '/orderplace',
                type: 'post',
                data: {
                    ids: $idArr,
                    quantity: $quanArr,
                    pricearr: $priceArr,
                    totalarr: $totalArr,
                    sid: $("#suppliersearch").val(),
                    total: $("#total").html(),
                    discount: $("#discount").val(),
                    gtotal: $("#grandtotal").html(),
                    pmethod: $("#payment_method").val(),
                    trxid: $("#trxId").val(),
                    comment: $("#purchasenote").val()
                },
                success: function(response) {
                    $("#responseMessage").html(response);
                    // location.reload();

                }
            });
            //post data            


        });
        // save button end
        // 
    });
</script>

<?= $this->endSection(); ?>