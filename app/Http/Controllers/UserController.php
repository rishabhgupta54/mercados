<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller {

    /**
     * @var String $routeName Name of the route
     */
    private string $routeName = 'users.';

    /**
     * @var String $viewPath Path of the View File
     */
    private string $viewPath = 'dashboard.users.';

    /**
     * @var String $viewPath Path of the View File
     */
    private string $pageTitle = 'User';

    /**
     * @var array $validationRules Rules for the form validation
     */
    private array $validationRules = [
        'first_name' => [
            'required',
            'string',
            'max:255',
        ],
        'last_name' => [
            'required',
            'string',
            'max:255',
        ],
        'email' => [
            'unique:users,email',
            'required',
            'email',
        ],
        'password' => [
            'required',
            'string',
            'min:8',
            'confirmed',
        ],
        'number_of_vehicles' => [
            'required',
            'numeric',
            'min:1',
            'max:10',
        ],
        'gender' => [
            'required',
        ],
    ];

    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $users = new User();
        if (!empty($request->search)) {
            $users = $users->where('first_name', 'like', '%' . $request->search . '%')->orWhere('last_name', 'like', '%' . $request->search . '%')->orWhere('username', 'like', '%' . $request->search . '%')->orWhere('email', 'like', '%' . $request->search . '%');
        }
        if (!empty($request->start_date)) {
            $users = $users->where('created_at', '>=', $request->start_date);
        }
        if (!empty($request->end_date)) {
            $users = $users->where('created_at', '<=', $request->start_date);
        }

        if (!empty($request->start_date) && !empty($request->end_date) && ($request->start_date != $request->end_date)) {
            $users = $users->whereBetween('created_at', [
                $request->start_date,
                $request->end_date,
            ]);
        }

        if ($request->has('export')) {
            $users = $users->get();

            $tableHeaders = [
                'First Name',
                'Last Name',
                'Username',
                'Email',
                'Verified User',
                'Gender',
                'Number of Vehicles',
                'Joined On',
            ];

            $file = 'user-export-' . date('Y-m-d-H-i-s') . '.csv';

            header('Content-type: application/csv');
            header('Content-Disposition: attachment; filename=' . $file);

            $output = fopen('php://output', 'w');
            fputcsv($output, $tableHeaders);
            foreach ($users as $user) {
                $records = [
                    $user->first_name,
                    $user->last_name,
                    $user->username,
                    $user->email,
                    $user->email_verified_at,
                    ($user->gender == 1 ? 'Male' : 'Female'),
                    $user->number_of_vehicles,
                    date('F d, Y', strtotime($user->created_at)),
                ];
                fputcsv($output, $records);
            }
            fclose($output);
            exit();
        }

        $users = $users->paginate(20);

        return view($this->viewPath . 'index', [
            'pageTitle' => Str::plural($this->pageTitle),
            'routeName' => $this->routeName,
            'users' => $users,
            'request' => $request->all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view($this->viewPath . 'create', [
            'pageTitle' => 'Create ' . $this->pageTitle,
            'routeName' => $this->routeName,
            'genders' => $this->getGenders(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $validator = Validator::make($request->all(), $this->validationRules);

        if ($validator->fails()) {
            Helper::toastrMessage('', '', $validator->fails());

            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->username = Helper::generateSlug(User::class, $request->email, 'username');
        $user->password = Hash::make($request->password);
        $user->number_of_vehicles = $request->number_of_vehicles;
        $user->gender = $request->gender;
        $user->save();

        Helper::toastrMessage('store');

        return redirect()->route($this->routeName . 'index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user) {
        return view($this->viewPath . 'edit', [
            'pageTitle' => 'Edit ' . $this->pageTitle,
            'routeName' => $this->routeName,
            'genders' => $this->getGenders(),
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user) {
        $this->validationRules['email'][0] = $this->validationRules['email'][0] . ',' . $user->id;
        unset($this->validationRules['password']);

        $validator = Validator::make($request->all(), $this->validationRules);

        if ($validator->fails()) {
            Helper::toastrMessage('', '', $validator->fails());

            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->number_of_vehicles = $request->number_of_vehicles;
        $user->gender = $request->gender;
        $user->save();

        Helper::toastrMessage('update');

        return redirect()->route($this->routeName . 'index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user) {
        $user->delete();

        Helper::toastrMessage('destroy');

        return redirect()->route($this->routeName . 'index');
    }

    public function getGenders() {
        return Helper::convertArrayToObject([
            [
                'id' => 1,
                'name' => 'Male',
            ],
            [
                'id' => 2,
                'name' => 'Female',
            ],
        ]);
    }

}
