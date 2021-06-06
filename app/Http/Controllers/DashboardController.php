<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use App\Models\Client;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientlist = Client::all();
        $countClient = count($clientlist);
        return Inertia::render('Dashboard', [
            'clients'=> $countClient
        ]);
    }
}