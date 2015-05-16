<?php

// La clase Category ahora está en un name distinto
use HireMe\Repositories\CategoryRepo;

// Le específico en que namespace esta Candidate
use HireMe\Entities\Candidate;


// Todos los controladores extienden de un controlador base
class CandidatesController extends BaseController {

  protected $categoryRepo;

  public function __construct(CategoryRepo $categoryRepo) {
    $this->categoryRepo = $categoryRepo;
  }

  public function category($slug, $id) {
    /**
      * La entidad no hace consultas,
      * las consultas se hacen en repositorios
     */
    $category = $this->categoryRepo->find($id);

    // Este método se encarga de lanzar el error 404
    $this->notFoundUnless($category);

    if (!$category) {
      App::abort(404);
    }

    // Si no existe lo que busco entonces 404

    // Mandamos una vista
    return View::make('candidates/category', compact('category'));

  }

  public function show($slug, $id) {
    // Cuando es pequeña la app podemos hacer esto para no crear un repositorio que ejecute la consulta
    $candidate = Candidate::find($id);
    $this->notFoundUnless($candidate);
    return View::make('candidates/candidate', compact('candidate'));
  }
}
