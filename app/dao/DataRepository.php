<?php

namespace App\dao;

interface DataRepository
{
  public function save($entity);
  public function update($entity);
  public function deleteById($id);
  public function findAll();
  public function findById($id);
}
