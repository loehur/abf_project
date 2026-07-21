<?php

/**
 * Salin file ini ke Env.php dan sesuaikan credential.
 * Env.php tidak di-commit ke git (lihat api/.gitignore).
 */
class Env
{
    const MODE = 'dev'; // 'dev' | 'pro'
    const DB_HOST = 'localhost';
    const APP_NAME = 'My App API';

    /**
     * Database credentials per environment.
     * Index 0 = database utama.
     */
    const DB_CREDENTIALS = [
        'dev' => [
            0 => ['db' => 'myapp', 'user' => 'root', 'pass' => ''],
        ],
        'pro' => [
            0 => ['db' => 'myapp', 'user' => 'myapp', 'pass' => 'ISI_PASSWORD'],
        ],
    ];

    /**
     * Origin yang diizinkan untuk CORS.
     * Tambahkan domain production Anda di sini.
     */
    const ALLOWED_ORIGINS = [
        'http://localhost',
        'http://127.0.0.1',
    ];

    public static function isDev(): bool
    {
        return self::MODE === 'dev';
    }
}
