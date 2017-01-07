<?php

namespace Ds\Bundle\SSOBundle\Security\Core\User;

use Oro\Bundle\UserBundle\Entity\UserManager;
use Oro\Bundle\ConfigBundle\Config\ConfigManager;
use Ds\Bundle\SSOBundle\Collection\OAuthUserProviderCollection;
use HWI\Bundle\OAuthBundle\OAuth\Response\UserResponseInterface;
use LogicException;

/**
 * Class OAuthUserProvider
 */
class OAuthUserProvider extends AbstractOAuthUserProvider
{
    /**
     * @var \Ds\Bundle\SSOBundle\Collection\OAuthUserProviderCollection
     */
    protected $oauthUserProviderCollection;

    /**
     * Constructor
     *
     * @param \Oro\Bundle\UserBundle\Entity\UserManager $userManager
     * @param \Oro\Bundle\ConfigBundle\Config\ConfigManager $configManager
     * @param \Ds\Bundle\SSOBundle\Collection\OAuthUserProviderCollection $oauthUserProviderCollection
     */
    public function __construct(UserManager $userManager, ConfigManager $configManager, OAuthUserProviderCollection $oauthUserProviderCollection)
    {
        parent::__construct($userManager, $configManager);

        $this->oauthUserProviderCollection = $oauthUserProviderCollection;
    }

    /**
     * {@inheritdoc}
     */
    public function loadUserByOAuthUserResponse(UserResponseInterface $response)
    {
        $alias = $response->getResourceOwner()->getName();

        foreach ($this->oauthUserProviderCollection as $item) {
            if ($item['alias'] === $alias) {
                return $item['provider']->loadUserByOAuthUserResponse($response);
            }
        }

        throw new LogicException('Provider does not exist.');
    }
}
