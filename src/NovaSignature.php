<?php

namespace Lab404\NovaSignature;

use Laravel\Nova\Fields\Field;

class NovaSignature extends Field
{
    public $component = 'nova-signature';

    public function color(string $color): self
    {
        return $this->withMeta(['color' => $color]);
    }

    public function bgColor(string $color): self
    {
        return $this->withMeta(['bgColor' => $color]);
    }

    public function height(string $height): self
    {
        return $this->withMeta(['height' => $height]);
    }

    public function width(string $width): self
    {
        return $this->withMeta(['width' => $width]);
    }

    public function validSignature(): self
    {
        $this->rules([
            'nullable',
            'signature'
        ]);

        return $this;
    }
	
	public function saveOnChanges(): self
	{
		return $this->withMeta(['saveOnChanges' => true]);
    }
}
