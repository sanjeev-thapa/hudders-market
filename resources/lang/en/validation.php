<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':Attribute must be accepted.',
    'active_url' => ':Attribute is not a valid URL.',
    'after' => ':Attribute must be a date after :date.',
    'after_or_equal' => ':Attribute must be a date after or equal to :date.',
    'alpha' => ':Attribute must only contain alphabetical letters.',
    'alpha_dash' => ':Attribute must only contain alphabetical letters, numbers, dashes and underscores.',
    'alpha_num' => ':Attribute must only contain alphabetical letters and numbers.',
    'array' => ':Attribute must be an array.',
    'before' => ':Attribute must be a date before :date.',
    'before_or_equal' => ':Attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => ':Attribute must be between :min and :max.',
        'file' => ':Attribute must be between :min and :max kilobytes.',
        'string' => ':Attribute must be between :min and :max characters.',
        'array' => ':Attribute must have between :min and :max items.',
    ],
    'boolean' => ':Attribute must be true or false.',
    'confirmed' => ':Attribute confirmation does not match.',
    'current_password' => 'The password is incorrect.',
    'date' => ':Attribute is not a valid date.',
    'date_equals' => ':Attribute must be a date equal to :date.',
    'date_format' => ':Attribute does not match the format :format.',
    'different' => ':Attribute and :other must be different.',
    'digits' => ':Attribute must be :digits digits.',
    'digits_between' => ':Attribute must be between :min and :max digits.',
    'dimensions' => ':Attribute has invalid image dimensions.',
    'distinct' => ':Attribute has a duplicate value.',
    'email' => ':Attribute must be a valid email address.',
    'ends_with' => ':Attribute must end with one of the following: :values.',
    'exists' => 'The selected :attribute is invalid.',
    'file' => ':Attribute must be a file.',
    'filled' => ':Attribute must have a value.',
    'gt' => [
        'numeric' => ':Attribute must be greater than :value.',
        'file' => ':Attribute must be greater than :value kilobytes.',
        'string' => ':Attribute must be greater than :value characters.',
        'array' => ':Attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => ':Attribute must be greater than or equal :value.',
        'file' => ':Attribute must be greater than or equal :value kilobytes.',
        'string' => ':Attribute must be greater than or equal :value characters.',
        'array' => ':Attribute must have :value items or more.',
    ],
    'image' => ':Attribute must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => ':Attribute does not exist in :other.',
    'integer' => ':Attribute must be an integer.',
    'ip' => ':Attribute must be a valid IP address.',
    'ipv4' => ':Attribute must be a valid IPv4 address.',
    'ipv6' => ':Attribute must be a valid IPv6 address.',
    'json' => ':Attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => ':Attribute must be less than :value.',
        'file' => ':Attribute must be less than :value kilobytes.',
        'string' => ':Attribute must be less than :value characters.',
        'array' => ':Attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => ':Attribute must be less than or equal :value.',
        'file' => ':Attribute must be less than or equal :value kilobytes.',
        'string' => ':Attribute must be less than or equal :value characters.',
        'array' => ':Attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => ':Attribute must not be greater than :max.',
        'file' => ':Attribute must not be greater than :max kilobytes.',
        'string' => ':Attribute must not be greater than :max characters.',
        'array' => ':Attribute must not have more than :max items.',
    ],
    'mimes' => ':Attribute must be a file of type: :values.',
    'mimetypes' => ':Attribute must be a file of type: :values.',
    'min' => [
        'numeric' => ':Attribute must be at least :min.',
        'file' => ':Attribute must be at least :min kilobytes.',
        'string' => ':Attribute must be at least :min characters.',
        'array' => ':Attribute must have at least :min items.',
    ],
    'multiple_of' => ':Attribute must be a multiple of :value.',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => ':Attribute format is invalid.',
    'numeric' => ':Attribute must be a number.',
    'password' => 'The password is incorrect.',
    'present' => ':Attribute must be present.',
    'regex' => ':Attribute format is invalid.',
    'required' => ':Attribute is required.',
    'required_if' => ':Attribute is required when :other is :value.',
    'required_unless' => ':Attribute is required unless :other is in :values.',
    'required_with' => ':Attribute is required when :values is present.',
    'required_with_all' => ':Attribute is required when :values are present.',
    'required_without' => ':Attribute is required when :values is not present.',
    'required_without_all' => ':Attribute is required when none of :values are present.',
    'prohibited' => ':Attribute is prohibited.',
    'prohibited_if' => ':Attribute is prohibited when :other is :value.',
    'prohibited_unless' => ':Attribute is prohibited unless :other is in :values.',
    'same' => ':Attribute and :other must match.',
    'size' => [
        'numeric' => ':Attribute must be :size.',
        'file' => ':Attribute must be :size kilobytes.',
        'string' => ':Attribute must be :size characters.',
        'array' => ':Attribute must contain :size items.',
    ],
    'starts_with' => ':Attribute must start with one of the following: :values.',
    'string' => ':Attribute must be a string.',
    'timezone' => ':Attribute must be a valid zone.',
    'unique' => ':Attribute has already been taken.',
    'uploaded' => ':Attribute failed to upload.',
    'url' => ':Attribute format is invalid.',
    'uuid' => ':Attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
