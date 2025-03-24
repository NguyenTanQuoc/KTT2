<?php
    require_once('app/controllers/SinhVienController.php');
    $controller = new SinhVienController();
    $url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : '';
    $url = filter_var($url, FILTER_SANITIZE_URL);
    $urlParts = explode('/', $url);
    $param = isset($_GET['id']) ? htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8') : null;
    $actionName = !empty($urlParts[0]) ? $urlParts[0] : 'index';
    switch($actionName) {
        default:
            $controller->index();
            break;
        case 'index':
            $controller->index();
            break;
        case 'edit':
            $controller->edit($param);
            break;
        case 'save':
            $controller->save();
            break;
        case 'delete':
            $controller->delete($param);
            break;
        case 'add':
            $controller->add();
            break;
        case 'update':
            $controller->update();
            break;
        case 'show':
            $controller->show($param);
            break;
    }
?>