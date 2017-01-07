<?php

namespace Ds\Bundle\SSOBundle\Security\Core\User;

use HWI\Bundle\OAuthBundle\Security\Core\User\OAuthAwareUserProviderInterface;
use Oro\Bundle\UserBundle\Entity\UserManager;
use Oro\Bundle\ConfigBundle\Config\ConfigManager;

/**
 * Class AbstractOAuthUserProvider
 */
abstract class AbstractOAuthUserProvider implements OAuthAwareUserProviderInterface
{
    /**
     * @var \Oro\Bundle\UserBundle\Entity\UserManager
     */
    protected $userManager;

    /**
     * @var \Oro\Bundle\ConfigBundle\Config\ConfigManager
     */
    protected $configManager;

    /**
     * Constructor
     *
     * @param \Oro\Bundle\UserBundle\Entity\UserManager $userManager
     * @param \Oro\Bundle\ConfigBundle\Config\ConfigManager $configManager
     */
    public function __construct(UserManager $userManager, ConfigManager $configManager)
    {
        $this->userManager = $userManager;
        $this->configManager = $configManager;
    }
}
