<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::paginate(10); // Pagina los resultados, mostrando 10 usuarios por página
    
        return view('user.index', compact('users'));
    }
}
