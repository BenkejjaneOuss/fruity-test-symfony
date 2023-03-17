<?php

namespace App\Command;

use App\Service\FruityApiService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'StoreFruitsCommand',
    description: 'Store fruits into database using fruityvice.com api',
)]
class StoreFruitsCommand extends Command
{
    private FruityApiService $fruityApi;

    public function __construct(FruityApiService $fruityApi)
    {
        $this->fruityApi = $fruityApi;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setHelp('Run this command to Store fruits into database from fruityvice.com');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
    
        $fruits = $this->fruityApi->getAllFruits();

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return Command::SUCCESS;
    }
}
