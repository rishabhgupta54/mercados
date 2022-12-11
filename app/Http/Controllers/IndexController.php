<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller {

    /**
     * @var String $routeName Name of the route
     */
    private string $routeName = 'index';

    /**
     * @var String $viewPath Path of the View File
     */
    private string $viewPath = 'dashboard.index.';

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $users = User::all();

        $maleVehiclesCount = [];
        $femaleVehiclesCount = [];
        if (!empty($users)) {
            foreach ($users as $user) {
                if ($user->gender == User::GENDER_MALE) {
                    $maleVehiclesCount[] = $user->number_of_vehicles;
                    $femaleVehiclesCount[] = 0;
                } else {
                    $maleVehiclesCount[] = 0;
                    $femaleVehiclesCount[] = $user->number_of_vehicles;
                }
            }
        }


        return view($this->viewPath . 'index', [
            'pageTitle' => 'Dashboard',
            'totalUsers' => $users->count(),
            'totalVehicles' => $users->pluck('number_of_vehicles')->sum(),
            'maxVehicle' => $users->pluck('number_of_vehicles')->max(),
            'minVehicle' => $users->pluck('number_of_vehicles')->min(),
            'avgVehicle' => round($users->pluck('number_of_vehicles')->average()),
            'chartLabels' => json_encode($users->pluck('first_name')),
            'maleVehicle' => json_encode($maleVehiclesCount),
            'femaleVehicle' => json_encode($femaleVehiclesCount),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}
