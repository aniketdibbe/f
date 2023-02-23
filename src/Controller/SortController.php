<?php

namespace App\Controller;

use Pimcore\Model\DataObject;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use \Pimcore\Controller\FrontendController;
use Pimcore\Model\DataObject\Furniture;


class SortController extends FrontendController
{
    // code for Bed
     /**
     * @param Request $request
     * @return Response
     */
    /**
     * @Route("/sort")
     */
    public function sortAction(Request $request)
    {
        // do some authorization here ...
        $output=strtolower($request->get("category"));
        $output1=str_replace(' ', '', $output);

        $data=new DataObject\Furniture\Listing();

        //$data->setObjectTypes([Furniture::OBJECT_TYPE_VARIANT,Furniture::OBJECT_TYPE_OBJECT]);
       
        $names=['bed','sofas','dinning','sidetable'];
        foreach($names as $name){
            if($output1==$name){
                $data->setOrderKey("RAND()",false);
                $result=[];
        
                foreach ($data as $item) {
                   // if($item->getCategoriesDetails()&& $item->getCategoriesDetails()->getBed())
                   if($output1=="bed")
                    {
                        $Bed=$item->getCategoriesDetails()->getBed();
                       // $input=strtolower($Bed->getFabric());
        
        
                        //$Bed=$item->getCategoriesDetails()->getBed();
                        if($Bed !=NULL )
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
                            //"OfferPrice"=>$item->getOfferPrice(),
                            "Manufacturer"=>$item->getManufacturer()[0]->getName(),
                            "Marketer"=>$item->getMarketer()[0]->getMarketedBy(),
                            "Seller"=>$item->getSeller()[0]->getSellerId(),
                            );
                        }
                    }
                    //code for sofas
                    //elseif ($item->getCategoriesDetails()&& $item->getCategoriesDetails()->getSofas())
                    elseif($output1=="sofas")
                    {
                        $sofa=$item->getCategoriesDetails()->getSofas();
                       // $input=strtolower($sofa->getMaterial());
        
        
                        //$Bed=$item->getCategoriesDetails()->getBed();
                        if($sofa != NULL)
                        {
                            $result[]=array(
                        
                        
                        
                            "Legs"=>$sofa->getLegs(),
                            "SeatingCapacity"=>$sofa->getSeatingCapacity(),
                            "Cusions"=>$sofa->getCusions(),
                            "Fabric"=>$sofa->getFabric(),
                            "Density"=>$sofa->getDensity(),
                            "SeatingComfort"=>$sofa->getSeatingComfort(),
                            //"Weight"=>$sofa->getWeight(),
                            //"SeatingHeight"=>$sofa->getSettingHeight(),
                            "ProductName"=>$item->getProductName(),
                            "SKU"=>$item->getSKU(),
                            
                            //"MainImage"=>$item->getProductMainImage()->getFullPath(),
                            "Brand-Relation"=>$item->getBrand()[0]->getBrandName(),
                            
                            
                            "Color"=>$item->getColor(),
                            "OfferPrice"=>$item->getOfferPrice(),
                           
                            
        
                            );
                        }
                    }
                //     //code for dinning
                    //elseif($item->getCategoriesDetails()&& $item->getCategoriesDetails()->getDinning())
                    elseif($output1=="dinning")
                    {
                        $dinning=$item->getCategoriesDetails()->getDinning();
                       // $input=strtolower($dinning->getShape());
        
        
                        //$Bed=$item->getCategoriesDetails()->getBed();
                        if($dinning!=NULL)
                        {
                            $result[]=array(
                        
                        
                        
                            "Seater"=>$dinning->getSeater(),
                            "SeatingComfort"=>$dinning->getSeatingComfort(),
                            "Shape"=>$dinning->getShape(),
                            "Fabric"=>$dinning->getFabric(),
                            "Material"=>$dinning->getMaterial(),
                            //"Weight"=>$dinning->getWeight()->getValue(),
                            "ProductName"=>$item->getProductName(),
                            "SKU"=>$item->getSKU(),
                            "MainImage"=>$item->getProductMainImage()->getFullPath(),
                            "Brand-Relation"=>$item->getBrand()[0]->getBrandName(),
                            "Manufacturer"=>$item->getManufacturer()[0]->getName(),
                            "Marketer"=>$item->getMarketer()[0]->getMarketedBy(),
                            "Seller"=>$item->getSeller()[0]->getSellerId(),
                            "Brand-Relation"=>$item->getBrand()[0]->getBrandName(),
                            "Description"=>$item->getDescription()[0]->getProductDescription(),
                            "Dimension"=>$item->getDimension()[0]->getLength()->getValue(),   
                            "Dimension"=>$item->getDimension()[0]->getWidth()->getValue(),   
                            "Dimension"=>$item->getDimension()[0]->getHeight()->getValue(), 
                            
                            "Color"=>$item->getColor(),
                            "OfferPrice"=>$item->getOfferPrice(),
                           
                            
        
                            );
                        }
                    }
                //     //code for bedsidetable
                //     elseif($item->getCategoriesDetails()&& $item->getCategoriesDetails()->getBedsideTable())
                elseif($output1=="bedsidetable")
                    {
                        $sidetable=$item->getCategoriesDetails()->getBedsideTable();
                       // $input=strtolower($sidetable->getMaterial());
        
        
                        //$Bed=$item->getCategoriesDetails()->getBed();
                        if($sidetable!=NULL)
                        {
                            $result[]=array(
                        
                        
                        
                            "Legs"=>$sidetable->getLegs(),
                            "DrawerNumber"=>$sidetable->getDrawerNumber(),
                            "Shelf"=>$sidetable->getNumberOfExtraShelf(),
                            "Fabric"=>$sidetable->getFabric(),
                            "Material"=>$sidetable->getMaterial(),
                            //"Weight"=>$sidetable->getWeight(),
                            "ProductName"=>$item->getProductName(),
                            "SKU"=>$item->getSKU(),
                            "MainImage"=>$item->getProductMainImage()->getFullPath(),
                            "Brand-Relation"=>$item->getBrand()[0]->getBrandName(),
                            "Brand-Relation"=>$item->getBrand()[0]->getBrandName(),
                            "Manufacturer"=>$item->getManufacturer()[0]->getName(),
                            "Marketer"=>$item->getMarketer()[0]->getMarketedBy(),
                            "Seller"=>$item->getSeller()[0]->getSellerId(),
                            
                            "Color"=>$item->getColor(),
                            "OfferPrice"=>$item->getOfferPrice(),
                           
                            
        
                            );
                        }
                    }
                    elseif($output1=="coffeetable")
                    {
                        $coffeetable=$item->getCategoriesDetails()->getCoffeeAndSideTables();
                       // $input=strtolower($sidetable->getMaterial());
        
        
                        //$Bed=$item->getCategoriesDetails()->getBed();
                        if($coffeetable!=NULL)
                        {
                            $result[]=array(
                        
                        
                        
                            "Legs"=>$coffeetable->getLegs(),
                            "shape"=>$coffeetable->getShape(),
                            "TableType"=>$coffeetable->getTableType(),
                            "Fabric"=>$coffeetable->getFabric(),
                            "Material"=>$coffeetable->getMaterial(),
                           // "Weight"=>$coffeetable->getWeight(),
                            "ProductName"=>$item->getProductName(),
                            "SKU"=>$item->getSKU(),
                            "MainImage"=>$item->getProductMainImage()->getFullPath(),
                            "Brand-Relation"=>$item->getBrand()[0]->getBrandName(),
                            "Brand-Relation"=>$item->getBrand()[0]->getBrandName(),
                            "Manufacturer"=>$item->getManufacturer()[0]->getName(),
                            "Marketer"=>$item->getMarketer()[0]->getMarketedBy(),
                            "Seller"=>$item->getSeller()[0]->getSellerId(),
                            
                            "Color"=>$item->getColor(),
                            "OfferPrice"=>$item->getOfferPrice(),
                           
                            
        
                            );
                        }
                    }
        
                   
                }
                   
                   
                // }
        
                return $this->json(["success" => true, "data" => $result]);
            }

            }
            return $this->json(["not a category,Please enter valid category."]);
        }
        //$blogs = new DataObject\Furniture\Listing();
       






      

}