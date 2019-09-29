<?php

/**
 * This file is part of node link app.
 *
 * @author Omar Makled <omar.makled@gmail.com>
 */

namespace App\Service\Node;

use App\Contract\NodeServiceInterface;
use GuzzleHttp\Client;

class CloudService implements NodeServiceInterface
{
    /**
     * Client instance.
     *
     * @var \GuzzleHttp\Client
     */
    private $client;

    /**
     * New CloudService Instance.
     *
     * @param \GuzzleHttp\Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * {@inheritdoc}
     */
    public function add(array $data): array
    {
        $response = $this->client->post('nodes.json', [
            'json' => $data,
        ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * {@inheritdoc}
     */
    public function all(): ?array
    {
        $response = $this->client->get('nodes.json');

        return json_decode($response->getBody(), true);
    }

    /**
     * {@inheritdoc}
     */
    public function delete(string $id): ?array
    {
        $response = $this->client->delete("nodes/${id}.json");

        return json_decode($response->getBody(), true);
    }

    /**
     * {@inheritdoc}
     */
    public function update(string $id, array $data): array
    {
        $response = $this->client->put("nodes/${id}.json", [
            'json' => $data,
        ]);

        return json_decode($response->getBody(), true);
    }
}
