<?php

namespace SymfonySkillbox\HomeworkBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use SymfonySkillbox\HomeworkBundle\StrategyInterface;

class Configuration implements \Symfony\Component\Config\Definition\ConfigurationInterface
{

    /**
     * @inheritDoc
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('symfony_skillbox_homework');

        $treeBuilder->getRootNode()
            ->children()
            ->booleanNode('enable_archer')->defaultTrue()->end()
            ->end()
            ->children()
            ->booleanNode('enable_solder')->defaultTrue()->end()
            ->end()
            ->children()
            ->enumNode('strategy')->values(['strategy_strength', 'strategy_health'])->isRequired()->end()
        ;

        return $treeBuilder;
    }
}