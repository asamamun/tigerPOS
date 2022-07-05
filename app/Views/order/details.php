<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Invoice</title>
  <link rel="stylesheet" href="style.css" media="all" />
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/invoicestyle.css" />
</head>

<body>
  <header class="clearfix">
    <div id="logo">
    <img src="<?= base_url() ?>/<?= COMPANY_LOGO ?>" alt="">
    </div>
    <div id="company">
      <h2 class="name"><?= COMPANY_NAME; ?></h2>
      <div><?= COMPANY_ADDRESS; ?></div>
      <div><?= COMPANY_PHONE; ?></div>
      <div><a href="<?= COMPANY_EMAIL; ?>"><?= COMPANY_EMAIL; ?></a></div>
    </div>
    </div>
  </header>
  <main>
    <div id="details" class="clearfix">
      <div id="client">
        <div class="to">INVOICE TO:</div>
        <h2 class="name"><?php echo $order[0]['supplier_name'] ?></h2>
        <div class="address"><?php echo $order[0]['supplier_address'] ?></div>
        <div class="email"><a href="<?php echo $order[0]['supplier_email'] ?>"><?php echo $order[0]['supplier_email'] ?></a></div>
      </div>
      <div id="invoice">
        <h1>INVOICE #<?php echo $order[0]['order_id'] ?></h1>
        <div class="date">Date of Invoice: <?php echo $order[0]['created'] ?></div>
        <!-- <div class="date">Due Date: 30/06/2014</div> -->
      </div>
    </div>
    <table border="0" cellspacing="0" cellpadding="0">
      <thead>
        <tr>
          <th class="no">#</th>
          <th class="desc">DESCRIPTION</th>
          <th class="unit">UNIT PRICE</th>
          <th class="qty">QUANTITY</th>
          <th class="total">TOTAL</th>
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
          <tr>
            <td class="no"><?= $sl++; ?></td>
            <td class="desc"><?= $o['product_name'] ?></td>
            <td class="unit">&#2547; <?= $o['price'] ?></td>
            <td class="qty"><?= $o['quantity'] ?></td>
            <td class="total">&#2547; <?= $o['total']; ?></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="2"></td>
          <td colspan="2">SUBTOTAL</td>
          <td>&#2547; <?= $nettotal ?></td>
        </tr>
        <tr>
          <td colspan="2"></td>
          <td colspan="2">DISCOUNT</td>
          <td>&#2547; <?= $discount ?></td>
        </tr>
        <tr>
          <td colspan="2"></td>
          <td colspan="2">GRAND TOTAL</td>
          <td>&#2547; <?= $grandtotal; ?></td>
        </tr>
      </tfoot>
    </table>
    <div id="thanks">Thank you!</div>
    <div id="notices">
      <div>NOTICE:</div>
      <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
    </div>
  </main>
  <footer>
    Invoice was created on a computer and is valid without the signature and seal.
  </footer>
</body>

</html>