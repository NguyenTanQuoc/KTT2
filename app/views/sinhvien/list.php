<?php include 'app/views/shares/header.php'; ?> 
    <h1>Danh sách Sinh Viên</h1> 
    <a href="add" class="btn btn-success mb-2">Thêm sinh viên mới</a> 
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Mã SV</th>
                <th>Họ Tên</th>
                <th>Giới Tính</th>
                <th>Ngày Sinh</th>
                <th>Hình</th>
                <th>Mã Ngành</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($sinhViens)): ?>
                <?php foreach ($sinhViens as $sinhVien): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($sinhVien->MaSV, ENT_QUOTES, 'UTF-8'); ?></td>
                        <td>
                            <a href="show?id=<?php echo $sinhVien->MaSV; ?>">
                                <?php echo htmlspecialchars($sinhVien->HoTen, ENT_QUOTES, 'UTF-8'); ?>
                            </a>
                        </td>
                        <td><?php echo htmlspecialchars($sinhVien->GioiTinh, ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($sinhVien->NgaySinh, ENT_QUOTES, 'UTF-8'); ?></td>
                        <td>
                            <?php if (!empty($sinhVien->Hinh)): ?>
                                <img src="<?php echo htmlspecialchars($sinhVien->Hinh, ENT_QUOTES, 'UTF-8'); ?>" alt="Hình sinh viên" style="max-width: 100px;">
                            <?php else: ?>
                                Không có hình
                            <?php endif; ?>
                        </td>
                        <td><?php echo htmlspecialchars($sinhVien->nganhhoc_TenNganh, ENT_QUOTES, 'UTF-8');?></td>
                        <td>
                            <a href="edit?id=<?php echo $sinhVien->MaSV; ?>" class="btn btn-warning">Sửa</a>
                            <a href="delete?id=<?php echo $sinhVien->MaSV; ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa sinh viên này?');">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">Không có sinh viên nào.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
<?php include 'app/views/shares/footer.php'; ?>