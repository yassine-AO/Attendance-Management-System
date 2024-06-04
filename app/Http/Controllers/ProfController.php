<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Absence;
use App\Models\Calendar;
use App\Models\Module;
use App\Models\Retard;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Prof;

class ProfController extends Controller
{
    public function index($profId){
        $thisProf = Prof::findOrFail($profId);
        $calendarsFromDB = Calendar::with('annee_section.filiere.campus' , 'days.modules')->get();
        return view('prof.index',['prof' => $thisProf , 'calendars'=>$calendarsFromDB]);
      }
      public function createRetardsAbsences($profId , $moduleId){
        $thisProf = Prof::findOrFail($profId);
        $thisModule = Module::with('annee_section.etudiants.absences' , 'annee_section.etudiants.retards')->findOrFail($moduleId);
        $etudiantsOfThisModule = $thisModule->annee_section->etudiants;
        return view('prof.createRetardsAbsences',['prof' => $thisProf , 'module'=>$thisModule , 'etudiants'=>$etudiantsOfThisModule]);
      }
      
    public function storeRetardsAbsences(Request $request, $profId)
   {
    $thisProf = Prof::findOrFail($profId);

    // Loop through each student to process the form data
    foreach ($request->all() as $key => $value) {
        // Check if the key represents a student's checkbox for "Retard"
        if (strpos($key, 'retard_') !== false) {
            // Extract the student ID from the key
            $etudiantId = str_replace('retard_', '', $key);

            // Store the "Retard" data
            Retard::create([
                'motif' => $request->input('motifRetard_' . $etudiantId),
                'etudiant_id' => $etudiantId,
                'module_id' => $request->module_id,
                'minutesRetard' => 0, 
            ]);
        }

        // Check if the key represents a student's checkbox for "Absence"
        if (strpos($key, 'absence_') !== false) {
            // Extract the student ID from the key
            $etudiantId = str_replace('absence_', '', $key);

            // Store the "Absence" data
            Absence::create([
                'etudiant_id' => $etudiantId,
                'module_id' => $request->module_id,
                'motif'=>'#',
            ]);
        }
    }

    // Redirect or return a response as needed
    return redirect(route('prof.index', ['prof' => $thisProf]))->with("success", 'Ajout réussie.');
   }



      public function profile($profId){
        $thisProf = Prof::with('modules.annee_section.filiere.campus')->findOrFail($profId);
        return view('prof.profile',['prof' => $thisProf]);
      }

}
