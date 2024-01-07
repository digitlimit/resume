<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class AuthorizationException
 */
class AuthorizationException extends Exception
{
    /**
     * The recommended response to send to the client.
     */
    public ?Response $response;

    /**
     * The status code to use for the response.
     */
    public int $status = 419;

    /**
     * The path the client should be redirected to.
     */
    public string $redirectTo;

    /**
     * Create a new exception instance.
     *
     * @param  Response|null  $response
     * @return void
     */
    public function __construct($response = null)
    {
        parent::__construct('This action is unauthorized.');
        $this->response = $response;
    }

    /**
     * Set the HTTP status code to be used for the response.
     *
     * @return $this
     */
    public function status(int $status): static
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Set the URL to redirect to on a validation error.
     *
     * @return $this
     */
    public function redirectTo(string $url): static
    {
        $this->redirectTo = $url;

        return $this;
    }

    /**
     * Get the underlying response instance.
     */
    public function getResponse(): ?Response
    {
        return $this->response;
    }
}
