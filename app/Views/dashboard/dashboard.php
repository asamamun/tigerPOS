<?= $this->extend('layouts/default'); ?>

<?= $this->section('contents'); ?>
<div class="row">
    <div class="col-6">
        <h1>Dashboard</h1>
    </div>
    <div class="col-6">
        <div class="dropdown ">
            <button class="btn btn-light dropdown-toggle position-absolute top-50 end-0 translate-middle-y mt-3 " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Filter By Date
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="dashboard">All</a></li>
                <li><a class="dropdown-item" href="?filter=today">Today</a></li>
                <li><a class="dropdown-item" href="?filter=yesterday">Yesterday</a></li>
                <li><a class="dropdown-item" href="?filter=last7">Last 7 Days</a></li>
                <li><a class="dropdown-item" href="?filter=lastmonth">Last month</a></li>
                <li><a class="dropdown-item" href="?filter=thismonth">This month</a></li>
                <li><a class="dropdown-item" href="?filter=last6month">Last 6 Month</a></li>
                <li><a class="dropdown-item" href="?filter=year">This Year</a></li>
                <li><a class="dropdown-item" href="?filter=lastyear">last year</a></li>
                <li><a class="dropdown-item" href="#">last Financial year</a></li>
                <li><a class="dropdown-item" href="#">this Financial year</a></li>
                <li><a class="dropdown-item" href="#">Custom Range</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3 mb-3">
        <div class="card bg-primary">
            <div class="row">
                <div class="col-3">
                    <div class="card-body text-center ">
                        <h1 class="mt-2"><i class="fa-solid fa-user-large"></i></h1>
                    </div>
                </div>
                <div class="col-9">
                    <div class="card-body">
                        <p class="card-title fw-bold">TOTAL USER</p>
                        <h4> <?= $totalusers ?? "0"; ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card bg-success">
            <div class="row">
                <div class="col-3">
                    <div class="card-body text-center ">
                        <h1 class="mt-2"><i class="fa-solid fa-basket-shopping"></i></h1>
                    </div>
                </div>
                <div class="col-9">
                    <div class="card-body">
                        <p class="card-title fw-bold">TOTAL SALES</p>
                        <h4>&#2547; <?= $totalsales->totalsales ?? "0"; ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card bg-info">
            <div class="row">
                <div class="col-3">
                    <div class="card-body text-center ">
                        <h1 class="mt-2"><i class="fa-solid fa-cart-shopping"></i></h1>
                    </div>
                </div>
                <div class="col-9">
                    <div class="card-body">
                        <p class="card-title fw-bold">TOTAL PURCHASE</p>
                        <h4>&#2547; <?= $totalpurchase->totalpurchase ?? "0"; ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card bg-warning">
            <div class="row">
                <div class="col-3">
                    <div class="card-body text-center ">
                        <h1 class="mt-2"><i class="fa-solid fa-circle-dollar-to-slot"></i></h1>
                    </div>
                </div>
                <div class="col-9">
                    <div class="card-body">
                        <p class="card-title fw-bold">TOTAL EXPENSE</p>
                        <h4>&#2547; <?= $totalexpense->totalexpense ?? "0"; ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mt-3">
        <div class="card bg-muted">
            <div class="row">
                <div class="col-3">
                    <div class="card-body text-center ">
                        <h1 class="mt-2"><i class="fa-solid fa-people-carry-box"></i></h1>
                    </div>
                </div>
                <div class="col-9">
                    <div class="card-body">
                        <p class="card-title fw-bold">TOTAL ORDER</p>
                        <h4><?= $totalorders ?? "0"; ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mt-3">
        <div class="card bg-secondary">
            <div class="row">
                <div class="col-3">
                    <div class="card-body text-center ">
                        <h1 class="mt-2"><i class="fa-solid fa-box"></i></h1>
                    </div>
                </div>
                <div class="col-9">
                    <div class="card-body">
                        <p class="card-title fw-bold">TOTAL PACKED</p>
                        <h4>&#2547; 12564</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mt-3">
        <div class="card bg-danger">
            <div class="row">
                <div class="col-3">
                    <div class="card-body text-center ">
                        <h1 class="mt-2"><i class="fa-solid fa-cart-shopping"></i></h1>
                    </div>
                </div>
                <div class="col-9">
                    <div class="card-body">
                        <p class="card-title fw-bold">PURCHASE DUE</p>
                        <h4>&#2547; 12564</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mt-3">
        <div class="card bg-light">
            <div class="row">
                <div class="col-3">
                    <div class="card-body text-center ">
                        <h1 class="mt-2"><i class="fa-solid fa-file-lines"></i></h1>
                    </div>
                </div>
                <div class="col-9">
                    <div class="card-body">
                        <p class="card-title fw-bold">INVOICE DUE</p>
                        <h4>&#2547; 12564</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- last 30 days sales -->
<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Sales Last 30 Days</h4>
                <div class="card-options">
                    <a href="<?= base_url('/'); ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-file-csv"></i> CSV</a>
                    <a href="<?= base_url('/'); ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-file-excel"></i> Excel</a>
                    <a href="<?= base_url('/'); ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-print"></i> Print</a>
                    <a href="<?= base_url('/'); ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-file-pdf"></i> PDF</a>
                </div>
            </div>
            <div class="card-body">
                <canvas id="last30chart"></canvas>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary w-100" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Details
                </button>
            </div>
        </div>

        <div class="collapse mt-3" id="collapseExample">
            <div class="card card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="categories">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($sales30->getResult() as $row) {
                                echo "<tr>";
                                echo "<td>" . $row->cdate . "</td>";
                                echo "<td>" . $row->totalsales . "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Montly sales report -->
