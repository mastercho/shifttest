<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use DB;

class CalendarController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $PDO = DB::connection('mysql')->getPdo();

        $table = $PDO->prepare("
                            SELECT staffid
                           ,sum(if(daynumber=0,workhours,0)) as day0
                           ,sum(if(daynumber=1,workhours,0)) as day1
                           ,sum(if(daynumber=2,workhours,0)) as day2
                           ,sum(if(daynumber=3,workhours,0)) as day3
                           ,sum(if(daynumber=4,workhours,0)) as day4
                           ,sum(if(daynumber=5,workhours,0)) as day5
                           ,sum(if(daynumber=6,workhours,0)) as day6
                           FROM `rota_slot_staff` WHERE 
                           rotaid=332 and slottype='shift' and NOT staffid is NULL
                           group by staffid

                           UNION ALL

                           SELECT 'TOTAL'
                           ,sum(if(daynumber=0,workhours,0)) as day0
                           ,sum(if(daynumber=1,workhours,0)) as day1
                           ,sum(if(daynumber=2,workhours,0)) as day2
                           ,sum(if(daynumber=3,workhours,0)) as day3
                           ,sum(if(daynumber=4,workhours,0)) as day4
                           ,sum(if(daynumber=5,workhours,0)) as day5
                           ,sum(if(daynumber=6,workhours,0)) as day6
                           FROM `rota_slot_staff` WHERE 
                           rotaid=332 and slottype='shift'  and NOT staffid  IS NULL

     ");



        $table->execute();
        $sceduledata = $table->fetchAll((\PDO::FETCH_ASSOC));

        return view('calendar')->with('table', $sceduledata);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
