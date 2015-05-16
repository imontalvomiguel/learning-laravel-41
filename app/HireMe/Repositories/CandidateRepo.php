<?php

namespace HireMe\Repositories;

// Un repositorio puede trabajar con varias entidades
use HireMe\Entities\Category;
use HireMe\Entities\Candidates;
use HireMe\Entities\User;

class CandidateRepo {
  public function findLatest($take = 10) {
    // With de eloquent nos permite crear una consulta bien compleja de manera sencilla
    // Podemos personalizar la consulta
    return Category::with([
      'candidates' => function($q) use ($take) {
        $q->take($take);
        $q->orderBy('created_at', 'DESC');
      },
      'candidates.user',
    ])->get();
  }

  public function newCandidate() {
    $user = new User();
    $user->type = 'candidate';
    return $user;
  }
}
