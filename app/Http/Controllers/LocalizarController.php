<?php

namespace App\Http\Controllers;

use App\Models\Localizar;
use Illuminate\Http\Request;

/**
 * Class LocalizarController
 * @package App\Http\Controllers
 */
class LocalizarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $localizars = Localizar::paginate();

        return view('localizar.index', compact('localizars'))
            ->with('i', (request()->input('page', 1) - 1) * $localizars->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $localizar = new Localizar();
        return view('localizar.create', compact('localizar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Localizar::$rules);

        $localizar = Localizar::create($request->all());

        return redirect()->route('localizars.index')
            ->with('success', 'Localizar created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $localizar = Localizar::find($id);

        return view('localizar.show', compact('localizar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $localizar = Localizar::find($id);

        return view('localizar.edit', compact('localizar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Localizar $localizar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Localizar $localizar)
    {
        request()->validate(Localizar::$rules);

        $localizar->update($request->all());

        return redirect()->route('localizars.index')
            ->with('success', 'Localizar updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $localizar = Localizar::find($id)->delete();

        return redirect()->route('localizars.index')
            ->with('success', 'Localizar deleted successfully');
    }
}
