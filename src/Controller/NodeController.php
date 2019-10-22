<?php

/**
 * This file is part of node link app.
 *
 * @author Omar Makled <omar.makled@gmail.com>
 */

namespace App\Controller;

use App\Contract\NodeServiceInterface;
use App\Controller\BaseController;
use App\Service\ValidationService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints as Assert;

class NodeController extends BaseController
{
    /**
     * Node service instance.
     *
     * @var \App\Contract\NodeServiceInterface
     */
    private $nodeService;

    /**
     * NodeController instance.
     *
     * @param \App\Contract\NodeServiceInterface $nodeService
     */
    public function __construct(NodeServiceInterface $nodeService)
    {
        $this->nodeService = $nodeService;
    }

    /**
     * Get all nodes
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function all()
    {
        return new JsonResponse(
            $this->nodeService->all(),
            Response::HTTP_OK
        );
    }

    /**
     * Add new node.
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \App\Service\ValidationService $validator
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function add(Request $request, ValidationService $validator)
    {
        $this->validate($request, $validator);

        return new JsonResponse(
            $this->nodeService->add([
                'name' => $request->request->get('name'),
                'neighborhoods' => $request->request->get('neighborhoods'),
                'meta' => $request->request->get('meta'),
            ]),
            Response::HTTP_CREATED
        );
    }

    /**
     * Update node.
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param string $id
     * @param \App\Service\ValidationService $validator
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function update(Request $request, string $id, ValidationService $validator)
    {
        $this->validate($request, $validator);

        return new JsonResponse(
            $this->nodeService->update($id, [
                'name' => $request->request->get('name'),
                'neighborhoods' => $request->request->get('neighborhoods'),
                'meta' => $request->request->get('meta'),
            ], Response::HTTP_ACCEPTED)
        );
    }

    /**
     * Delete node.
     *
     * @param string $id
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function delete(string $id)
    {
        return new JsonResponse(
            $this->nodeService->delete($id),
            Response::HTTP_OK
        );
    }

    /**
     * Validate a comming request
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \App\Service\ValidationService $validator
     * @return void||\App\Event\ValidationExceptionListener
     */
    private function validate(Request $request, ValidationService $validator)
    {
        $validator->validate([
            'name' => $request->request->get('name', ''),
        ], new Assert\Collection([
            'name' => new Assert\NotBlank(),
        ]));
    }
}
