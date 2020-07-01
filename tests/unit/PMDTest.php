<?php declare(strict_types=1);
/*
 * This file is part of PHP Copy/Paste Detector (PHPCPD).
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPWEBCPD\Log;

use PHPUnit\Framework\TestCase;
use PHPWEBCPD\CodeClone;
use PHPWEBCPD\CodeCloneFile;
use PHPWEBCPD\CodeCloneMap;

/**
 * @covers \PHPWEBCPD\Log\PMD
 * @covers \PHPWEBCPD\Log\AbstractXmlLogger
 *
 * @uses \PHPWEBCPD\CodeClone
 * @uses \PHPWEBCPD\CodeCloneFile
 * @uses \PHPWEBCPD\CodeCloneMap
 * @uses \PHPWEBCPD\CodeCloneMapIterator
 */
class PMDTest extends TestCase
{
    /** @var string */
    private $testFile1;

    /** @var @var string */
    private $testFile2;

    /** @var string */
    private $pmdLogFile;

    /** @var string */
    private $expectedPmdLogFile;

    /** @var \PHPWEBCPD\Log\PMD */
    private $pmdLogger;

    protected function setUp(): void
    {
        $this->testFile1 = __DIR__ . '/../fixture/with_ascii_escape.php';
        $this->testFile2 = __DIR__ . '/../fixture/with_ascii_escape2.php';

        $this->pmdLogFile = \tempnam(\sys_get_temp_dir(), 'pmd');

        $this->expectedPmdLogFile = \tempnam(\sys_get_temp_dir(), 'pmd');
        $expectedPmdLogTemplate   = __DIR__ . '/../fixture/pmd_expected.xml';
        $expectedPmdLogContents   = \strtr(
            \file_get_contents($expectedPmdLogTemplate),
            [
                '%file1%' => $this->testFile1,
                '%file2%' => $this->testFile2,
            ]
        );
        \file_put_contents($this->expectedPmdLogFile, $expectedPmdLogContents);

        $this->pmdLogger = new PMD($this->pmdLogFile);
    }

    protected function tearDown(): void
    {
        if (\file_exists($this->pmdLogFile)) {
            \unlink($this->pmdLogFile);
        }

        if (\file_exists($this->expectedPmdLogFile)) {
            \unlink($this->expectedPmdLogFile);
        }
    }

    public function testSubstitutesDisallowedCharacters(): void
    {
        $file1    = new CodeCloneFile($this->testFile1, 8);
        $file2    = new CodeCloneFile($this->testFile2, 8);
        $clone    = new CodeClone($file1, $file2, 4, 4);
        $cloneMap = new CodeCloneMap();
        $cloneMap->addClone($clone);

        $this->pmdLogger->processClones($cloneMap);

        $this->assertXmlFileEqualsXmlFile(
            $this->expectedPmdLogFile,
            $this->pmdLogFile
        );
    }
}
