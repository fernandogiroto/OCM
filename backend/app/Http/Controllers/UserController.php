<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index(Request $request)
    {
        try {
            $search = $request->query('search'); 
            $users = User::query();

            if ($search) {
                $users->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                          ->orWhere('username', 'like', "%{$search}%")
                          ->orWhere('email', 'like', "%{$search}%")
                          ->orWhere('city', 'like', "%{$search}%");
                });
            }

            $results = $users->get();

            return response()->json([
                'success' => true,
                'data' => $results
            ]);

        } catch (\Exception $e) {
            Log::error('Error to fetch users', ['message' => $e->getMessage()]);

            return response()->json([
                'success' => false,
                'message' => 'Error to search users.'
            ], 500);
        }
    }
}
