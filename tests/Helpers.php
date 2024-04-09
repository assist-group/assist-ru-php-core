<?php

function getProperty($object, $property)
{
    $reflectedClass = new \ReflectionClass($object);
    $reflection = $reflectedClass->getProperty($property);

    return $reflection->getValue($object);
}

function getMethod($object, $methodName) {
    $class = new \ReflectionClass($object);
    $method = $class->getMethod($methodName);

    return $method;
}
