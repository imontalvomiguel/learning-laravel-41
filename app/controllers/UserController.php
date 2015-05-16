<?php

use HireMe\Entities\User;

use HireMe\Managers\RegisterManager;
use HireMe\Managers\AccountManager;
use HireMe\Managers\ProfileManager;

use HireMe\Repositories\CandidateRepo;
use HireMe\Repositories\CategoryRepo;


use HireMe\Components\FieldBuilder;

class UserController extends BaseController
{

  protected $candidateRepo;
  protected $categoryRepo;

  public function __construct(CandidateRepo $candidateRepo, CategoryRepo $categoryRepo) {
    $this->candidateRepo = $candidateRepo;
    $this->categoryRepo = $categoryRepo;
  }

  public function signUp()
  {
    return View::make('users/sign-up');
  }

  public function registerUser() {
    $user = $this->candidateRepo->newCandidate();
    // El manager filtrará la información que necesitamos
    $manager = new RegisterManager($user, Input::all());

    // El manager maneja los errores y excepciones
    $manager->save();

    return Redirect::route('home');

    // return Redirect::back()->withInput()->withErrors($manager->getErrors());
  }

  public function account()
  {
    // Obtenemos la información del usuario
    $user = Auth::user();

    // Lo mandamos como argumento para una vista
    return View::make('users/account', compact('user'));
  }

  public function updateAccount() {
    // Me traigo el usuario autenticado con el componente de auth de laravel
    $user = Auth::user();
    // El manager filtrará la información que necesitamos
    $manager = new AccountManager($user, Input::all());

    $manager->save();

    return Redirect::route('home');
    //return Redirect::back()->withInput()->withErrors($manager->getErrors());
  }

  public function profile() {
    $user = Auth::user();
    $candidate = $user->getCandidate();
    // dd($candidate);

    $categories = $this->categoryRepo->getList();
    $job_types = \Lang::get('utils.job_types');

    return View::make('users/profile', compact('user', 'candidate', 'categories', 'job_types'));

  }

  public function updateProfile() {
    $user = Auth::user();
    $candidate = $user->getCandidate();
    $manager = new ProfileManager($candidate, Input::all());

    $manager->save();

    return Redirect::route('home');
  }

}
