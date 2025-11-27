<?php

return [
    'registration' => [
        'gender_id'  => [
            'required' => 'Gender field is required.',
            'integer' => 'Gender must be a number.',
            'exists' => 'Selected gender does not exist.'
        ],
        'email' => [
            'required' => 'Email field is required.',
            'string' => 'Email must be a string.',
            'email' => 'Enter a valid email address.',
            'unique' => 'User with this email is already registered.'
        ],
        'password' => [
            'required' => 'Password field is required.',
            'string' => 'Password must be a string.',
            'confirmed' => 'Passwords do not match.',
            'min' => 'Password must contain at least :min characters.'
        ]
    ]
];
