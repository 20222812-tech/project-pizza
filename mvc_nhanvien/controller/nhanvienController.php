<?php
require_once __DIR__ . '/../model/nhanvien.php';
class nhanvienController {
    public function index() {
        $nhanviens = nhanvien::getAllnhanviens();
        include __DIR__ . '/../view/nhanvien_view.php';
    }
}
?>
