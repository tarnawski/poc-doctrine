<?php

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\DBAL\Logging\DebugStack;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require __DIR__ . '/../vendor/autoload.php';

$configuration =  Setup::createXMLMetadataConfiguration([__DIR__ . '/../config/doctrine'], true);
$configuration->setSQLLogger($logger = new DebugStack());

$entityManager = EntityManager::create(
    ['url' => 'mysql://admin:secret@mysql:3306/store'],
    $configuration
);

// Fetch associated object
$productRepository = $entityManager->getRepository(Product::class);
$product = $productRepository->find(1);
var_dump(array_column($logger->queries, 'sql'));


// Fetch associated collection
$categoryRepository = $entityManager->getRepository(Category::class);
$category = $categoryRepository->find(1);
$product = $category->getProducts()->count();

var_dump(array_column($logger->queries, 'sql'));
