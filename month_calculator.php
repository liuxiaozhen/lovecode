<?php
function after_sleep($salary,$housefund_ratio=0.1,$person_insurance_ratio=.08,$medical_insurance_ratio=.04, $insurance_final=null)
{
  $base = 3500;
  $housefund = $salary * $housefund_ratio; //.10 .8
  $person_insurance = $salary * $person_insurance_ratio;
  $medical_insurance = $salary * $medical_insurance_ratio;
  $insurance=($housefund + $person_insurance +$medical_insurance);
  if( $insurance_final !== null ){
	 $insurance = $insurance_final;  
  }

  if ($salary - $insurance  < $base ){
    return $salary - $insurance;
  }
  $taxable_income= ($salary - $insurance -$base );
   if ($taxable_income <=1500 ){
    $ratio = .03;
    $deduct = 0;
  }else if ($taxable_income > 1500 && $taxable_income <=4500) {
    $ratio = .1;
    $deduct = 105;
  }else if ($taxable_income > 4500 && $taxable_income <=9000) {
    $ratio = .2;
    $deduct = 555;
  } else if ($taxable_income > 9000 && $taxable_income <= 35000) {
    $ratio = .25;
    $deduct = 1005;
  } else if ($taxable_income > 35000 && $taxable_income <= 55000) {
    $ratio = .3;
    $deduct = 2755;
  } else  if( $taxable_income > 55000 && $taxable_income<=80000){
      $ratio = .35;
	  $deduct = 5505;
   }
  $tax = $taxable_income * $ratio-$deduct;
  $money = $salary -$insurance-$tax;
  return $money;
}
echo "税前\t税后\n";
for ($i=20000; $i<=70000; $i+=100)
echo $i,"\t",after_sleep($i, 0, 0, 0, 2400),"\n";

?>
