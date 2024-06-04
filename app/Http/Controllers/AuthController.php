<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Prof;
use App\Models\Filiere;

class AuthController extends Controller
{






    //register functions
    public function registerIndex(){
        $filieresFromDB = Filiere::all();
        return view('register.index', ['filieres'=>$filieresFromDB]);
       }


    public function registerStore(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|email|unique:admins|unique:profs',
            'password' => 'required|string',
            'filiere' => 'nullable|string', // Optional field
            'userType' => 'required|in:admin,professor',
        ]);

        // Check the selected user type
        if ($validatedData['userType'] === 'admin') {
            // Create an admin
            $admin = Admin::create([
                'nom' => $validatedData['nom'],
                'prenom' => $validatedData['prenom'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password']),
                'filiere_id' => $validatedData['filiere'] // Optional field
            ]);
            if(!$admin){
                return redirect(route('register.index'))->with("error",'Inscription échouée.');
            }

            // Redirect to the desired page
            return redirect(route('bienvenue'))->with("success",'Inscription réussie. Connectez-vous à votre compte.');
        } else {
            // Create a professor
            $prof = Prof::create([
                'nom' => $validatedData['nom'],
                'prenom' => $validatedData['prenom'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password'])
                
            ]);
            if(!$prof){
                return redirect(route('register.index'))->with("error",'Inscription échouée.');
            }

            // Redirect to the desired page
            return redirect(route('bienvenue'))->with("success",'Inscription réussie. Connectez-vous à votre compte.');
        }
    }










    
     //Login functions
    public function logInIndex(){
        return view('login.index');
    }

    public function logingIn(Request $request)
    {
        
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
            'userType' => 'required|in:admin,professor',
        ]);
    
        
        $userType = $validatedData['userType'];
    
        // Check if the user type is admin or professor
        if ($userType === 'admin') {
            // Find the admin by email
            $admin = Admin::where('email', $validatedData['email'])->first();

            // Verify password and authenticate Adminnn
            if ($admin && password_verify($validatedData['password'], $admin->password)) {            
                return to_route('admin.index',$admin->id);
    
            } else {
                return redirect(route('login.index'))->with("error",'Connection échouée.');
            }

        } elseif ($userType === 'professor') {
            // Find the professor by email
            $prof = Prof::where('email', $validatedData['email'])->first();
    
            // Verify password and authenticate Proffff
            if ($prof && password_verify($validatedData['password'], $prof->password)) {
                return to_route('prof.index',$prof->id);
            } else {
                return redirect(route('login.index'))->with("error",'Connexion échouée.');
            }
        }
    }
 






    //logout function
    public function logOut(){
        Auth::logout();

     // Redirect to the desired page after logout
     return redirect()->route('bienvenue');
    }

    

    
}
