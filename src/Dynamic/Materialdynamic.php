<?php



namespace App\Dynamic;

//use Pimcore\Model\Asset\MetaData\ClassDefinition\Data\DataObject;
use Pimcore\Model\DataObject\ClassDefinition\DynamicOptionsProvider\SelectOptionsProviderInterface;
use Pimcore\Model\DataObject;


/**

* Need to provide App\DyanmicDropdown\CustomOptions in options provider class

*/

class Materialdynamic implements SelectOptionsProviderInterface

{

    public function getDefaultValue($context, $fieldDefinition)

    {

        return "db_value_1";

    }



    function getOptions($context, $fieldDefinition)

    {

        // return [

        //     ["value" => "db_value_1", "key" => "Cane"],

        //     ["value" => "db_value_2", "key" => "Engineered wood"],
        //     ["value" => "db_value_3", "key" => "Solid Wood"],

        //     ["value" => "db_value_4", "key" => "Metal"],
        //     ["value" => "db_value_5", "key" => "Glass"],
        //     ["value" => "db_value_6", "key" => "MDF With Venor"],
        // ];
        $items=new DataObject\Material\Listing();
        $items->setOrderKey("Rand()",false);
        $arr=[];
        foreach($items as $item){
            
            array_push($arr, ["value"=>$item->getMaterialName(),"key"=>$item->getMaterialName()]);
            }
            return $arr;
            }
            function hasStaticOptions($context, $fieldDefinition)
            {
            return true;
            }
        }
            
            