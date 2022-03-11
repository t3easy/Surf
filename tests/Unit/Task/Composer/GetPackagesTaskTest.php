<?php

declare(strict_types=1);

/*
 * This file is part of TYPO3 Surf.
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

namespace TYPO3\Surf\Tests\Unit\Task\Composer;

use TYPO3\Surf\Task\Composer\GetPackagesTask;
use TYPO3\Surf\Tests\Unit\Task\BaseTaskTest;
use ReflectionClass;

/**
 * Unit test for the TagTask
 */
class GetPackagesTaskTest extends BaseTaskTest
{
    protected array $responses = [
        'composer show --format=json' => <<<'EOT'
{
    "installed": [
        {
            "name": "composer/ca-bundle",
            "version": "1.3.1",
            "description": "Lets you find a path to the system CA bundle, and includes a fallback to the Mozilla CA bundle."
        },
        {
            "name": "composer/pcre",
            "version": "1.0.1",
            "description": "PCRE wrapping library that offers type-safe preg_* replacements."
        },
        {
            "name": "composer/semver",
            "version": "3.2.9",
            "description": "Semver library that offers utilities, version constraint parsing and validation."
        },
        {
            "name": "composer/xdebug-handler",
            "version": "3.0.1",
            "description": "Restarts a process without Xdebug."
        },
        {
            "name": "dealerdirect/phpcodesniffer-composer-installer",
            "version": "v0.7.2",
            "description": "PHP_CodeSniffer Standards Composer Installer Plugin"
        },
        {
            "name": "doctrine/annotations",
            "version": "1.13.2",
            "description": "Docblock Annotations Parser"
        },
        {
            "name": "doctrine/instantiator",
            "version": "1.4.1",
            "description": "A small, lightweight utility to instantiate objects in PHP without invoking their constructors"
        },
        {
            "name": "doctrine/lexer",
            "version": "1.2.2",
            "description": "PHP Doctrine Lexer parser library that can be used in Top-Down, Recursive Descent Parsers."
        },
        {
            "name": "friendsofphp/php-cs-fixer",
            "version": "v3.6.0",
            "description": "A tool to automatically fix PHP code style"
        },
        {
            "name": "guzzlehttp/guzzle",
            "version": "7.4.1",
            "description": "Guzzle is a PHP HTTP client library"
        },
        {
            "name": "guzzlehttp/promises",
            "version": "1.5.1",
            "description": "Guzzle promises library"
        },
        {
            "name": "guzzlehttp/psr7",
            "version": "2.1.0",
            "description": "PSR-7 message implementation that also provides common utility methods"
        },
        {
            "name": "jangregor/phpstan-prophecy",
            "version": "1.0.0",
            "description": "Provides a phpstan/phpstan extension for phpspec/prophecy"
        },
        {
            "name": "monolog/monolog",
            "version": "1.26.1",
            "description": "Sends your logs to files, sockets, inboxes, databases and various web services"
        },
        {
            "name": "myclabs/deep-copy",
            "version": "1.11.0",
            "description": "Create deep copies (clones) of your objects"
        },
        {
            "name": "myclabs/php-enum",
            "version": "1.8.3",
            "description": "PHP Enum implementation"
        },
        {
            "name": "neos/utility-files",
            "version": "3.3.29",
            "description": "Flow Files Utilities"
        },
        {
            "name": "padraic/humbug_get_contents",
            "version": "1.1.2",
            "description": "Secure wrapper for accessing HTTPS resources with file_get_contents for PHP 5.3+"
        },
        {
            "name": "padraic/phar-updater",
            "version": "v1.0.6",
            "description": "A thing to make PHAR self-updating easy and secure."
        },
        {
            "name": "phar-io/manifest",
            "version": "2.0.3",
            "description": "Component for reading phar.io manifest information from a PHP Archive (PHAR)"
        },
        {
            "name": "phar-io/version",
            "version": "3.2.1",
            "description": "Library for handling version information and constraints"
        },
        {
            "name": "php-cs-fixer/diff",
            "version": "v2.0.2",
            "description": "sebastian/diff v3 backport support for PHP 5.6+"
        },
        {
            "name": "phpdocumentor/reflection-common",
            "version": "2.2.0",
            "description": "Common reflection classes used by phpdocumentor to reflect the code structure"
        },
        {
            "name": "phpdocumentor/reflection-docblock",
            "version": "5.3.0",
            "description": "With this component, a library can provide support for annotations via DocBlocks or otherwise retrieve information that is embedded in a DocBlock."
        },
        {
            "name": "phpdocumentor/type-resolver",
            "version": "1.6.0",
            "description": "A PSR-5 based resolver of Class names, Types and Structural Element Names"
        },
        {
            "name": "phpspec/prophecy",
            "version": "v1.15.0",
            "description": "Highly opinionated mocking framework for PHP 5.3+"
        },
        {
            "name": "phpstan/extension-installer",
            "version": "1.1.0",
            "description": "Composer plugin for automatic installation of PHPStan extensions"
        },
        {
            "name": "phpstan/phpdoc-parser",
            "version": "1.2.0",
            "description": "PHPDoc parser with support for nullable, intersection and generic types"
        },
        {
            "name": "phpstan/phpstan",
            "version": "1.4.8",
            "description": "PHPStan - PHP Static Analysis Tool"
        },
        {
            "name": "phpstan/phpstan-phpunit",
            "version": "1.0.0",
            "description": "PHPUnit extensions and rules for PHPStan"
        },
        {
            "name": "phpstan/phpstan-webmozart-assert",
            "version": "1.1.1",
            "description": "PHPStan webmozart/assert extension"
        },
        {
            "name": "phpunit/php-code-coverage",
            "version": "7.0.15",
            "description": "Library that provides collection, processing, and rendering functionality for PHP code coverage information."
        },
        {
            "name": "phpunit/php-file-iterator",
            "version": "2.0.5",
            "description": "FilterIterator implementation that filters files based on a list of suffixes."
        },
        {
            "name": "phpunit/php-text-template",
            "version": "1.2.1",
            "description": "Simple template engine."
        },
        {
            "name": "phpunit/php-timer",
            "version": "2.1.3",
            "description": "Utility class for timing"
        },
        {
            "name": "phpunit/php-token-stream",
            "version": "4.0.4",
            "description": "Wrapper around PHP's tokenizer extension."
        },
        {
            "name": "phpunit/phpunit",
            "version": "8.5.24",
            "description": "The PHP Unit Testing framework."
        },
        {
            "name": "psr/cache",
            "version": "1.0.1",
            "description": "Common interface for caching libraries"
        },
        {
            "name": "psr/container",
            "version": "1.1.2",
            "description": "Common Container Interface (PHP FIG PSR-11)"
        },
        {
            "name": "psr/event-dispatcher",
            "version": "1.0.0",
            "description": "Standard interfaces for event handling."
        },
        {
            "name": "psr/http-client",
            "version": "1.0.1",
            "description": "Common interface for HTTP clients"
        },
        {
            "name": "psr/http-factory",
            "version": "1.0.1",
            "description": "Common interfaces for PSR-7 HTTP message factories"
        },
        {
            "name": "psr/http-message",
            "version": "1.0.1",
            "description": "Common interface for HTTP messages"
        },
        {
            "name": "psr/log",
            "version": "1.1.4",
            "description": "Common interface for logging libraries"
        },
        {
            "name": "ralouphie/getallheaders",
            "version": "3.0.3",
            "description": "A polyfill for getallheaders."
        },
        {
            "name": "rector/rector",
            "version": "0.12.17",
            "description": "Instant Upgrade and Automated Refactoring of any PHP code"
        },
        {
            "name": "sebastian/code-unit-reverse-lookup",
            "version": "1.0.2",
            "description": "Looks up which function or method a line of code belongs to"
        },
        {
            "name": "sebastian/comparator",
            "version": "3.0.3",
            "description": "Provides the functionality to compare PHP values for equality"
        },
        {
            "name": "sebastian/diff",
            "version": "3.0.3",
            "description": "Diff implementation"
        },
        {
            "name": "sebastian/environment",
            "version": "4.2.4",
            "description": "Provides functionality to handle HHVM/PHP environments"
        },
        {
            "name": "sebastian/exporter",
            "version": "3.1.4",
            "description": "Provides the functionality to export PHP variables for visualization"
        },
        {
            "name": "sebastian/global-state",
            "version": "3.0.2",
            "description": "Snapshotting of global state"
        },
        {
            "name": "sebastian/object-enumerator",
            "version": "3.0.4",
            "description": "Traverses array structures and object graphs to enumerate all referenced objects"
        },
        {
            "name": "sebastian/object-reflector",
            "version": "1.1.2",
            "description": "Allows reflection of object attributes, including inherited and non-public ones"
        },
        {
            "name": "sebastian/recursion-context",
            "version": "3.0.1",
            "description": "Provides functionality to recursively process PHP variables"
        },
        {
            "name": "sebastian/resource-operations",
            "version": "2.0.2",
            "description": "Provides a list of PHP built-in functions that operate on resources"
        },
        {
            "name": "sebastian/type",
            "version": "1.1.4",
            "description": "Collection of value objects that represent the types of the PHP type system"
        },
        {
            "name": "sebastian/version",
            "version": "2.0.1",
            "description": "Library that helps with managing the version number of Git-hosted PHP projects"
        },
        {
            "name": "slevomat/coding-standard",
            "version": "7.0.19",
            "description": "Slevomat Coding Standard for PHP_CodeSniffer complements Consistence Coding Standard by providing sniffs with additional checks."
        },
        {
            "name": "squizlabs/php_codesniffer",
            "version": "3.6.2",
            "description": "PHP_CodeSniffer tokenizes PHP, JavaScript and CSS files and detects violations of a defined set of coding standards."
        },
        {
            "name": "symfony/config",
            "version": "v5.4.3",
            "description": "Helps you find, load, combine, autofill and validate configuration values of any kind"
        },
        {
            "name": "symfony/console",
            "version": "v5.4.5",
            "description": "Eases the creation of beautiful and testable command line interfaces"
        },
        {
            "name": "symfony/dependency-injection",
            "version": "v5.4.6",
            "description": "Allows you to standardize and centralize the way objects are constructed in your application"
        },
        {
            "name": "symfony/deprecation-contracts",
            "version": "v2.5.0",
            "description": "A generic function and convention to trigger deprecation notices"
        },
        {
            "name": "symfony/error-handler",
            "version": "v5.4.3",
            "description": "Provides tools to manage errors and ease debugging PHP code"
        },
        {
            "name": "symfony/event-dispatcher",
            "version": "v5.4.3",
            "description": "Provides tools that allow your application components to communicate with each other by dispatching events and listening to them"
        },
        {
            "name": "symfony/event-dispatcher-contracts",
            "version": "v2.5.0",
            "description": "Generic abstractions related to dispatching event"
        },
        {
            "name": "symfony/filesystem",
            "version": "v5.4.5",
            "description": "Provides basic utilities for the filesystem"
        },
        {
            "name": "symfony/finder",
            "version": "v5.4.3",
            "description": "Finds files and directories via an intuitive fluent interface"
        },
        {
            "name": "symfony/http-foundation",
            "version": "v5.4.6",
            "description": "Defines an object-oriented layer for the HTTP specification"
        },
        {
            "name": "symfony/http-kernel",
            "version": "v5.4.6",
            "description": "Provides a structured process for converting a Request into a Response"
        },
        {
            "name": "symfony/options-resolver",
            "version": "v5.4.3",
            "description": "Provides an improved replacement for the array_replace PHP function"
        },
        {
            "name": "symfony/polyfill-ctype",
            "version": "v1.25.0",
            "description": "Symfony polyfill for ctype functions"
        },
        {
            "name": "symfony/polyfill-intl-grapheme",
            "version": "v1.25.0",
            "description": "Symfony polyfill for intl's grapheme_* functions"
        },
        {
            "name": "symfony/polyfill-intl-normalizer",
            "version": "v1.25.0",
            "description": "Symfony polyfill for intl's Normalizer class and related functions"
        },
        {
            "name": "symfony/polyfill-mbstring",
            "version": "v1.25.0",
            "description": "Symfony polyfill for the Mbstring extension"
        },
        {
            "name": "symfony/polyfill-php73",
            "version": "v1.25.0",
            "description": "Symfony polyfill backporting some PHP 7.3+ features to lower PHP versions"
        },
        {
            "name": "symfony/polyfill-php80",
            "version": "v1.25.0",
            "description": "Symfony polyfill backporting some PHP 8.0+ features to lower PHP versions"
        },
        {
            "name": "symfony/polyfill-php81",
            "version": "v1.25.0",
            "description": "Symfony polyfill backporting some PHP 8.1+ features to lower PHP versions"
        },
        {
            "name": "symfony/process",
            "version": "v5.4.5",
            "description": "Executes commands in sub-processes"
        },
        {
            "name": "symfony/service-contracts",
            "version": "v2.5.0",
            "description": "Generic abstractions related to writing services"
        },
        {
            "name": "symfony/stopwatch",
            "version": "v5.4.5",
            "description": "Provides a way to profile code"
        },
        {
            "name": "symfony/string",
            "version": "v5.4.3",
            "description": "Provides an object-oriented API to strings and deals with bytes, UTF-8 code points and grapheme clusters in a unified way"
        },
        {
            "name": "symfony/var-dumper",
            "version": "v5.4.6",
            "description": "Provides mechanisms for walking through any arbitrary PHP variable"
        },
        {
            "name": "theseer/tokenizer",
            "version": "1.2.1",
            "description": "A small library for converting tokenized PHP source code into XML and potentially other formats"
        },
        {
            "name": "timeweb/phpstan-enum",
            "version": "v3.0.0",
            "description": "Enum class reflection extension for PHPStan"
        },
        {
            "name": "webmozart/assert",
            "version": "1.10.0",
            "description": "Assertions to validate method input/output with nice error messages."
        }
    ]
}
EOT,
    ];