<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Monthly Sales Report</h4>
                <div class="card-options">
                    <a href="<?= base_url('/'); ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-file-csv"></i> CSV</a>
                    <a href="<?= base_url('/'); ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-file-excel"></i> Excel</a>
                    <a href="<?= base_url('/'); ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-print"></i> Print</a>
                    <a href="<?= base_url('/'); ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-file-pdf"></i> PDF</a>
                </div>
            </div>
            <div class="card-body">
                <canvas id="monthlysalechart"></canvas>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary w-100" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2">
                    Details
                </button>
            </div>
        </div>
        <div class="collapse mt-3" id="collapseExample2">
            <div class="card card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="categories">
                        <thead>
                            <tr>
                                <th>Month</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($sales365->getResult() as $row) {
                                echo "<tr>";
                                echo "<td>" . $calender[$row->month] . "</td>";
                                echo "<td>" . $row->totalsales . "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <!-- last 30 days purchase -->
<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Purchase Last 30 Days</h4>
                <div class="card-options">
                    <a href="<?= base_url('/'); ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-file-csv"></i> CSV</a>
                    <a href="<?= base_url('/'); ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-file-excel"></i> Excel</a>
                    <a href="<?= base_url('/'); ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-print"></i> Print</a>
                    <a href="<?= base_url('/'); ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-file-pdf"></i> PDF</a>
                </div>
            </div>
            <div class="card-body">
                <canvas id="last30purchasechart"></canvas>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary w-100" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample">
                    Details
                </button>
            </div>
        </div>

        <div class="collapse mt-3" id="collapseExample3">
            <div class="card card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="categories">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($purchase30->getResult() as $row) {
                                echo "<tr>";
                                echo "<td>" . $row->cdate . "</td>";
                                echo "<td>" . $row->totalpurchase . "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Montly Purchase report -->
<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Monthly Purchase Report</h4>
                <div class="card-options">
                    <a href="<?= base_url('/'); ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-file-csv"></i> CSV</a>
                    <a href="<?= base_url('/'); ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-file-excel"></i> Excel</a>
                    <a href="<?= base_url('/'); ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-print"></i> Print</a>
                    <a href="<?= base_url('/'); ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-file-pdf"></i> PDF</a>
                </div>
            </div>
            <div class="card-body">
                <canvas id="monthlypurchasechart"></canvas>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary w-100" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample4" aria-expanded="false" aria-controls="collapseExample2">
                    Details
                </button>
            </div>
        </div>
        <div class="collapse mt-3" id="collapseExample4">
            <div class="card card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="categories">
                        <thead>
                            <tr>
                                <th>Month</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($purchase365->getResult() as $row) {
                                echo "<tr>";
                                echo "<td>" . $calender[$row->month] . "</td>";
                                echo "<td>" . $row->totalpurchase . "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    

    <?= $this->endSection(); ?>



    <?= $this->section('scripts'); ?>
    <script>
        function checkTime(i) {
            if (i < 10) {
                i = "0" + i
            }; // add zero in front of numbers < 10
            return i;
        }

        function startTime() {
            const today = new Date();

            let y = today.getFullYear();
            let mo = today.getMonth();
            let d = today.getDay();
            let h = today.getHours();
            let ampm = (h >= 12) ? "PM" : "AM";
            h = (h - 12) > 0 ? (h - 12) : h;
            let m = today.getMinutes();
            let s = today.getSeconds();

            mo = checkTime(mo);
            d = checkTime(d);
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('clock').innerHTML = y + "-" + mo + "-" + d + " " + h + ":" + m + ":" + s + " " + ampm;
            setTimeout(startTime, 1000);
        }


        $(document).ready(function() {
            startTime();
        });
    </script>

    <script>
        const ctx = document.getElementById('last30chart');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                // labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                labels: <?php echo json_encode($labels) ?>,
                datasets: [{
                    label: 'Last 30 days sales',
                    data: <?php echo json_encode($chartdata) ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        //monthly sale chart
        const ctx2 = document.getElementById('monthlysalechart');
        const myChart2 = new Chart(ctx2, {
            type: 'bar',
            data: {
                // labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                labels: <?php echo json_encode($labels2) ?>,
                datasets: [{
                    label: 'Monthly Sale',
                    data: <?php echo json_encode($chartdata2) ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        //last 30days purchase chart
        const ctx3 = document.getElementById('last30purchasechart');
        const myChart3 = new Chart(ctx3, {
            type: 'bar',
            data: {
                // labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                labels: <?php echo json_encode($labels3) ?>,
                datasets: [{
                    label: 'Purchase Last 30 Days',
                    data: <?php echo json_encode($chartdata3) ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        //monthly purchase chart
        const ctx4 = document.getElementById('monthlypurchasechart');
        const myChart4 = new Chart(ctx4, {
            type: 'bar',
            data: {
                // labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                labels: <?php echo json_encode($labels4) ?>,
                datasets: [{
                    label: 'Monthly Purchase',
                    data: <?php echo json_encode($chartdata4) ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <?= $this->endSection(); ?>