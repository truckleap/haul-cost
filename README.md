# haul-cost

Tiny, dependency-free PHP helpers for the numbers a small trucking carrier checks before saying yes to a load.

```php
use TruckLeap\HaulCost\HaulCost;

HaulCost::costPerMile(4200, 6100, 9800);      // 1.051 dollars per mile
HaulCost::deadheadShare(120, 880);            // 0.12
HaulCost::fuelCost(880, 6.5, 3.89);           // 526.65
HaulCost::allInRatePerMile(2400, 880, 120);   // 2.4
```

Install with `composer require truckleap/haul-cost`.

## Why the all-in rate matters

A posted rate is quoted on loaded miles only. The miles you drive empty to reach the shipper are paid by the same check, so the honest number is the linehaul divided by every mile on the trip. The `allInRatePerMile` helper does exactly that.

If you'd rather punch the numbers into a form than write code, there's a [browser version of the cost-per-mile math](https://truckleap.com/cost-per-mile-calculator) that does the same thing.

MIT licensed. Maintained by George Green at [TruckLeap](https://truckleap.com).
