<?php

namespace src\utils;

class ResponseHandler
{
    /**
     * Generate success response.
     *
     * @param mixed  $data   Response data
     * @param string $message Optional message
     * @param int    $statusCode HTTP status code (default 200)
     */
    public static function responseSuccess($data, $message = "Successfully", $statusCode = 200)
    {
        $response = [
            'status' => true,
            'message' => $message,
            'errors' => null,
            'data' => $data,
        ];

        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }

    /**
     * Generate error response.
     *
     * @param mixed  $errors Error details
     * @param string $message Optional message
     * @param int    $statusCode HTTP status code (default 400)
     */
    public static function responseError($errors, $message = "Invalid data", $statusCode = 400)
    {
        $response = [
            'status' => false,
            'message' => $message,
            'errors' => $errors,
            'data' => null,
        ];

        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }
}
