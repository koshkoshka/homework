<?php

namespace SymfonySkillbox\HomeworkBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use SymfonySkillbox\HomeworkBundle\HealthStrategy;

class SymfonySkillboxHomeworkExtension extends \Symfony\Component\DependencyInjection\Extension\Extension
{

    /**
     * @inheritDoc
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__.'/../../config')
        );
        $loader->load('services.yaml');
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        $container->setParameter('symfony_skillbox_homework.unit_factory.enable_solder', $config['enable_solder'] ?? true);
        $container->setParameter('symfony_skillbox_homework.unit_factory.enable_archer', $config['enable_archer'] ?? true);
        $class = $container->getDefinition('symfony_skillbox_homework.'.$config['strategy'])->getClass();
        $container->getDefinition('symfony_skillbox_homework.strategy')->setClass($class);
    }
}