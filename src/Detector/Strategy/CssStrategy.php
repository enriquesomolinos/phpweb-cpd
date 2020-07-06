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
use Yannickl88\Component\CSS\Tokenizer;

class CssStrategy extends DefaultStrategy
{
    protected function getTokens(string $buffer): array
    {
        $tokenizer = new Tokenizer( true, true );
        $cssTokens = $tokenizer->tokenize($buffer);
        $tokens = [];
        foreach ($cssTokens as $currentToken) {
            $token[0] = $currentToken->type;
            $token[2] = $currentToken->lines[0]+1;
            $token[1] = trim($currentToken->chars);
            if ($currentToken->type == 0) {
                $values = explode("\n", $currentToken->chars);
                $values2 = [];
                foreach ($values as $value) {
                    $value = preg_replace('/[^\S\r\n]+/', ' ', trim($value));
                    $values2[] = trim($value);
                }
                $token[1] = implode("\n", $values2);
            }
            $tokens[]  =$token;
        }
        return $tokens;
    }

    protected function isVariableToken(array $token): bool
    {
        return false;
    }
}
