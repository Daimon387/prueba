<?php

namespace App\Http\Controllers;

use App\Models\Tipotela;
use Illuminate\Http\Request;

/**
 * Class TipotelaController
 * @package App\Http\Controllers
 */
class TipotelaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipotelas = Tipotela::paginate();

        return view('tipotela.index', compact('tipotelas'))
            ->with('i', (request()->input('page', 1) - 1) * $tipotelas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipotela = new Tipotela();
        return view('tipotela.create', compact('tipotela'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Tipotela::$rules);

        $tipotela = Tipotela::create($request->all());

        return redirect()->route('tipotelas.index')
            ->with('success', 'Tipotela created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipotela = Tipotela::find($id);

        return view('tipotela.show', compact('tipotela'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipotela = Tipotela::find($id);

        return view('tipotela.edit', compact('tipotela'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Tipotela $tipotela
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipotela $tipotela)
    {
        request()->validate(Tipotela::$rules);

        $tipotela->update($request->all());

        return redirect()->route('tipotelas.index')
            ->with('success', 'Tipotela updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tipotela = Tipotela::find($id)->delete();

        return redirect()->route('tipotelas.index')
            ->with('success', 'Tipotela deleted successfully');
    }
}
