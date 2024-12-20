<?php include './views/layout/header.php' ?>

<?php include './views/layout/navbar.php' ?>

<hr>

<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card-header border-0">
          <div class="d-flex justify-content-between">
            <!DOCTYPE html>
            <html>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
            <link
              href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
              rel="stylesheet">
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
            <link rel="stylesheet" href="./views/css/styles.css">

            <body>
              <!-- Main -->
              <main class="main-container">
                <div class="main-cards">

                  <div class="card">
                    <div class="card-inner">
                      <h3 class="font">Sản Phẩm</h3>
                      <span class="material-icons-outlined">inventory_2</span>
                    </div>
                    <?php
                    function tongSanPham($listProduct)
                    {
                      return count($listProduct);

                    }
                    ?>
                    <h1 class="font"><?= $allSanPham = tongSanPham($listProduct); ?></h1>
                  </div>

                  <div class="card">
                    <div class="card-inner">
                      <h3 class="font">Danh Mục</h3>
                      <span class="material-icons-outlined">category</span>
                    </div>
                    <?php
                    function tongDanhmuc($listDanhMuc)
                    {
                      return count($listDanhMuc);
                    }
                    ?>
                    <h1 class="font"><?= $allDanhMuc = tongDanhmuc($listDanhMuc); ?></h1>
                  </div>

                  <div class="card">
                    <div class="card-inner">
                      <h3 class="font">Khách Hàng</h3>
                      <span class="material-icons-outlined">groups</span>
                    </div>
                    <?php
                    function tongTaiKhoan($listTaiKhoan, $chucVu = null)
                    {
                      if ($chucVu !== null) {
                        // Lọc các tài khoản có chuc_vu bằng giá trị chỉ định
                        $filtered = array_filter($listTaiKhoan, function ($taiKhoan) use ($chucVu) {
                          return isset($taiKhoan['chuc_vu']) && $taiKhoan['chuc_vu'] == $chucVu;
                        });
                        return count($filtered);
                      }
                      return count($listTaiKhoan);
                    }
                    ?>
                    <h1 class="font"><?= $allTaiKhoan = tongTaiKhoan($listTaiKhoan, 2); ?></h1>
                  </div>

                  <div class="card">
                    <div class="card-inner">
                      <h3 class="font">Doanh thu 7 ngày vừa qua:</h3>
                      <span class="material-icons-outlined"></span>
                    </div>
                    <h1 class="font"><?= number_format($tongDoanhThu, 0, ',', '.') . " đ" ?></h1>
                  </div>

                </div>

              </main>

          </div>
          <div class="text-center my-4">
            <div class="row">
              <!-- Biểu đồ 1 -->
              <div class="col-md-6">
                <div class="chart-card">
                  <canvas id="myChart1" style="width:100%;max-width:600px;"></canvas>
                </div>
              </div>

              <!-- Biểu đồ 2 -->
              <div class="col-md-6">
                <div class="chart-card">
                  <canvas id="myChart2" style="width:100%;max-width:700px"></canvas>
                </div>
              </div>

              <!-- Biểu đồ 3 -->
              <div class="col-md-6">
                <div class="chart-card">
                  <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
                </div>
              </div>

              <!-- Biểu đồ 4 -->
              <div class="col-md-6">
                <div class="chart-card">
                  <canvas id="myChart4" style="width:100%;max-width:700px"></canvas>
                </div>
              </div>
              <!-- Biểu đồ 5 -->
              <div class="col-md-6">
                <div class="chart-card">
                  <canvas id="myChart3" style="width:100%;max-width:700px"></canvas>
                </div>
              </div>
            </div>
          </div>
          <script>
            // Hàm tạo màu HEX ngẫu nhiên
            function getRandomColor() {
              const letters = "0123456789ABCDEF";
              let color = "#";
              for (let i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
              }
              return color;
            }
          </script>
          <script>
            let barColors1 = [];
            const xSanPham1 = [];
            const ySanPham1 = [];
            // console.log(xSanPham);
            // console.log('ghgg');

            <?php foreach ($listProduct as $key => $value) {
              //extract($value);
              echo "xSanPham1.push('" . $value['ten_san_pham'] . "') ";
              echo ";";
              echo "ySanPham1.push('" . $value['so_luong'] . "') ";
              echo ";";

            }
            ?>
            // ["Italy", "France", "Spain", "USA", "Argentina"];
            if (barColors1.length === 0) {
              barColors1 = xSanPham1.map(() => getRandomColor());
            }

            new Chart("myChart1", {
              type: "pie",
              data: {
                labels: xSanPham1,
                datasets: [{
                  backgroundColor: barColors1,
                  data: ySanPham1
                }]
              },
              options: {
                title: {
                  display: true,
                  text: "Thống kê sản phẩm"
                }
              }
            });
          </script>
          <script>
            const xDoanhThuThang = [];
            const yDoanhThuThang = [];
            <?php
            foreach ($doanhThuThang as $key => $value) {
              echo "xDoanhThuThang.push('" . $value['thang'] . '/' . $value['nam'] . "'); ";
              echo "yDoanhThuThang.push(" . $value['doanh_thu'] . "); ";
            }
            ?>
            const barColors2 = ["red", "green", "blue", "orange", "brown", "purple"];

            new Chart("myChart2", {
              type: "bar",
              data: {
                labels: xDoanhThuThang,
                datasets: [{
                  backgroundColor: barColors2,
                  data: yDoanhThuThang
                }]
              },
              options: {
                legend: { display: false },
                title: {
                  display: true,
                  text: "Doanh thu hàng tháng"
                }
              }
            });
          </script>

          <script>
            const xValues = [];
            const yValues = [];
            // print_r($top5SanPham);

            <?php foreach ($top5SanPham as $key => $value) {
              echo "xValues.push('" . $value['ten_san_pham'] . "'); ";
              echo "yValues.push(" . $value['tong_so_luong'] . "); ";
            } ?>

            const barColors = ["red", "green", "blue", "orange", "brown"];

            new Chart("myChart", {
              type: "bar",
              data: {
                labels: xValues,
                datasets: [{
                  backgroundColor: barColors,
                  data: yValues
                }]
              },
              options: {
                legend: { display: false },
                title: {
                  display: true,
                  text: "Top 5 sản phẩm bán chạy"
                }
              }
            });
          </script>
          <script>
            const xLuotXem = [];
            const yLuotXem = [];

            <?php foreach ($top5LuotXem as $key => $value) {
              echo "xLuotXem.push('" . $value['ten_san_pham'] . "'); ";
              echo "yLuotXem.push('" . $value['luot_xem'] . "'); ";
            } ?>

            const barColors4 = ["red", "green", "blue", "orange", "brown"];

            new Chart("myChart4", {
              type: "bar",
              data: {
                labels: xLuotXem,
                datasets: [{
                  backgroundColor: barColors4,
                  data: yLuotXem
                }]
              },
              options: {
                legend: { display: false },
                title: {
                  display: true,
                  text: "Top 5 sản phẩm có lượt xem nhiều nhất"
                }
              }
            });
          </script>
          <script>
            const xDanhGia = [];
            const yDanhGia = [];

            <?php foreach ($top5DanhGia as $key => $value) {
              echo "xDanhGia.push('" . $value['ten_san_pham'] . "'); ";
              echo "yDanhGia.push('" . $value['diem_trung_binh'] . "'); ";
            } ?>

            const barColors3 = ["red", "green", "blue", "orange", "brown"];

            new Chart("myChart3", {
              type: "bar",
              data: {
                labels: xDanhGia,
                datasets: [{
                  backgroundColor: barColors3,
                  data: yDanhGia
                }]
              },
              options: {
                legend: { display: false },
                title: {
                  display: true,
                  text: "Top 5 sản phẩm có lượt đánh giá cao nhất"
                }
              }
            });
          </script>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<!-- <script src="js/scripts.js"></script> -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">


<?php include './views/layout/footer.php' ?>