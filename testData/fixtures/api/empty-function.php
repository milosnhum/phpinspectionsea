<?php

    /* pattern: count can be used */
    echo <warning descr="[EA] You should probably use 'count([]) === 0' instead.">empty([])</warning>;
    echo <warning descr="[EA] You should probably use 'count([]) !== 0' instead.">!empty([])</warning>;

    /**
     * @param int|null $int
     * @param float|null $float
     * @param bool|null $boolean
     * @param resource|null $resource
     * @param null|string $string
     */
    function empty_with_typed_params($int, $float, $boolean, $resource, $string) {
        return [
            /* pattern: can be compared to null */
            <warning descr="[EA] You should probably use '$int === null' instead.">empty($int)</warning>,
            <warning descr="[EA] You should probably use '$float === null' instead.">empty($float)</warning>,
            <warning descr="[EA] You should probably use '$boolean === null' instead.">empty($boolean)</warning>,
            <warning descr="[EA] You should probably use '$resource === null' instead.">empty($resource)</warning>,
            <weak_warning descr="[EA] 'empty(...)' counts too many values as empty, consider refactoring with type sensitive checks.">empty($string)</weak_warning>,
        ];
    }

    function nullable_int(?int $int) { return $int; }
    echo <warning descr="[EA] You should probably use 'nullable_int() === null' instead.">empty(nullable_int())</warning>;
    echo <warning descr="[EA] You should probably use 'nullable_int() !== null' instead.">!empty(nullable_int())</warning>;

    function nullable_string(?string $string) { return $string; }
    echo <weak_warning descr="[EA] 'empty(...)' counts too many values as empty, consider refactoring with type sensitive checks.">empty(nullable_string())</weak_warning>;
    echo !<weak_warning descr="[EA] 'empty(...)' counts too many values as empty, consider refactoring with type sensitive checks.">empty(nullable_string())</weak_warning>;

    echo <weak_warning descr="[EA] 'empty(...)' counts too many values as empty, consider refactoring with type sensitive checks.">empty(1)</weak_warning>;
    echo <weak_warning descr="[EA] 'empty(...)' counts too many values as empty, consider refactoring with type sensitive checks.">empty('...')</weak_warning>;
    echo <weak_warning descr="[EA] 'empty(...)' counts too many values as empty, consider refactoring with type sensitive checks.">empty(null)</weak_warning>;

    abstract class ClassForEmptyWithFields {
        /** @var string|null */
        public $string;
        /** @var ClassForEmptyWithFields|null */
        public $field;
        /** @var ClassForEmptyWithFields[]|null */
        public $fields;
        /** @return ClassForEmptyWithFields|null */
        abstract function get();
    }
    function empty_with_fields(ClassForEmptyWithFields $subject) {
        return [
            <weak_warning descr="[EA] 'empty(...)' counts too many values as empty, consider refactoring with type sensitive checks.">empty($subject->string)</weak_warning>,
            empty($subject->field),
            empty($subject->field->field),
            empty($subject->fields[0]->field),
            empty($subject->get()->field),
        ];
    }
