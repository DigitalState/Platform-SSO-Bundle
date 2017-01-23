<?php

namespace Ds\Bundle\SSOBundle\Event\SSO\User;

use Symfony\Component\EventDispatcher\Event;
use Oro\Bundle\UserBundle\Entity\User;
use HWI\Bundle\OAuthBundle\OAuth\ResourceOwnerInterface;

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
     * @var \HWI\Bundle\OAuthBundle\OAuth\ResourceOwnerInterface
     */
    protected $resourceOwner; # region accessors

    /**
     * Get resource owner
     *
     * @return \HWI\Bundle\OAuthBundle\OAuth\ResourceOwnerInterface
     */
    public function getResourceOwner()
    {
        return $this->resourceOwner;
    }

    # endregion

    /**
     * Constructor
     *
     * @param \Oro\Bundle\UserBundle\Entity\User $user
     * @param \HWI\Bundle\OAuthBundle\OAuth\ResourceOwnerInterface $resourceOwner
     */
    public function __construct(User $user, ResourceOwnerInterface $resourceOwner)
    {
        $this->user = $user;
        $this->resourceOwner = $resourceOwner;
    }
}
