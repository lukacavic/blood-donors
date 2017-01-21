<?php

return array(

    'bloodtypes' => [
        'types' => [
            0 => '+0',
            1 => '0-',
            2 => 'A'
        ]
    ],

    //When donors are created, this is their password.
    'default_password' => '12345678',

    //Donors sex
    'DONOR_MALE' => 1,
    'DONOR_FEMALE' => 2,

    'DONOR_SEX' => [
        1 => 'Muško',
        2 => 'Žensko',
    ],

    //Donors contact type
    'DONOR_CONTACT_SMS' => 1,
    'DONOR_CONTACT_CARD' => 2,
    'DONOR_CONTACT_EMAIL' => 3,

    'DONOR_CONTACT_TYPE' => [
        1 => 'SMS',
        2 => 'Pozivnica',
        3 => 'Email'
    ],

    //Action status
    'ACTION_INCOMING' => 1,
    'ACTION_FINISHED' => 2,

    'ACTION_STATUS' => [
        1 => 'Nadolazeća',
        2 => 'Završena'
    ],

    'ACTION_COMMING' => 1,
    'ACTION_NOT_COMMING' => 2,

    //Action donations status
    'ACTION_MANAGED_TO_DONATE' => 1,
    'ACTION_FAILED_TO_DONATE' => 0,
    //Paths
    'DONOR_AVATARS_FOLDER' => 'app/images/donors/avatars/',
    'DONOR_AVATARS_DEFAULT_AVATAR' => 'app/images/donors/default.png',


);
