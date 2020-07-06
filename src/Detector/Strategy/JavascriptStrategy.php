<?php declare(strict_types=1);
/*
 * This file is part of PHPWEB Copy/Paste Detector (PHPWEBCPD).
 *
 * (c) Enrique Somolinos <enrique.somolinos@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPWEBCPD\Detector\Strategy;

use Allocine\Twigcs\Compatibility\TwigLexer;
use Allocine\Twigcs\Container;
use PLUG\JavaScript\JLex;
use PLUG\JavaScript\JLexBase;
use PLUG\JavaScript\JTokenizer;

class JavascriptStrategy extends DefaultStrategy
{
    protected function getTokens(string $buffer): array
    {
        $tokenizer = new JTokenizer( true, true );
        return $tokenizer->get_all_tokens($buffer);
    }

    protected function isVariableToken(array $token): bool
    {
        return $token[0] === J_VAR;
    }
}
