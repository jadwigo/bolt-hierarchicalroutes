<?php

namespace Bolt\Extension\TwoKings\HierarchicalRoutes\Nut;

use Bolt\Nut\BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 *
 */
class BuildHierarchyCommand extends BaseCommand
{
    /**
     *
     */
    protected function configure()
    {
        $this
            ->setName('hierarchy:build')
            ->setDescription('Build the hierarchy structure based on the menu')
        ;
    }

    /**
     *
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $start = microtime(true);

        $this->app['hierarchicalroutes.service']->rebuild();

        $time = microtime(true) - $start;
        $text = sprintf('Build successfully executed in %s seconds.', number_format($time, 2));
        $output->writeln($text);
    }

}
