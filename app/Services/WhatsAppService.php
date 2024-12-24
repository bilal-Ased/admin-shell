<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WhatsAppService
{
    protected $apiUrl;
    protected $bearerToken;

    public function __construct()
    {
        $this->apiUrl = 'https://graph.facebook.com/v17.0/' . env('WHATSAPP_PHONE_NUMBER_ID') . '/messages';
        $this->bearerToken = env('WHATSAPP_BEARER_TOKEN');
    }

    /**
     * Send a WhatsApp notification.
     *
     * @param string $recipientPhone The recipient's phone number in E.164 format (e.g., 254797686905).
     * @param string $name The recipient's name.
     * @return void
     * @throws \Exception
     */
    public function sendAppointmentNotification(string $recipientPhone, string $name, string $appointmentDate, string $appointmenTime): void
    {
        $response = Http::withHeaders([
            'Authorization' => "Bearer {$this->bearerToken}",
            'Content-Type' => 'application/json',
        ])->post($this->apiUrl, [
            'messaging_product' => 'whatsapp',
            'to' => $recipientPhone,
            'type' => 'template',
            'template' => [
                'name' => 'appointment_booked',
                'language' => [
                    'code' => 'en',
                ],
                'components' => [
                    [
                        'type' => 'body',
                        'parameters' => [
                            ['type' => 'text', 'text' => $name . ''],
                            ['type' => 'text', 'text' => $appointmentDate . ''],
                            ['type' => 'text', 'text' => $appointmenTime . ''],
                        ],
                    ],
                ],
            ],
        ]);

        if (!$response->successful()) {
            throw new \Exception('Failed to send WhatsApp message: ' . $response->body());
        }
    }
}
