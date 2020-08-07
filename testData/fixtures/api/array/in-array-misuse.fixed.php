<?php

function cases_holder() {
    /* comparison equivalent cases */
    $x = '1' == '2';
    $x = '1' === '2';
    $x = '1' == '2';
    $x = '1' == '2';
    $x = '1' === '2';
    $x = '1' == '2';
    $x = '1' == '2';

    /* ensure old array style recognized */
    $x = '1' == '2';

    /* ensure nested binary expression works properly */
    $x = true  && '1' == '2';
    $x = false || '1' == '2';

    $x = '1' != '2';
    $x = '1' !== '2';
    $x = '1' != '2';
    $x = '1' !== '2';
    $x = '1' != '2';
    $x = '1' !== '2';
    $x = '1' != '2';
    $x = '1' !== '2';
    $x = '1' != '2';

    $x = '1' === '2';
    $x = '1' == '2';
    $x = '1' === '2';
    $x = '1' == '2';
    $x = '1' === '2';
    $x = '1' == '2';
    $x = '1' === '2';
    $x = '1' == '2';

    /* array_key_exists equivalent cases */
    $y = !array_key_exists('0', ['item']);
    $y = array_key_exists('0', ['item']);
    $y = array_key_exists('0', ['item']);
    $y = array_key_exists('0', ['item']);

    /* array_key_exists equivalent cases with values discovery */
    $keys = array_keys(['item']);
    $y    = in_array('0', $keys);

    /* false-positives */
    $x = in_array('1', array(), true);
    $x = in_array('1', array());
}

class Clazz {
    private $property = [ '...' ];
    public function method() {
        return [
            in_array('...', $this->property),
        ];
    }
}
