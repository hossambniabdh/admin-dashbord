<?php

namespace App\Http\Controllers;

use App\employee;
use Illuminate\Http\Request;
use App\company;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emp = \DB::table('employees')

            ->leftJoin('companies', 'employees.company_id', '=', 'companies.id')
            ->select('employees.*', 'companies.name')

            ->get();
        $company = company::all();

        return view('employee', compact('emp', 'company'));
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
        $com = \DB::table('companies')

            ->select('id')
            ->where('name', '=', $request->com)

            ->get();
        $com_id = get_object_vars($com[0]);
        $com_id['id'];
        $emp = new employee;

        $emp->first_name = $request->fname;
        $emp->last_name = $request->lname;
        $emp->company_id = $com_id['id'];
        $emp->emp_email = $request->email;
        $emp->phone = $request->phone;
        $emp->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        // dd($id);
        $int = (int)$id;

        $emp = \DB::table('employees')
            ->where('id', '=', $int)
            ->update(
                ['first_name' => $request->fname, 'emp_email' => $request->email, 'last_name' => $request->lname,  'phone' => $request->phone]
            );

        return 'data updated';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $employee = employee::find($id);

        $employee->delete();
    }
}
