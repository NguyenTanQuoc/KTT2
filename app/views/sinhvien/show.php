<?php include 'app/views/shares/header.php'; ?>

<h1>Chi Tiết Sinh Viên</h1>
<?php if (!empty($sinhVien)): ?>
    <div class="card" style="max-width: 500px; margin: 20px auto;">
        <div class="card-body">
            <h5 class="card-title">Mã Sinh Viên: <?php echo htmlspecialchars($sinhVien->MaSV, ENT_QUOTES, 'UTF-8'); ?></h5>
            <p class="card-text"><strong>Họ Tên:</strong> <?php echo htmlspecialchars($sinhVien->HoTen, ENT_QUOTES, 'UTF-8'); ?></p>
            <p class="card-text"><strong>Giới Tính:</strong> <?php echo htmlspecialchars($sinhVien->GioiTinh, ENT_QUOTES, 'UTF-8'); ?></p>
            <p class="card-text"><strong>Ngày Sinh:</strong> <?php echo htmlspecialchars($sinhVien->NgaySinh, ENT_QUOTES, 'UTF-8'); ?></p>
            <p class="card-text"><strong>Ngành Học:</strong> <?php echo htmlspecialchars($sinhVien->nganhhoc_TenNganh, ENT_QUOTES, 'UTF-8'); ?></p>
            <p class="card-text"><strong>Hình:</strong> 
                <?php if (!empty($sinhVien->Hinh)): ?>
                    <img src="<?php echo htmlspecialchars($sinhVien->Hinh, ENT_QUOTES, 'UTF-8'); ?>" alt="Hình sinh viên" style="max-width: 200px;">
                <?php else: ?>
                    Không có hình
                <?php endif; ?>
            </p>
            <a href="/KTSangT2" class="btn btn-secondary">Quay lại danh sách</a>
            <a href="/KTSangT2/edit?id=<?php echo htmlspecialchars($sinhVien->MaSV, ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-warning">Sửa</a>
            <a href="/KTSangT2/delete?id=<?php echo htmlspecialchars($sinhVien->MaSV, ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa sinh viên này?');">Xóa</a>
        </div>
    </div>
<?php else: ?>
    <div class="alert alert-warning">Không tìm thấy sinh viên.</div>
<?php endif; ?>

<?php include 'app/views/shares/footer.php'; ?>