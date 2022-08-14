<?php

namespace App\DataProvider;

use ApiPlatform\Core\DataProvider\CollectionDataProviderInterface;
use ApiPlatform\Core\DataProvider\ItemDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use App\Entity\Post;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class DataProviderPost implements
    CollectionDataProviderInterface,
    ItemDataProviderInterface,
    RestrictedDataProviderInterface
{
    private $posts;
    private $client;
    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
           // à terminer
           $response = $this->client->request(
            'GET',
            'https://jsonplaceholder.typicode.com/posts'
        );
        $this->posts = $response->toArray();
    }
    public function supports(
        string $resourceClass,
        string $operationName = null,
        array $context = []
    ): bool
    {
        return Post::class === $resourceClass;
    }
    public function getCollection(string $resourceClass, string $operationName = null, array $context = [])
    {
        /*
        $response = $this->client->request(
            'GET',
            'https://jsonplaceholder.typicode.com/posts'
        );
        $statusCode = $response->getStatusCode();
        // $statusCode = 200
        $contentType = $response->getHeaders()['content-type'][0];
        // $contentType = 'application/json'
        $content = $response->getContent();
        // $content = '{"id":521583, "name":"symfony-docs", ...}'
        $content = $response->toArray();
        // $content = ['id' => 521583, 'name' => 'symfony-docs', ...]*/

        return $this->posts;
    }
    public function getItem(string $resourceClass, $id, string $operationName =
null, array $context = [])
    {
   
        foreach ($this->posts as $post) {
            if ($post['id']==$id) {
                return $post;
            }
        }
        return null;
    }
}
