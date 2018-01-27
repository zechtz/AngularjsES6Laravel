<?php

use Illuminate\Contracts\Routing\ResponseFactory;

if (!function_exists('customApiResponse')) {
    /**
     * Return a new response from the application.
     *
     * @param  string  $data
     * @param  string  $message
     * @param  string  $errors
     * @param  int     $status
     * @param  array   $headers
     * @return \Symfony\Component\HttpFoundation\Response|\Illuminate\Contracts\Routing\ResponseFactory
     */
    function customApiResponse($data = '', $message = '', $status = 200, $errors = [], array $headers = ['Content-Type' => 'application/json']) {
        $responseData =  [
            'data'    => $data,
            'message' => $message,
            'errors'  => $errors,
            'status'  => $status
        ];
        $factory = app(ResponseFactory::class);
        if (func_num_args() === 0) {
            return $factory;
        }
        return $factory->make(json_encode($responseData), $status, $headers);
    }
}
