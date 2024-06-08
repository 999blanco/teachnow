<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class GuestPageController extends Controller
{
    /**
     * Muestra la vista de la página principal
     */
    public function home(){
        return view('guest.home');
    }

    /**
     * Muestra la vista de las asignaturas existentes
     */
    public function subjects(){
        $subjects = Subject::paginate(12);
        return view('guest.subjects', compact('subjects'));
    }

    /**
     * Muestra la vista de la asignatura seleccionada
     */
    public function subject(string $slug){
        $subject = Subject::where('slug', $slug)->firstOrFail();
        $user_region = session('user_region');
        $total_teachers = $subject->teachers()->where('region_id', $user_region->id)->count();
        return view('guest.subject', compact('subject', 'user_region', 'total_teachers'));
    }

    /**
     * Muestra el perfil del profesor seleccionado
     */
    public function teacher(string $slug){
        $teacher = User::where('slug', $slug)->firstOrFail();

        if ($teacher->banned){
            if (!auth()->user() || !auth()->user()->hasRole('Administrator')){
                abort(404);
            }
        }
        return view('guest.teacher', compact('teacher'));
    }

    /**
     * Muestra la vista de conviertete en profesor
     */
    public function becomeATeacher(){
        return view('guest.become-a-teacher');
    }

    /**
     * Muestra la vista de contacto con el soporte
     */
    public function help(){
        return view('guest.help');
    }
}