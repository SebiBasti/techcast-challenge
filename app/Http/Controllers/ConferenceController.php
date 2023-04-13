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
    return Inertia::render('conferences/index', [
      //
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
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

  /**
   * Display the specified resource.
   */
  public function show(conference $conference)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(conference $conference)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, conference $conference)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(conference $conference)
  {
    //
  }
}
