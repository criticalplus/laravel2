<?php

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

    'accepted' => 'El :attribute debe ser aceptado.',
    'accepted_if' => 'El :attribute debe ser aceptado cuando :other es :value.',
    'active_url' => 'El :attribute no es una URL válida.',
    'after' => 'El :attribute debe ser anterior a :date.',
    'after_or_equal' => 'El :attribute debe ser a date after or equal to :date.',
    'alpha' => 'El :attribute must only contain letters.',
    'alpha_dash' => 'El :attribute must only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'El :attribute must only contain letters and numbers.',
    'array' => 'El :attribute debe ser an array.',
    'before' => 'El :attribute debe ser a date before :date.',
    'before_or_equal' => 'El :attribute debe ser a date before or equal to :date.',
    'between' => [
        'array' => 'El :attribute must have between :min and :max items.',
        'file' => 'El :attribute debe ser between :min and :max kilobytes.',
        'numeric' => 'El :attribute debe ser between :min and :max.',
        'string' => 'El :attribute debe ser between :min and :max characters.',
    ],
    'boolean' => 'El :attribute field must be true or false.',
    'confirmed' => 'El :attribute confirmation does not match.',
    'current_password' => 'The password is incorrect.',
    'date' => 'El :attribute is not a valid date.',
    'date_equals' => 'El :attribute debe ser a date equal to :date.',
    'date_format' => 'El :attribute does not match the format :format.',
    'declined' => 'El :attribute debe ser declined.',
    'declined_if' => 'El :attribute debe ser declined when :other is :value.',
    'different' => 'El :attribute and :other must be different.',
    'digits' => 'El :attribute debe ser :digits digits.',
    'digits_between' => 'El :attribute debe ser between :min and :max digits.',
    'dimensions' => 'El :attribute has invalid image dimensions.',
    'distinct' => 'El :attribute field has a duplicate value.',
    'email' => 'El campo ":attribute" debe ser un email válido.',
    'ends_with' => 'El :attribute must end with one of the following: :values.',
    'enum' => 'El campo :attribute no es válido.',
    'exists' => 'El campo :attribute no es válido.',
    'file' => 'El :attribute debe ser a file.',
    'filled' => 'El :attribute field must have a value.',
    'gt' => [
        'array' => 'El :attribute must have more than :value items.',
        'file' => 'El :attribute debe ser greater than :value kilobytes.',
        'numeric' => 'El :attribute debe ser greater than :value.',
        'string' => 'El :attribute debe ser greater than :value characters.',
    ],
    'gte' => [
        'array' => 'El :attribute must have :value items or more.',
        'file' => 'El :attribute debe ser greater than or equal to :value kilobytes.',
        'numeric' => 'El :attribute debe ser greater than or equal to :value.',
        'string' => 'El :attribute debe ser greater than or equal to :value characters.',
    ],
    'image' => 'El :attribute debe ser an image.',
    'in' => 'El campo :attribute no es válido.',
    'in_array' => 'El :attribute field does not exist in :other.',
    'integer' => 'El :attribute debe ser an integer.',
    'ip' => 'El :attribute debe ser a valid IP address.',
    'ipv4' => 'El :attribute debe ser a valid IPv4 address.',
    'ipv6' => 'El :attribute debe ser a valid IPv6 address.',
    'json' => 'El :attribute debe ser a valid JSON string.',
    'lt' => [
        'array' => 'El :attribute must have less than :value items.',
        'file' => 'El :attribute debe ser less than :value kilobytes.',
        'numeric' => 'El :attribute debe ser less than :value.',
        'string' => 'El :attribute debe ser less than :value characters.',
    ],
    'lte' => [
        'array' => 'El :attribute must not have more than :value items.',
        'file' => 'El :attribute debe ser less than or equal to :value kilobytes.',
        'numeric' => 'El :attribute debe ser less than or equal to :value.',
        'string' => 'El :attribute debe ser less than or equal to :value characters.',
    ],
    'mac_address' => 'El :attribute debe ser a valid MAC address.',
    'max' => [
        'array' => 'El :attribute must not have more than :max items.',
        'file' => 'El :attribute must not be greater than :max kilobytes.',
        'numeric' => 'El :attribute must not be greater than :max.',
        'string' => 'El :attribute must not be greater than :max characters.',
    ],
    'mimes' => 'El :attribute debe ser a file of type: :values.',
    'mimetypes' => 'El :attribute debe ser a file of type: :values.',
    'min' => [
        'array' => 'El :attribute must have at least :min items.',
        'file' => 'El :attribute debe ser at least :min kilobytes.',
        'numeric' => 'El :attribute debe ser at least :min.',
        'string' => 'El :attribute debe ser at least :min characters.',
    ],
    'multiple_of' => 'El :attribute debe ser a multiple of :value.',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'El formato del campo :attribute no es válido.',
    'numeric' => 'El :attribute debe ser a number.',
    'password' => [
        'letters' => 'El :attribute must contain at least one letter.',
        'mixed' => 'El :attribute must contain at least one uppercase and one lowercase letter.',
        'numbers' => 'El :attribute must contain at least one number.',
        'symbols' => 'El :attribute must contain at least one symbol.',
        'uncompromised' => 'The given :attribute has appeared in a data leak. Please choose a different :attribute.',
    ],
    'present' => 'El :attribute field must be present.',
    'prohibited' => 'El :attribute field is prohibited.',
    'prohibited_if' => 'El :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'El :attribute field is prohibited unless :other is in :values.',
    'prohibits' => 'El :attribute field prohibits :other from being present.',
    'regex' => 'El formato del campo :attribute no es válido.',
    'required' => 'El campo :attribute es necesario.',
    'required_array_keys' => 'El :attribute field must contain entries for: :values.',
    'required_if' => 'El :attribute field is required when :other is :value.',
    'required_unless' => 'El :attribute field is required unless :other is in :values.',
    'required_with' => 'El :attribute field is required when :values is present.',
    'required_with_all' => 'El :attribute field is required when :values are present.',
    'required_without' => 'El :attribute field is required when :values is not present.',
    'required_without_all' => 'El :attribute field is required when none of :values are present.',
    'same' => 'El :attribute and :other must match.',
    'size' => [
        'array' => 'El :attribute must contain :size items.',
        'file' => 'El :attribute debe ser :size kilobytes.',
        'numeric' => 'El :attribute debe ser :size.',
        'string' => 'El :attribute debe ser :size characters.',
    ],
    'starts_with' => 'El :attribute must start with one of the following: :values.',
    'string' => 'El :attribute debe ser a string.',
    'timezone' => 'El :attribute debe ser a valid timezone.',
    'unique' => 'El :attribute ya está registrado',
    'uploaded' => 'El :attribute failed to upload.',
    'url' => 'El :attribute debe ser a valid URL.',
    'uuid' => 'El :attribute debe ser a valid UUID.',

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
        'dni' => [
            'regex' => 'Necesita usar un formato válido: 00000000-Z',
        ],
        'repeat_password' => [
            'required'  => 'El campo confirmar contraseña es necesario.',
            'same'      => 'Sus contraseñas deben coincidir.',
        ],
        'floating_password' => [
            'required'  => 'El campo contraseña es necesario.',
            'same'      => 'Sus contraseñas deben coincidir.',
        ],
        'name' => [
            'required'  => 'El campo nombre es necesario.',            
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
