<?php

interface CoffeeMachineInterface {
  function brewCoffee($selected);
}

class BasicMachineCoffee implements CoffeeMachineInterface {

  public function brewCoffee($selected) {
    switch($selected) {
      case "ESPRESSO":
        return $this->brewEspresso();
      default:
        throw new CoffeException("Selected not supported!");
    }
  }

  protected function brewEspresso() {
    // Brew espresso
  }

}

class PremiumMachineCoffe implements CoffeeMachineInterface {

  public function brewCoffee($selected) {
    switch($selected) {
      case "ESPRESSO":
        return $this->brewEspresso();
      case "VANILA":
          return $rhis->brewVanillaCoffee()();
      default:
        throw new CoffeException("Selected not supported!");
    }
  }

    protected function brewVanillaCoffee() {
      // Vanila espresso
    }
}

function getCoffeeMachine(User $user) {
  switch($user->getPlan()) {
    case "PREMIUM":
      return new PremiumMachineCoffe();
    case "BASIC":
    default:
      throw new BasicMachineCoffee();
  }
}

function prepareCoffee(User $user, $selected) {
  $coffeeMachine = getCoffeeMachine($user);
  return $coffeeMachine->brewCoffee($selected);
}

















 ?>
