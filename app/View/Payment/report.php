<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Báo Cáo Doanh Số</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
</head>
<body>
    <div class="container mt-3">
        <h2 class="mb-4">Báo Cáo Doanh Số</h2>
        <div class="row">
            <div class="col-md-6">
                <canvas id="revenueChart"></canvas>
            </div>
            <div class="col-md-6">
                <canvas id="expenseChart"></canvas>
            </div>
        </div>
        <div class="row mt-5">
        <div class="col-md-6">
            <h4>Danh Sách Doanh Thu</h4>
            <table class="table table-inverse">
                <tr>
                    <td align=center><b>Tháng</b></td>
                    <th>Doanh Thu</th>
                </tr>
                <?php
                    foreach($Income as $key => $value){
                        echo "<tr><td align=center>" . ($key + 1) . "</td><td>$" . number_format($value, 2) . "</td></tr>";
                    }
                ?>
            </table>

            </div>
            <div class="col-md-6">
                <canvas id="percentageChart" class="mb-3"></canvas>
                <?php
                echo "<b>Trung bình thu nhập hàng tháng:</b> $" . number_format($averageIncome, 2) . " ($result)";
            ?>
            </div>
        </div>
    </div>

    <script>
        // Dữ liệu minh họa (thống kê thu chi theo tháng)
        var revenueData = {
            labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6"],
            datasets: [{
                label: 'Thu Tiền',
                data: [5000000, 6000000, 5500000, 7000000, 8000000, 7500000],
                backgroundColor: 'rgba(54, 162, 235, 0.8)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        };

        var expenseData = {
            labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6"],
            datasets: [{
                label: 'Chi Tiền',
                data: [2000000, 2500000, 3000000, 3500000, 4000000, 4500000],
                backgroundColor: 'rgba(255, 99, 132, 0.8)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        };

        // Tính tổng thu và tổng chi
        var totalRevenue = revenueData.datasets[0].data.reduce((a, b) => a + b, 0);
        var totalExpense = expenseData.datasets[0].data.reduce((a, b) => a + b, 0);
        var percentageData = {
            labels: ["Thu Tiền", "Chi Tiền"],
            datasets: [{
                label: 'Phần trăm',
                data: [totalRevenue, totalExpense],
                backgroundColor: ['rgba(54, 162, 235, 0.8)', 'rgba(255, 99, 132, 0.8)'],
                borderColor: ['rgba(54, 162, 235, 1)', 'rgba(255, 99, 132, 1)'],
                borderWidth: 1
            }]
        };

        // Vẽ biểu đồ
        var revenueChart = new Chart(document.getElementById('revenueChart').getContext('2d'), {
            type: 'bar',
            data: revenueData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var expenseChart = new Chart(document.getElementById('expenseChart').getContext('2d'), {
            type: 'bar',
            data: expenseData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var percentageChart = new Chart(document.getElementById('percentageChart').getContext('2d'), {
            type: 'doughnut',
            data: percentageData
        });
    </script>
</body>
</html>
