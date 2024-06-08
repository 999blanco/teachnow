<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TeacherPageController extends Controller
{
    /**
     * Gestiona la redirección de los usuarios autenticados a sus respectivas páginas
     */
    public function auth()
    {
       $user = User::findOrFail(auth()->user()->id);
        // Redirect users based on their role
        if ($user->hasRole('Administrator')) {
            return redirect()->route('admin.dashboard');
        } elseif ($user->hasRole('Teacher')) {
            return redirect()->route('teacher', $user->slug);
        }
    }

    /**
     * Muestra la vista de seguridad de cuenta del profesor
     */
    public function security()
    {
        return view('teacher.security');
    }
}
