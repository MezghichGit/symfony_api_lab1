<?php

namespace App\DataProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use ApiPlatform\Core\DataProvider\CollectionDataProviderInterface;
use ApiPlatform\Core\DataProvider\ItemDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use App\Entity\Medicament;

class DataProviderMedicament implements CollectionDataProviderInterface, ItemDataProviderInterface, RestrictedDataProviderInterface
{
    private $medicaments;
    public function __construct(string $projectDir)
    {
       
        $this->medicaments = json_decode(file_get_contents($projectDir.'/medicaments.json'));
    }

    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return Medicament::class === $resourceClass;
    }
    public function getCollection(string $resourceClass, string $operationName = null, array $context = [])
    {
        return $this->medicaments;
    }
    public function getItem(string $resourceClass, $code, string $operationName = null, array $context = [])
    {
        if ($code=="12EF") {
            return $this->medicaments[0];
        } elseif ($code == "13EF") {
            return $this->medicaments[1];
        } else if ($code == "14EF") {
            return $this->medicaments[2];
        }
        else return null;
    }
}