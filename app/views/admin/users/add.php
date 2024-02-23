<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Thêm nhân viên</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4 px-3 py-4">
        <form action="" method="POST" class="row">
            <div class="col-md-6 mb-3">
                <label for="exampleFormControlInput1" class="form-label">Tên nhân viên</label>
                <input required name="userName" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Tên nhân viên">
            </div>
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Email</label>
                <input required type="email" class="form-control" id="email" name="email" placeholder="Email">
            </div>
            <div class="col-md-6 mb-3">
                <label for="password" class="form-label">Mật khẩu</label>
                <input required type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu">
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-check">
                    <input checked name="status" class="form-check-input" type="radio" value="Chưa kích hoạt" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Không kích hoạt
                    </label>
                </div>
                <div class="form-check">
                    <input name="status" class="form-check-input" type="radio" value="Đã kích hoạt" id="defaultCheck2">
                    <label class="form-check-label" for="defaultCheck2">
                        Kích hoạt
                    </label>
                </div>
            </div>
            <div class="col-md-4">
                <button class="form-control btn btn-primary col-md-3" name="submit">Thêm</button>
                <a href="./Admin/ListUsers" class="btn btn-outline-success col-md-3">Quay về</a>
                <button type="reset" class="btn btn-outline-warning col-md-3">Nhập lại</button>
            </div>
        </form>
    </div>

</div>