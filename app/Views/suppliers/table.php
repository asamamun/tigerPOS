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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Address</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($suppliers as $supplier) { ?>
                                <tr>
                                    <td><?= $supplier['name']; ?></td>
                                    <td><?= $supplier['email']; ?></td>
                                    <td><?= $supplier['mobile']; ?></td>
                                    <td><?= $supplier['address']; ?></td>

                    </tr>
                <?php } ?>

            </tbody>







        </table>
    </div>
</body>

</html>