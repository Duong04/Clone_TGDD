<?php 
    class Products extends Controller {
        function index() {
            $this->view('customer/products/products');
        }

        function productDetail() {
            $this->view('customer/products/productDetail');
        }
    }
?>