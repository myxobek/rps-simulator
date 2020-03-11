<?php

namespace app\logic;

interface IStrategy
{
    public function getVariant() : IVariant;
}
