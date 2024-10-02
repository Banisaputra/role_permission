<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    public function index() {
        Alert::success('Success Title', 'Success Message');

        return view('panel.index');
    }
}
