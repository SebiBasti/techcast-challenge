<?php

namespace App\Http\Controllers;

use App\Models\Presentation;
use App\Models\Conference;
use App\Models\Single_event;
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
      'single_events' => Single_event::all(),
      'conferences' => Conference::all(),
    ];
    return Inertia::render('Presentation/Index', $props);
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
      'presentable_type' => 'required|in:conference,single_event',
      'presentable_id' =>
        'required|exists:' .
        ($request->input('presentable_type') == 'conference'
          ? Conference::class
          : Single_event::class) .
        ',id',
    ]);
    $presentation = Presentation::create($validated);
    $presentable =
      $validated['presentable_type'] == 'Conferences'
        ? Conference::find(intval($validated['presentable_id']))
        : Single_event::find(intval($validated['presentable_id']));
    dd($presentation, $presentable);
    $presentation->presentable()->associate($presentable);
    $presentation->save();

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
