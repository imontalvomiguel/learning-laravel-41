<?php namespace HireMe\Entities;

class Category extends \Eloquent {
	protected $fillable = [];

  //Definimos la relacion entre candidatos y categorias
  public function candidates() {
    return $this->hasMany('HireMe\Entities\Candidate');
  }

  // Atributo virtual para crear paginación
  public function getPaginateCandidatesAttribute() {
    // Lo puedo usar asi sin desirle un namespace por que estámos dentro del mismo namespace
    // Está dentro de la misma casa, lamisma familia
    return Candidate::where('category_id', $this->id)->paginate(5);
  }
}
