<?php

namespace App\Controller;

use Pimcore\Model\DataObject;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use \Pimcore\Controller\FrontendController;
use Pimcore\Model\DataObject\Furniture;


class FilterController extends FrontendController
{
    // code for Bed
     /**
     * @param Request $request
     * @return Response
     */
    /**
     * @Route("/filter")
     */
    public function FilterAction(Request $request)
    {
        // do some authorization here ...
        $output=strtolower($request->get("name"));
        $data=new DataObject\Furniture\Listing();
        //$data->setObjectTypes([Furniture::OBJECT_TYPE_VARIANT,Furniture::OBJECT_TYPE_OBJECT]);
       

        //$blogs = new DataObject\Furniture\Listing();
        $data->setOrderKey("RAND()",false);
        $result=[];

        foreach ($data as $item) {
            if($item->getCategoriesDetails()&& $item->getCategoriesDetails()->getBed())
            {
                $Bed=$item->getCategoriesDetails()->getBed();
                $input=strtolower($Bed->getFabric());


                //$Bed=$item->getCategoriesDetails()->getBed();
                if($output == $input)
                {
                    $result[]=array(
                
                
                
                    "BedType"=>$Bed->getBedType(),
                    "Storage"=>$Bed->getStorage(),
                    "Material"=>$Bed->getMaterial(),
                    "Fabric"=>$Bed->getFabric(),
                    "ProductName"=>$item->getProductName(),
                    "SKU"=>$item->getSKU(),
                    "MainImage"=>$item->getProductMainImage()->getFullPath(),
                    "Brand-Relation"=>$item->getBrand()[0]->getBrandName(),
                    "Description"=>$item->getDescription()[0]->getProductDescription(),
                    "Dimension"=>$item->getDimension()[0]->getLength()->getValue(),   
                    "Dimension"=>$item->getDimension()[0]->getWidth()->getValue(),   
                    "Dimension"=>$item->getDimension()[0]->getHeight()->getValue(), 
                    "Color"=>$item->getColor(),
                    "OfferPrice"=>$item->getOfferPrice(),
                    "Manufacturer"=>$item->getManufacturer()[0]->getName(),
                    "Marketer"=>$item->getMarketer()[0]->getMarketedBy(),
                    "Seller"=>$item->getSeller()[0]->getSellerId(),
                    

                    );
                }
            }
           
        }

        return $this->json(["success" => true, "data" => $result]);
    }


// code for sofa

       /**
     * @Route("/sofa")
     */
    public function SofaAction(Request $request)
    {
        // do some authorization here ...

        $output=strtolower($request->get("name"));
        $output1=str_replace(' ', '', $output);
        $data=new DataObject\Furniture\Listing();
       // $data->setObjectTypes([Furniture::OBJECT_TYPE_VARIANT,Furniture::OBJECT_TYPE_OBJECT]);
       

        //$blogs = new DataObject\Furniture\Listing();
        $data->setOrderKey("RAND()",false);
        $result=[];

        foreach ($data as $item) {
            if($item->getCategoriesDetails()&& $item->getCategoriesDetails()->getSofas())
            {
                $sofa=$item->getCategoriesDetails()->getSofas();
                $input=strtolower($sofa->getMaterial());


                //$Bed=$item->getCategoriesDetails()->getBed();
                if($output1 == $input)
                {
                    $result[]=array(
                
                
                
                    "Legs"=>$sofa->getLegs(),
                    "SeatingCapacity"=>$sofa->getSeatingCapacity(),
                    "Cusions"=>$sofa->getCusions(),
                    "Fabric"=>$sofa->getFabric(),
                    "Density"=>$sofa->getDensity(),
                    "SeatingComfort"=>$sofa->getSeatingComfort(),
                    "Weight"=>$sofa->getWeight(),
                    "SeatingHeight"=>$sofa->getSettingHeight(),
                    "ProductName"=>$item->getProductName(),
                    "SKU"=>$item->getSKU(),
                    //"MainImage"=>$item->getProductMainImage()->getFullPath(),
                    "Brand-Relation"=>$item->getBrand()[0]->getBrandName(),
                    
                    "Color"=>$item->getColor(),
                    "OfferPrice"=>$item->getOfferPrice(),
                   
                    

                    );
                }
            }
           
        }

        return $this->json(["success" => true, "data" => $result]);
    }

