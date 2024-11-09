<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateEmployeeRequest;
use Brian2694\Toastr\Facades\Toastr;
// use Illuminate\support\Facades\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $employees = Employee::latest()->get();
        $employees = Employee::query()->orderBy('name','asc')->orderBy('address','asc')->get();
        return view('pages.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request)->all();
        try{
            $request->validate([
                'name' => 'required',
                'email' =>'required|email|unique:employee,email',
                'address' =>'nullable',
                'phone' => 'nullable'
            ]);
            Employee::create([
                'name' => $request->input('name'),
                'email' =>$request->input('email'),
                'address' =>$request->input('address'),
                'phone' => $request->input('phone'),
            ]);
            Toastr::success('Employee created successfully');
            return redirect()->route('employee.index');

        }catch(Exception $e){
           Toastr::error('Something Worng');
           return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $employee = Employee::where('id',$id)->first();
        return view('pages.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
