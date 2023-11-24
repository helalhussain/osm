<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Message extends Component
{
    /**
     * Create a new component instance.
     */
    public $type;
    public $message;
    public $page = "About Us";

    public function __construct($type,$message,$page)
    {
        $this->type = $type;
        $this->message = $message;
        $this->page = $page;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.message');
    }
}
