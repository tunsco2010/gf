<?php
/**
 * Created by PhpStorm.
 * User: Tunsco
 * Date: 7/12/2017
 * Time: 9:28 AM
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreIncomesRequest;
use App\Http\Requests\Admin\UpdateIncomesRequest;

class Inventories extends Controller
{

    public function index()
    {
        return view('inventory.index');
    }



}