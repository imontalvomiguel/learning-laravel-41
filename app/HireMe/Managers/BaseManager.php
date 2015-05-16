<?php

namespace HireMe\Managers;

abstract class BaseManager {

  protected $entity;
  protected $data;

  public function __construct($entity, $data)
  {
    $this->entity = $entity;
    // Nos aseguramos que la data esté definida por nuestras reglas data valida
    $this->data = array_only($data, array_keys($this->getRules()));
  }

  abstract public function getRules();

  // Acá hacemos el proceso de validació
  public function isValid() {
    $rules = $this->getRules();

    $validation = \Validator::make($this->data, $rules);

    if ($validation->fails()){
      throw new ValidationException('Validation failed', $validation->messages());
    }

  }

  // Preparo la data que va ser guardada en la base de datos
  public function prepareData($data) {
    return $data;
  }

  // El manager puede guardar, es el administrador de la entidad
  public function save() {
    $this->isValid();

    $this->entity->fill($this->prepareData($this->data));
    $this->entity->save();

    return true;

  }

}
