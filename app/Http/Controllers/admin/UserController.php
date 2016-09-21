<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    const PAGE_SIZE = 50;

    protected function validateItem(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required|alpha_dash|max:20',
            'mobile'   => 'required|digits:11',
            'password' => 'required',
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginate = User::orderby('id')->paginate(self::PAGE_SIZE);
        return view('admin.user.index', [
            'paginate' => $paginate,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $roles = Role::all();
        // return view('admin.user.edit', [
        //     'roles' => $roles,
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateItem($request);
        return User::create([
            'name'     => $request['name'],
            'mobile'   => $request['mobile'],
            'password' => bcrypt($request['password']),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = User::find($id);
        return view('admin.user.show', [
            'item' => $item,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item  = User::find($id);
        $roles = Role::all();
        return view('admin.user.edit', [
            'item'  => $item,
            'roles' => $roles,
        ]);
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
        $this->validateItem($request);
        $item  = User::find($id);
        $roles = $request['roles'];
        $item->forceFill([
            'name'     => $request['name'],
            'mobile'   => $request['mobile'],
            'password' => bcrypt($request['password']),
        ])->save();

        $current = $item->roles()->list('id');
        foreach ($roles as $role) {
            if (!in_array($role, $current)) {
                $item->roles()->attach($role);
            }
        }

        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //软删除
        // $item = User::find($id);
        // $item->softDeletes();
        //硬删除
        //$flight->forceDelete();
        return self::success();
    }

    /**
     * lock
     *
     * [lock description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function lock($id)
    {
        $item = User::find($id);
        $item->forceFill([
            'lock' => !$item['lock'],
        ])->save();
        return self::success();
    }

    /**
     *verifid
     *
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function verified($id)
    {
        $item = User::find($id);
        $item->forceFill([
            'verified' => !$item['verified'],
        ])->save();
        return self::success();
    }
}
