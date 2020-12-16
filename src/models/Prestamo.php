<?php

namespace app\models;

use DateTime;
use edustef\mvcFrame\DatabaseModel;

class Prestamo extends DatabaseModel
{
  public string $isbn = '';
  public string $dni = '';
  public string $fechaInicio = '';
  public string $fetchaFin = '';
  public string $estado = '';

  public function rules(): array
  {
    return [
      'isbn' => [self::RULE_REQUIRED, self::RULE_UNIQUE, self::RULE_NUMERIC,  [self::RULE_MIN, 'min' => 13, self::RULE_MAX, 'max' => 13]],
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
      'fechaInicio' => ['label' => 'Fecha Inicio'],
      'fechaFin' => ['label' => 'Fecha Fin'],
      'estado' => ['label' => 'Estado'],
    ];
  }

  public function validate(): bool
  {
    try {
      $tempDate = new DateTime($this->fechaInicio);
    } catch (\Exception $e) {
      $this->addErrorMessage('fechaInicio', $e->getMessage());
      return false;
    }

    try {
      $tempDate = new DateTime($this->fechaFin);
    } catch (\Exception $e) {
      $this->addErrorMessage('fechaInicio', $e->getMessage());
      return false;
    }

    return parent::validate();
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