    // code for dinning table
     /**
     * @Route("/dinning")
     */
    public function DinningAction(Request $request)
    {
        // do some authorization here ...

        $output=strtolower($request->get("name"));
        $output1=str_replace(' ', '', $output);
        $data=new DataObject\Furniture\Listing();
       // $data->setObjectTypes([Furniture::OBJECT_TYPE_VARIANT,Furniture::OBJECT_TYPE_OBJECT]);
       

        //$blogs = new DataObject\Furniture\Listing();
        $data->setOrderKey("RAND()",false);
        $result=[];

        foreach ($data as $item) {
            if($item->getCategoriesDetails()&& $item->getCategoriesDetails()->getDinning())
            {
                $dinning=$item->getCategoriesDetails()->getDinning();
                $input=strtolower($dinning->getShape());


                //$Bed=$item->getCategoriesDetails()->getBed();
                if($output1 == $input)
                {
                    $result[]=array(
                
                
                
                    "Seater"=>$dinning->getSeater(),
                    "SeatingComfort"=>$dinning->getSeatingComfort(),
                    "Shape"=>$dinning->getShape(),
                    "Fabric"=>$dinning->getFabric(),
                    "Material"=>$dinning->getMaterial(),
                    "Weight"=>$dinning->getWeight()->getValue(),
                    "ProductName"=>$item->getProductName(),
                    "SKU"=>$item->getSKU(),
                    //"MainImage"=>$item->getProductMainImage()->getFullPath(),
                    "Brand-Relation"=>$item->getBrand()[0]->getBrandName(),
                    
                    "Color"=>$item->getColor(),
                    "OfferPrice"=>$item->getOfferPrice(),
                   
                    

                    );
                }
            }
           
        }

        return $this->json(["success" => true, "data" => $result]);
    }


    // code for sidetable
     /**
     * @Route("/sidetable")
     */
    public function sidetableAction(Request $request)
    {
        // do some authorization here ...

        $output=strtolower($request->get("name"));
        $output1=str_replace(' ', '', $output);
        $data=new DataObject\Furniture\Listing();
       // $data->setObjectTypes([Furniture::OBJECT_TYPE_VARIANT,Furniture::OBJECT_TYPE_OBJECT]);
       

        //$blogs = new DataObject\Furniture\Listing();
        $data->setOrderKey("RAND()",false);
        $result=[];

        foreach ($data as $item) {
            if($item->getCategoriesDetails()&& $item->getCategoriesDetails()->getBedsideTable())
            {
                $sidetable=$item->getCategoriesDetails()->getBedsideTable();
                $input=strtolower($sidetable->getMaterial());


                //$Bed=$item->getCategoriesDetails()->getBed();
                if($output1 == $input)
                {
                    $result[]=array(
                
                
                
                    "Legs"=>$sidetable->getLegs(),
                    "DrawerNumber"=>$sidetable->getDrawerNumber(),
                    "Shelf"=>$sidetable->getNumberOfExtraShelf(),
                    "Fabric"=>$sidetable->getFabric(),
                    "Material"=>$sidetable->getMaterial(),
                    "Weight"=>$sidetable->getWeight(),
                    "ProductName"=>$item->getProductName(),
                    "SKU"=>$item->getSKU(),
                    //"MainImage"=>$item->getProductMainImage()->getFullPath(),
                    "Brand-Relation"=>$item->getBrand()[0]->getBrandName(),
                    
                    "Color"=>$item->getColor(),
                    "OfferPrice"=>$item->getOfferPrice(),
                   
                    

                    );
                }
            }
           
        }

        return $this->json(["success" => true, "data" => $result]);
    }


      



      

}