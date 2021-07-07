<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use App\Models\Employe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('employes')->join('companies', 'company_id', '=', 'companies.id')->select('employes.*', 'companies.name')->get();
        return view('employe.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = DB::table('companies')->get('companies.*');
        return view('employe.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'company_name' => 'required',
            'firstname' => 'required|min:5|max:10',
            'lastname' => 'required|min:5|max:10',
            'email' => 'required|email',
            'phone' => 'required|numeric'
        ], [
            'company_name.required' => 'Choose your company'
        ]);

        $insertData = Employe::create([
            'firstname' => $validate['firstname'],
            'lastname' => $validate['lastname'],
            'company_id' => $validate['company_name'],
            'email' => $validate['email'],
            'phone' => $validate['phone'],
            'created_at' => date(now()),
            'updated_at' => date(now()),
        ]);

        if ($insertData) {
            return redirect('/employe')->with('message', 'Success add employe');
        } else {
            return redirect('/employe')->with('message', 'failed add Employe');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function show(Employe $employe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function edit(Employe $employe)
    {
        $data = DB::table('employes')->join('companies', 'company_id', '=', 'companies.id')->select('employes.*', 'companies.name')->where('employes.id', '=', $employe['id'])->get()->first();
        // dd($data);
        $companies = DB::table('companies')->get();
        return view('employe.update', compact('data', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employe $employe)
    {
        $data = Employe::find($employe['id']);

        $data->update($request->all());

        if ($data) {
            return redirect('/employe')->with('message', 'Success update data');
        } else {
            return redirect('/employe')->with('message', 'Failed update data. Please try again');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employe $employe)
    {
        $data = Employe::find($employe['id'])->first();

        $data->delete();

        return redirect('/employe')->with('message', 'Companie success deleted');
    }
}
