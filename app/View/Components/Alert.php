<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    // mapping types to colors
    const TYPE_SUCCESS = 'green';
    const TYPE_ERROR = 'red';
    const TYPE_WARNING = 'yellow';


    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $type = self::TYPE_WARNING,
        public string $message = "Default message",

    ) {
        if (!in_array($this->type, [self::TYPE_SUCCESS, self::TYPE_ERROR, self::TYPE_WARNING])) {
            throw new \Exception('Invalid alert type');
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert');
    }
}
