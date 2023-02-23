<?php 

namespace App\EventListener;

use App\Controller\NotificationController;
use Pimcore\Model\Notification\Service\NotificationService;
use Pimcore\Model\Notification\Service;	
use Pimcore\Model\DataObject\Category;
use Pimcore\Model\DataObject\OrderDetails;
use Pimcore\Model\DataObject\Brand;
use Pimcore\Model\DataObject\Furniture;

class Validate
{
    public function beforeUpdate(\Pimcore\Event\Model\DataObjectEvent $event)
    {
        $object = $event->getObject();
        if ($object instanceof OrderDetails) {
            if ($object->getOrderDate() > $object->getDeliveryDate()) {
                throw new \Exception("Order Date cannot be GREATER than Delivery Date.");
            }
        }
    }

    public function notificationListener(\Pimcore\Event\Model\DataObjectEvent $event)
    {
        $object = $event->getObject();
        if ($object instanceof Brand|| $object instanceof Furniture ||$object instanceof Category || $object instanceof Manufacturer || $object instanceof Material || $object instanceof Seller || $object instanceof Description || $object instanceof Dimensions || $object instanceof Fabric || $object instanceof Marketing || $object instanceof Media || $object instanceof OrderDetails ||$object instanceof Seller)
	{
	$obj = new NotificationController;
	 $className = $object->getclassName();
     $objectName = $object->getKey();
    $userService = new Service\UserService; 
    $notificationService = new NotificationService($userService);
     $obj->sendNotification($notificationService, $className, $objectName);
 }


    }
}