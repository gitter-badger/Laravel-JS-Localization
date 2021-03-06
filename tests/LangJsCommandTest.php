<?php

use Illuminate\Foundation\Application;
use Illuminate\Filesystem\Filesystem as File;

use Mariuzzo\LaravelJsLocalization\Commands\LangJsCommand;
use Mariuzzo\LaravelJsLocalization\Generators\LangJsGenerator;

/**
 * The LangJsCommandTest class.
 *
 * @author Rubens Mariuzzo <rubens@mariuzzo.com>
 */
class LangJsCommandTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test the command.
     */
    public function testCommand()
    {
        $generator = new LangJsGenerator(new File, './tests/fixtures/lang');
        $command = new LangJsCommand($generator);
        $command->setLaravel(new Application);
        $this->runCommand($command, ['target' => './tests/output/lang.js']);
    }

    /**
     * Run the command.
     */
    protected function runCommand($command, $input = [])
    {
        return $command->run(new Symfony\Component\Console\Input\ArrayInput($input), new Symfony\Component\Console\Output\NullOutput);
    }
}
