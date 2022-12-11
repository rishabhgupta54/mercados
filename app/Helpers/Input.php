<?php

namespace App\Helpers;

class Input {

    /**
     * @var string $viewPath Location of the partials files
     */
    private static $viewPath = 'partials.input-fields.';

    /**
     * @param String $name Name attribute of the field
     * @param String $label Label of the field
     * @param bool $errorHandling Want to manage the error handling
     * @param String $extraClasses Classes which you want to implement
     * @param String $default Default value of the field
     * @param bool $disabled Want to set this field attribute as disabled
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * @param String $name Name attribute of the field
     * @param String $label Label of the field
     * @param bool $errorHandling Want to manage the error handling
     * @param object $options List of options which you want to show in dropdown field
     * @param String $extraClasses Classes which you want to implement
     * @param mixed $optionValue Key which you want to use as option value
     * @param mixed $optionTextKey Key which you want to use as option value
     * @param mixed $selectedValue value which you want to mark as selected
     * @param array $optionsSkip list of data which you don't want to print in the select option
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * @param String $name Name attribute of the field
     * @param String $label Label of the field
     * @param bool $errorHandling Want to manage the error handling
     * @param String $extraClasses Classes which you want to implement
     *
     * @return \Illuminate\Http\Response
     */
    public static function password($name, $label = '', $errorHandling = TRUE, $extraClasses = '') {
        return view(self::$viewPath . 'password', [
            'name' => $name,
            'errorHandling' => $errorHandling,
            'label' => $label,
            'extraClasses' => $extraClasses,
        ]);
    }

    /**
     * @param String $name Name attribute of the field
     * @param String $label Label of the field
     * @param bool $errorHandling Want to manage the error handling
     * @param String $extraClasses Classes which you want to implement
     * @param int $minimum Minimum value allowed by the number field
     * @param int $maximum Max value allowed by the number field
     * @param int $default Default value of the number field
     * @param bool $disabled Want to set this field attribute as disabled
     *
     * @return \Illuminate\Http\Response
     */
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
