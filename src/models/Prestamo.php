<?php

namespace api\models;

use DateTime;
use edustef\mvcFrame\DatabaseModel;

class Prestamo extends DatabaseModel
{
  public string $isbn = '';
  public string $dni = '';
  public string $fechaInicio = '';
  public string $fechaFin = '';
  public string $estado = '0';

  public const MAX_ESTADO = 4;

  public function attributes(): array
  {
    return [
      'isbn' => [
        'label' => 'ISBN',
        'rules' => [self::RULE_REQUIRED, [self::RULE_UNIQUE, 'tableName' => self::tableName()], self::RULE_NUMERIC,  [self::RULE_MIN, 'min' => 13, self::RULE_MAX, 'max' => 13]]
      ],
      'dni' => [
        'label' => 'DNI',
        'rules' => [self::RULE_REQUIRED, [self::RULE_UNIQUE, 'tableName' => self::tableName()], [self::RULE_MIN, 'min' => 10], [self::RULE_MAX, 'max' => 10]]
      ],
      'fechaInicio' => [
        'label' => 'Fecha inicio',
        'rules' => [self::RULE_REQUIRED]
      ],
      'fechaFin' => [
        'label' => 'Fecha fin',
        'rules' => [self::RULE_REQUIRED]
      ],
      'estado' => [
        'label' => 'Estado',
        'rules' => [self::RULE_REQUIRED]
      ],
    ];
  }

  public function validate(): bool
  {
    if (!is_numeric($this->estado) || $this->estado < 0 || $this->estado > self::MAX_ESTADO) {
      $this->addErrorMessage('estado', 'Estado no es valido!');
      return false;
    }

    try {
      new DateTime($this->fechaInicio);
    } catch (\Exception $e) {
      $this->addErrorMessage('fechaInicio', $e->getMessage());
      return false;
    }

    try {
      new DateTime($this->fechaFin);
    } catch (\Exception $e) {
      $this->addErrorMessage('fechaInicio', $e->getMessage());
      return false;
    }

    return parent::validate();
  }

  public static function tableName(): string
  {
    return 'Prestamo';
  }

  public static function getJoinTable()
  {
    $tableName = self::tableName();
    $stmnt = self::prepare("
      SELECT l.titulo, c.nombre, p.fechaInicio, p.fechaFin, p.estado 
      FROM $tableName p
      INNER JOIN Cliente c USING (dni)
      INNER JOIN Libro l USING (isbn)
    ");

    $stmnt->execute();

    return $stmnt->fetchAll(\PDO::FETCH_ASSOC);
  }
}
