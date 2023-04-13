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
    $props = [
      'singleEvents' => SingleEvent::all(),
    ];
    return Inertia::render('SingleEvents/Index', $props);
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
}
