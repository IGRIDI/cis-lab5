<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
class LuckyController extends AbstractController
{
    public function number($max)
    {
        $number = random_int(0, $max);

        return $this->json(['number' => $number]);
    }
}