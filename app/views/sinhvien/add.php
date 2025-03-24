<?php include 'app/views/shares/header.php'; ?>

<h1> Thêm Sinh Viên Mới</h1>
<?php if (!empty($errors)): ?> 
    <div class="alert alert-danger"> 
        <ul> 
        <?php foreach ($errors as $error): ?> 
        <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li> 
        <?php endforeach; ?> 
        </ul> 
    </div> 
<?php endif; ?> 
<form method="POST" action="/KTSangT2/save" enctype="multipart/form-data" onsubmit="return validateForm();">
    <div class="form-group">
        <label for="MaSV">Mã Sinh Viên: </label>
        <input type="text" id="MaSV" name="MaSV" class="form-control" maxlength="10" required>
    </div>
    <div class="form-group">
        <label for="HoTen">Họ Tên: </label>
        <input type="text" id="HoTen" name="HoTen" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="GioiTinh">Giới Tính: </label>
        <select id="GioiTinh" name="GioiTinh" class="form-control" required>
            <option value="Nam">Nam</option>
            <option value="Nữ">Nữ</option>
        </select>
    </div>
    <div class="form-group">
        <label for="NgaySinh">Ngày Sinh: </label>
        <input type="date" id="NgaySinh" name="NgaySinh" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="Hinh">Hình: </label>
        <input type="file" id="Hinh" name="Hinh" class="form-control" accept="image/*">
    </div>
    <div class="form-group">
        <label for="MaNganh">Ngành Học: </label>
        <select id="MaNganh" name="MaNganh" class="form-control" required>
            <?php foreach ($nganhHocs as $nganh): ?>
                <option value="<?php echo $nganh->MaNganh; ?>">
                    <?php echo htmlspecialchars($nganh->TenNganh, ENT_QUOTES, 'UTF-8'); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Thêm Sinh Viên</button>
</form>
<a href="list.php" class="btn btn-secondary mt-2">Quay lại danh sách</a> 
<?php include 'app/views/shares/footer.php'; ?>