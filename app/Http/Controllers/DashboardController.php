<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CustomerBill;
use Illuminate\Http\Request;
use Auth;
use Toastr;
use PDF;
use App\Models\User;
use Illuminate\Support\Carbon;
use Hash;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
 
    public function index()
    {


        return view('dashboard');
    }

 
}
