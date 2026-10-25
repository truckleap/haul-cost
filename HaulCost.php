<?php

namespace TruckLeap\HaulCost;

/**
 * Plain trucking cost helpers. All money values are in dollars, distances in miles.
 */
final class HaulCost
{
    /** Total operating cost divided by total miles (loaded plus empty). */
    public static function costPerMile(float $fixedCosts, float $variableCosts, float $totalMiles): float
    {
        if ($totalMiles <= 0) {
            throw new \InvalidArgumentException('totalMiles must be greater than zero');
        }
        return round(($fixedCosts + $variableCosts) / $totalMiles, 3);
    }

    /** Share of the trip that is empty, from 0 to 1. */
    public static function deadheadShare(float $emptyMiles, float $loadedMiles): float
    {
        $total = $emptyMiles + $loadedMiles;
        return $total > 0 ? round($emptyMiles / $total, 4) : 0.0;
    }

    /** Diesel cost for a run, given miles, miles per gallon and price per gallon. */
    public static function fuelCost(float $miles, float $mpg, float $pricePerGallon): float
    {
        if ($mpg <= 0) {
            throw new \InvalidArgumentException('mpg must be greater than zero');
        }
        return round($miles / $mpg * $pricePerGallon, 2);
    }

    /** Rate per loaded mile once empty miles are counted against the payout. */
    public static function allInRatePerMile(float $linehaul, float $loadedMiles, float $emptyMiles): float
    {
        $total = $loadedMiles + $emptyMiles;
        if ($total <= 0) {
            throw new \InvalidArgumentException('miles must be greater than zero');
        }
        return round($linehaul / $total, 3);
    }
}
