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
                    <!-- <th>#</th> -->

                    <th>Date</th>
                    <th>Invoice No.</th>
                    <th>Customer name</th>
                    <th>Contact number</th>
                    <th>Location</th>
                    <th>Payment Method</th>
                    <th>Net Total</th>
                    <th>Discount</th>
                    <th>Grand Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sales as $sale) : ?>
                    <tr>

                        <td><?= $sale['created']; ?></td>
                        <td><?= $sale['id']; ?></td>
                        <td><?= $sale['custname']; ?></td>
                        <td><?= $sale['custmob']; ?></td>
                        <td><?= $sale['custaddress']; ?></td>
                        <td><?= $sale['accname']; ?></td>
                        <td><?= $sale['nettotal']; ?></td>
                        <td><?= $sale['discount']; ?></td>
                        <td><?= $sale['grandtotal']; ?></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>



        </table>
    </div>
</body>

</html>