<?php

require_once ROOT."/core/Controller.php";
require_once MODELS.'/Category.php';
require_once MODELS.'/Product.php';

    
class HomeController extends Controller
{
	public function __construct()
    {
        parent::__construct('app');
    }

    public function index()
    {
        $this->render('home/index', ['title' => 'Home Page']);
    }

    public function getProducts()
    {
        $products = (new Product)->all();
        echo json_encode($products);
    }

    public function getProductsWithCategory()   {
        $sql = "SELECT products.*, categories.name as category, categories.id as categotyId FROM products 
        INNER JOIN categories
        ON categories.id = products.category_id
        WHERE products.status = 1";

        $products = (new Product)->runSql($sql);
        echo json_encode($products);

    }
}
