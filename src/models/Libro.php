<?php

namespace app\models;

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
  public string $image_portada = '';
  public string $num_ejemplares_totales = '';
  public string $um_ejemplares_disponibiles = '';

  public function rules(): array
  {
    return [
      'isbn' => [self::RULE_REQUIRED, self::RULE_UNIQUE, [self::RULE_MIN, 'min' => 13], [self::RULE_MAX, 'max' => 13]],
      'titulo' => [self::RULE_REQUIRED,  [self::RULE_MAX, 'max' => 50]],
      'subtitulo' => [self::RULE_REQUIRED, [self::RULE_MAX, 'max' => 255]],
      'descripcion' => [],
      'autor' => [self::RULE_REQUIRED, [self::RULE_MAX, 'max' => 50]],
      'editorial' => [self::RULE_REQUIRED, [self::RULE_MAX, 'max' => 50]],
      'categoria' => [self::RULE_REQUIRED, [self::RULE_MAX, 'max' => 50]],
      'images_portada' => [self::RULE_REQUIRED, [self::RULE_MAX, 'max' => 255]],
      'num_ejemplares_totales' => [self::RULE_REQUIRED, self::RULE_NUMERIC],
      'num_ejemplares_disponibiles' => [self::RULE_REQUIRED, self::RULE_NUMERIC],
    ];
  }

  public function attributes(): array
  {
    return [
      'dni' => ['label' => 'DNI'],
      'nombre' => ['label' => 'Nombre'],
      'apellidos' => ['label' => 'Apellidos'],
      'edad' => ['label' => 'Edad'],
      'direccion' => ['label' => 'Direccion'],
      'telefono' => ['label' => 'Telefono'],
      'email' => ['label' => 'Email']
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
