<?php

namespace SymfonySkillbox\HomeworkBundle;

class HealthStrategy implements StrategyInterface
{

    /**
     * @param Unit[] $units
     * @param int $resource
     * @return Unit|null
     */
    public function next(array $units, int $resource): ?Unit
    {
        $units = array_filter($units, function(Unit $unit) use ($resource) {
            return $unit->getCost() <= $resource;//Юнит должен быть дешевле, чем имеющиеся деньги
        });
        uasort($units, function ($a, $b) {
            /** @var Unit|null $a */
            /** @var Unit|null $b */
            return $a->getHealth() > $b->getHealth() ? -1 : 1;

        });
        return array_shift($units);
    }
}