    protected function setUp(): void
    {
        parent::setUp();

        $this->application->setDeploymentPath('/home/jdoe/app');
    }

    protected array $packagesFromOutput = [
        'composer/ca-bundle' => '1.3.1',
        'composer/pcre' => '1.0.1',
        'composer/semver' => '3.2.9',
        'composer/xdebug-handler' => '3.0.1',
        'dealerdirect/phpcodesniffer-composer-installer' => 'v0.7.2',
        'doctrine/annotations' => '1.13.2',
        'doctrine/instantiator' => '1.4.1',
        'doctrine/lexer' => '1.2.2',
        'friendsofphp/php-cs-fixer' => 'v3.6.0',
        'guzzlehttp/guzzle' => '7.4.1',
        'guzzlehttp/promises' => '1.5.1',
        'guzzlehttp/psr7' => '2.1.0',
        'jangregor/phpstan-prophecy' => '1.0.0',
        'monolog/monolog' => '1.26.1',
        'myclabs/deep-copy' => '1.11.0',
        'myclabs/php-enum' => '1.8.3',
        'neos/utility-files' => '3.3.29',
        'padraic/humbug_get_contents' => '1.1.2',
        'padraic/phar-updater' => 'v1.0.6',
        'phar-io/manifest' => '2.0.3',
        'phar-io/version' => '3.2.1',
        'php-cs-fixer/diff' => 'v2.0.2',
        'phpdocumentor/reflection-common' => '2.2.0',
        'phpdocumentor/reflection-docblock' => '5.3.0',
        'phpdocumentor/type-resolver' => '1.6.0',
        'phpspec/prophecy' => 'v1.15.0',
        'phpstan/extension-installer' => '1.1.0',
        'phpstan/phpdoc-parser' => '1.2.0',
        'phpstan/phpstan' => '1.4.8',
        'phpstan/phpstan-phpunit' => '1.0.0',
        'phpstan/phpstan-webmozart-assert' => '1.1.1',
        'phpunit/php-code-coverage' => '7.0.15',
        'phpunit/php-file-iterator' => '2.0.5',
        'phpunit/php-text-template' => '1.2.1',
        'phpunit/php-timer' => '2.1.3',
        'phpunit/php-token-stream' => '4.0.4',
        'phpunit/phpunit' => '8.5.24',
        'psr/cache' => '1.0.1',
        'psr/container' => '1.1.2',
        'psr/event-dispatcher' => '1.0.0',
        'psr/http-client' => '1.0.1',
        'psr/http-factory' => '1.0.1',
        'psr/http-message' => '1.0.1',
        'psr/log' => '1.1.4',
        'ralouphie/getallheaders' => '3.0.3',
        'rector/rector' => '0.12.17',
        'sebastian/code-unit-reverse-lookup' => '1.0.2',
        'sebastian/comparator' => '3.0.3',
        'sebastian/diff' => '3.0.3',
        'sebastian/environment' => '4.2.4',
        'sebastian/exporter' => '3.1.4',
        'sebastian/global-state' => '3.0.2',
        'sebastian/object-enumerator' => '3.0.4',
        'sebastian/object-reflector' => '1.1.2',
        'sebastian/recursion-context' => '3.0.1',
        'sebastian/resource-operations' => '2.0.2',
        'sebastian/type' => '1.1.4',
        'sebastian/version' => '2.0.1',
        'slevomat/coding-standard' => '7.0.19',
        'squizlabs/php_codesniffer' => '3.6.2',
        'symfony/config' => 'v5.4.3',
        'symfony/console' => 'v5.4.5',
        'symfony/dependency-injection' => 'v5.4.6',
        'symfony/deprecation-contracts' => 'v2.5.0',
        'symfony/error-handler' => 'v5.4.3',
        'symfony/event-dispatcher' => 'v5.4.3',
        'symfony/event-dispatcher-contracts' => 'v2.5.0',
        'symfony/filesystem' => 'v5.4.5',
        'symfony/finder' => 'v5.4.3',
        'symfony/http-foundation' => 'v5.4.6',
        'symfony/http-kernel' => 'v5.4.6',
        'symfony/options-resolver' => 'v5.4.3',
        'symfony/polyfill-ctype' => 'v1.25.0',
        'symfony/polyfill-intl-grapheme' => 'v1.25.0',
        'symfony/polyfill-intl-normalizer' => 'v1.25.0',
        'symfony/polyfill-mbstring' => 'v1.25.0',
        'symfony/polyfill-php73' => 'v1.25.0',
        'symfony/polyfill-php80' => 'v1.25.0',
        'symfony/polyfill-php81' => 'v1.25.0',
        'symfony/process' => 'v5.4.5',
        'symfony/service-contracts' => 'v2.5.0',
        'symfony/stopwatch' => 'v5.4.5',
        'symfony/string' => 'v5.4.3',
        'symfony/var-dumper' => 'v5.4.6',
        'theseer/tokenizer' => '1.2.1',
        'timeweb/phpstan-enum' => 'v3.0.0',
        'webmozart/assert' => '1.10.0',
    ];

    /**
     * @test
     */
    public function executeGetPackagesTask(): void
    {
        $options = [
            'composerCommandPath' => 'composer',
        ];
        $this->task->execute($this->node, $this->application, $this->deployment, $options);
        $this->assertCommandExecuted(
            '/^composer show --format=json/'
        );
        $packages = $this->application->getPackages();
        $this->assertSame($this->packagesFromOutput, $packages);
    }

    protected function createTask(): GetPackagesTask
    {
        return new GetPackagesTask();
    }
}
