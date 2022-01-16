<?php

namespace App\Http\Controllers;

use App\company;
use Illuminate\Http\Request;

class CompanyController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $company = \DB::table('companies')


        //     ->get();
        $company = company::all();
        // return $company;
        return view('company', compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->validate([

            'name' => 'required',
            'email' => '',
            'website' => '',
            'logo' => 'file|dimensions:min_width=100,min_height=100',

        ]);
        if (request('logo')) {
            $input['logo'] = request('logo')->store('images');
        }
        company::create($input);
        // session()->flash('Company_create_massage', 'Company was created');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        // dd($id);
        $int = (int)$id;

        $emp = \DB::table('companies')
            ->where('id', '=', $int)
            ->update(
                ['name' => $request->name, 'email' => $request->email,  'website' => $request->website]
            );

        return 'data updated';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $company = company::find($id);

        $company->delete();
    }
}
