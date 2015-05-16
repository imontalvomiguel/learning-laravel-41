<?php namespace HireMe\Managers;

// Extiende del objeto de Exception de php puro
class ValidationException extends \Exception {
  protected $errors;

  // Pasar la excepcion
  public function __construct($message, $errors) {
    $this->errors = $errors;
    // LLamar al constructor parent de la clase exception
    parent::__construct($message);
  }

  public function getErrors()
  {
    return $this->errors;
  }
}
