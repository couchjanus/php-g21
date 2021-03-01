<?php
/**
 * UserController.php
 * Контроллер для управления users
 */

require_once ROOT."/core/Controller.php";
require_once MODELS.'/User.php';
require_once MODELS.'/Role.php';


class UserController extends Controller
{
    protected static string $layout = 'admin';
    private array $costs = [
        'cost' => 12,
    ];

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Главная страница управления users
     *
     * @return bool
     */
    public function index()
    {
        $users = (new User)->all();
        $this->render('admin/users/index', compact('users'));
    }

    /**
     * Добавление user
     *
     * @return bool
     */

    public function create()
    {
        $roles = (new Role)->all();
        $this->render('admin/users/create', compact('roles'));
    }
// 
    public function store()
    {
        $hash = password_hash($this->request->data['password'], PASSWORD_BCRYPT, $this->costs);
        (new User())->save(
            [
                "name"=>$this->request->data['name'], 
                'password'=>$hash,
                'email'=>$this->request->data['email'], 
                'role_id'=>$this->request->data['role_id']
            ]);
        $this->redirect('/admin/users');
    }

    public function edit($params)
    {
        extract($params);
        $user = (new User())->getByPK($id);
        $roles = (new Role)->all();
        $this->render('admin/users/edit', compact('user', 'roles'));
    }

    public function update()
    {
        $hash = password_hash($this->request->data['password'], PASSWORD_BCRYPT, $this->costs);
        $status = $this->request->data['status'] ? 1:0;
        (new User())->update($this->request->data['id'], 
            [
                "name"=>$this->request->data['name'], 
                'password'=>$hash,
                'email'=>$this->request->data['email'], 
                'role_id'=>$this->request->data['role_id'], 
                'status'=>$status
            ]);
        $this->redirect('/admin/users');
    }

    public function destroy($params)
    {
        extract($params);
        if (isset($this->request->data['submit'])) {
            (new User())->destroy($id);
            $this->redirect('/admin/users');
        } elseif (isset($this->request->data['reset'])) {
            $this->redirect('/admin/users');
        }
        $user = (new User())->getByPK($id);
        $this->render('admin/users/delete', compact('user'));
    }  
}