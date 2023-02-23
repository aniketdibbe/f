<?php

namespace App\Controller;

use Pimcore\Model\Notification\Service\NotificationService;

Class NotificationController 
{
    public function sendNotification(NotificationService $notificationService,$className,$objectName)
    {
        $notificationService->sendToUser(
            8,
            2,
           // $className.' Object '.$objectName.' created',
           ' object '. $objectName. ' is created of class '.$className,
             'Object successfully created using CSV',

        );
    }
}