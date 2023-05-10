<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Events\StudentNameUpdate;

class StudInsertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::select('select * from students');
        return view('students',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->input('stud_name');
        DB::insert('insert into students (name) values(?)',[$name]);
        echo "Record inserted successfully.<br/>";
        echo '<a href = "/insert">Click Here</a> to go back.';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = DB::select('select * from students where id = ?',[$id]);
        return view('student_update',['users'=>$users]);
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
        $student = DB::select('select * from students where id = ?',[$id]);
        $name = $request->input('stud_name');

        //__Event calling StudentNameUpdate__//
        $eventData = [
            'current_name' => $student[0]->name,
            'previous_name' => $name
        ];

        event(new StudentNameUpdate($eventData));

        DB::update('update students set name = ? where id = ?',[$name,$id]);
        echo "Record updated successfully.<br/>";
        echo '<a href = "/students">Click Here</a> to go back.';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from students where id = ?',[$id]);
        echo "Record deleted successfully.<br/>";
        echo '<a href = "/students">Click Here</a> to go back.';
    }
}
