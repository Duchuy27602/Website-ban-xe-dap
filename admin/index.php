<?php 
include ("../admin/includes/header.php");
?>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <br>
            <br>
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Total Users</p>
                        <h4 class="mb-0"><?= totalValue('users') ?></h4>
                    </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>than lask month</p>
                    </div>
                </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Total Product</p>
                        <h4 class="mb-0"><?= totalValue('products') ?></h4>
                    </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than lask week</p>
                    </div>
                </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">receipt_long</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Total order</p>
                        <h4 class="mb-0"><?= totalValue('orders') ?></h4>
                    </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span> than yesterday</p>
                    </div>
                </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">weekend</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Sales</p>
                        <h4 class="mb-0">$<?= totalPriceGet() ?></h4>
                    </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5% </span>than yesterday</p>
                    </div>
                </div>
                </div>
            </div>
            <br>
            <br>
            <div class="row">
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">calendar_month</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Sales Month</p>
                            <h4 class="mb-0">$<?= totalPriceMonthGet() ?></h4>
                        </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5% </span>than last month</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">shopping_bag</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Biggest Buyer</p>
                            <h4 class="mb-0"><?= topOrderMonthGet()['quantity'] ?></h4>
                        </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder"><?= topOrderMonthGet()['user_name'] ?></span> is the biggest buyer</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-secondary shadow-secondary text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">shopping_basket</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Most sold products</p>
                            <h4 class="mb-0"><?= topProductOrderMonthGet()['quantity'] ?></h4>
                        </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder"><?= topProductOrderMonthGet()['product_name'] ?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-warning shadow-warning text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">inventory_2</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Total Inventory</p>
                            <h4 class="mb-0"><?= totalInventory() ?></h4>
                        </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder">&nbsp;</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<?php include ("../admin/includes/footer.php"); ?>