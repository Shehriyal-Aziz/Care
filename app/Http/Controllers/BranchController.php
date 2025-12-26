<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch; 


class BranchController extends Controller
{
    public function getByCity(Request $request)
    {
        return Branch::where('city', $request->city)->get();
    }

    
 public function create()
    {
        return view('admin.branches');
    }

    public function store(Request $request)
    {
        $request->validate([
            'branch_name' => 'required|string',
            'city'        => 'required|string',
            'latitude'    => 'required|numeric',
            'longitude'   => 'required|numeric',
        ]);

        Branch::create($request->all());

        return redirect()->back()->with('success', 'Branch added successfully');
    }

}
