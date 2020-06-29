<?php

function parenthesisCheck($string, $position) {
    $chars = str_split($string);
    $skipCloseParenthesis = 0;
    $closeParenthesisPosition = null;
    if (@$chars[$position] == '(') {
        for ($i = $position+1; $i < count($chars); $i++) { 
            $closeParenthesisPosition = $skipCloseParenthesis == 0 && $chars[$i] == ')' ? $i : null;
            $chars[$i] == '(' ? $skipCloseParenthesis++ : '';
            $skipCloseParenthesis > 0 && $chars[$i] == ')' ? $skipCloseParenthesis-- : '';
            if (!is_null($closeParenthesisPosition)) break;
        }
    } else {
        return 'this position is not parenthesis';
    }

    return $closeParenthesisPosition;
}


echo parenthesisCheck('a (b c (d e (f) g) h) i (j k)', 2); 
?>