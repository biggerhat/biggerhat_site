<?php

namespace App\Http\Livewire;

use App\Models\Question;
use Livewire\Component;

class QuestionPage extends Component
{
    public $query;
    public $results;

    protected $queryString = ['query' => ['except' => '']];

    public function clearQuery()
    {
        $this->query = "";
    }

    public function render()
    {
        $this->results = Question::where('question', 'LIKE', "%{$this->query}%")->orWhere('answer', 'LIKE', "%{$this->query}")->get();
        return view('livewire.question-page')
            ->extends('main')
            ->section('content');
    }
}
