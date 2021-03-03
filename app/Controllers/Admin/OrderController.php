<?php
/**
 * OrderController.php
 * Контроллер для управления orders
 */

require_once ROOT."/core/Controller.php";

require_once MODELS.'/Order.php';


class OrderController extends Controller
{

    protected static string $layout = 'admin';
    
    public function __construct()
    {
         parent::__construct();
    }
    
    public function index()
    {
        $orders = (new Order)->all();
        $this->render('admin/orders/index', compact('orders'));
    }


    public function edit($params)
    {
        extract($params);
       
    }

    public function update()
    {
        
    }

    public function delete($params)
    {
        extract($params);
        if (isset($this->request->data['submit'])) {
            (new Order())->destroy($id);
            $this->redirect('/admin/orders');
        } elseif (isset($this->request->data['reset'])) {
            $this->redirect('/admin/orders');
        }
        $order = (new Order())->getByPK($id);
        $this->render('admin/orders/delete', compact('order'));
    }
    
}