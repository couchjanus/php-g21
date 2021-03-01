<?php
/**
 * RoleController.php
 * Контроллер для управления roles
 */

require_once ROOT."/core/Controller.php";

require_once MODELS.'/Role.php';


class RoleController extends Controller
{
    protected static string $layout = 'admin';
     public function __construct()
     {
         parent::__construct();
     }
    /**
     * Главная страница управления roles
     *
     * @return bool
     */
    public function index()
    {
        $roles = (new Role)->all();
        $this->render('admin/roles/index', compact('roles'));
    }

    /**
     * Добавление role
     *
     * @return bool
     */
    public function create()
    {
        $this->render('admin/roles/create');
    }

    public function store()
    {
        (new Role())->save(["name"=>$this->request->data['name']]);
        $this->redirect('/admin/roles');
        
    }

    public function edit($params)
    {
        extract($params);
        $role = (new Role())->getByPK($id);
        $this->render('admin/roles/edit', compact('role'));
    }

    public function update()
    {
        (new Role())->update($this->request->data['id'], ["name"=>$this->request->data['name']]);
        $this->redirect('/admin/roles');
    }

    public function delete($params)
    {
        extract($params);
        if (isset($this->request->data['submit'])) {
            (new Role())->destroy($id);
            $this->redirect('/admin/roles');
        } elseif (isset($this->request->data['reset'])) {
            $this->redirect('/admin/roles');
        }
        $role = (new Role())->getByPK($id);
        $this->render('admin/roles/delete', compact('role'));
    }
    
}