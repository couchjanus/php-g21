<?php
require_once ROOT."/core/Controller.php";
require_once MODELS."/Category.php";

class CategoryController extends Controller
{
    
    public function __construct()
    {
        parent::__construct('admin');
    }
    
    public function index()
    {
        $categories = (new Category())->all();
        $this->render('admin/categories/index', ['categories'=>$categories]);
    }

    public function create()
    {
        $this->render('admin/categories/create');
    }

    public function store()
    {
        $status = $this->request->data['status'] ? 1:0;
        (new Category())->save(
            [
                'name'=>$this->request->data['name'], 
                'status'=>$status, 
            ]);
        $redirect = "http://".$_SERVER['HTTP_HOST'].'/admin/categories';
        header("Location: $redirect");
    }

   
    public function edit($params){
        extract($params);
        $category = (new Category())->getByPK($id);
        $this->render('admin/categories/edit', compact('category'));
    }

    public function update()
    {
        $status = $this->request->data['status'] ? 1:0;
        (new Category())->update($this->request->data['id'], 
            [
                'name'=>$this->request->data['name'], 
                'status'=>$status, 
            ]);

        $redirect = "http://".$_SERVER['HTTP_HOST'].'/admin/categories';
        header("Location: $redirect");
    }


    public function delete($params){
        extract($params);
        if (isset($this->request->data['submit'])) {
            (new Category())->destroy($id);
            $this->redirect('/admin/categories');
        } elseif (isset($this->request->data['reset'])) {
            $this->redirect('/admin/categories');
        }
        $category = (new Category())->getByPK($id);
        $this->render('admin/categories/delete', compact('category'));
    }
}
