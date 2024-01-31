<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Thêm danh ảnh sản phẩm</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4 px-3 py-4">
        <form action="" method="POST" class="" enctype="multipart/form-data">
            <div class="col-md-6 mb-3">
                <label for="library_image" class="form-label">Thư viện ảnh</label>
                <input name="library_image[]" type="file" class="form-control" id="library_image" placeholder="Thư viện ảnh" multiple>
            </div>
            <div class="col-md-4 pt-3">
                <button class="form-control btn btn-primary col-md-3" name="submit">Thêm</button>
                <a href="./Admin/LibraryImageDetail/<?=$datas['product_id']?>" class="btn btn-outline-success col-md-3">Quay về</a>
                <button type="reset" class="btn btn-outline-warning col-md-3">Nhập lại</button>
            </div>
        </form>
    </div>

</div>
