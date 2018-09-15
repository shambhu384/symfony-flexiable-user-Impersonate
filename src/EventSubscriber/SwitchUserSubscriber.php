<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Http\Event\SwitchUserEvent;

class SwitchUserSubscriber implements EventSubscriberInterface
{
    public function onSecuritySwitchUser(SwitchUserEvent $event)
    {
        $request = $event->getRequest();
        // nothing to do with this request
    }

    public static function getSubscribedEvents()
    {
        return [
           'security.switch_user' => 'onSecuritySwitchUser',
        ];
    }
}
