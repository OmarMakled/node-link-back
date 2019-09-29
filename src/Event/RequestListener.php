<?php

/*
 * This file is part of node link app.
 *
 * @author Omar Makled <omar.makled@aqarmap.com>
 */
namespace App\Event;

use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class RequestListener
{
    /**
     * Hook on kernel request.
     *
     * @param \Symfony\Component\HttpKernel\Event\GetResponseEvent $event
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();
        if ($content = $request->getContent()) {
            $data = json_decode($content, true);
            $request->request = new ParameterBag($data);
        }
    }
}
