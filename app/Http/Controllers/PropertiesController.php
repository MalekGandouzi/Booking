<?php

namespace App\Http\Controllers;


use App\Models\Property;

class PropertiesController extends Controller
{
    public function index()
    {
        // Fetch all hotels from the database
      $properties = Property::all(); // Récupérer tous les hôtels
    return view('layouts.app', compact('properties')); // Passer à la vue
    }
}
