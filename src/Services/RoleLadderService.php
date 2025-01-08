<?php

namespace Italofantone\RoleLadder\Services;

class RoleLadderService
{
    /**
     * Get the ladder steps
     *
     * @return array
     */
    public function getLadderSteps()
    {
        return config('role-ladder.steps');
    }

    /**
     * Get the weight of a step
     *
     * @param string|null $step
     * @return int
     * 
     * @throws \Exception
     */
    public function getStepWeight(?string $step): int
    {
        if (is_null($step)) {
            throw new \Exception('Role is missing or empty.');
        }

        if (!array_key_exists($step, $this->getLadderSteps())) {
            throw new \Exception("Role '$step' not found in ladder steps.");
        }

        return $this->getLadderSteps()[$step];
    }

    /**
     * Compare the steps
     *
     * @param string|null $userRole
     * @param string $requiredRole
     * @return bool
     */
    public function compareRoles(?string $userRole, string $requiredRole): bool
    {
        return $this->getStepWeight($userRole) >= $this->getStepWeight($requiredRole);
    }

    /**
     * Get the steps
     *
     * @return array
     */
    public function getSteps()
    {
        return array_keys($this->getLadderSteps());
    }
}