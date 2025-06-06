<?php

namespace LetsBot\Api\Services;

use LetsBot\Api\Contracts\HttpClientInterface;
use LetsBot\Api\Contracts\ServiceInterface;

/**
 * Button Service
 */
class ButtonService implements ServiceInterface
{
    /**
     * @var HttpClientInterface
     */
    protected $client;

    /**
     * @var string
     */
    protected $buttonType;

    /**
     * @var string|null
     */
    protected $phoneNumber;

    /**
     * Create a new button service
     *
     * @param HttpClientInterface $client
     * @param string $buttonType
     */
    public function __construct(HttpClientInterface $client, string $buttonType = 'button')
    {
        $this->client = $client;
        $this->buttonType = $buttonType;
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
     * Send request with provided parameters
     *
     * @param array|null $params
     * @return array
     */
    public function send(array $params = null): array
    {
        $data = $params ?? [];
        
        if ($this->phoneNumber && !isset($data['to'])) {
            $data['to'] = $this->phoneNumber;
        }
        
        return $this->client->post($this->getEndpoint(), $data);
    }
    
    /**
     * Create regular buttons service
     * 
     * @param HttpClientInterface $client
     * @return self
     */
    public static function regular(HttpClientInterface $client): self
    {
        return new static($client, 'button');
    }
    
    /**
     * Create image button service
     * 
     * @param HttpClientInterface $client
     * @return self
     */
    public static function imageButton(HttpClientInterface $client): self
    {
        return new static($client, 'image_button');
    }
    
    /**
     * Create video button service
     * 
     * @param HttpClientInterface $client
     * @return self
     */
    public static function videoButton(HttpClientInterface $client): self
    {
        return new static($client, 'video_button');
    }
    
    /**
     * Create document button service
     * 
     * @param HttpClientInterface $client
     * @return self
     */
    public static function documentButton(HttpClientInterface $client): self
    {
        return new static($client, 'document_button');
    }
    
    /**
     * Create location button service
     * 
     * @param HttpClientInterface $client
     * @return self
     */
    public static function locationButton(HttpClientInterface $client): self
    {
        return new static($client, 'location_button');
    }
    
    /**
     * Create template button service
     * 
     * @param HttpClientInterface $client
     * @return self
     */
    public static function template(HttpClientInterface $client): self
    {
        return new static($client, 'template_button');
    }
    
    /**
     * Create image template service
     * 
     * @param HttpClientInterface $client
     * @return self
     */
    public static function imageTemplate(HttpClientInterface $client): self
    {
        return new static($client, 'image_template');
    }
    
    /**
     * Create video template service
     * 
     * @param HttpClientInterface $client
     * @return self
     */
    public static function videoTemplate(HttpClientInterface $client): self
    {
        return new static($client, 'video_template');
    }
    
    /**
     * Create document template service
     * 
     * @param HttpClientInterface $client
     * @return self
     */
    public static function documentTemplate(HttpClientInterface $client): self
    {
        return new static($client, 'document_template');
    }
    
    /**
     * Create location template service
     * 
     * @param HttpClientInterface $client
     * @return self
     */
    public static function locationTemplate(HttpClientInterface $client): self
    {
        return new static($client, 'location_template');
    }
    
    /**
     * Send button message with text and buttons
     *
     * @param string $to
     * @param string $text
     * @param array $buttons
     * @param string $footer
     * @return array
     */
    public function sendButtons(string $to, string $text, array $buttons, string $footer = null): array
    {
        $data = [
            'to' => $to,
            'text' => $text,
            'buttons' => $buttons
        ];
        
        if ($footer) {
            $data['footer'] = $footer;
        }
        
        return $this->send($data);
    }
    
    /**
     * Send media button with url
     *
     * @param string $to
     * @param string $url
     * @param string $text
     * @param array $buttons
     * @param string $caption
     * @param string $footer
     * @return array
     */
    public function sendMediaButton(string $to, string $url, string $text, array $buttons, string $caption = null, string $footer = null): array
    {
        $data = [
            'to' => $to,
            'url' => $url,
            'text' => $text,
            'buttons' => $buttons
        ];
        
        if ($caption) {
            $data['caption'] = $caption;
        }
        
        if ($footer) {
            $data['footer'] = $footer;
        }
        
        return $this->send($data);
    }
    
    /**
     * Send template button with text and buttons
     *
     * @param string $to
     * @param string $text
     * @param array $buttons
     * @param string $footer
     * @return array
     */
    public function sendTemplate(string $to, string $text, array $buttons, string $footer = null): array
    {
        $data = [
            'to' => $to,
            'text' => $text,
            'buttons' => $buttons
        ];
        
        if ($footer) {
            $data['footer'] = $footer;
        }
        
        return $this->send($data);
    }
    
    /**
     * Send media template with url
     *
     * @param string $to
     * @param string $url
     * @param string $text
     * @param array $buttons
     * @param string $caption
     * @param string $footer
     * @return array
     */
    public function sendMediaTemplate(string $to, string $url, string $text, array $buttons, string $caption = null, string $footer = null): array
    {
        $data = [
            'to' => $to,
            'url' => $url,
            'text' => $text,
            'buttons' => $buttons
        ];
        
        if ($caption) {
            $data['caption'] = $caption;
        }
        
        if ($footer) {
            $data['footer'] = $footer;
        }
        
        return $this->send($data);
    }
    
    /**
     * Get the endpoint for the button type
     *
     * @return string
     */
    protected function getEndpoint(): string
    {
        return $this->buttonType;
    }
} 