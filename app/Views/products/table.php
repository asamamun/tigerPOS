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
            <h3 style="text-align:center; font-family: Kalpurush,KalpurushANSI, sans-serif;"><?php echo $title; ?></h3>
            <a class="btn btn-primary" href="#"><i class="fas fa-file-pdf"></i></a>
        </div>

        <table class="table table-responsive" style="background-color: white;">

            <thead>
                <tr>
                    <th>#</th>
                    <th>Barcode</th>
                    <th>Name</th>
                    <th>Company Name</th>
                    <th>Category</th>
                    <th>Supplier</th>
                    <th>Wholesale Price</th>
                    <th>Retail Price</th>
                    <th>Purchase Price</th>
                    <th>Quantity</th>
                    <th>Description</th>
                    <th>Tax</th>

                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($products as $product) { ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $product['barcode']; ?></td>
                        <td><?= $product['name']; ?></td>
                        <td><?= $product['company_name']; ?></td>
                        <td><?= $product['catname']; ?></td>
                        <td><?= $product['supname']; ?></td>
                        <td><?= $product['wholesale_price']; ?></td>
                        <td><?= $product['retail_price']; ?></td>
                        <td><?= $product['purchase_price']; ?></td>
                        <td><?= $product['quantity']; ?></td>
                        <td><?= $product['description']; ?></td>
                        <td><?= $product['tax']; ?>&percnt;</td>

                    </tr>
                <?php } ?>

            </tbody>







        </table>
    </div>
</body>

</html>