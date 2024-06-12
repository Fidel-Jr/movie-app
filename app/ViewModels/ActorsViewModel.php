<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class ActorsViewModel extends ViewModel
{

    public $popularActors;

    public function __construct($popularActors)
    {
        $this->popularActors = $popularActors;
        
    }

    public function popularActors(){

        // return $this->formatMovies($this->popularMovies());

        return collect($this->popularActors())->map(function($actor){
            return collect($actor)->merge([
                'known_for' => collect($actor['known_for'])->pluck('title')->implode(', ')
            ])->only([
                'known_for'
            ])->dump();
        });
    }



}
