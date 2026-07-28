<?php

namespace App\Controllers\Store;

use App\Core\Controller;

class Profile extends Controller
{
    private const TABLE = 'store_profile';
    private const STORE_ID = 1;

    public function index()
    {
        $this->show();
    }

    public function show()
    {
        $this->handleCors();

        if (!$this->isGet()) {
            $this->error('Method not allowed', 405);
        }

        try {
            $row = $this->db()->get_where(self::TABLE, ['id' => self::STORE_ID], 1)->row_array();
            $this->success($this->transformRow($row), 'Store profile loaded');
        } catch (\Throwable $e) {
            $this->error('Failed to load store profile', 500, [
                'detail' => $e->getMessage(),
            ]);
        }
    }

    public function save()
    {
        $this->handleCors();

        if (!$this->isPost()) {
            $this->error('Method not allowed', 405);
        }

        $body = $this->getBody();
        $payload = $this->normalizePayload($body);

        $this->validate($payload, ['name', 'tagline', 'phone', 'email', 'address']);

        try {
            $existing = $this->db()->get_where(self::TABLE, ['id' => self::STORE_ID], 1)->row_array();

            if ($existing) {
                $saved = $this->db()->update(self::TABLE, $payload, ['id' => self::STORE_ID]);
            } else {
                $saved = $this->db()->insert(self::TABLE, ['id' => self::STORE_ID] + $payload);
            }

            if (!$saved) {
                $this->error('Failed to save store profile', 500);
            }

            $row = $this->db()->get_where(self::TABLE, ['id' => self::STORE_ID], 1)->row_array();
            $this->success($this->transformRow($row), 'Store profile saved');
        } catch (\Throwable $e) {
            $this->error('Failed to save store profile', 500, [
                'detail' => $e->getMessage(),
            ]);
        }
    }

    private function normalizePayload(array $body): array
    {
        return [
            'name' => $this->cleanText($body['name'] ?? ''),
            'tagline' => $this->cleanText($body['tagline'] ?? ''),
            'description' => $this->cleanText($body['description'] ?? ''),
            'logo_url' => $this->cleanText($body['logoUrl'] ?? ''),
            'phone' => $this->cleanText($body['phone'] ?? ''),
            'email' => $this->cleanText($body['email'] ?? ''),
            'whatsapp' => $this->cleanText($body['whatsapp'] ?? ''),
            'address' => $this->cleanText($body['address'] ?? ''),
            'city' => $this->cleanText($body['city'] ?? ''),
            'province' => $this->cleanText($body['province'] ?? ''),
            'postal_code' => $this->cleanText($body['postalCode'] ?? ''),
            'instagram' => $this->cleanText($body['instagram'] ?? ''),
            'tiktok' => $this->cleanText($body['tiktok'] ?? ''),
            'youtube' => $this->cleanText($body['youtube'] ?? ''),
            'open_hours' => $this->cleanText($body['openHours'] ?? ''),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
    }

    private function transformRow(?array $row): ?array
    {
        if (!$row) {
            return null;
        }

        return [
            'id' => (int) ($row['id'] ?? self::STORE_ID),
            'name' => $row['name'] ?? '',
            'tagline' => $row['tagline'] ?? '',
            'description' => $row['description'] ?? '',
            'logoUrl' => $row['logo_url'] ?? '',
            'phone' => $row['phone'] ?? '',
            'email' => $row['email'] ?? '',
            'whatsapp' => $row['whatsapp'] ?? '',
            'address' => $row['address'] ?? '',
            'city' => $row['city'] ?? '',
            'province' => $row['province'] ?? '',
            'postalCode' => $row['postal_code'] ?? '',
            'instagram' => $row['instagram'] ?? '',
            'tiktok' => $row['tiktok'] ?? '',
            'youtube' => $row['youtube'] ?? '',
            'openHours' => $row['open_hours'] ?? '',
            'createdAt' => $row['created_at'] ?? null,
            'updatedAt' => $row['updated_at'] ?? null,
        ];
    }

    private function cleanText($value): string
    {
        return trim((string) $value);
    }
}
