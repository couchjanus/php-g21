<?php
require_once ROOT."/core/Controller.php";

require_once APP."/Models/Brand.php";

class BrandController extends Controller
{
    
    public function __construct()
    {
        parent::__construct('admin');
    }
    
    public function index()
    {
        $brands = (new Brand())->all();
        $this->render('admin/brands/index', ['brands'=>$brands]);
    }

    public function create()
    {
        $this->render('admin/brands/create');
    }

    public function store()
    {
        $status = $this->request->data['status'] ? 1:0;
        (new Brand())->save(
            [
                'name'=>$this->request->data['name'], 
                'status'=>$status, 
            ]);
        $redirect = "http://".$_SERVER['HTTP_HOST'].'/admin/brands';
        header("Location: $redirect");
    }

   
    public function edit($params){
        extract($params);
        $brand = (new Brand())->getByPK($id);
        $this->render('admin/brands/edit', compact('brand'));
    }

    public function update()
    {
        $status = $this->request->data['status'] ? 1:0;
        (new Brand())->update($this->request->data['id'], 
            [
                'name'=>$this->request->data['name'], 
                'status'=>$status, 
            ]);

        $redirect = "http://".$_SERVER['HTTP_HOST'].'/admin/brands';
        header("Location: $redirect");
    }


    public function delete($params){
        extract($params);
        if (isset($this->request->data['submit'])) {
            (new Brand())->destroy($id);
            $this->redirect('/admin/brands');
        } elseif (isset($this->request->data['reset'])) {
            $this->redirect('/admin/brands');
        }
        $brand = (new Brand())->getByPK($id);
        $this->render('admin/brands/delete', compact('brand'));
    }
}
