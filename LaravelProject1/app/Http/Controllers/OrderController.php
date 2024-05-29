<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderModel;
class OrderController extends Controller
{
    
    public function getOrder()
    {
        $order = OrderModel::all();
        return view('admin.order.getOrders', ['orders' => $order]);
    }
}
