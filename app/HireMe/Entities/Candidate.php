<?php
/**
 * Los namespaces nos ayudan a dar apellidos
 * o una manera de diferenciar nuestras clases.
 *
 * Evitan los conflicos entre clases.
 */
  namespace HireMe\Entities;

class Candidate extends \Eloquent {
  // Campos que van a ser llenados Asignación masiva de laravel
	protected $fillable = ['website_url', 'description', 'job_type', 'category_id', 'available'];

  // Asociando usuarios
  public function user() {
    return $this->hasOne('HireMe\Entities\User', 'id', 'id');
  }

  public function category() {
    return $this->belongsTo('HireMe\Entities\Category');
  }

  // Laravel te permite crear tus propios atributos
  public function getJobTypeTitleAttribute() {
    // Esta clase permite traducir textos
    return \Lang::get('utils.job_types.' . $this->job_type);
  }


}
