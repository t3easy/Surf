<?php

declare(strict_types=1);

/*
 * This file is part of TYPO3 Surf.
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

namespace TYPO3\Surf\Task\Composer;

use TYPO3\Surf\Domain\Model\Application;
use TYPO3\Surf\Domain\Model\Deployment;
use TYPO3\Surf\Domain\Model\Node;

/**
 * Installs the composer packages based on a composer.json file in the projects root folder
 *
 * It takes the following options:
 *
 * * composerCommandPath - The path where composer is located.
 * * nodeName - The name of the node where composer should install the packages.
 * * useApplicationWorkspace (optional) - If true Surf uses the workspace path, else it uses the release path of the application.
 *
 * Example:
 *  $workflow
 *      ->setTaskOptions('TYPO3\Surf\Task\Composer\InstallTask', [
 *              'composerCommandPath' => '/usr/bin/composer',
 *              'nodeName' => 'outerSpace',
 *              'useApplicationWorkspace' => 'true'
 *          ]
 *      );
 */
class GetPackagesTask extends AbstractComposerTask
{
    /**
     * Command to run
     */
    protected string $command = 'show';

    /**
     * Arguments for the command
     */
    protected array $arguments = ['--format=json'];

    protected array $suffix = [];

    public function execute(Node $node, Application $application, Deployment $deployment, array $options = []): void
    {
        parent::execute($node, $application, $deployment, $options);
        $application->setPackages($this->transformComposerOutput());
    }

    private function transformComposerOutput()
    {
        $packages = json_decode($this->output, true);
        $installed = [];
        if ($packages !== null){
            foreach ($packages['installed'] as $package) {
                $installed[$package['name']] = $package['version'];
            }
        }
        return $installed;
    }
}
