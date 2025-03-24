<?php include 'app/views/shares/header.php'; ?>

<h1>Sửa Sinh Viên</h1>
<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
<form method="POST" action="/KTSangT2/update" onsubmit="return validateForm();">
    <input type="hidden" name="MaSV" value="<?php echo htmlspecialchars($sinhVien->MaSV, ENT_QUOTES, 'UTF-8'); ?>">
    <div class="form-group">
        <label for="MaSV">Mã Sinh Viên: </label>
        <input type="text" id="MaSV" name="MaSV" class="form-control" value="<?php echo htmlspecialchars($sinhVien->MaSV, ENT_QUOTES, 'UTF-8'); ?>" readonly>
    </div>
    <div class="form-group">
        <label for="HoTen">Họ Tên: </label>
        <input type="text" id="HoTen" name="HoTen" class="form-control" value="<?php echo htmlspecialchars($sinhVien->HoTen, ENT_QUOTES, 'UTF-8'); ?>" required>
    </div>
    <div class="form-group">
        <label for="GioiTinh">Giới Tính: </label>
        <select id="GioiTinh" name="GioiTinh" class="form-control" required>
            <option value="Nam" <?php echo $sinhVien->GioiTinh == 'Nam' ? 'selected' : ''; ?>>Nam</option>
            <option value="Nữ" <?php echo $sinhVien->GioiTinh == 'Nữ' ? 'selected' : ''; ?>>Nữ</option>
        </select>
    </div>
    <div class="form-group">
        <label for="NgaySinh">Ngày Sinh: </label>
        <input type="date" id="NgaySinh" name="NgaySinh" class="form-control" value="<?php echo htmlspecialchars($sinhVien->NgaySinh, ENT_QUOTES, 'UTF-8'); ?>" required>
    </div>
    <div class="form-group">
        <label for="Hinh">Hình: </label>
        <input type="file" id="Hinh" name="Hinh" class="form-control" accept="image/*">
    </div>
    <div class="form-group">
        <label for="MaNganh">Ngành Học: </label>
        <select id="MaNganh" name="MaNganh" class="form-control" required>
            <?php foreach ($nganhHocs as $nganh): ?>
                <option value="<?php echo $nganh->MaNganh; ?>" <?php echo $nganh->MaNganh == $sinhVien->MaNganh ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($nganh->TenNganh, ENT_QUOTES, 'UTF-8'); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
</form>
<a href="/KTSangT2" class="btn btn-secondary mt-2">Quay lại danh sách</a>

<?php include 'app/views/shares/footer.php'; ?>