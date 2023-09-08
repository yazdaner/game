<?php

namespace App\View\Components;

use Illuminate\View\Component;

class fileHome extends Component
{
    public $name;
    public $label;
    public $value;

    public function __construct($name,$label,$value = null)
    {
        $this->name  = $name;
        $this->label  = $label;
        $this->value  = $value;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.file-home');
    }
}
