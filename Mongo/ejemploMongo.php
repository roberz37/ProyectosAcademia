<?php

include_once "./vendor/autoload.php";

$conn = new MongoDB\Client("mongodb://localhost");

$collection = $conn->rober->usuarios;

$insertOneResult = $collection->insertOne(['sobrenombre' => 'Sesamo']);

$updateResult = $collection->updateOne(
    ['sobrenombre' => 'Sesamo'],
    ['$set' => ['sobrenombre' => 'Alejo']]
);

printf("Matched %d document(s)\n", $updateResult->getMatchedCount());
printf("Modified %d document(s)\n", $updateResult->getModifiedCount());

// $deleteResult = $collection->deleteOne(['nombre' => 'Alejo']);

// printf("Deleted %d document(s)\n", $deleteResult->getDeletedCount());