<?php

/**
 * This file is part of node link app.
 *
 * @author Omar Makled <omar.makled@gmail.com>
 */

namespace App\Event;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpFoundation\Response;

class ValidationExceptionListener
{
    /**
     * Hook on validation exception.
     *
     * @param \Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent $event
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        $event->setResponse(
            new JsonResponse(
                json_decode($event->getException()->getMessage()),
                Response::HTTP_UNPROCESSABLE_ENTITY
            )
        );
    }
}
