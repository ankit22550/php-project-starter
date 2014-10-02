<?php

namespace Cpliakas\PhpProjectStarter\Console;

use Herrera\Phar\Update\Manager;
use Herrera\Phar\Update\Manifest;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @see https://github.com/cpliakas/manifest-publisher
 */
class SelfUpdateCommand extends Command
{
    const MANIFEST_FILE = 'http://cpliakas.github.io/php-project-starter/manifest.json';

    protected function configure()
    {
        $this
            ->setName('self-update')
            ->setDescription('Update PHP Project Starter to the latest stable version')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $manager = new Manager(Manifest::loadFile(self::MANIFEST_FILE));
        $manager->update($this->getApplication()->getVersion(), true);
    }
}
