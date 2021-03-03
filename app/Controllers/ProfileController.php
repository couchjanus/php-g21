<?php

require_once MODELS.'/User.php';
require_once MODELS.'/Order.php';
require_once MODELS.'/Product.php';
require_once ROOT.'/core/Controller.php';

/**
 * ProfileController.php
 * 
 */
class ProfileController extends Controller
{
    protected static string $layout = 'app';
    
    public function __construct()
    {
        parent::__construct();

        if($userId=$this->session()->get('userId')){
            $this->user = (new User)->getByPK($userId);
            if( $this->user != NULL ) {
                $this->logged_in = true;
                $this->user_id = $userId;
            }
        }
    }
    
 
    public function index()
    {
        if (!$this->user) {
             $this->redirect('/#login');
        }
        $user = $this->user;
        $this->render('profile/index', compact('user'));
    }


    public function ordersList()
    {
        if (!$this->user) {
             $this->redirect('/#login');
        }
        $sql = "SELECT id, status, products, DATE_FORMAT(`order_date`, '%d.%m.%Y %H:%i:%s') AS formated_date
                FROM orders WHERE user_id =". $this->user->id."
                ORDER BY id DESC";
        $orders = (new Order)->runSql($sql);
       
        $user = $this->user;
        $this->render('profile/orders', compact('user', 'orders'));
    }

    public function orderView($vars)
    {
        if (!$this->user) {
             $this->redirect('/#login');
        }
        extract($vars);

        [$products, $total, $order] = $this->orderContent($id);
        
        $user = $this->user;
        $this->render('profile/order', compact('user', 'order', 'products', 'total'));
    }

    
    public function checkOrder($vars)
    {
        if (!$this->user) {
             $this->redirect('/#login');
        }

        extract($vars);

        [$products, $total, $order] = $this->orderContent($id);
        $user = $this->user;
        $this->render('profile/checkout', compact('user', 'total', 'order'));
    }

    protected function orderContent($id){
        $order = (new Order)->getByPK($id);
        $items = json_decode($order->products, true);
        $total = 0;
        $products = [];
        
        foreach ($items as $item){
            $product = (new Product)->getWhere("SELECT * FROM products WHERE id = ". $item['id']);
            $total += $item['amount']*$product->price;
            array_push($products, [
                "id" => $order->id,
                "status" => $order->status,
                "amount" => $item['amount'],
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image
            ]);
        }

        return [$products, $total, $order];
    }
}