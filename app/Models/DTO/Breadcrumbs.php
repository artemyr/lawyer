<?php

namespace App\Models\DTO;

class Breadcrumbs
{
    private array $breadcrumbs;

    public function __construct()
    {
        $this->add('/', 'Главная');
    }

    public function add(string $link, string $title): Breadcrumbs
    {
        $this->breadcrumbs[] = new Breadcrumb(
            link: $link,
            title: $title
        );

        return $this;
    }

    public function get(): array
    {
        return $this->breadcrumbs;
    }

    public function count(): int
    {
        return count($this->breadcrumbs);
    }
}
