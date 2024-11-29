<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'senderEmail' => 'noreply@example.com',
    'senderName' => 'Example.com mailer',
    'user.passwordResetTokenExpire' => 3600,
    'user.passwordMinLength' => 8,

    'status' => [
        'ru' => [
            0 => 'Активный',
            1 => 'Отключённый',
        ],
        'uz' => [
            0 => 'Aktiv',
            1 => 'O`chirilgan'
        ]
    ],
    'user_role' => [
        0 => 'Администратор',
        1 => 'Менеджер',
    ],
    'user_status' => [
        10 => 'Активный',
        9 => 'Отключённый'
    ],
    'user_status_class'=>[
        10=>'btn btn-success w-100 btn-sm',
        9=>'btn btn-danger w-100 btn-sm'
    ],
];
