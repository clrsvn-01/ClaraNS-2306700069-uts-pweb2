<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/users');
        $users = $response->json();
        
        if ($request->has('search')) {
            $search = $request->input('search');
            $users = array_filter($users, fn($u) => stripos($u['name'], $search) !== false);
        }
        
        return view('employees', compact('users'));
    }

    public function show($id)
    {
        $users = Http::get('https://jsonplaceholder.typicode.com/users')->json();
        $targetUser = collect($users)->firstWhere('id', (int)$id);

        // Menghitung jarak ke semua karyawan lain dengan Haversine Formula
        $colleagues = collect($users)->map(function ($user) use ($targetUser) {
            if ($user['id'] == $targetUser['id']) return null;

            $lat1 = $targetUser['address']['geo']['lat'];
            $lon1 = $targetUser['address']['geo']['lng'];
            $lat2 = $user['address']['geo']['lat'];
            $lon2 = $user['address']['geo']['lng'];

            $earthRadius = 6371;
            $dLat = deg2rad($lat2 - $lat1);
            $dLon = deg2rad($lon2 - $lon1);
            $a = sin($dLat/2)**2 + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon/2)**2;
            $user['distance'] = round($earthRadius * 2 * atan2(sqrt($a), sqrt(1-$a)), 2);
            
            return $user;
        })->filter()->sortBy('distance');

        return view('detail', compact('targetUser', 'colleagues'));
    }
}