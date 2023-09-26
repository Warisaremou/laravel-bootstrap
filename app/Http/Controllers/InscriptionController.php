<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Option;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InscriptionController extends Controller
{
    public function index(): View
    {
        return view('etudiant.inscription', [
            'options' => Option::all(['id', 'code_opt', 'nom_opt'])
        ]);
    }

    public function createStudent(Request $request)
    {
        $request->validate([
            'nom' => 'required|min:2|max:50',
            'prenom' => 'required|min:2|max:50',
            'datnais' => 'required',
            'ville' => 'required|min:3|max:50',
            'sexe' => 'required|min:1|max:1',
            'option_id' => 'required',
        ]);
        // dd($validated);
        Etudiant::create([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'datnais' => $request->input('datnais'),
            'ville' => $request->input('ville'),
            'sexe' => $request->input('sexe'),
            'option_id' => $request->input('option_id'),
        ]);

        return redirect()->route('index')->with('success', "L'étudiant à été enrégistrer avec succès");
    }

    public function studentsList(): View
    {
        return view('etudiant.list', [
            'students' => Etudiant::all(['id', 'nom', 'prenom', 'sexe'])
        ]);
    }

    // public function deleteStudent(Request $request)
    // {
    //     Etudiant::delete($request->'id');

    //     return;
    // }
}
