<?php

namespace Ds\Bundle\SSOBundle\Event\SSO\User;

use Symfony\Component\EventDispatcher\Event;
use Oro\Bundle\UserBundle\Entity\User;

/**
 * Class CreatedEvent
 */
class CreatedEvent extends Event
{
    /**
     * @const string
     */
    const NAME = 'ds.event.sso.user.created';

    /**
     * @var \Oro\Bundle\UserBundle\Entity\User
     */
    protected $user; # region accessors

    /**
     * Get user
     *
     * @return \Oro\Bundle\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    # endregion

    /**
     * Constructor
     *
     * @param \Oro\Bundle\UserBundle\Entity\User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
