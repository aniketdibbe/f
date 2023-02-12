<?php
namespace App\Controller;
 
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\ClassDefinition\CalculatorClassInterface;
use Pimcore\Model\DataObject\Data\CalculatedValue;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Pimcore\Controller\FrontendController;
use Pimcore\Model\DataObject\Calculator;
use Pimcore\Model\DataObject\Localizedfield;
use Pimcore\Model\DataObject\Clothes;

class CalculatorController implements CalculatorClassInterface
{
   /**     
    * @param $data      
    * @param $object     
    * @param $params     
    *     
    * @return string     
    */


    /**     
    * @param Request $request     
    * @return Response     
    */


    /**    
    * @Route("/calculate", name="calculate", methods={"GET"})    
    */
    public function compute(Concrete $object, CalculatedValue $context):string {
        if ($context->getFieldname() == "OfferPrice") {
            $language = $context->getPosition();
            $result = $object->getActualPrice($language) *  $object->getOffPercentage($language);
            return $object->getActualPrice($language) - $result;
        } else {
            \Logger::error("unknown field");
        }
    }
    public function getCalculatedValueForEditMode(Concrete $object, CalculatedValue $context): string {
        $language = $context->getPosition();
        $result = $this->compute($object, $context);
        return $result;
    }
} 

