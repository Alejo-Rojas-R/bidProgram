<?php

class classBid {
    private $budget;
    private $vehicleAmount;
    private $basicFee;
    private $specialFee;
    private $associationFee;
    private $storageFee;
    private $errorMessage;

    /**
     * Constructor
     */
    public function __construct($budget) {
        $this->budget = $budget ?? 0.00;
        $this->vehicleAmount = 0.00;
        $this->basicFee = 0.00;
        $this->specialFee = 0.00;
        $this->associationFee = 0.00;
        $this->storageFee = 0.00;
        $this->errorMessage = "";
    }


    /**
     * This method validates the field and sets an error message depending on the case.
     */
    public function validateInput() {
        // Validate numeric value
        if (!is_numeric($this->budget)) {
            $this->setErrorMessage("Please enter a numeric value.");
        } 
        // Validate negative number
        elseif ($this->budget < 0.00) {
            $this->setErrorMessage("Please enter a positive number.");
        }
    }


    /**
     * This method calculates the bid and sets the results to each specific variable.
     * A do while is performed which starts with the submitted budget, 
     * iterates decreasing it by 0.01 and then stops when the sum of fees is equal to the submitted budget, 
     * meaning that the iteration where it stopped is the vehicle Amount that we were looking for.
     */
    public function calculateBid() {
        $vehicleAmount = $this->budget;

        // Perform a decreased iteration for the submitted budget
        do {
            // Substract 0.01 to iterate
            $vehicleAmount = $vehicleAmount - 0.01;

            // Calculate the "Basic user fee" depending on the conditions
            $basicFee = $vehicleAmount * 0.10;
            $basicFee = ($basicFee <= 10.00) ? 10.00 : 50.00;

            // Calculate the "Association Fee" depending on the conditions
            switch ($vehicleAmount) {
                case $vehicleAmount >= 1 && $vehicleAmount <= 500.00 :
                    $associationFee = 5.00;
                    break;
                case $vehicleAmount > 500.00 && $vehicleAmount <= 1000.00 :
                    $associationFee = 10.00;
                    break;
                case $vehicleAmount > 1000.00 && $vehicleAmount <= 3000.00 :
                    $associationFee = 15.00;
                    break;
                case $vehicleAmount > 3000.00 :
                    $associationFee = 20.00;
                    break;
                default:
                    $associationFee = 0.00;
                    break;
            }

            $specialFee = $vehicleAmount * 0.02;
            $storageFee = 100.00;

            // Add up all the values to then validate
            $result = $vehicleAmount + $basicFee + $specialFee + $associationFee + $storageFee;
            $result = round($result, 2);

            // Continue while result is greater to the budget or greater than 0
        } while($result > $this->budget && $vehicleAmount > 0);

        // Set fees to 0 if the vehicle price is 0
        if ($vehicleAmount <= 0.00) {
            $vehicleAmount = 0;
            $basicFee = 0.00;
            $storageFee = 0.00;
        }

        // Sets the results to the class properties
        $this->setVehicleAmount($vehicleAmount);
        $this->setBasicFee($basicFee);
        $this->setSpecialFee($specialFee);
        $this->setAssociationFee($associationFee);
        $this->setStorageFee($storageFee);
    }


    /**
     * Format values to have 2 decimals and build query string.
     */
    public function formatValues() {

        // Get results
        $budget = $this->getBudget();
        $vehicleAmount = $this->getVehicleAmount();
        $basicFee = $this->getBasicFee();
        $specialFee = $this->getSpecialFee();
        $associationFee = $this->getAssociationFee();
        $storageFee = $this->getStorageFee();
        $error = $this->getErrorMessage();

        // Format the numeric results to have 2 decimals
        $vehicleAmount = number_format($vehicleAmount, 2);
        $basicFee = number_format($basicFee, 2);
        $specialFee = number_format($specialFee, 2);
        $associationFee = number_format($associationFee, 2);
        $storageFee = number_format($storageFee, 2);

        // Build the query string array to return the results
        $queryString = [
            "budget" => $budget,
            "vehicleAmount" => $vehicleAmount,
            "basicFee" => $basicFee,
            "specialFee" => $specialFee,
            "associationFee" => $associationFee,
            "storageFee" => $storageFee,
            "error" => $error
        ];

        return $queryString;
    }
    
    // Setters
    public function setBudget($budget) {
        $this->budget = $budget;
    }
    public function setVehicleAmount($vehicleAmount) {
        $this->vehicleAmount = $vehicleAmount;
    }
    public function setBasicFee($basicFee) {
        $this->basicFee = $basicFee;
    }
    public function setSpecialFee($specialFee) {
        $this->specialFee = $specialFee;
    }
    public function setAssociationFee($associationFee) {
        $this->associationFee = $associationFee;
    }
    public function setStorageFee($storageFee) {
        $this->storageFee = $storageFee;
    }
    public function setErrorMessage($errorMessage) {
        $this->errorMessage = $errorMessage;
    }

    // Getters
    public function getBudget() {
        return $this->budget;
    }
    public function getVehicleAmount() {
        return $this->vehicleAmount;
    }
    public function getBasicFee() {
        return $this->basicFee;
    }
    public function getSpecialFee() {
        return $this->specialFee;
    }
    public function getAssociationFee() {
        return $this->associationFee;
    }
    public function getStorageFee() {
        return $this->storageFee;
    }
    public function getErrorMessage() {
        return $this->errorMessage;
    }
}