<?php
// Không cần giao diện, chỉ xử lý logic xóa
if (!isset($maSV)) {
    die("Không tìm thấy mã sinh viên để xóa.");
}

// Kết nối database
try {
    $db = new PDO("mysql:host=localhost;dbname=Test1;charset=utf8", "root", "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Xóa sinh viên
    $query = "DELETE FROM SinhVien WHERE MaSV = :MaSV";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':MaSV', $maSV);
    $stmt->execute();

    // Chuyển hướng về danh sách
    header("Location: /KTSangT2");
    exit();
} catch (PDOException $e) {
    die("Lỗi khi xóa sinh viên: " . $e->getMessage());
}