<?php 
    require_once('app/config/database.php'); 
    require_once('app/models/SinhVienModel.php'); 
    require_once('app/models/NganhHocModel.php'); 
    
    class SinhVienController { 
        private $sinhVienModel; 
        private $db; 

        public function __construct() 
        { 
            $this->db = (new Database())->getConnection(); 
            $this->sinhVienModel = new SinhVienModel($this->db); 
        } 

        public function index() 
        { 
            $sinhViens = $this->sinhVienModel->getSinhViens(); 
            include 'app/views/sinhvien/list.php'; 
        } 

        public function show($id) 
        { 
            $sinhVien = $this->sinhVienModel->getSinhVienById($id); 
            if ($sinhVien) { 
                include 'app/views/sinhvien/show.php'; 
            } else { 
                echo "Không thấy sinh viên."; 
            } 
        } 

        public function add() 
        { 
            $nganhHocs = (new NganhHocModel($this->db))->getNganhHoc(); 
            include_once 'app/views/sinhvien/add.php'; 
        } 

        public function save() 
        { 
            if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
                $MaSV = $_POST['MaSV']; 
                $HoTen = $_POST['HoTen']; 
                $GioiTinh = $_POST['GioiTinh'];
                $NgaySinh = $_POST['NgaySinh']; 
                $Hinh = $_POST['Hinh'] ?? '';
                $MaNganh = $_POST['MaNganh'];
                $result = $this->sinhVienModel->addSinhVien($MaSV, $HoTen, $GioiTinh, $NgaySinh, $Hinh, $MaNganh); 
                if (is_array($result)) { 
                    $errors = $result; 
                    $nganhHocs = (new NganhHocModel($this->db))->getNganhHoc(); 
                    include 'app/views/sinhvien/add.php'; 
                } else { 
                    header('Location: /KTSangT2'); 
                } 
            } 
        } 

        public function edit($id) 
        { 
            $sinhVien = $this->sinhVienModel->getSinhVienById($id); 
            $nganhHocs = (new NganhHocModel($this->db))->getNganhHoc(); 
            if ($sinhVien) { 
                include 'app/views/sinhvien/edit.php'; 
            } else { 
                echo "Không thấy sản phẩm."; 
            } 
        } 
        
        public function update() 
        { 
            if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
                $MaSV = $_POST['MaSV'];
                $HoTen = $_POST['HoTen']; 
                $GioiTinh = $_POST['GioiTinh']; 
                $NgaySinh = $_POST['NgaySinh']; 
                $Hinh = $_POST['Hinh'];
                $MaNganh = $_POST['MaNganh']; 
                $edit= $this->sinhVienModel->updateSinhVien($MaSV, $HoTen, $GioiTinh, $NgaySinh, $Hinh, $MaNganh); 
                if ($edit) { 
                    header('Location: /KTSangT2');
                } else { 
                    echo "Đã xảy ra lỗi khi lưu sinh viên."; 
                }
            }
        }

        public function delete($id) 
        { 
            if ($this->sinhVienModel->deleteSinhVien($id)) { 
                header('Location: /KTSangT2'); 
            } else { 
                echo "Đã xảy ra lỗi khi xóa sinh viên."; 
            } 
        } 
    } 
?>