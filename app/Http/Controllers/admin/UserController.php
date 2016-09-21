<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    const PAGE_SIZE = 50;

    protected function validate(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required|string|max:20',
            'mobile'   => 'required|numberic|size:11',
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request);
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
        $this->validate($request);
        $item = User::find($id);
        return $item->forceFill([
            'name'     => $request['name'],
            'mobile'   => $request['mobile'],
            'password' => bcrypt($request['password']),
        ])->save();
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
        return User::find($id)->softDeletes();
        //硬删除
        //$flight->forceDelete();
    }
}
