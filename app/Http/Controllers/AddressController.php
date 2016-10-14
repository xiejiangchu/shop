<?php

namespace App\Http\Controllers;

use App\Address;
use App\Region;
use DB;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    const PAGE_SIZE = 50;

    protected function validateItem(Request $request)
    {
        $this->validate($request, [
            'mobile'   => 'required|regex:/^1[34578][0-9]{9}$/',
            'receiver' => 'required|string',
            'district' => 'required|string',
            'road'     => 'required|string',
            'address'  => 'required|string',
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginate = Address::where('uid', self::getUid())->paginate(self::PAGE_SIZE);
        return view('address.index', [
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
        $regions   = Region::open()->get();
        $districts = [];
        $roads     = [];
        foreach ($regions as $key => $region) {
            if (!in_array($region->district, $districts)) {
                $districts[] = $region->district;
            }
            $roads[] = $region->road;
        }
        return view('address.create', [
            'district'  => $districts[0],
            'road'      => $roads[0],
            'roads'     => json_encode($roads, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE),
            'districts' => json_encode($districts, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE),
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
        DB::table('address')
            ->where('uid', self::getUid())
            ->update(['default' => 0]);
        $item = Address::create([
            'uid'      => self::getUid(),
            'default'  => 1,
            'mobile'   => $request['mobile'],
            'receiver' => $request['receiver'],
            'city'     => '宜春',
            'district' => $request['district'],
            'road'     => $request['road'],
            'address'  => $request['address'],
        ]);
        return redirect()->route('address.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route('address.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $regions   = Region::open()->get();
        $districts = [];
        $roads     = [];
        foreach ($regions as $key => $region) {
            if (!in_array($region->district, $districts)) {
                $districts[] = $region->district;
            }
            $roads[] = $region->road;
        }
        $item = Address::find($id);
        if (empty($item)) {
            return redirect()->route('address.index');
        }
        DB::table('address')
            ->where('uid', $item->uid)
            ->update(['default' => 0]);
        return view('address.edit', [
            'item'      => $item,
            'roads'     => json_encode($roads, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE),
            'districts' => json_encode($districts, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE),
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
        $item = Address::find($id);
        if (empty($item)) {
            return redirect()->route('address.index');
        }
        DB::table('address')
            ->where('uid', $item->uid)
            ->update(['default' => 0]);
        $item->forceFill([
            'uid'      => self::getUid(),
            'default'  => 1,
            'mobile'   => $request['mobile'],
            'receiver' => $request['receiver'],
            'city'     => '宜春',
            'district' => $request['district'],
            'road'     => $request['road'],
            'address'  => $request['address'],
        ]);
        $item->save();
        return redirect()->route('address.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Address::find($id);
        $item->delete();
        return response('success');
    }

    public function makedefault(Request $request)
    {
        $item = Address::find($request['id']);
        if (empty($item)) {
            return redirect()->route('address.index');
        }
        DB::table('address')
            ->where('uid', $item->uid)
            ->update(['default' => 0]);
        $item->forceFill([
            'default' => 1,
        ]);
        $item->save();
        return self::success();
    }

    public function create2()
    {
        $regions   = Region::open()->get();
        $districts = [];
        $roads     = [];
        foreach ($regions as $key => $region) {
            if (!in_array($region->district, $districts)) {
                $districts[] = $region->district;
            }
            $roads[] = $region->road;
        }
        return view('address.create2', [
            'district'  => $districts[0],
            'road'      => $roads[0],
            'roads'     => json_encode($roads, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE),
            'districts' => json_encode($districts, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE),
        ]);
    }
    public function store2(Request $request)
    {
        $this->validateItem($request);
        DB::table('address')
            ->where('uid', self::getUid())
            ->update(['default' => 0]);
        $item = Address::create([
            'uid'      => self::getUid(),
            'default'  => 1,
            'mobile'   => $request['mobile'],
            'receiver' => $request['receiver'],
            'city'     => '宜春',
            'district' => $request['district'],
            'road'     => $request['road'],
            'address'  => $request['address'],
        ]);
        return self::success();
    }
}
