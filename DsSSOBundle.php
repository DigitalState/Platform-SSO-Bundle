<?php

namespace Ds\Bundle\SSOBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Ds\Bundle\SSOBundle\DependencyInjection\Compiler\OAuthUserProviderPass;

/**
 * Class DsSSOBundle
 */
class DsSSOBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new OAuthUserProviderPass);
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'OroSSOBundle';
    }
}
