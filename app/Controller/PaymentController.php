<?php 

class PaymentController{
    public function index(){
        include './app/View/Payment/payment.php';
    }
    public function show($param){
        $data = $this->dataReport();  
        $result = $data[0];
        $averageIncome = $data[1];
        $Income = $data[2];
        
        include './app/View/Payment/' .$param;
    }

    public function dataReport(){
        // Dữ liệu minh họa (thống kê thu chi theo tháng)
        $revenues = [5000000, 6000000, 5500000, 7000000, 8000000, 7500000]; // Doanh thu theo tháng
        $expenses = [2000000, 2500000, 3000000, 3500000, 4000000, 4500000]; // Chi phí theo tháng
        $Income = [];
        for($i = 0; $i < count($revenues); $i++){
            $Income[$i] = $revenues[$i] - $expenses[$i];
        }

        // Tính tổng doanh thu và tổng chi phí
        $totalRevenue = array_sum($revenues);
        $totalExpense = array_sum($expenses);

        // Tính trung bình thu nhập hàng tháng
        $averageIncome = ($totalRevenue - $totalExpense) / count($revenues);

        // Xác định lời, lãi, lỗ
        if ($averageIncome > 0) {
            $result = "Lời";
        } else {
            $result = "Lỗ";
        }
        
        return [$result, $averageIncome, $Income];
    }
}
?>