<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Flash;
use Auth;
use Response;
use App\Models\Role;


class UserController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the User.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $users = $this->userRepository->all();

        return view('users.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();

        $user = $this->userRepository->create($input);

        Flash::success('User saved successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $transactions = $user->transactions;
        $products = $user->products;

        return view('users.show')
            ->with('user', $user)
            ->with('transactions', $transactions)
            ->with('products', $products);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $roles = Role::all();




        $_roles = array();
        foreach ($roles as $role) {
        if(Auth::user()->role_id == 1 ){
            $_roles[$role->id] = $role->name;
          //  $roles= array_slice($_roles, 0);
            $roles=$_roles;

        }elseif(Auth::user()->role_id == 2 ){
            $_roles[$role->id] = $role->name;
            $roles= array_slice($_roles, 2);
        }
        }

        //        $_roles = array();
//        foreach ($roles as $role) {
//            $_roles[$role->id] = $role->name;
//
//            if(Auth::user()->role_id == 1 ){
//                $roles= array_slice($_roles, 0)
//            }
//            else(Auth::user()->role_id == 2 ){
//                $roles= array_slice($_roles, 2)
//            }
//        }


        return view('users.edit')->with('user', $user)->with('roles', $roles);
    }

    /**
     * Update the specified User in storage.
     *
     * @param int $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->find($id);


        if (empty($user)) {
            Flash::error('User not found');
            return redirect(route('users.index'));
        }

        //Receive all the input request and store in a variable
        $input = $request->all();




        if(!empty($input['password'])){
           //Validate the password coming from the request
            $this->validate($request, array(
                'password'=> 'required|max:256|min:8',
            ));
            //Hash the password before saving to DB
            $input['password'] = Hash::make($input['password']);
        }

       //dd($input);

        $user = $this->userRepository->update($input, $id);

        Flash::success('User updated successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('User deleted successfully.');

        return redirect(route('users.index'));
    }
}
