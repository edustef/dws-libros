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
        'rules' => [self::RULE_REQUIRED, self::RULE_NUMERIC,  [self::RULE_MIN, 'min' => 13, self::RULE_MAX, 'max' => 13]]
      ],
      'dni' => [
        'label' => 'DNI',
        'rules' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 10], [self::RULE_MAX, 'max' => 10]]
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

  public function save(): bool
  {
    $libro = Libro::findOne(['isbn' => $this->isbn]);
    $res = $libro->removeEjemplar();
    if (!$res) {
      return false;
    }

    $this->estado = $this->getEstado();

    return parent::save();
  }

  public function update(array $attributes, array $where = null): bool
  {
    if (!isset($attributes['estado']) && isset($attributes['fechaFin'])) {
      $attributes['estado'] = $this->getEstado($attributes['fechaFin']);
    }

    if (!$this->isValidEstado($attributes['estado'])) {
      $this->addErrorMessage('estado', 'Estado no es valido!');
      return false;
    }

    $libro = Libro::findOne(['isbn', $this->isbn]);
    $libro->removeEjemplar();

    $res = false;
    switch ($attributes['estado']) {
      case '0':
        $res = $libro->addEjemaplar();
        break;
      case '1':
        $res = $libro->removeEjemplar();
        break;
    }
    if (!$res) return false;

    return parent::update($attributes, $where);
  }

  public static function tableName(): string
  {
    return 'Prestamo';
  }

  public static function getJoinTable()
  {
    $tableName = self::tableName();
    $stmnt = self::prepare("
      SELECT l.isbn, c.dni, l.titulo, c.nombre, p.fechaInicio, p.fechaFin, p.estado 
      FROM $tableName p
      INNER JOIN Cliente c USING (dni)
      INNER JOIN Libro l USING (isbn)
    ");

    $stmnt->execute();

    return $stmnt->fetchAll(\PDO::FETCH_ASSOC);
  }

  public function isValidEstado($estado = null)
  {
    $estado = $estado ?? $this->estado;

    return is_numeric($estado) && $estado >= 0 && $estado < self::MAX_ESTADO;
  }

  public function getEstado($fechaFin = null)
  {
    $estado = '0';

    try {
      $today = new DateTime();
      $tempFin = new DateTime($fechaFin ?? $this->fechaFin);

      $interval = $tempFin->diff($today);

      if ($interval->y >= 1) {
        $estado = '3';
      } else if ($interval->m >= 1) {
        $estado = '2';
      }
    } catch (\Exception $e) {
      $this->addErrorMessage('fechaInicio', $e->getMessage());
      return false;
    }

    return $estado;
  }
}
