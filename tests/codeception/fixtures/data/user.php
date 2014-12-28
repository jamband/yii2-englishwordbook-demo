<?php

$timestramp = (new DateTime)->getTimestamp();

return [
    'user1' => [
        'username' => 'admin',
        'email' => 'admin@example.com',
        'password' => '$2y$10$yAoLOqZfIt/grkJPAzEKUOityov3qZ3bIS7cQEeniCuc3juKrNZey',
        'auth_key' => 'vsv3qFJMrrHl3bleLMP0ntLKlAq-AXuC',
        'created_at' => $timestramp,
        'updated_at' => $timestramp,
    ],
    'user2' => [
        'username' => 'demo',
        'email' => 'demo@example.com',
        'password' => '$2y$10$n8T6izyA2F.F1Frz.HDsQ.qIyDuaDrmCp2VCRDYIY.tq6CHLPYOxi',
        'auth_key' => 'XUq6GABkKiNRcY9bu0gbf51qUigRPCj7',
        'created_at' => $timestramp,
        'updated_at' => $timestramp,
    ],
];
