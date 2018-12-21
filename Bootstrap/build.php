<?php
include_once 'Core/Builder.php';
$builder = new Builder();
$builder->immersionBuild(public_path('/Core'));
$builder->build(public_path('/Controllers'));
$builder->build(public_path('/Routes'));
$builder->build(public_path());
