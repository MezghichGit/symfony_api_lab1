<?php

namespace App\DataProvider;

use ApiPlatform\Core\DataProvider\CollectionDataProviderInterface;
use ApiPlatform\Core\DataProvider\ItemDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use App\Entity\Patient;

class DataProviderPatient implements CollectionDataProviderInterface, ItemDataProviderInterface, RestrictedDataProviderInterface
{
    private $patients;
    public function __construct()
    {
        $patient1 = new Patient(1, "Mohamed", "Mezghich", 10);
        $patient2 = new Patient(2, "Amine", "Mezghich", 20);
        $patient3 = new Patient(3, "Ali", "Mezghich", 30);
        $patients=[$patient1,$patient2,$patient3];
        $this->patients= $patients;
    }

    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return Patient::class === $resourceClass;
    }
    public function getCollection(string $resourceClass, string $operationName = null, array $context = [])
    {
        return $this->patients;
    }
    public function getItem(string $resourceClass, $id, string $operationName = null, array $context = [])
    {
        if ($id==1) {
            return $this->patients[0];
        } elseif ($id == 2) {
            return $this->patients[1];
        } else if ($id == 3) {
            return $this->patients[2];
        }
        else return null;
    }
}