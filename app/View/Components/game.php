<?php

namespace App\View\Components;

use Illuminate\View\Component;

class game extends Component
{
    public $title;
    public $img;
    public $link;

    public function __construct($title,$img,$link = null)
    {
        $this->title  = $title;
        $this->img  = $img;
        $this->link  = $link;
    }

    public function render()
    {
        return view('components.game');
    }
}
