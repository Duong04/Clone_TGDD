<div class="container-fluid">
    <h4>Tổng quan bảng điều khiển</h4>
    <h5 class="title-s">Thống kê</h5>
    <div class="grid-statistical">
        <div class="grid-statistical-item">
            <div class="icon"><i class="fa-solid fa-coins"></i></div>
            <h6>Đơn hàng hôm nay</h6>
            <?php $price = number_format($datas['orderToday']['totalAmount'], 0, ',', '.') ?>
            <div class="price"><?=$price > 0 ? $price.'<sup>đ</sup>' : 'Không có dữ liệu cho hôm nay!'?></div>
        </div>
        <div class="grid-statistical-item">
            <div class="icon"><i class="fa-solid fa-coins"></i></div>
            <h6>Đơn hàng hôm qua</h6>
            <?php $price = number_format($datas['orderYesterday']['totalAmount'], 0, ',', '.') ?>
            <div class="price"><?=$price > 0 ? $price.'<sup>đ</sup>' : 'Không có dữ liệu cho ngày hôm qua!'?></div>
        </div>
        <div class="grid-statistical-item">
            <div class="icon"><i class="fa-solid fa-cart-plus"></i></div>
            <h6>Đơn hàng tháng này</h6>
            <?php $price = number_format($datas['monthlyOrder']['totalAmount'], 0, ',', '.') ?>
            <div class="price"><?=$price > 0 ? $price.'<sup>đ</sup>' : 'Không có dữ liệu cho tháng này!'?></div>
        </div>
        <div class="grid-statistical-item">
            <div class="icon"><i class="fa-solid fa-cart-plus"></i></div>
            <h6>Đơn hàng tháng Trước</h6>
            <?php $price = number_format($datas['lastMonthOrder']['totalAmount'], 0, ',', '.') ?>
            <div class="price"><?=$price > 0 ? $price.'<sup>đ</sup>' : 'Không có dữ liệu cho tháng trước!'?></div>
        </div>
        <div class="grid-statistical-item">
            <div class="icon"><i class="fa-solid fa-cubes"></i></div>
            <h6>Tất cả các đơn hàng</h6>
            <?php $price = number_format($datas['allOrders']['totalAmount'], 0, ',', '.') ?>
            <div class="price"><?=$price > 0 ? $price.'<sup>đ</sup>' : 'Chưa có đơn hàng nào!'?></div>
        </div>
    </div>
    <div class="statistical-order">
        <div class="statiscal-order-item">
            <div class="icon-order orange"><i class="fa-solid fa-cart-plus"></i></div>
            <div class="quantity-order">
                <span>Tổng đơn hàng</span>
                <strong style="font-size:1.2rem;"><?=$datas['totalOrders']['totalOrders']?></strong>
            </div>
        </div>
        <div class="statiscal-order-item">
            <div class="icon-order blue"><i class="fa-solid fa-arrows-rotate"></i></div>
            <div class="quantity-order">
                <span>Đơn hàng chờ xác nhận</span>
                <strong style="font-size:1.2rem;"><?=$datas['orderConfirmation']['totalOrders']?></strong>
            </div>
        </div>
        <div class="statiscal-order-item">
            <div class="icon-order green"><i class="fa-solid fa-truck"></i></div>
            <div class="quantity-order">
                <span>Đang vận chuyển</span>
                <strong style="font-size:1.2rem;"><?=$datas['orderShipping']['totalOrders']?></strong>
            </div>
        </div>
        <div class="statiscal-order-item">
            <div class="icon-order green-2"><i class="fa-solid fa-check"></i></div>
            <div class="quantity-order">
                <span>Hoàn tất đơn hàng</span>
                <strong style="font-size:1.2rem;"><?=$datas['orderDelivered']['totalOrders']?></strong>
            </div>
        </div>
    </div>
    <div class="statistical-chart">
        <div class="chart-item chart-item-2">
            <h5>Thống kê lượt mua sản phẩm</h5>
            <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
        </div>
        <div class="chart-item">
            <h5>Thống kê lượt xem sản phẩm</h5>
            <canvas id="myChart-2" style="width:100%; max-width:600px; height:330px;"></canvas>
        </div>
    </div>
</div>
<?php 
    $textData = "";
    foreach ($datas['statisticalProduct'] as $data) {
        $textData .= "{$data['product_name']}:{$data['total_quantity_sold']}, ";
    }

    $textData2 = "";
    foreach ($datas['statisticalProductsView'] as $data) {
        $textData2 .= "{$data['product_name']}:{$data['view']}, ";
    }
?>
<script>
const textData = "<?php echo $textData; ?>";
const dataPairs = textData.split(",");

const filteredData = dataPairs.filter(pair => pair.trim() !== "");

const xValues = [];
const yValues = [];

filteredData.forEach(pair => {
    const [product_name, quantity] = pair.split(":");
    xValues.push(product_name.trim());
    yValues.push(parseInt(quantity));
});

console.log(xValues, yValues);

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
        label: xValues,
        backgroundColor: ['#ffe0e6', '#ffecd9', '#dbf2f2', '#d7ecfb', '#e6dbfa', '#e4e5e5'],
        borderColor: "rgba(0,0,255,0.1)",
        borderWidth: 1,
        data: yValues
    }]
  },
  options: {
    legend: { display: false },
    scales: {
        yAxes: [{ ticks: { beginAtZero: true } }]
    }

  }
});

const textData2 = "<?php echo $textData2; ?>";
const dataPairs_2 = textData2.split(",");

const filteredData_2 = dataPairs_2.filter(pair => pair.trim() !== "");

const xValues_2 = [];
const yValues_2 = [];

filteredData_2.forEach(pair => {
    const [product_name, view] = pair.split(":");
    xValues_2.push(product_name.trim());
    yValues_2.push(parseInt(view));
});

console.log(xValues_2, yValues_2);

const a =document.getElementById('myChart-2');
new Chart("myChart-2", {
  type: "polarArea",
  data: {
    labels: xValues_2,
    datasets: [{
        label: xValues_2,
        backgroundColor: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        borderColor: "rgba(0,0,255,0.1)",
        borderWidth: 1,
        data: yValues_2
    }]
  },
  options: {
    legend: { display: false },
    scales: {
        yAxes: [{ ticks: { beginAtZero: true } }]
    }

  }
});
</script>