<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;  // Import the model if you want to add data to dashboard, example: total users
use App\Models\Product; // Example: You can also include other data models, like products.

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth'); // Middleware to ensure the user is authenticated
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Example: Get total number of users in the system
        $totalUsers = User::count(); // Get the total number of users
        $totalProducts = Product::count(); // Example: Get the total number of products (if needed)

        // Pass the data to the view (home.blade.php)
        return view('home', compact('totalUsers', 'totalProducts')); // Pass data to view
    }
}
