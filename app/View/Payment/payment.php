<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản lí thu chi</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<?php include 'app/View/Template/navbar.php' ?>
<?php include 'app/View/Template/sidebar.php' ?>

<!-- Main Content Section -->
<div class="main-content">
    <div class="container mt-5">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="receipt-tab" data-toggle="tab" href="#receipt" role="tab" aria-controls="receipt" aria-selected="true">Quản Lý Phiếu Thu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="expense-tab" data-toggle="tab" href="#expense" role="tab" aria-controls="expense" aria-selected="false">Quản Lý Phiếu Chi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="report-tab" data-toggle="tab" href="#report" role="tab" aria-controls="report" aria-selected="false">Báo Cáo Doanh Số</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="receipt" role="tabpanel" aria-labelledby="receipt-tab">
                <iframe src="./payment/receipts" frameborder="0" class="w-100" style="height: 80vh;"></iframe>
            </div>
            <div class="tab-pane fade" id="expense" role="tabpanel" aria-labelledby="expense-tab">
                <iframe src="./payment/expenses" frameborder="0" class="w-100" style="height: 80vh;"></iframe>
            </div>
            <div class="tab-pane fade" id="report" role="tabpanel" aria-labelledby="report-tab">
                <iframe src="./payment/report" frameborder="0" class="w-100" style="height: 80vh;"></iframe>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap JS and jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
