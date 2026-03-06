<?php

namespace App\Exceptions;

use Exception;

class CustomApiException extends Exception
{
  protected $statusCode;
  protected $errors;

  public function __construct($message = 'An error occurred', $statusCode = 400, $errors = null)
  {
    parent::__construct($message);
    $this->statusCode = $statusCode;
    $this->errors = $errors;
  }

  public function render($request)
  {
    return response()->json([
      'success' => false,
      'message' => $this->getMessage(),
      'errors' => $this->errors,
      'status_code' => $this->statusCode
    ], $this->statusCode);
  }
}
