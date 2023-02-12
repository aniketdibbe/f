<?php



namespace App\Dynamic;



use Pimcore\Model\DataObject\ClassDefinition\DynamicOptionsProvider\SelectOptionsProviderInterface;
use Pimcore\Model\DataObject;



/**

* Need to provide App\DyanmicDropdown\CustomOptions in options provider class

*/

class Categorydynamic implements SelectOptionsProviderInterface

{

    public function getDefaultValue($context, $fieldDefinition)

    {

        return "db_value_1";

    }



    function getOptions($context, $fieldDefinition)

    {

        $items=new DataObject\Category\Listing();
        $items->setOrderKey("Rand()",false);
        $arr=[];
        foreach($items as $item){
            
            array_push($arr, ["value"=>$item->getCategory(),"key"=>$item->getCategory()]);
            }
            return $arr;
            }
            function hasStaticOptions($context, $fieldDefinition)
            {
            return true;
            }
        }