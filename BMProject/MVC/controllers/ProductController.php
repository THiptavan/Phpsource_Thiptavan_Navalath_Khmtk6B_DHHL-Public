<?php
    require_once './MVC/processing/controller.php';
    class ProductController extends controller{
        public $ProductModel;

        public function __construct()
        {
            $this -> ProductModel = $this->model("ProductModel");
        }
        public function displayIntroduction()
        {
            $this->view("master", [
                "Page"=> "home"
            ]);
        }

        function getProductsbyBand()
        {
            $this->view("master",["Page"=>"getProductsbyBand"]);
        }
    
        public function displayProductsByBand(){
            if(isset($_POST["btSearch"])){
                $band = $_POST["selectBland"];
                $tblname = 'tblproduct';
                $field = 'bland';
                $products = $this->ProductModel->getRecordsbyField($tblname, $field, $band);
                $this->view("master",["Page"=>"getProductsbyBand","Products"=>$products]);
            }
        }
        function getProductsbyYear()
        {
            $this->view("master",["Page"=>"getProductsbyYear"]);
        }
    
        public function displayProductsByYear(){
            if(isset($_POST["btSearch"])){
                $year = $_POST["selectYear"];
                $tblname = 'tblproduct';
                $field = 'year';
                $products = $this->ProductModel->getRecordsbyField($tblname, $field, $year);
                $this->view("master",["Page"=>"getProductsbyYear","Products"=>$products]);
            }
        }
        function impInsertProduct()
        {
            $this->view("master",["Page"=>"insertProduct"]);
        }
        public function insertProduct(){
            if(isset($_POST["btIsert"])){
                $id=$_POST["id"];
                $pname = $_POST["pname"];
                $company= $_POST["company"];
                $year = $_POST["selectYear"];
                $bland = $_POST["selectBland"];
              if(isset($_FILES['imagefile']) && $_FILES['imagefile']['error']===UPLOAD_ERR_OK){
                $pimage = 'data:image/png;base54,'
                . base64_encode(file_get_contents($_FILES['imageFile']['tmp_name']));
              }
            }
            $result = $this->ProductModel->
            insertProduct($id,$pname,$company,$year,$bland,$pimage);
            $this->view(
                "master",
                [
                    "page"=>"insertProduct",
                    "result"=>$result
                ]
                );


        }
        
    }
?>