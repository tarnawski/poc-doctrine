<?php

use App\Entity\Product;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManager::create(
    ['url' => 'mysql://admin:secret@mysql:3306/store'],
    Setup::createXMLMetadataConfiguration([__DIR__ . '/../config/doctrine'], true)
);

$productRepository = $entityManager->getRepository(Product::class);
$product = $productRepository->find(1);

var_dump(get_class($product));
var_dump(get_class($product->getCategory()));
