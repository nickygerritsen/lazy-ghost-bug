<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\Routing\Annotation\Route;

class BugController extends AbstractController
{
    #[Route('/', name: 'bug')]
    public function index(): Response
    {
        $p    = PropertyAccess::createPropertyAccessor();
        $item = new \Proxies\__CG__\App\Entity\Item();
        $item->setName('test');
        dump($item);
        dump($p->isReadable($item, 'name')); // <-- Works
        dump($p->isReadable($item, 'missing')); // <-- Gives a notice

        return $this->render('base.html.twig');
    }
}
