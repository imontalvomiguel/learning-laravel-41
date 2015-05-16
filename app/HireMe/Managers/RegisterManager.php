<?php

namespace HireMe\Managers;

class RegisterManager extends BaseManager
{

  // Necesito implementar el método abstracto gerRules
  public function getRules() {
    $rules = [
      'full_name' => 'required',
      'email' => 'required|email|unique:users,email',
      'password' => 'required|confirmed',
      'password_confirmation' => 'required'
    ];

    return $rules;
  }
}
