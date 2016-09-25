<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    protected function validateItem(Request $request)
    {
        $this->validate($request, [
            'name'         => 'required|alpha_dash|max:20',
            'display_name' => 'required|string',
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginate = Role::orderby('id')->paginate(self::PAGE_SIZE);
        return view('admin.role.index', [
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
        $permissions = Permission::all();
        return view('admin.role.create', [
            'permissions' => $permissions,
        ]);
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
        $perms = $request['perms'];
        $item  = Role::create([
            'name'         => $request['name'],
            'display_name' => $request['display_name'],
            'description'  => $request['description'],
        ]);
        foreach ($perms as $perm) {
            if ($perm == '0') {
                continue;
            }
            $item->perms()->attach($perm);
        }
        return redirect()->route('admin.role.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Role::find($id);
        return view('admin.role.show', [
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
        $item        = Role::find($id);
        $permissions = Permission::all();
        return view('admin.role.edit', [
            'item'        => $item,
            'permissions' => $permissions,
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
        $item  = Role::find($id);
        $perms = $request['perms'];
        $item->forceFill([
            'name'         => $request['name'],
            'display_name' => $request['display_name'],
            'description'  => $request['description'],
        ])->save();

        $current = $item->perms()->getRelatedIds();
        $item->perms()->detach($current);
        foreach ($perms as $perm) {
            if ($perm == '0') {
                continue;
            }
            $item->perms()->attach($perm);
        }

        return redirect()->route('admin.role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
