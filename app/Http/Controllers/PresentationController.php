<?php

namespace App\Http\Controllers;

use App\Models\Presentation;
use App\Models\Conference;
use App\Models\SingleEvent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PresentationController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): Response
  {
    $props = [
      'singleEvents' => SingleEvent::all(),
      'conferences' => Conference::all(),
      'presentations' => Presentation::with('presentable')->get(),
    ];
    return Inertia::render('presentation/index', $props);
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
    $validated = $request->validate([
      'title' => 'required|string|max:255',
      'content' => 'required|string',
      'presentable_type' =>
        'required|in:App\Models\Conference,App\Models\SingleEvent',
      'presentable_id' =>
        'required|exists:' .
        ($request->input('presentable_type') == 'App\Models\Conference'
          ? Conference::class
          : SingleEvent::class) .
        ',id',
    ]);
    $presentation = new Presentation($validated);
    $presentable =
      $validated['presentable_type'] == 'App\Models\Conference'
        ? Conference::find(intval($validated['presentable_id']))
        : SingleEvent::find(intval($validated['presentable_id']));
    $presentable->presentations()->save($presentation);

    return redirect(route('presentations.index'));
  }

  /**
   * Display the specified resource.
   */
  public function show(presentation $presentation)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(presentation $presentation)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, presentation $presentation)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(presentation $presentation)
  {
    //
  }
}
