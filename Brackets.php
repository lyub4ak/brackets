<?php

/**
 * Manges string of brackets.
 */
class Brackets
{
    /**
     * Brackets for build string.
     */
    const BRACKETS = [
        '(' => ')',
        '{' => '}',
        '[' => ']'
    ];

    /**
     * Maximum nesting level of brackets in string.
     */
    const NESTING_MAX = 3;


    /**
     * Generates random string of brackets.
     *
     * @param int $i_pair Count of brackets pairs.
     * @return string String of random brackets
     */
    public static function getBracketsString(int $i_pair): string
    {
        $a_close_brackets =[];
        $s_result = '';
        $i_pair_current = 0;
        while ($i_pair_current < $i_pair) {
            // Manages nesting of brackets.
            for ($i = 0; $i < self::NESTING_MAX; $i++) {
                $s_bracket_key = array_rand(self::BRACKETS);
                $s_result .= $s_bracket_key;
                // Collects closing brackets.
                $a_close_brackets[] = self::BRACKETS[$s_bracket_key];
                if(++$i_pair_current === $i_pair)
                    break;
            }
            // Adds closing brackets to result.
            for ($i=count($a_close_brackets)-1; $i>=0; $i--) {
                $s_result .= array_pop($a_close_brackets);
            }
        }

        return $s_result;
    }

    /**
     * Checks brackets nesting in string.
     *
     * @param string $s_brackets_string String of brackets.
     * @return bool <tt>true</tt> - if string has valid brackets nesting, <tt>false</tt> - otherwise.
     */
    public static function checkBracketsString(string $s_brackets_string) :bool
    {
        $a_close_brackets =[];
        for ($i=0; $i<strlen($s_brackets_string); $i++) {
            $s_bracket_current = $s_brackets_string[$i];
            if(isset(self::BRACKETS[$s_bracket_current])) {
                // Collects closing brackets.
                $a_close_brackets[] = self::BRACKETS[$s_bracket_current];
            // Extracts last element from array and compares with current.
            } elseif ($s_bracket_current == array_pop($a_close_brackets)) {
                continue;
            } else {
                return false;
            }
        }

        return $a_close_brackets ? false : true;
    }
}