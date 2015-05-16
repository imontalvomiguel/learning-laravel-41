<?php


class AuthController extends BaseController {

  public function login()
  {
    // La data enviada(solo lo que necesito)
    $data = Input::only('email', 'password', 'remember');

    $credentials = ['email' => $data['email'], 'password' => $data['password']];

    // El componente Auth de laravel nos ayuda a esto
    if (Auth::attempt($credentials, $data['remember']))
    {
      // De vuelta al home(donde antes estaba)
      return Redirect::back();
    }

    // Mando que tenemos un error
    return Redirect::back()->with('login_error', 1);
  }

  // Acción para logout
  public function logout(){
    Auth::logout();
    return Redirect::home();
  }

}
