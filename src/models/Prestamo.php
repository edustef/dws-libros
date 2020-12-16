<?php

namespace app\models;

use edustef\mvcFrame\DatabaseModel;

class Prestamo extends DatabaseModel
{
  public string $isbn = '';
  public string $dni = '';
  public string $fecha_inicio = '';
  public string $fetcha_fin = '';
  public string $estado = '';

  public function rules(): array
  {
    return [
      'isbn' => [self::RULE_REQUIRED, self::RULE_UNIQUE,  [self::RULE_MIN, 'min' => 13, self::RULE_MAX, 'max' => 13]],
      'dni' => [self::RULE_REQUIRED, self::RULE_UNIQUE, [self::RULE_MIN, 'min' => 10], [self::RULE_MAX, 'max' => 10]],
      'fecha_inicio' => [self::RULE_REQUIRED],
      'fecha_fin' => [self::RULE_REQUIRED],
      'estado' => [],
    ];
  }

  public function attributes(): array
  {
    return [
      'isbn' => ['label' => 'ISBN'],
      'dni' => ['label' => 'DNI'],
      'fecha_inicio' => ['label' => 'Fecha Inicio'],
      'fecha_fin' => ['label' => 'Fecha Fin'],
      'estado' => ['label' => 'Estado'],
    ];
  }

  public static function tableName(): string
  {
    return 'Cliente';
  }

  public function primaryKey(): string
  {
    return 'dni';
  }
}
