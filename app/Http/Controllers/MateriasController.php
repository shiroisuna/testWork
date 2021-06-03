<?php

namespace App\Http\Controllers;

use App\Models\Materias;
use Illuminate\Http\Request;

class MateriasController extends Controller
{
    //
    public function index(){

    	return Materias::get();

    }

    public function store(Request $request){

    	$materias = new Materias;

    	$materias->create($request->all());

    }

    public function update(Materias $materias, Request $request){

		

    	$materias->update($request->all());    	

    }

    public function show(Materias $materias){

    	return $materias;
    }

    public function destroy(Materias $materias, Request $request){

    	Materias::where('id', $request->id)->delete();

    }
}
