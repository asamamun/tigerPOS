<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Document</title>
    <style>
        @font-face {
            font-family: 'Kalpurush';
            font-style: normal;
            font-weight: normal;
            src: url(http://localhost/r49/CI/cicomposerproject/public/assets/kalpurush.ttf) format('truetype');
        }

        @font-face {
            font-family: 'KalpurushANSI';
            font-style: normal;
            font-weight: normal;
            src: url("http://localhost/r49/CI/cicomposerproject/public/assets/kalpurush ANSI.ttf") format('truetype');
        }
    </style>
</head>

<body>
    <div class="container">

        <div class="d-flex justify-content-between">

            <a class="btn btn-primary" href="#"><i class="fas fa-file-pdf"></i></a>
        </div>

        <table class="table table-responsive" style="background-color: white;">
            <thead>
                <tr>
                    

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
</body>

</html>