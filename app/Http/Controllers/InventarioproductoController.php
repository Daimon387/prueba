<?php

namespace App\Http\Controllers;

use App\Models\Inventarioproducto;
use Illuminate\Http\Request;

/**
 * Class InventarioproductoController
 * @package App\Http\Controllers
 */
class InventarioproductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventarioproductos = Inventarioproducto::paginate();

        return view('inventarioproducto.index', compact('inventarioproductos'))
            ->with('i', (request()->input('page', 1) - 1) * $inventarioproductos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inventarioproducto = new Inventarioproducto();
        return view('inventarioproducto.create', compact('inventarioproducto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Inventarioproducto::$rules);

        $inventarioproducto = Inventarioproducto::create($request->all());

        return redirect()->route('inventarioproductos.index')
            ->with('success', 'Inventarioproducto created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inventarioproducto = Inventarioproducto::find($id);

        return view('inventarioproducto.show', compact('inventarioproducto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inventarioproducto = Inventarioproducto::find($id);

        return view('inventarioproducto.edit', compact('inventarioproducto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Inventarioproducto $inventarioproducto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventarioproducto $inventarioproducto)
    {
        request()->validate(Inventarioproducto::$rules);

        $inventarioproducto->update($request->all());

        return redirect()->route('inventarioproductos.index')
            ->with('success', 'Inventarioproducto updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $inventarioproducto = Inventarioproducto::find($id)->delete();

        return redirect()->route('inventarioproductos.index')
            ->with('success', 'Inventarioproducto deleted successfully');
    }
}
