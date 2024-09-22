<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class messageBAnner extends Component
{
    public $msg;
    public $class;
    public function __construct($msg, $class)
    {
        $this->msg = $msg;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.message-b-anner');
    }
}
