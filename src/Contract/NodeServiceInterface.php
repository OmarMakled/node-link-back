<?php

/**
 * This file is part of node link app.
 *
 * @author Omar Makled <omar.makled@gmail.com>
 */

namespace App\Contract;

interface NodeServiceInterface
{
    /**
     * Add new node
     *
     * @param array $data
     * @return array
     */
    public function add(array $data): array;

    /**
     * Get all nodes.
     *
     * @return null||array
     */
    public function all(): ?array;

    /**
     * Delete node.
     *
     * @param string $id
     * @return null||array
     */
    public function delete(string $id): ?array;

    /**
     * Update node.
     *
     * @param string $id
     * @param array $data
     * @return array
     */
    public function update(string $id, array $data): array;
}
