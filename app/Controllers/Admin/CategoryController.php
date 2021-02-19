<?php
require_once ROOT."/core/Connection.php";
require_once ROOT."/core/Controller.php";

class CategoryController extends Controller
{
    
    public function __construct()
    {
        parent::__construct('admin');
    }

    
    public function index()
    {
    	$db = new Connection();
		$sql = "SELECT * FROM categories";
		$stmt = $db->pdo->prepare($sql);
		$stmt->execute();
		$categories = $stmt->fetchAll();
        $this->render('admin/categories/index', ['categories'=>$categories]);
    }

    public function create()
    {
        $this->render('admin/categories/create');
    }

    public function store()
    {
    	$db = new Connection();
    	$status = $_POST['status'] ? 1:0; 
		$data = [$_POST['name'],  $status];
		$sql = "INSERT INTO categories(name, status) VALUES(?, ?)";
		$stmt = $db->pdo->prepare($sql);

		if($stmt->execute($data)){
	    	$redirect = "http://".$_SERVER['HTTP_HOST'].'/admin/categories';
	        header("Location: $redirect");
    	}
    }

}
