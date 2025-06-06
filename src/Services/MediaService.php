<?php

namespace LetsBot\Api\Services;

use LetsBot\Api\Contracts\HttpClientInterface;
use LetsBot\Api\Contracts\ServiceInterface;

/**
 * Media Service
 */
class MediaService implements ServiceInterface
{
    /**
     * @var HttpClientInterface
     */
    protected $client;

    /**
     * @var string
     */
    protected $mediaType;
    
    /**
     * @var string|null
     */
    protected $phoneNumber;

    /**
     * Create a new media service
     *
     * @param HttpClientInterface $client
     * @param string $mediaType
     */
    public function __construct(HttpClientInterface $client, string $mediaType = null)
    {
        $this->client = $client;
        $this->mediaType = $mediaType;
    }

    /**
     * Create file media service
     *
     * @param HttpClientInterface $client
     * @return MediaService
     */
    public static function file(HttpClientInterface $client): MediaService
    {
        return new static($client, 'file');
    }

    /**
     * Create image media service
     *
     * @param HttpClientInterface $client
     * @return MediaService
     */
    public static function image(HttpClientInterface $client): MediaService
    {
        return new static($client, 'image');
    }

    /**
     * Create video media service
     *
     * @param HttpClientInterface $client
     * @return MediaService
     */
    public static function video(HttpClientInterface $client): MediaService
    {
        return new static($client, 'video');
    }

    /**
     * Create audio media service
     *
     * @param HttpClientInterface $client
     * @return MediaService
     */
    public static function audio(HttpClientInterface $client): MediaService
    {
        return new static($client, 'audio');
    }

    /**
     * Create gif media service
     *
     * @param HttpClientInterface $client
     * @return MediaService
     */
    public static function gif(HttpClientInterface $client): MediaService
    {
        return new static($client, 'gif');
    }

    /**
     * Create PTT (Push to Talk) media service
     *
     * @param HttpClientInterface $client
     * @return MediaService
     */
    public static function ptt(HttpClientInterface $client): MediaService
    {
        return new static($client, 'ptt');
    }

    /**
     * Create location media service
     *
     * @param HttpClientInterface $client
     * @return MediaService
     */
    public static function location(HttpClientInterface $client): MediaService
    {
        return new static($client, 'location');
    }

    /**
     * Create contact message service
     *
     * @param HttpClientInterface $client
     * @return MediaService
     */
    public static function contactMessage(HttpClientInterface $client): MediaService
    {
        return new static($client, 'contact');
    }

    /**
     * Send request with provided parameters
     *
     * @param array|null $params
     * @return array
     */
    public function send(array $params = null): array
    {
        $data = $params ?? [];
        
        // Ensure we have a phone number
        if ($this->phoneNumber && !isset($data['to'])) {
            $data['to'] = $this->phoneNumber;
        }
        
        // Handle different media types
        switch ($this->mediaType) {
            case 'location':
                return $this->sendLocation(
                    $data['to'],
                    $data['latitude'],
                    $data['longitude'],
                    $data['name'] ?? null,
                    $data['address'] ?? null
                );
            
            case 'contact':
                return $this->sendContact(
                    $data['to'],
                    $data['phone'],
                    $data['first_name'],
                    $data['last_name'] ?? null
                );
                
            default:
                // Handle regular media types (file, image, video, etc.)
                return $this->client->post($this->getEndpoint(), $data);
        }
    }

    /**
     * Send media file with URL
     *
     * @param string $to
     * @param string $url
     * @param string $caption
     * @return array
     */
    public function sendMedia(string $to, string $url, string $caption = null): array
    {
        $params = [
            'to' => $to,
            'url' => $url,
        ];
        
        if ($caption) {
            $params['caption'] = $caption;
        }
        
        return $this->send($params);
    }

    /**
     * Send location
     *
     * @param string $to
     * @param float $latitude
     * @param float $longitude
     * @param string $name
     * @param string $address
     * @return array
     */
    public function sendLocation(string $to, float $latitude, float $longitude, string $name = null, string $address = null): array
    {
        $data = [
            'to' => $to,
            'latitude' => $latitude,
            'longitude' => $longitude,
        ];

        if ($name) {
            $data['name'] = $name;
        }

        if ($address) {
            $data['address'] = $address;
        }

        return $this->client->post('location', $data);
    }

    /**
     * Send contact
     *
     * @param string $to
     * @param string $phoneNumber
     * @param string $firstName
     * @param string $lastName
     * @return array
     */
    public function sendContact(string $to, string $phoneNumber, string $firstName, string $lastName = null): array
    {
        $data = [
            'to' => $to,
            'phone' => $phoneNumber,
            'first_name' => $firstName,
        ];

        if ($lastName) {
            $data['last_name'] = $lastName;
        }

        return $this->client->post('contact', $data);
    }
    
    /**
     * Set the phone number
     *
     * @param string $phone
     * @return self
     */
    public function phone(string $phone): self
    {
        $this->phoneNumber = $phone;
        return $this;
    }

    /**
     * Get the endpoint for the media type
     *
     * @return string
     */
    protected function getEndpoint(): string
    {
        return $this->mediaType;
    }
} 