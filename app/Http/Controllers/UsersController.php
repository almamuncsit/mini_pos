<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\SaleItem;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request )
    {
        $group_id = $request->get('group');
        if ($group_id) {
            $this->data['users']    = User::where('group_id', $group_id)->get();
        } else {
            $this->data['users']    = User::all();    
        }
        

        $this->data['groups']   = Group::all();

        return view('users.users', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['groups']       = Group::arrayForSelect();
        $this->data['mode']         = 'create';
        $this->data['headline']     = 'Add New User';

        return view('users.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $formData = $request->all();
        if( User::create($formData) ) {
            Session::flash('message', 'User Created Successfully');
        }
        
        return redirect()->to('users');
    }


    public function show($id)
    {
        $this->data['user']     = User::find($id);
        $this->data['tab_menu'] = 'user_info';

        return view('users.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['user']         = User::findOrFail($id);
        $this->data['groups']       = Group::arrayForSelect();
        $this->data['mode']         = 'edit';
        $this->data['headline']     = 'Update Information';

        return view('users.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $data               = $request->all();

        $user               = User::find($id);
        $user->group_id     = $data['group_id'];
        $user->name         = $data['name'];
        $user->email        = $data['email'];
        $user->phone        = $data['phone'];
        $user->address      = $data['address'];

        if( $user->save() ) {
            Session::flash('message', 'User Updated Successfully');
        }
        
        return redirect()->to('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if( User::find($id)->delete() ) {
            Session::flash('message', 'User Deleted Successfully');
        }
        
        return redirect()->to('users');
    }
}
