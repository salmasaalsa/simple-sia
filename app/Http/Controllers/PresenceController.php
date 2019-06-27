<?php

namespace App\Http\Controllers;
use DB;
use App\Presence;
use Illuminate\Http\Request;

class PresenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = new Presence();
        $allAdmattendance = DB::select(
            'call SelectAllAttendance()'
        );

        return view('admin.presence.index', ['presences' => $allAdmattendance]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.presence.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Presence();
        DB::insert(
            'call InsertAttendance(?,?,?)',
            [
                $request->input('name'),
                $request->input('date'),
                $request->input('status'),
            ]
        );
        return redirect('presences');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Presences  $Presences
     * @return \Illuminate\Http\Response
     */
    public function show(Presences $Presences)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Presences  $Presences
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $model = new Presence();
        $idAdmattendance = DB::select(
            'call SelectAttendanceWhereId(?)',
            [
                $id,
            ]
        );


        return view('admin.presence.edit', ['presences' => $idAdmattendance]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Presences  $Presences
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = new Presence();
        DB::insert(
            'call UpdateAttendance(?,?,?,?)',
            [
                $id,
                $request->input('student'),
                $request->input('date'),
                $request->input('status'),
            ]
        );
        return redirect('presences');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Presences  $Presences
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = new Presence();
        $allAdmattendance = DB::select(
            'call DelAttendance(?)',
            [
                $id,
            ]
        );

        return redirect('presences');
    }


    public function indexStudent()
    {
        $studentname = "fajar";
        $model = new Attendance();

        $allStdnattendance = DB::select(

            'call SelectAllAttWhereStudentName(?)', [$studentname]
        );

        return view('student.Presences', ['studentatt' => $allStdnattendance]);
    }
}
