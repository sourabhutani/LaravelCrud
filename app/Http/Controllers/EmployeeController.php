<?php

namespace App\Http\Controllers;
use View;
use Illuminate\Http\Request;
use App\Employee;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Session;
use Redirect;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // get all the nerds
        $employees = Employee::all();

        // load the view and pass the nerds
        return View::make('employees.index')
            ->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // load the create form (app/views/nerds/create.blade.php)
        return View::make('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'       => 'required',
            'salary'      => 'required|numeric',
            'department' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        } else {
            // store
            $employee = new Employee;
            $employee->name       = Input::get('name');
            $employee->salary      = Input::get('salary');
            $employee->department = Input::get('department');
            $employee->dob = Input::get('dob');
            $employee->save();

            // redirect
            Session::flash('message', 'Successfully created Employee!');
            return Redirect::to('employees');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         // get the nerd
        $employee = Employee::find($id);

        // show the view and pass the nerd to it
        return View::make('employees.show')
            ->with('employee', $employee);
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         // get the nerd
        $employee = employee::find($id);

        // show the edit form and pass the nerd
        return View::make('employees.edit')
            ->with('employee', $employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'       => 'required',
            'salary'      => 'required|numeric',
            'department' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        } else {
            // store
            $employee = Employee::find($id);
            $employee->name       = Input::get('name');
            $employee->salary      = Input::get('salary');
            $employee->department = Input::get('department');
            $employee->dob = Input::get('dob');
            $employee->save();

            // redirect
            Session::flash('message', 'Successfully Updated Employee!');
            return Redirect::to('employees');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         // delete
        $employee = Employee::find($id);
        $employee->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the employee');
        return Redirect::to('employees');
    }
}
