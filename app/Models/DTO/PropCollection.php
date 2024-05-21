<?php

namespace App\Models\DTO;

use Iterator;

class PropCollection implements Iterator
{
    private int $position = 0;

    /** @var Prop[]  */
    protected array $props = [];

    public function setProp(string $label, string $value): void
    {
        $this->props[] = new Prop(label: $label, value: $value);
    }

    public function toArray(): array
    {
        $res = [];
        foreach ($this->props as $prop) {
            $res[] = [$prop->getLabel(), $prop->getValue()];
        }
        return $res;
    }

    public function current(): ?Prop
    {
        return $this->props[$this->position] ?? null;
    }

    public function next(): void
    {
        ++$this->position;
    }

    public function key(): int
    {
        return $this->position;
    }

    public function valid(): bool
    {
        return isset($this->props[$this->position]);
    }

    public function rewind(): void
    {
        $this->position = 0;
    }
}
