<?php

namespace api\models;

use edustef\mvcFrame\DatabaseModel;

class Libro extends DatabaseModel
{
  public string $isbn = '';
  public string $titulo = '';
  public string $subtitulo = '';
  public string $descripcion = '';
  public string $autor = '';
  public string $editorial = '';
  public string $categoria = '';
  public string $imagenPortada = '';
  public string $numEjemplaresTotales = '';
  public string $numEjemplaresDisponibiles = '';

  public function attributes(): array
  {
    return [
      'isbn' => [
        'label' => 'ISBN',
        'rules' => [self::RULE_REQUIRED, [self::RULE_UNIQUE, 'tableName' => self::tableName()], [self::RULE_MIN, 'min' => 13], [self::RULE_MAX, 'max' => 13]]
      ],
      'titulo' => [
        'label' => 'titulo',
        'rules' => [self::RULE_REQUIRED,  [self::RULE_MAX, 'max' => 50]]
      ],
      'subtitulo' => [
        'label' => 'subtitulo',
        'rules' => [[self::RULE_MAX, 'max' => 255]]
      ],
      'descripcion' => [],
      'autor' => [
        'label' => 'descripcion',
        'rules' => [self::RULE_REQUIRED, [self::RULE_MAX, 'max' => 50]]
      ],
      'editorial' => [
        'label' => 'editorial',
        'rules' => [self::RULE_REQUIRED, [self::RULE_MAX, 'max' => 50]]
      ],
      'categoria' => [
        'label' => 'categoria',
        'rules' => [self::RULE_REQUIRED, [self::RULE_MAX, 'max' => 50]]
      ],
      'imagenPortada' => [
        'label' => 'Imagen portada',
        'rules' => [self::RULE_REQUIRED, [self::RULE_MAX, 'max' => 255]]
      ],
      'numEjemplaresTotales' => [
        'label' => 'Numero ejemplares totales',
        'rules' => [self::RULE_REQUIRED, self::RULE_NUMERIC]
      ],
      'numEjemplaresDisponibiles' => [
        'label' => 'Numero ejemplares disponibiles',
        'rules' => [self::RULE_REQUIRED, self::RULE_NUMERIC]
      ],
    ];
  }

  public static function tableName(): string
  {
    return 'Libro';
  }

  public function primaryKey(): string
  {
    return 'isbn';
  }
}
