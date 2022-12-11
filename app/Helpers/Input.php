<?php

namespace App\Helpers;

class Input {

    private static $viewPath = 'partials.input-fields.';

    public static function textField($name, $label = '', $errorHandling = TRUE, $extraClasses = '', $default = '', $disabled = FALSE) {
        return view(self::$viewPath . 'text', [
            'name' => $name,
            'errorHandling' => $errorHandling,
            'label' => $label,
            'extraClasses' => $extraClasses,
            'default' => $default,
            'disabled' => $disabled,
        ]);
    }

    public static function selectField($name, $label = '', $errorHandling = TRUE, $options = [], $extraClasses = '', $optionValue = 'id', $optionText = 'name', $selectedValue = '', $optionsSkip = []) {
        return view(self::$viewPath . 'select', [
            'name' => $name,
            'errorHandling' => $errorHandling,
            'label' => $label,
            'extraClasses' => $extraClasses,
            'options' => $options,
            'optionValue' => $optionValue,
            'optionText' => $optionText,
            'selectedValue' => old($name) ? old($name) : $selectedValue,
            'optionsSkip' => $optionsSkip,
        ]);
    }

    public static function password($name, $label = '', $errorHandling = TRUE, $extraClasses = '') {
        return view(self::$viewPath . 'password', [
            'name' => $name,
            'errorHandling' => $errorHandling,
            'label' => $label,
            'extraClasses' => $extraClasses,
        ]);
    }

    public static function number($name, $label = '', $errorHandling = TRUE, $extraClasses = '', $minimum = 0, $maximum = 0, $default = 0, $disabled = FALSE) {
        return view(self::$viewPath . 'number', [
            'name' => $name,
            'errorHandling' => $errorHandling,
            'label' => $label,
            'extraClasses' => $extraClasses,
            'default' => $default,
            'minimum' => $minimum,
            'maximum' => $maximum,
            'disabled' => $disabled,
        ]);
    }
}
