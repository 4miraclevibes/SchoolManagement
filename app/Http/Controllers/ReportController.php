<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index()
    {
        if(Auth::user()->email == 'admin@gmail.com'){
            $payments = Payment::all();
        }else{
            return redirect()->route('dashboard');
        }
        return view('pages.reports.index', compact('payments'));
    }
}
