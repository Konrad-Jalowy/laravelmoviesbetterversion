<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Article extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $author,
        public string $content,
        public string $lead,
        public string $title,
        public int $viewsCount,
        public $publishDate,
    ) {}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.article');
    }
}
