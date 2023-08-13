<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Answer extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $author,
        public string $content,
        public $id1,
        public $id2,
    ) {}

    public function isYour(){
        return $this->author === 'You';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.answer');
    }
}
