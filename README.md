Description
Develop software that will allow a person to calculate their purchasing power at a car auction. The aim is to calculate the maximum value that he or she can bid on a car with a given budget. The software must consider several costs in the calculation. The buyer must pay various fees for the transaction, all of which are calculated on the original bid amount. The total amount calculated is the bid amount (vehicle amount) plus the fees based on the vehicle amount. Fees must be configurable and not pre-calculated.

Requirements
-	The person must enter their budget’s total amount.
-	The software must find the maximum amount of the vehicle. 
-	The result should show the vehicle amount, the list of fees and the total amount.
-	The total amount corresponds to the budget.

List of Fixed and Variable Costs
-	Basic user fee: 10% of the price of the vehicle, minimum $10 and maximum $50. 
-	The seller's special fee: 2% of the vehicle price. 
-	The added costs for the association based on the price of the vehicle:
o	$5 for an amount between $1 and $500
o	$10 for an amount greater than $500 up to $1000
o	$15 for an amount greater than $1000 up to $3000
o	$20 for an amount over $3000
-	A fixed storage fee of $100

Calculation Example
Budget: $1000 
Maximum vehicle amount: $823.53 
Basic fee: $50 (10%, min: $10, max. $50)
Special fee: $16.47 (2%)
Association fee: $10 
Storage fee: $100 

Budget = $1000 = 823.53 + 50 + 16.47 + 10 + 100

The amount to be calculated is the vehicle amount ($823.53) based on the budget amount ($1000). The algorithm must do the reverse calculation.
