<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Response;
use App\Branch;
use Auth;
use App\User;

class OrderController extends Controller
{

    public function index()
    {
        $data['title'] = "Pending Orders";
        return view('admin.orders.pending-orders', $data);
    }
}
