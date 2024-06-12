<?php

namespace App\Http\Controllers;

use App\ViewModels\ActorsViewModel;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;

class ActorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public $page; 

    public function index()
    {

        $page = request()->input('page', 1);

        $response = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/person/popular', [
            'page' => $page,
        ]);
        $popularActors = $response->json()['results'];

        $totalResults = 500;
        $perPage = 20;

        $paginator = new LengthAwarePaginator(
            $popularActors, // Items
            $totalResults,  // Total number of items
            $perPage,       // Items per page
            $page,          // Current page
            ['path' => request()->url(), 'query' => request()->query()] // Additional query string parameters
        );

        return view('actors.index', ['popularActors' => $paginator]);


        // return view('actors.index', compact('popularActors'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $actor = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/person/'.$id)
        ->json();

        $social = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/person/'.$id.'/external_ids')
        ->json();

        $known_for = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/person/'.$id.'/combined_credits')
        ->json();

        $filteredKnownFor = collect($known_for['cast'])->sortByDesc('popularity')->take(5);

        $credits = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/person/'.$id.'/combined_credits')
        ->json();

        $filteredCredits = collect($credits['cast'])->sortByDesc('release_date');

        // dump($known_for);
        
        return view('actors.show', compact('actor', 'social', 'filteredKnownFor', 'filteredCredits'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
