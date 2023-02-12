<?php

namespace App\Controller;

use Pimcore\Model\DataObject;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use \Pimcore\Controller\FrontendController;
use Pimcore\Model\DataObject\Furniture;


class ApirouteController extends FrontendController
{
    /**
     * @Route("/custom")
     */
    public function ApirouteAction(Request $request)
    {
        // do some authorization here ...

        $Furniture = new DataObject\Furniture\Listing();

        foreach ($Furniture as $key => $furniture) {
            $data[] = array(
                "title" => $furniture->getCategory(),
               // "description" => $furniture->getText(),
                //"tags" => $furniture->getTags()
            );
        }

        return $this->json(["success" => true, "data" => $data]);
    }
}