<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminPageController extends Controller
{
    /**
     * Muestra el dashboard del administrador
     */
    public function dashboard()
    {
        $teachers = User::role('teacher')->get();
        $teachersGroupByDay = $teachers->groupBy(function ($date) {
            return Carbon::parse($date->created_at)->format('d M');
        });

        $totalReviews = Review::all()->count();
        if (User::withCount('reviews')->orderBy('reviews_count', 'desc')->first() != null) {
            $userMostReviewed = User::withCount('reviews')->orderBy('reviews_count', 'desc')->first()->name;
        } else {
            $userMostReviewed = "";
        }

        if (Review::orderBy('created_at', 'desc')->first() != null) {
            $latestReview = Review::orderBy('created_at', 'desc')->first()->created_at;
        } else {
            $latestReview = "";
        }

        // Sessions Information
        $totalSessions = DB::table('sessions')->where('last_activity', '>', Carbon::now()->subDay()->timestamp)->count();
        $userSessions = DB::table('sessions')->where('last_activity', '>', Carbon::now()->subDay()->timestamp)->whereNotNull('user_id')->count();
        $nonUserSessions = DB::table('sessions')->where('last_activity', '>', Carbon::now()->subDay()->timestamp)->whereNull('user_id')->count();

        return view('admin.dashboard', compact('teachersGroupByDay', 'totalReviews', 'userMostReviewed', 'latestReview', 'totalSessions', 'userSessions', 'nonUserSessions'));
    }

    /**
     * Muestra la vista de gestion de asignaturas de la administración
     */
    public function subjects()
    {
        return view('admin.subjects');
    }

    /**
     * Muestra la vista de gestion de profesores de la administración
     */
    public function teachers()
    {
        return view('admin.teachers');
    }

    /**
     * Muestra la vista de gestion de valoraciones de la administración
     */
    public function reviews()
    {
        return view('admin.reviews');
    }

    /**
     * Muestra la vista de gestion de regiones de la administración
     */
    public function regions()
    {
        return view('admin.regions');
    }

    /**
     * Muestra la vista de configuracion de cuenta
     */
    public function settings()
    {
        return view('admin.settings');
    }
}
