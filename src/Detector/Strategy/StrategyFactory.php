<?php declare(strict_types=1);
/*
 * This file is part of PHPWEB Copy/Paste Detector (PHPWEBCPD).
 *
 * (c) Enrique Somolinos <enrique.somolinos@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace EnriqueSomolinos\PHPWEBCPD;

use PHPWEBCPD\Detector\Strategy\AbstractStrategy;
use PHPWEBCPD\Detector\Strategy\CssStrategy;
use PHPWEBCPD\Detector\Strategy\DefaultStrategy;
use PHPWEBCPD\Detector\Strategy\JavascriptStrategy;
use PHPWEBCPD\Detector\Strategy\TwigStrategy;

class StrategyFactory
{
    public static function getStrategy(string $extension): AbstractStrategy
    {
        if($extension == "*.twig") {
            return new TwigStrategy();
        }
        if($extension == "*.js") {
            return new JavascriptStrategy();
        }
        if($extension == "*.css") {
            return new CssStrategy();
        }
        if($extension == "*.scss") {
            return new CssStrategy();
        }
        return new DefaultStrategy();
    }

}