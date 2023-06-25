<?php

namespace App\Http\Controllers;

use App\Models\Foo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FooController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('foos.index', ['foos' => Foo::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('foos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Foo $foo)
    {
        Foo::create($this->validateFoo($request));

        return redirect(route('foos.index'))->with('status', 'Foo created!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Foo $foo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Foo $foo)
    {
        return view('foos.edit', ['foo' => $foo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Foo $foo)
    {
        $foo->update($this->validateFoo($request));
        return redirect(route('foos.index'))->with('status_update', 'Grade updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Foo $foo)
    {
        $foo->delete();
        return redirect(route('foos.index'));
    }

    private function validateFoo(Request $request)
    {
        return $request -> validate([
            'bar' => 'required',
            'happiness' =>'required|numeric|min:0',
        ]);
    }
}
