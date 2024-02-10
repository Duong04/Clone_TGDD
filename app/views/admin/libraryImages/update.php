<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Cập nhật ảnh sản phẩm</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4 px-3 py-4">
        <form action="./Admin/HandleImage/<?=$datas['row']['product_id']?>" method="POST" class="" enctype="multipart/form-data">
            <div class="col-md-6 mb-3">
                <label for="library_image" class="form-label">Ảnh sản phẩm</label>
                <input name="image" type="file" class="form-control" id="library_image" placeholder="Ảnh sản phẩm">
                <img class="my-2" style="width:80px;" src="<?=$datas['row']['image']?>" alt="">
            </div>
            <div class="col-md-4 pt-3">
                <input type="hidden" name="image_id" value="<?=$datas['row']['image_id']?>">
                <button class="form-control btn btn-primary col-md-3" name="submit">Cập nhật</button>
                <a href="./Admin/LibraryImageDetail/<?=$datas['product_id']?>" class="btn btn-outline-success col-md-3">Quay về</a>
                <button type="reset" class="btn btn-outline-warning col-md-3">Nhập lại</button>
            </div>
        </form>
    </div>

</div>
