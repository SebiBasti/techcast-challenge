<?php

namespace App\Http\Controllers;

use App\Models\SingleEvent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class SingleEventController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): Response
  {
    return Inertia::render('singleEvents/index', [
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
    $single_event = SingleEvent::create([
      'title' => $request->title,
      'date' => $request->date,
    ]);
    return redirect(route('single-events.index'));
  }

  /**
   * Display the specified resource.
   */
  public function show(single_event $single_event)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(single_event $single_event)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, single_event $single_event)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(single_event $single_event)
  {
    //
  }
}
