<?php 
    class Controller {
        function model($model) {
            require_once "./app/models/$model.php";
            return new $model;
        }

        function view($view, $datas=[]) {
            require_once "./app/views/$view.php";
        }
    }
?>