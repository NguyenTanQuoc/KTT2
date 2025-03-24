<?php 
    require_once('app/config/database.php'); 
    require_once('app/models/NganhHocModel.php'); 
    class nganhHocController 
    { 
        private $nganhHocModel; 
        private $db; 

        public function __construct() {
            $this->db = (new Database())->getConnection(); 
            $this->nganhHocModel = new NganhHocModel($this->db); 
        } 

        public function list() 
        { 
            $nganhHocs = $this->nganhHocModel->getNganhHoc(); 
            include 'app/views/nganhHoc/list.php'; 
        } 
    } 
?>