<?php
require_once ROOT."/core/Controller.php";
require_once MODELS."/Product.php";
require_once MODELS."/Category.php";
require_once MODELS."/Brand.php";

class ProductController extends Controller
{
    protected static string $layout = 'admin';
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        $products = (new Product())->all();
        $this->render('admin/products/index', ['products'=>$products]);
    }

    public function create()
    {
        $categories = (new Category())->all();
        $brands = (new Brand())->all();
        $this->render('admin/products/create', compact('categories', 'brands'));
    }

    public function store()
    {
        $status = $this->request->data['status'] ? 1:0;
        $is_new = $this->request->data['is_new'] ? 1:0;

        // var_dump($this->request);

        $productImage = $this->uploadImage();
        // echo $productImage;
        // exit();

        (new Product())->save([
                'name' => $this->request->data['name'], 
                'description' => $this->request->data['description'], 
                'status' => $status, 
                'is_new' => $is_new, 
                'brand_id' => $this->request->data['brand_id'],
                'category_id' => $this->request->data['category_id'],
                'price' => $this->request->data['price'], 
                "image" => $productImage
            ]);
        $this->redirect("/admin/products");
    }

    private function fileName($filename){
        return sha1(mt_rand(1, 9999). $filename . uniqid()) . time();
    }

    private function uploadImage()
    {
        if (!empty($this->request->data['image'])) {
            // Never use $_FILES..['type']. The information contained in it is not verified at all, it's a user-defined value. Test the type yourself. For images, exif_imagetype is usually a good choice:

            // $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
            // $detectedType = exif_imagetype($_FILES['fupload']['tmp_name']);
            // $error = !in_array($detectedType, $allowedTypes);

            // Alternatively, the finfo functions are great, if your server supports them.

            $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
            $detectedType = exif_imagetype($this->request->data['image']['tmp_name']);
            
            $error = !in_array($detectedType, $allowedTypes);
            // $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.'; 
         //    var_dump($this->request->data['image']);
        	// exit();

            $fileName = $this->fileName($this->request->data['image']['name']);
            
            if(move_uploaded_file($this->request->data['image']['tmp_name'], STORAGE.'/products/'.$fileName)){
                return "http://" . $_SERVER['HTTP_HOST'] . "/storage/uploads/products/" . $fileName;
            } else{
                $statusMsg = "Sorry, there was an error uploading your file.";
            }

        }else{
            $statusMsg = 'Please select a file to upload.';
            return false;
        }
    }
    
    public function edit($params)
    {
    	extract($params);
        $categories = (new Category())->all();
        $brands = (new Brand())->all();
        $product = (new Product())->getByPK($id);
        $this->render('admin/products/edit', compact('categories', 'brands', 'product'));
    }

    public function update()
    {

        $product = (new Product())->getByPK($this->request->data['id']);
		$productImage = $product->image;
        
        if (!empty($this->request->data['image'])) {
        	$this->deleteFile($product->image);
        	$productImage = $this->uploadImage();
        }

        $status = $this->request->data['status'] ? 1:0;
        $is_new = $this->request->data['is_new'] ? 1:0;

        (new Product())->update($this->request->data['id'], 
            [
                'name'=>$this->request->data['name'], 
                'description'=>$this->request->data['description'], 
                'status'=>$status, 
                'is_new'=>$is_new, 
                'brand_id'=>$this->request->data['brand_id'], 
                'category_id'=>$this->request->data['category_id'], 
                'price'=>$this->request->data['price'], 
                "image"=>$productImage
            ]);
        
        $this->redirect("/admin/products");
    }

    public function delete($params)
    {
        extract($params);
        
        $product = (new Product())->getByPK($id);
        if (isset($this->request->data['submit'])) {
        	$this->deleteFile($product->image);
            (new Product())->destroy($id);
            $this->redirect('/admin/products');
        } elseif (isset($this->request->data['reset'])) {
            $this->redirect('/admin/products');
        }
        
        $this->render('admin/products/delete', compact('product'));
    }

    private function deleteFile($pathFile){
    	$arr = explode('/', $pathFile);
        $imageName = array_pop($arr);
    	$imageName = STORAGE.'/products/'. $imageName;
        if(file_exists($imageName)){
            unlink($imageName);
        }
    }
}
