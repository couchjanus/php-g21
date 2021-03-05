<?php
namespace App\Controllers;

use Core\Controller;
use Core\AuthInterface;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;

class ProfileController extends Controller implements AuthInterface
{
    protected static string $layout = 'app';
    
    public function __construct()
    {
        parent::__construct();

        if (!$this->auth()) {
             $this->redirect('/#login');
        }

    }
    
    public function isAdmin()
    {
        return $this->role();
    }
 
    public function index()
    {
        $this->render('profile/index', ["user" => $this->user]);
    }


    public function ordersList()
    {
        $orders = (new Order)->getAll(["user_id" => $this->user->id]);
        $user = $this->user;
        $this->render('profile/orders', compact('user', 'orders'));
    }

    public function orderView($vars)
    {
        extract($vars);

        [$products, $total, $order] = $this->orderContent($id);
        
        $user = $this->user;
        $this->render('profile/order', compact('user', 'order', 'products', 'total'));
    }

    
    public function checkOrder($vars)
    {
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
            $product = (new Product)->getByPK($item['id']);
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