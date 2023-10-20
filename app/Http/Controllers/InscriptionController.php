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
        return view('etudiant.inscriptionDEC', [
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

        return redirect()->route('index')->with('success', "L'étudiant a été enrégistré avec succès");
    }

    public function studentsList(): View
    {
        return view('etudiant.rechercheDEC', [
            'students' => Etudiant::paginate(6),
            // 'students' => Etudiant::all(['id', 'nom', 'prenom', 'sexe', 'option_id']),
            'options' => Option::all(['id', 'code_opt']),
            // 'filteredStudents' => null
        ]);
    }

    public function findStudentByOption(Request $request)
    {
        $request->validate([
            'option_id' => 'required|int',
        ]);
        // dd($request->option_id;
        $students = Etudiant::query()->where('option_id', 'LIKE', '%' . $request->option_id . '%')->get();
        // dd($students);

        // ! Add code if student not found later

        return
            view('etudiant.rechercheDEC', [
                'students' => $students,
                'options' => Option::all(['id', 'code_opt']),
            ]);
    }

    public function deleteStudent(int $studentID)
    {
        // @dd($studentID);
        Etudiant::destroy($studentID);

        return
            redirect()->route('studentsList')->with('delete', "L'étudiant à été supprimé avec succès");
    }

    public function editStudentForm(Etudiant $etudiant): View
    {
        return view('etudiant.modificationDEC', [
            'etudiant' => $etudiant,
            'options' => Option::all(['id', 'code_opt', 'nom_opt'])
        ]);
    }

    public function editStudent(Etudiant $etudiant, Request $request)
    {
        $request->validate([
            'nom' => 'required|min:2|max:50',
            'prenom' => 'required|min:2|max:50',
            'datnais' => 'required',
            'ville' => 'required|min:3|max:50',
            'sexe' => 'required|min:1|max:1',
            'option_id' => 'required',
        ]);

        $etudiant->update([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'datnais' => $request->input('datnais'),
            'ville' => $request->input('ville'),
            'sexe' => $request->input('sexe'),
            'option_id' => $request->input('option_id'),
        ]);

        return redirect()->route('studentsList')->with('success', "L'étudiant a été modifié avec succès");
    }
}
