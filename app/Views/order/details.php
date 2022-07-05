<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Tax Invoice</title>
  <link rel="shortcut icon" type="image/png" href="./favicon.png" />
  <style>
    * {
      box-sizing: border-box;
    }

    .table-bordered td,
    .table-bordered th {
      border: 1px solid #ddd;
      padding: 10px;
      word-break: break-all;
    }

    body {
      font-family: Arial, Helvetica, sans-serif;
      margin: 0;
      padding: 0;
      font-size: 16px;
    }

    .h4-14 h4 {
      font-size: 12px;
      margin-top: 0;
      margin-bottom: 5px;
    }

    .img {
      margin-left: "auto";
      margin-top: "auto";
      height: 30px;
    }

    pre,
    p {
      /* width: 99%; */
      /* overflow: auto; */
      /* bpicklist: 1px solid #aaa; */
      padding: 0;
      margin: 0;
    }

    table {
      font-family: arial, sans-serif;
      width: 100%;
      border-collapse: collapse;
      padding: 1px;
    }

    .hm-p p {
      text-align: left;
      padding: 1px;
      padding: 5px 4px;
    }

    td,
    th {
      text-align: left;
      padding: 8px 6px;
    }

    .table-b td,
    .table-b th {
      border: 1px solid #ddd;
    }

    .hm-p td,
    .hm-p th {
      padding: 3px 0px;
    }

    .cropped {
      float: right;
      margin-bottom: 20px;
      height: 100px;
      /* height of container */
      overflow: hidden;
    }

    .cropped img {
      width: 400px;
      margin: 8px 0px 0px 80px;
    }

    .main-pd-wrapper {
      box-shadow: 0 0 10px #ddd;
      background-color: #fff;
      border-radius: 10px;
      padding: 15px;
    }

    .table-bordered td,
    .table-bordered th {
      border: 1px solid #ddd;
      padding: 10px;
      font-size: 14px;
    }

    .invoice-items {
      font-size: 14px;
      border-top: 1px dashed #ddd;
    }

    .invoice-items td {
      padding: 14px 0;

    }
  </style>
</head>

<body>
  <section class="main-pd-wrapper" style="width: 450px; margin: auto">
    <div style="
                  text-align: center;
                  margin: auto;
                  line-height: 1.5;
                  font-size: 14px;
                  color: #4a4a4a;
                ">
      <img src="<?= base_url() ?>/<?= COMPANY_LOGO ?>" alt="">

      <p style="font-weight: bold; color: #000; margin-top: 15px; font-size: 18px;">
        Tax Order Of Supply <?= COMPANY_NAME; ?>
      </p>
      <p style="margin: 15px auto;">
        <?= COMPANY_ADDRESS; ?>
      </p>
      <p>
        <b>MAMUN:</b> <?= COMPANY_PHONE; ?>
      </p>
      <p>Supplier Name: <?php echo $order[0]['supplier_name'] ?> </p>
      <hr style="border: 1px dashed rgb(131, 131, 131); margin: 25px auto">
    </div>
    <table style="width: 100%; table-layout: fixed">
      <thead>
        <tr>
          <th style="width: 50px; padding-left: 0;">Sn.</th>
          <th style="width: 220px;">Item Name</th>
          <th>QTY</th>
          <th style="text-align: right; padding-right: 0;">Price</th>
          <th style="text-align: right; padding-right: 0;">Total</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sl = 1;
        $q = 0;
        foreach ($order as $o) {
          $supplierid = $o['supplier_id'];
          $nettotal = $o['nettotal'];
          $discount = $o['discount'];
          $grandtotal = $o['grandtotal'];
          $comment = $o['comment'];
          $payment = $o['payment_type'];
          $trxid = $o['trxid'];
          $q +=  $o['quantity'];
        ?>
          <tr class="invoice-items">
            <td><?= $sl++; ?></td>
            <td><?= $o['product_name'] ?></td>
            <td><?= $o['quantity'] ?></td>
            <td><?= $o['price'] ?></td>
            <td style="text-align: right;"><?= $o['total']; ?></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
    <table style="width: 100%;
              margin-top: 15px;
              border: 1px dashed #00cd00;
              border-radius: 3px;">
      <thead>
        <tr>
          <td>Total Amount In Tk: </td>
          <td style="text-align: right;"><?= $nettotal ?></td>
        </tr>
        <tr>
          <td>Total Discount in Tk: </td>
          <td style="text-align: right;"><?= $discount ?></td>
        </tr>
      </thead>

    </table>
    <table style="width: 100%;
              background: #fcbd024f;
              border-radius: 4px;">
      <thead>
        <tr>
          <th>Total</th>
          <th style="text-align: center;">Total Item (<?= $q ?>)</th>
          <th>&nbsp;</th>
          <th style="text-align: right;"><?= $grandtotal; ?></th>

        </tr>
      </thead>

    </table>
  </section>
</body>

</html>