<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Thêm danh mục sản phẩm</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4 px-3 py-4">
        <form action="./Admin/HandleProduct" method="POST" class="row" enctype="multipart/form-data">
            <div class="col-md-6 mb-3">
                <label for="product_name" class="form-label">Tên sản phẩm</label>
                <input required value="<?=$datas['row']['product_name']?>" name="product_name" type="text" class="form-control" id="product_name" placeholder="Tên sản phẩm">
            </div>
            <div class="col-md-6 mb-3">
                <label for="product_image" class="form-label">Ảnh sản phẩm</label>
                <input name="product_image" type="file" class="form-control" id="product_image" placeholder="Ảnh sản phẩm">
                <img class="my-2" style="width: 50px; height: 55px;" src="<?=$datas['row']['product_image']?>" alt="">
            </div>
            <div class="col-md-6 mb-3">
                <label for="library_image" class="form-label">Thư viện ảnh</label>
                <input name="library_image[]" type="file" class="form-control" id="library_image" placeholder="Thư viện ảnh" multiple>
                <?php foreach($datas['listImage'] as $list) {?>
                    <img class="my-2" style="width: 50px; height: 55px;" src="<?=$list['image']?>" alt="">
                <?php } ?>
            </div>
            <div class="col-md-6 mb-3">
                <label for="product_quantity" class="form-label">Số lượng sản phẩm</label>
                <input required oninput="validatePrice(this)" value="<?=$datas['row']['product_quantity']?>" name="product_quantity" type="number" class="form-control" id="product_quantity" placeholder="Số lượng sản phẩm">
            </div>
            <div class="col-md-6 mb-3">
                <label for="initial_price" class="form-label">Giá gốc</label>
                <input required oninput="validatePrice(this)" value="<?=$datas['row']['initial_price']?>" name="initial_price" type="number" class="form-control" id="initial_price" placeholder="Giá gốc">
            </div>
            <div class="col-md-6 mb-3">
                <label for="discount" class="form-label">% giảm giá</label>
                <input oninput="validateDiscount(this)" value="<?=$datas['row']['discount']?>" name="discount" type="number" class="form-control" id="discount" placeholder="% giảm giá">
            </div>
            <div class="col-md-6 mb-3">
                <label for="category_id2">Danh mục sản phẩm</label>
                <select required name="category_id" id="category_id2" class="form-control">
                    <?php foreach($datas['list'] as $category){ 
                            if ($datas['row']['category_id'] == $category['category_id']) {
                    ?>
                        <option value="<?=$category['category_id']?>" selected><?=$category['category_name']?></option>
                    <?php } ?>
                        <option value="<?=$category['category_id']?>"><?=$category['category_name']?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="subcat_id2">Danh mục con</label>
                <select required name="subcat_id" id="subcat_id2" class="form-control">
                    <option value="0">Danh mục con</option>
                </select>
            </div>
            <div class="col-md-12">
                <label for="description">Mô tả sản phẩm</label>
                <textarea name="description" id="description" cols="30" rows="10" class="w-100"><?=$datas['row']['description']?></textarea>
            </div>
            <div class="col-md-4 pt-3">
                <input type="hidden" name="product_id" value="<?=$datas['row']['product_id']?>">
                <button class="form-control btn btn-primary col-md-3" name="submit">Cập nhật</button>
                <a href="./Admin/ListProducts" class="btn btn-outline-success col-md-3">Quay về</a>
                <button type="reset" class="btn btn-outline-warning col-md-3">Nhập lại</button>
            </div>
        </form>
    </div>

</div>
<script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
<script src="./public/js/admin.js"></script>