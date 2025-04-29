<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Component;

class InfoBox extends Component
{
    protected string $view = 'forms.components.info-box';

    protected string $name = 'infoBox';

    protected mixed $content = '';
    protected mixed $type = 'info'; // Optionen: info, success, warning, error

    public static function make(string $name = 'infoBox'): static
    {
        $static = app(static::class, ['name' => $name]);
        $static->configure();

        return $static;
    }

    public function content(string|\Closure $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function type(string|\Closure $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getContent(): string
    {
        return $this->evaluate($this->content);
    }

    public function getType(): string
    {
        return $this->evaluate($this->type);
    }
}
