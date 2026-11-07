<?php

// Vercel only allows function entry points inside /api, so this file
// forwards every request to Laravel's normal front controller.
foreach (['/tmp/views', '/tmp/cache', '/tmp/sessions'] as $dir) {
    if (! is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }
}

require __DIR__ . '/../public/index.php';
