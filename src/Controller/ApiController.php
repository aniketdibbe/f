<?php

namespace App\Controller;

use Pimcore\Model\DataObject;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use \Pimcore\Controller\FrontendController;
use Pimcore\Model\DataObject\Furniture;
use Pimcore\Model\DataObject\Brand;
use Pimcore\Model\DataObject\Objectbrick\Data\Bed;
use Pimcore\Model\DataObject\Objectbrick\Data\Sofas;


class ApiController extends FrontendController
{
     /**
     * @param Request $request
     * @return Response
     */
    /**
     * @Route("/furnitureapi", name="furnitureapi",methods={"GET"})
     */
    public function ApiAction(Request $request)
    {
        
        $Furniture=new DataObject\Furniture\Listing();
        $Furniture->setOrderKey("Category");
        $Furniture->setOrder("asc");
        $outputstr=strtolower($request->get("name"));
        $output1=str_replace(' ', '', $outputstr);
        $Furniture->setObjectTypes([Furniture::OBJECT_TYPE_VARIANT,Furniture::OBJECT_TYPE_OBJECT]);
        //$out1=strtolower($request->get("SKU"));
        foreach($Furniture as $key =>$data)
        {
            //"Category"=>$data->getCategory();
            $Sofas=$data->getCategoriesDetails()->getSofas();
            $Bed=$data->getCategoriesDetails()->getBed();
            $Dinning=$data->getCategoriesDetails()->getDinning();
            //$input=strtolower($Bed->getBedType());
            

            if($Bed!=NULL )
            {
                if($output1=="Bed"){

                $smallOutput[]=array(
                    "BedType"=>$Bed->getBedType(),
                    "Storage"=>$Bed->getStorage(),
                    "Material"=>$Bed->getMaterial(),
                    "Fabric"=>$Bed->getFabric(),
                   "RecommendedMattressSize"=>$Bed->getRecommendedMattressSize(),
                   
                   
                );
            }
            }
            else if($Sofas!=NULL)
            {
                $smallOutput[]=array(
                    "Legs"=>$Sofas->getLegs(),
                    "SeatingCapacity"=>$Sofas->getSeatingCapacity(),
                    "SeatingComfort"=>$Sofas->getSeatingComfort(),
                    "Cusions"=>$Sofas->getCusions(),
                    "Configuration"=>$Sofas->getConfiguration(),
                    "Material"=>$Sofas->getMaterial(),
                    "Fabric"=>$Sofas->getFabric(),
                    

                );
            }
            else if($Dinning!=NULL)
            {
                $smallOutput[]=array(
                    "Seater"=>$Dinning->getSeater(),
                    "SeatingComfort"=>$Dinning->getSeatingComfort(),
                    "Shape"=>$Dinning->getShape(),
                    "Material"=>$Dinning->getMaterial(),
                    "Fabric"=>$Dinning->getFabric(),
                    "Weight"=>$Dinning->getWeight()->getValue()
                )
                ;
            }
            $output[]=array(
                // "value" => $data->getSKU(),
                "Category"=>$data->getCategory(),
                "productName"=>$data->getProductName(),
                "SKU"=>$data->getSKU(),
                "Brand"=>$data->getBrand()[0]->getBrandName(),
                //"ProductMainImage"=>$data->getProductMainImage()->getFullPath(),
                //"Description"=>$data->getDescription()[0]->getProductDescription(),
                // "CountryOfOrigin"=>$data->getDescription()[0]->getCountryOfOrigin(),
                // "Dimension"=>$data->getDimension()[0]->getLength()->getValue(),
                // "Dimension"=>$data->getDimension()[0]->getHeight()->getValue(),
                // "Dimension"=>$data->getDimension()[0]->getWidth()->getValue(),
                  "Color"=>$data->getColor(),
                //  "RelatedImages"=>$data->getRelatedImages()[0]->getFullPath(),
                // "MerchantInfo"=>$data->getManufacturer()[0]->getName(),
                // "MerchantInfo"=>$data->getManufacturer()[0]->getManufacturerId(),
                 //"Seller"=>$data->getSeller()[0]->getName(),
                // "Seller"=>$data->getSeller()[0]->getSellerId(),
       
                "BrickData" => $smallOutput,
              
                //"Data"=>$smallOutput
            );
            $smallOutput=[];
        }
       

        return $this->json(["success" => true, "data" => $output]);
    }
}