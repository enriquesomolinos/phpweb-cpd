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

use PHPWEBCPD\CodeCloneMap;
use Symfony\Component\Console\Output\OutputInterface;

final class Text
{
    /**
     * Prints a result set from Detector::copyPasteDetection().
     */
    public function printResult(OutputInterface $output, CodeCloneMap $clones, string $extension): void
    {
        $verbose = $output->getVerbosity() > OutputInterface::VERBOSITY_NORMAL;

        if (\count($clones) > 0) {
            $output->write(
                \sprintf(
                    'Found %d clones with %d duplicated lines in %d files %s:' . \PHP_EOL . \PHP_EOL,
                    \count($clones),
                    $clones->getNumberOfDuplicatedLines(),
                    $clones->getNumberOfFilesWithClones(),
                    $extension
                )
            );
        }

        foreach ($clones as $clone) {
            $firstOccurrence = true;

            foreach ($clone->getFiles() as $file) {
                $output->writeln(
                    \sprintf(
                        '  %s%s:%d-%d%s',
                        $firstOccurrence ? '- ' : '  ',
                        $file->getName(),
                        $file->getStartLine(),
                        $file->getStartLine() + $clone->getSize(),
                        $firstOccurrence ? ' (' . $clone->getSize() . ' lines)' : ''
                    )
                );

                $firstOccurrence = false;
            }

            if ($verbose) {
                $output->write(\PHP_EOL . $clone->getLines('    '));
            }

            $output->writeln('');
        }

        if ($clones->isEmpty()) {
            $output->write(
                \sprintf("No clones found on %s files.\n\n",
                    $extension));

            return;
        }

        $output->write(
            \sprintf(
                "%s duplicated lines out of %d total lines of code %s.\n" .
                "Average size of duplication is %d lines, largest clone has %d of lines\n\n",
                $clones->getPercentage(),
                $clones->getNumLines(),
                $extension,
                $clones->getAverageSize(),
                $clones->getLargestSize()
            )
        );
    }
}
