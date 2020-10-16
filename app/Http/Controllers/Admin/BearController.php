<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBearRequest;
use App\Http\Requests\UpdateBearRequest;
use App\Models\Bear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class BearController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bears = Bear::paginate(20);

        return View::make('bears/index', [
            'bears' => $bears
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('bears/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBearRequest $request)
    {
        $bear = new Bear();

        $bear->name = $request->get('name');
        $bear->city = $request->get('city');
        $bear->region = $request->get('region');
        $bear->latitude = $request->get('latitude');
        $bear->longitude = $request->get('longitude');

        $bear->save();

        return Redirect::route('bears.index')->with('message', 'Beer ID: ' . $bear->id . ' is succesvol aangemaakt.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bear = Bear::findOrFail($id);
        return View::make('bears/edit', [
            'bear' => $bear
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateBearRequest $request)
    {
        $bear = Bear::findOrFail($id);

        $bear->name = $request->get('name');
        $bear->city = $request->get('city');
        $bear->region = $request->get('region');
        $bear->latitude = $request->get('latitude');
        $bear->longitude = $request->get('longitude');

        $bear->save();

        return Redirect::route('bears.index')->with('message', 'Beer ID: ' . $id . ' is succesvol gewijzigd.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bear::destroy($id);
        return Redirect::route('bears.index')->with('message', 'Beer ID: ' . $id . ' is verwijderd.');
    }
}
