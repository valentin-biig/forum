<?php

namespace Valouleloup\IssueBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode    = $treeBuilder->root('valouleloup_issue');

        $rootNode
            ->children()
                ->arrayNode('mattermost')
                    ->children()
                        ->scalarNode('webhook')->end()
                    ->end()
                ->end()
                ->arrayNode('elastic')
                    ->children()
                        ->scalarNode('hostname')->end()
                        ->integerNode('port')->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
