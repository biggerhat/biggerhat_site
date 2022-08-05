<?php

namespace App\Http\Livewire;

use App\Models\Question;
use Livewire\Component;

class QuestionPage extends Component
{
    public $query;
    public $results;

    protected $queryString = ['query' => ['except' => '']];

    public function mount()
    {
    }

    public function clearQuery()
    {
        $this->reset();
        return redirect('/faqs');
    }

    public function search()
    {
        if ($this->query) {
            $this->results = Question::where('question', 'LIKE', "%{$this->query}%")->orWhere('answer', 'LIKE', "%{$this->query}%")->get();
        } else {
            $this->results = Question::get();
        }
    }

    public function render()
    {
        $this->search();
        return view('livewire.question-page')
            ->extends('main')
            ->section('content');
    }
}
