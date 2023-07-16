<?php

namespace App\Twig;
use Symfony\Component\Validator\Constraints\Date;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use function Symfony\Component\String\b;

class AppExtension extends AbstractExtension
{

    public function getFilters()
    {
        return [
           //new TwigFilter('price', [$this, 'formatPrice']),
            new TwigFilter('stars', [$this, 'stars'], ['is_safe' => ['html']]),
            new TwigFilter('dateFR', [$this, 'dateFR'])
        ];
    }

    public function formatPrice($number, $symbol = '€', $decimals = 0, $decPoint = '.', $thousandsSep = ',')
    {
        $price = number_format($number, $decimals,$decPoint,$thousandsSep);
        $price = $price . $symbol;

        return $price;
    }

    public function stars($note)
    {
        $html = '';
        for($i = 0; $i < $note ; $i++)
        {
            $html .= '<i class="bi bi-star-fill"></i>';
        }

        for($i = 0 ; $i < 5 - $note ; $i++)
        {
            $html .= '<i class="bi bi-star"></i>';
        }

        return $html;
    }

    public function dateFR($date)
    {
        $date = new \DateTime();
        return $date->format('d-m-Y');
    }
}