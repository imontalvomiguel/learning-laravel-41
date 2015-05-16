<?php

use HireMe\Repositories\CandidateRepo;

class HomeController extends BaseController {

  /**
   * La tarea de este controlador es pedir un repositorio
   * para que este ejecute las consultas y aquí nos devuelva la información
   * que necesitamos aquí.
   *
   * El controlador no debe saber como hacer la consulta
   * solamente debe saber a quíen pedirselo.
   */
  protected $candidateRepo;

  public function __construct(CandidateRepo $candidateRepo) {
    $this->candidateRepo = $candidateRepo;
  }

	public function index()
  {
    $latest_candidates = $this->candidateRepo->findLatest();
    return View::make('home', compact('latest_candidates'));
	}

}
