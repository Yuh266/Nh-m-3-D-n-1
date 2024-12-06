<!-- header  -->
<?php include './views/layout/header.php'; ?>


<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="card card-primary">
          <div class="card-header">
            <!-- Hiển thị thông báo thêm thành công  -->
            <?php if (isset($_SESSION['alert_success'])): ?>
              <div class="alert alert-success w-100" role="alert">
                Sửa thành công. <a href="<?= BASE_URL_ADMIN . "/?act=danh-sach-san-pham" ?>" class="alert-link">Đi đến
                  trang danh sách.</a>
              </div>
            <?php elseif (isset($_SESSION['alert_error'])): ?>
              <div class="alert alert-danger w-100" role="alert">
              Sửa thất bại.
              </div>
            <?php endif ?>
            <?php deleteAlertSession(); ?>
            <h3 class="card-title">Thông tin sản phẩm</h3>
          </div>
          <form method="POST" enctype="multipart/form-data" action="<?= BASE_URL_ADMIN . "/?act=sua-san-pham" ?>">
            <div class="card-body">
              <div class="row">
                <input type="hidden" name="id_san_pham" id="" value="<?= $sanPham['id'] ?>">
                <div class="mb-3 col-md-6">
                  <label for="exampleInputEmail1" class="form-label">Tên sản phẩm</label>
                  <input
                    value="<?= isset($sanPham['ten_san_pham']) ? $sanPham['ten_san_pham'] : ($_SESSION['san_pham']['ten_san_pham'] ?? '') ?>"
                    name="ten_san_pham" type="text" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Nhập tên sản phẩm">
                  <div id="emailHelp" class="form-text">
                    <?php if (isset($_SESSION['error']['ten_san_pham'])) { ?>
                      <p class="text-danger"><?= $_SESSION['error']['ten_san_pham'] ?></p>
                    <?php } ?>
                  </div>
                </div>


                <div class="mb-3 col-md-6">
                  <label for="exampleInputEmail1" class="form-label">Giá gốc</label>
                  <input
                    value="<?= isset($sanPham['gia_san_pham']) ? $sanPham['gia_san_pham'] : ($_SESSION['san_pham']['gia_san_pham'] ?? '') ?>"
                    name="gia_san_pham" type="number" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Nhập giá phẩm">
                  <div id="emailHelp" class="form-text">
                    <?php if (isset($_SESSION['error']['gia_san_pham'])) { ?>
                      <p class="text-danger"><?= $_SESSION['error']['gia_san_pham'] ?></p>
                    <?php } ?>
                  </div>
                </div>


                <div class="mb-3 col-md-6">
                  <label for="exampleInputEmail1" class="form-label">Giá khuyến mãi</label>
                  <input
                    value="<?= isset($sanPham['gia_khuyen_mai']) ? $sanPham['gia_khuyen_mai'] : ($_SESSION['san_pham']['gia_khuyen_mai'] ?? '') ?>"
                    name="gia_khuyen_mai" type="number" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Nhập giá phẩm">
                  <div id="emailHelp" class="form-text">
                    <?php if (isset($_SESSION['error']['gia_khuyen_mai'])) { ?>
                      <p class="text-danger"><?= $_SESSION['error']['gia_khuyen_mai'] ?></p>
                    <?php } ?>
                  </div>
                </div>


                <div class="mb-3 col-md-6">
                  <label for="exampleInputEmail1" class="form-label">Hình ảnh</label>
                  <input
                    value="<?= isset($sanPham['hinh_anh']) ? $sanPham['hinh_anh'] : ($_SESSION['san_pham']['hinh_anh'] ?? '') ?>"
                    name="hinh_anh" type="file" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Nhập giá phẩm">
                    <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" style="width: 200px; height: 200px" alt="">
                  <div id="emailHelp" class="form-text">
                    <?php if (isset($_SESSION['error']['hinh_anh'])) { ?>
                      <p class="text-danger"><?= $_SESSION['error']['hinh_anh'] ?></p>
                    <?php } ?>
                  </div>
                </div>


                <div class="mb-3 col-md-6">
                  <label for="exampleInputEmail1" class="form-label">Số lượng</label>
                  <input
                    value="<?= isset($sanPham['so_luong']) ? $sanPham['so_luong'] : ($_SESSION['san_pham']['so_luong'] ?? '') ?>"
                    name="so_luong" type="number" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Nhập giá phẩm">
                  <div id="emailHelp" class="form-text">
                    <?php if (isset($_SESSION['error']['so_luong'])) { ?>
                      <p class="text-danger"><?= $_SESSION['error']['so_luong'] ?></p>
                    <?php } ?>
                  </div>
                </div>


                <div class="mb-3 col-md-6">
                  <label for="exampleInputEmail1" class="form-label">Ngày nhập sản phẩm</label>
                  <input
                    value="<?= isset($sanPham['ngay_nhap']) ? $sanPham['ngay_nhap'] : ($_SESSION['san_pham']['ngay_nhap'] ?? '') ?>"
                    name="ngay_nhap" type="date" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Nhập tên sản phẩm">
                  <div id="emailHelp" class="form-text">
                    <?php if (isset($_SESSION['error']['ngay_nhap'])) { ?>
                      <p class="text-danger"><?= $_SESSION['error']['ngay_nhap'] ?></p>
                    <?php } ?>
                  </div>
                </div>


                <div class="mb-3 col-md-6">
                  <label for="exampleInputEmail1" class="form-label">Danh mục sản phẩm</label>
                  <select name="id_danh_muc" class="form-select" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <option value="" hidden>Chọn danh mục sản phẩm</option>
                    <?php foreach ($listDanhMuc as $danhMuc): ?>
                      <option <?= isset($_SESSION['san_pham']['id_danh_muc']) ? ($danhMuc['id'] == $_SESSION['san_pham']['id_danh_muc'] ? "selected" : "") : (isset($sanPham['id_danh_muc']) && $danhMuc['id'] == $sanPham['id_danh_muc'] ? "selected" : "") ?>
                        value="<?= $danhMuc['id'] ?>"><?= $danhMuc['ten_danh_muc'] ?></option>
                    <?php endforeach ?>
                  </select>
                  <div id="emailHelp" class="form-text">
                    <?php if (isset($_SESSION['error']['id_danh_muc'])) { ?>
                      <p class="text-danger"><?= $_SESSION['error']['id_danh_muc'] ?></p>
                    <?php } ?>
                  </div>
                </div>


                <div class="mb-3 col-md-6 ">
                  <label for="exampleInputEmail1" class="form-label">Trạng thái</label>
                  <select class="form-select" value="<?= $_SESSION['san_pham']['trang_thai'] ?? '' ?>" name="trang_thai"
                    class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <option value="" hidden>Chọn trạng thái sản phẩm</option>
                    <option <?= (isset($_SESSION['san_pham']['trang_thai']) && $_SESSION['san_pham']['trang_thai'] == "1") || (isset($sanPham['trang_thai']) && $sanPham['trang_thai'] == "1")
                      ? "selected" : "" ?> value="1">
                      Còn bán</option>
                    <option <?= (isset($_SESSION['san_pham']['trang_thai']) && $_SESSION['san_pham']['trang_thai'] == "2") || (isset($sanPham['trang_thai']) && $sanPham['trang_thai'] == "2")
                      ? "selected" : "" ?> value="2">
                      Dừng bán</option>
                  </select>
                  <div id="emailHelp" class="form-text">
                    <?php if (isset($_SESSION['error']['trang_thai'])) { ?>
                      <p class="text-danger"><?= $_SESSION['error']['trang_thai'] ?></p>
                    <?php } ?>
                  </div>
                </div>
                <div class="mb-3 col-md-12">
                  <label for="exampleInputEmail1" class="form-label">Mô tả</label>
                  <textarea name="mo_ta" class="form-control" id="exampleInputEmail1"
                    placeholder="Nhập mô tả"><?= isset($sanPham['mo_ta']) ? $sanPham['mo_ta'] : ($_SESSION['san_pham']['mo_ta'] ?? '') ?></textarea>
                  <?php if (isset($_SESSION['mo_ta'])) { ?>
                    <p class="text-danger"><?= $_SESSION['mo_ta'] ?></p>
                  <?php } ?>
                </div>


              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Sửa</button>
              <button type="reset" class="btn btn-primary">Nhập lại</button>
            </div>


          </form>
        </div>
      </div>


      <div class="col-md-4">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Album ảnh sản phẩm</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body p-0">
            <form action="<?= BASE_URL_ADMIN . '/?act=sua-album-anh-san-pham' ?>" method="POST" enctype="multipart/form-data">
              <div class="table-responsive">
                <table id="faqs" class="table table-hover">
                  <thead>
                    <tr>
                      <th>Ảnh</th>
                      <th>File</th>
                      <th>
                        <div class="text-center">
                          <button onclick="addfaqs();" type="button" class="btn btn-success">
                            <i class="fa fa-plus"></i>Add
                          </button>
                        </div>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <input type="hidden" name="id_san_pham" value="<?= $sanPham['id'] ?>">
                    <input type="hidden" name="img_delete" id="img_delete">
                    <?php foreach ($listAnhSanPham as $key => $value): ?>
                      <tr id="faqs-row-<?= $key ?>">
                        <input type="hidden" name="current_img_ids[]" value="<?= $value['id'] ?>">
                        <td><img src="<?= BASE_URL . $value['link_anh'] ?>" style="width: 50px; height: 50px" alt=""></td>
                        <td><input type="file" name="img_array[]" class="form-control"></td>
                        <td class="mt-10"><button class="btn btn-danger" type="button" onclick="removeRow(<?= $key ?>, <?= $value['id'] ?>)"><i class="fa fa-trash"></i> Delete</button>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Sửa</button>
                <!-- <button type="reset" class="btn btn-primary">Nhập lại</button> -->
              </div>
            </form>
          </div>
        </div>


        <a class="d-flex w-100 my-4" href="<?= BASE_URL_ADMIN . "?act=form-them-san-pham-bien-the&id_san_pham=".$sanPham['id'] ?>">
          <button class="btn btn-primary" >Thêm sản phẩm biến thể </button>
        </a>


        <table class="table border-4">
          <thead>
            <tr>
              <th>Biến Thể</th>
              <th>Giá khuyến mãi</th>
              <th>Hành động</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($listSanPhamBienThe as $key => $value):?>
            <tr>
              <td><?= $value['gia_tri'] ?></td>
              <td><?= number_format($value['gia_khuyen_mai'])."đ" ?></td>
              <td>
                <a class="btn btn-warning" href="<?= BASE_URL_ADMIN . "/?act=form-sua-san-pham-bien-the&id=".$value['id'] ?>">Sửa</a>
                <a class="btn btn-danger" href="<?= BASE_URL_ADMIN . "/?act=xoa-san-pham-bien-the&id=".$value['id'] ?>">Xóa</a>
              </td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
       
      </div>
    </div>
  </section>
</div>


<!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- Footer  -->
<?php include './views/layout/footer.php'; ?>
<!-- End Footer  -->




</body>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>
<script>
  var faqs_row = <?= count($listAnhSanPham); ?>;
  function addfaqs() {
    // console.log("111");


    html = '<tr id="faqs-row-' + faqs_row + '">';
    html += '<td></td>';
    html += '<td><input type="file" name="img_array[]" class="form-control"></td>';
    html += '<td class="mt-10"><button type="button" class="btn btn-danger" onclick="removeRow(' + faqs_row + ', null)"><i class="fa fa-trash"></i> Delete</button></td>';
    html += '</tr>';


    $('#faqs tbody').append(html);


    faqs_row++;
  }


  function removeRow(rowId, imgId) {
    $('#faqs-row-' + rowId).remove();
    if (imgId !== null) {
      var imgDeleteInput = document.getElementById('img_delete');
      var currentValue = imgDeleteInput.value;
      imgDeleteInput.value = currentValue ? currentValue + ',' + imgId : imgId;
    }
  }
</script>


</html>

