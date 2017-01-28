<?php

namespace Converter\Roman;

/**
 * @package Converter\Roman
 */
final class Roman
{
    /**
     * @param string $romanNumber
     *
     * @return int
     */
    public static function toArabic(string $romanNumber)
    {
        $romanCharacters = str_split($romanNumber);
        $totalValue = 0;

        foreach ($romanCharacters as $romanCharacter) {
            $romanCharacterClassName = sprintf('Converter\Roman\Number\%s', $romanCharacter);
            $romanCharacterClass = new $romanCharacterClassName;
            $currentValue = $romanCharacterClass::$value;
            $nextRomanCharacter = next($romanCharacters);

            if (false !== $nextRomanCharacter) {
                $nextRomanCharacterClassName = sprintf('Converter\Roman\Number\%s', $nextRomanCharacter);
                $nextRomanCharacterClass = new $nextRomanCharacterClassName;

                if ($currentValue < $nextRomanCharacterClass::$value) {
                    $currentValue = $currentValue * -1;
                }
            }

            $totalValue += $currentValue;
        }

        return $totalValue;
    }
}
