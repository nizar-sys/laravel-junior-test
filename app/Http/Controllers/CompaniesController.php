<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CompaniesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Companies::paginate(10);
        return view('company.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:256|min:8',
            'email' => 'required|email',
            'website' => 'required|min:10|max:256'
        ], [
            'name.required' => 'Company name is required',
        ]);

        $insertData = Companies::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'website' => $validated['website'],
        ]);

        if ($insertData) {
            return redirect('/company')->with('message', 'Success add data');
        } else {
            return redirect('/company')->with('message', 'Failed add data. Please try again');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function show(Companies $companies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function edit(Companies $companies, $id)
    {
        $data = Companies::find($id);
        return view('company.update', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Companies $companies)
    {
        $data = Companies::find($request['id']);
        $data->update($request->all());

        if ($data) {
            return redirect('/company')->with('message', 'Success update data');
        } else {
            return redirect('/company')->with('message', 'Failed update data. Please try again');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function destroy(Companies $companies, $id)
    {
        $data = Companies::find($id)->first();

        $data->delete();

        return redirect('/company')->with('message', 'Companie success deleted');
    }
}
