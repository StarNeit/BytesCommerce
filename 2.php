<?php

interface IShipmentHandler {
    public function do(Shipment $shipment): void;
}

class Shipment {
    public function __construct(
        public int $id = 1,
        public string $address = 'London',
        public int $weight = 1000,
        public string $dispatchDetails = 'New'
    ) {}
}

class WeightVerification implements IShipmentHandler {
    public function do(Shipment $shipment): void {
        echo "Verifying weight of shipment ID {$shipment->id}\n";
    }
}

class AddressVerification implements IShipmentHandler {
    public function do(Shipment $shipment): void {
        echo "Verifying address of shipment ID {$shipment->id}\n";
    }
}

class PackageLabelingVerification implements IShipmentHandler {
    public function do(Shipment $shipment): void {
        echo "Verifying package labeling of shipment ID {$shipment->id}\n";
    }
}

class DispatchSchedulingVerification implements IShipmentHandler {
    public function do(Shipment $shipment): void {
        echo "Verifying dispatch scheduling of shipment ID {$shipment->id}\n";
    }
}

class FinalInspectionVerification implements IShipmentHandler {
    public function do(Shipment $shipment): void {
        echo "Verifying final inspection of shipment ID {$shipment->id}\n";
    }
}

class ShipmentProcess {
    private array $handlers = [];

    public function addHandler(IShipmentHandler $handler): void {
        $this->handlers[] = $handler;
    }

    public function process(Shipment $shipment): void {
        foreach ($this->handlers as $handler) {
            $handler->do($shipment);
        }
    }
}

$shipmentProcess = new ShipmentProcess();
$shipmentProcess->addHandler(new WeightVerification());
$shipmentProcess->addHandler(new AddressVerification());
$shipmentProcess->addHandler(new PackageLabelingVerification());
$shipmentProcess->addHandler(new DispatchSchedulingVerification());
$shipmentProcess->addHandler(new FinalInspectionVerification());

$shipment = new Shipment();
$shipmentProcess->process($shipment);
