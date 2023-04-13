<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ConferenceController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): Response
  {
    $props = [
      'conferences' => Conference::all(),
    ];
    return Inertia::render('Conferences/Index', $props);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request): RedirectResponse
  {
    $request->validate([
      'title' => 'required|string|max:255',
      'date' => 'required',
    ]);
    $conference = Conference::create([
      'title' => $request->title,
      'date' => $request->date,
    ]);
    return redirect(route('conferences.index'));
  }
}
