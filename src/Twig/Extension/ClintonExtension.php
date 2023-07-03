<?php

namespace App\Twig\Extension;

use App\Twig\Runtime\ClintonRuntime;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class ClintonExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/3.x/advanced.html#automatic-escaping
            new TwigFilter('filter_name', [ClintonRuntime::class, 'doSomething']),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('pluriel', [ClintonRuntime::class, 'doSomething']),
        ];
    }
    public function doSomething(int $count, string $valeur1, ?string $valeur2 = null)
    {
        $valeur2 ??= $valeur1 . 's';
        $result = $count === 1 ? $valeur1 : $valeur2;
        return "$count $result";
    }
}
