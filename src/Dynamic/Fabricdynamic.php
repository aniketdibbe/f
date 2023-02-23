<?php



namespace App\Dynamic;



use Pimcore\Model\DataObject\ClassDefinition\DynamicOptionsProvider\SelectOptionsProviderInterface;
use Pimcore\Model\DataObject;



/**

* Need to provide App\DyanmicDropdown\CustomOptions in options provider class

*/

class Fabricdynamic implements SelectOptionsProviderInterface

{

    public function getDefaultValue($context, $fieldDefinition)

    {

        return "db_value_1";

    }



    function getOptions($context, $fieldDefinition)

    {

        // return [

        //     ["value" => "db_value_1", "key" => "Cotton"],

        //     ["value" => "db_value_2", "key" => "Velvet"],
        //     ["value" => "db_value_3", "key" => "Leather"],

        //     ["value" => "db_value_4", "key" => "Suede"],
        //     // ["value" => "db_value_5", "key" => ""],
        //     // ["value" => "db_value_6", "key" => "MDF With Venor"],
        // ];
        $items=new DataObject\Fabric\Listing();
        $items->setOrderKey("Rand()",false);
        $arr=[];
        foreach($items as $item){
            
            array_push($arr, ["value"=>$item->getFabricName(),"key"=>$item->getFabricName()]);
            }
            return $arr;
            }
            function hasStaticOptions($context, $fieldDefinition)
            {
            return true;
            }
        }
            