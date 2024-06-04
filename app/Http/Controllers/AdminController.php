<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AnneeSection;
use App\Models\Calendar;
use App\Models\Campus;
use App\Models\Day;
use App\Models\Etudiant;
use App\Models\Filiere;
use App\Models\Module;
use App\Models\Prof;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{


    public function index($adminId){
        $thisAdmin = Admin::findOrFail($adminId);
        return view('admin.index',['admin' => $thisAdmin]);
      }




   public function profile($adminId){
    //eager load filiere et campus
    $thisAdmin = Admin::with('filiere.campus')->findOrFail($adminId);

    //$thisFiliereId = $thisAdmin->idFiliere;
    $filiere = $thisAdmin->filiere;
    
    

    //$thisCampusId = $filiere->campus_id;
    $campus = $thisAdmin->filiere->campus;
    return view('admin.profile',['admin' => $thisAdmin , 'filiere' => $filiere , 'campus' => $campus]);
  }

  public function etudiants($adminId){
    $thisAdmin = Admin::with('filiere.campus')->findOrFail($adminId);

    $etudiantsFromDB = Etudiant::with('annee_section.filiere.campus')->get();
    return view('admin.etudiants' , ['admin' => $thisAdmin , 'etudiants' => $etudiantsFromDB]);
  }

  public function createEtudiant($adminId){
    $thisAdmin = Admin::with('filiere.campus')->findOrFail($adminId);
    $annee_sectionFromDB = AnneeSection::with('filiere.campus')->get();

    return view('admin.createEtudiant' , ['admin' => $thisAdmin , 'annee_sections' => $annee_sectionFromDB]);
  }

  public function storeEtudiant(Request $request , $adminId){
    $thisAdmin = Admin::findOrFail($adminId);
    $validatedData = $request->validate([
        'nom' => 'required|string',
        'prenom' => 'required|string',
        'email' => 'required|email|unique:etudiants',
        'telephone' => 'nullable|string',
        'annee_section' => 'required|exists:annee_sections,id'
    ]);

    //cteation
    $etudiant = Etudiant::create([
        'nom' => $validatedData['nom'],
        'prenom' => $validatedData['prenom'],
        'email' => $validatedData['email'],
        'numTele' => $validatedData['telephone'],
        'minutesRetard'=>0,
        'nbrAbsences'=>0, 
        'annee_section_id' => $validatedData['annee_section'],
    ]);
    if(!$etudiant){
        return redirect(route('admin.createEtudiant'))->with("error",'Ajout échouée.')->with('admin', $thisAdmin);
    }

    return redirect(route('admin.etudiants' ,  ['admin' => $thisAdmin]))->with("success",'Ajout réussie.');

  }

  public function showetudiant($adminId , $etudiantId){
    $thisAdmin = Admin::with('filiere.campus')->findOrFail($adminId);
    $thisEtudiant = Etudiant::with('annee_section.filiere.campus' , 'retards.module.prof' , 'absences.module.prof' , 'notes.module')->findOrFail($etudiantId);
    $thisEtudiantRetards = $thisEtudiant->retards;
    $thisEtudiantAbsences = $thisEtudiant->absences;
    $thisEtudiantNotes = $thisEtudiant->notes;
    return view('admin.showEtudiant',['admin'=>$thisAdmin , 'etudiant'=>$thisEtudiant , 'retards'=>$thisEtudiantRetards , 'absences'=>$thisEtudiantAbsences , 'notes'=>$thisEtudiantNotes]);
  }

  public function editEtudiant($adminId,$etudiantId){
    $thisAdmin = Admin::with('filiere.campus')->findOrFail($adminId);
    $thisEtudiant = Etudiant::with('annee_section.filiere.campus')->findOrFail($etudiantId);
    $annee_sectionFromDB = AnneeSection::with('filiere.campus')->get();

    return view('admin.editEtudiant',['admin'=>$thisAdmin , 'etudiant'=>$thisEtudiant, 'annee_sections' => $annee_sectionFromDB]);
  }

  public function updateEtudiant($adminId,$etudiantId){
    $thisAdmin = Admin::with('filiere.campus')->findOrFail($adminId);
    $thisEtudiant = Etudiant::with('annee_section.filiere.campus')->findOrFail($etudiantId);
    $data = [
        'nom' => request()->input('nom'),
        'prenom' => request()->input('prenom'),
        'email' => request()->input('email'),
        'numTele' => request()->input('telephone'), // Assuming 'numTele' is the column name in the database
        'annee_section_id' => request()->input('annee_section'), // Assuming 'annee_section_id' is the column name in the database
    ];
    $thisEtudiant->update($data);

    return to_route('admin.showEtudiant',['admin'=>$thisAdmin , 'etudiant'=>$thisEtudiant]);

  }






  public function profs($adminId){
        
    $thisAdmin = Admin::with('filiere.campus')->findOrFail($adminId);

    $profsFromDB = Prof::with('modules.annee_section.filiere.campus' , 'absences.module')->get();
    return view('admin.profs' , ['admin' => $thisAdmin , 'profs' => $profsFromDB]);
  }  








  public function modules($adminId){
        
    $thisAdmin = Admin::with('filiere.campus')->findOrFail($adminId);

    $modulesFromDB = Module::with('prof' , 'annee_section', 'absences' , 'notes')->get();
    return view('admin.modules' , ['admin' => $thisAdmin , 'modules' => $modulesFromDB]);
  }

  public function createModule($adminId){
    $thisAdmin = Admin::with('filiere.campus')->findOrFail($adminId);
    $annee_sectionFromDB = AnneeSection::with('filiere.campus')->get();
    $profsFromDB = Prof::all();

    return view('admin.createModule' , ['admin' => $thisAdmin , 'annee_sections' => $annee_sectionFromDB, 'profs' => $profsFromDB]);
  }

  public function storeModule(Request $request , $adminId){
    $thisAdmin = Admin::findOrFail($adminId);
    $validatedData = $request->validate([
        'nom' => 'required|string',
        'nbrHeures' => 'required|numeric',
        'prof' => 'required|exists:profs,id',
        'annee_section' => 'required|exists:annee_sections,id'
    ]);

    //cteation
    $module = Module::create([
        'nom' => $validatedData['nom'],
        'nbrHeures' => $validatedData['nbrHeures'],
        'prof_id' => $validatedData['prof'],
        'annee_section_id' => $validatedData['annee_section'],
    ]);
    if(!$module){
        return redirect(route('admin.createModule'))->with("error",'Ajout échouée.')->with('admin', $thisAdmin);
    }

    return redirect(route('admin.modules' ,  ['admin' => $thisAdmin]))->with("success",'Ajout réussie.');

  }

  public function modulesAbsences($adminId , $moduleId){
        
    $thisAdmin = Admin::with('filiere.campus')->findOrFail($adminId);
    $thisModule = Module::with('annee_section.filiere.campus' , 'absences.etudiant' , 'absences.prof')->findOrFail($moduleId);

    $thisModuleAbsences = $thisModule->absences;
    return view('admin.modulesAbsences' , ['admin' => $thisAdmin , 'absences' => $thisModuleAbsences]);
  }
  public function modulesNotes($adminId , $moduleId){
        
    $thisAdmin = Admin::with('filiere.campus')->findOrFail($adminId);
    $thisModule = Module::with('annee_section.filiere.campus' , 'absences.etudiant' , 'absences.prof' , 'notes.etudiant' , 'notes.module')->findOrFail($moduleId);

    $thisModuleNotes = $thisModule->notes;
    return view('admin.modulesNotes' , ['admin' => $thisAdmin , 'notes' => $thisModuleNotes]);
  }









  public function calendars($adminId){
        
    $thisAdmin = Admin::with('filiere.campus')->findOrFail($adminId);

    $calendarsFromDB = Calendar::with('annee_section.filiere.campus' , 'days.modules')->get();
    return view('admin.calendars' , ['admin' => $thisAdmin , 'calendars' => $calendarsFromDB]);
  }
  public function createCalendar($adminId){
    $thisAdmin = Admin::with('filiere.campus')->findOrFail($adminId);
    $annee_sectionFromDB = AnneeSection::with('filiere.campus')->get();
    $calendarsFromDB = Calendar::with('annee_section.filiere.campus')->get();

    return view('admin.createCalendar' , ['admin' => $thisAdmin , 'annee_sections' => $annee_sectionFromDB , 'calendars' => $calendarsFromDB]);
  }

  public function storeCalendar(Request $request, $adminId)
{
    $thisAdmin = Admin::findOrFail($adminId);
    $validatedData = $request->validate([
        'annee_section' => 'required|exists:annee_sections,id'
    ]);

    // Create Calendar
    $calendar = Calendar::create([
        'annee_section_id' => $validatedData['annee_section'],
    ]);

    if (!$calendar) {
        return redirect(route('admin.createCalendar'))->with("error", 'Ajout échouée.')->with('admin', $thisAdmin);
    }

    // Create Days for the Calendar
    $daysOfWeek = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
    foreach ($daysOfWeek as $dayOfWeek) {
        Day::create([
            'calendar_id' => $calendar->id,
            'nom' => $dayOfWeek,
        ]);
    }

    return redirect(route('admin.calendars', ['admin' => $thisAdmin]))->with("success", 'Ajout réussie.');
}

public function editCalendarDay($adminId,$calendarId,$dayId){
  $thisAdmin = Admin::with('filiere.campus')->findOrFail($adminId);
  $thisCalendar = Calendar::with('annee_section.filiere.campus')->findOrFail($calendarId);
  $thisDay = Day::with('calendar.annee_section.filiere.campus')->findOrFail($dayId);
  $modulesFromDB = Module::with('annee_section.filiere.campus')->get();

  return view('admin.editCalendarDay',['admin'=>$thisAdmin , 'calendar'=>$thisCalendar, 'day' => $thisDay, 'modules' => $modulesFromDB]);
}

public function updateCalendar($adminId){
  $thisAdmin = Admin::with('filiere.campus')->findOrFail($adminId);
  $dayId = request()->input('day_id');
  $moduleId = request()->input('module');
  $moduleToAddDayTo = Module::findOrFail($moduleId);
  
  $data = [
      'day_id' => $dayId,
  ];
  $moduleToAddDayTo->update($data);


  return to_route('admin.calendars',['admin'=>$thisAdmin]);

}




}