<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Thêm danh mục con</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4 px-3 py-4">
        <form action="./Admin/HandleSubcat/<?=$datas['category_id']?>" method="POST" class="row" enctype="multipart/form-data">
            <div class="col-md-6 mb-3">
                <label for="category-name" class="form-label">Tên danh mục</label>
                <input required value="<?=$datas['row']['subcat_name']?>" type="text" class="form-control" id="category-name" name="name" placeholder="Tên danh mục">
            </div>
            <div class="col-md-6 mb-3">
                <label for="exampleFormControlInput1" class="form-label">Ảnh danh mục</label>
                <input type="file" name="image" class="form-control" id="exampleFormControlInput1">
                <img class="my-2" style="width: 70px;" src="<?=$datas['row']['subcat_image']?>" alt="">
            </div>
            <div class="col-md-4">
                <input value="<?=$datas['row']['subcat_id']?>" type="hidden" name="subcat_id">
                <button class="form-control btn btn-primary col-md-3" name="submit">Cập nhật</button>
                <a href="./Admin/Subcategories/<?=$datas['category_id']?>" class="btn btn-outline-success col-md-3">Quay về</a>
                <button type="reset" class="btn btn-outline-warning col-md-3">Nhập lại</button>
            </div>
        </form>
    </div>

</div>