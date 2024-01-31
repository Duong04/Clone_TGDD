<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Cập nhật danh mục sản phẩm</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4 px-3 py-4">
        <form action="./Admin/HandleCategory" method="POST" class="row">
            <div class="col-md-6 mb-3">
                <label for="exampleFormControlInput1" class="form-label">Mã danh mục</label>
                <input value="<?=$datas['row']['category_id']?>" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Tự động nhập" disabled>
            </div>
            <div class="col-md-6 mb-3">
                <label for="category-name" class="form-label">Tên danh mục</label>
                <input value="<?=$datas['row']['category_name']?>" type="text" class="form-control" id="category-name" name="category-name" placeholder="Tên danh mục">
            </div>
            <div class="col-md-4">
                <input type="hidden" name="id" value="<?=$datas['row']['category_id']?>">
                <button class="form-control btn btn-primary col-md-3" name="submit">Cập nhật</button>
                <a href="./Admin/ListCategories" class="btn btn-outline-success col-md-3">Quay về</a>
                <button type="reset" class="btn btn-outline-warning col-md-3">Nhập lại</button>
            </div>
        </form>
    </div>

</div>