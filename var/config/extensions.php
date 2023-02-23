<?php

return [
    "bundle" => [
        "Pimcore\\Bundle\\DataHubBundle\\PimcoreDataHubBundle" => [
            "enabled" => TRUE,
            "priority" => 13,
            "environments" => [

            ]
        ],
        "Pimcore\\Bundle\\DataImporterBundle\\PimcoreDataImporterBundle" => TRUE,
        "Pimcore\\Bundle\\EcommerceFrameworkBundle\\PimcoreEcommerceFrameworkBundle" => TRUE
    ]
];
