<?php
function after_sleep($salary,$housefund_ratio=0.1,$person_insurance_ratio=.08,$medical_insurance_ratio=.04)
{
  $taxable_income= $salary/12;
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
  }else  if( $taxable_income > 55000 && $taxable_income<=80000){
	$ratio = .35;
	$deduct = 5505;
  }
  $tax = $salary * $ratio-$deduct;
  $money = $salary - $tax;
  return $money;
}
echo "奖金税前\t奖金税后\n";
for ($i=1000;$i<=1000000;$i+=1){
   $after = intval(after_sleep($i,0,0,0));
   $a2b[$after] = $i;
}

$num = array(
57300, 
56805,
24405,
61305,
117105, 
117105,
97305,
225105, 
217222,
79305,
134705, 
198105,
48705,
357005, 
327299,
167505,
22785,
540105, 
82905,
74805,
180105, 
171105,
46005,
62505,
16005,
133679, 
131505,
45105,
41355,
47355,
18105,
180105, 
16636,
27105,
81105,
17655,
57093,
48705,
143734, 
48705,
103605, 
70305,
45105,
56355,
20355,
83805,
17925,
67605,
70080,
137817, 
43305,
56805,
81105, 
7760,
32505,
33855,
40605,
40605,
16811,
17460,
10670,
12933,
48555,
29443,
32730,
48705,
48705,
48705,
59505,
32505,
74355,
11640,
13580, 
9700,
73005,
75705,
18105,
17460,
18105,
67605,
24405,
11640, 
5093,
3880,
2263,
75027, 
3686,
20355, 
8730,
13742,
34305,
25755,
24405,
21705,
33855,
19005, 
16975
);
foreach($num as $eachnum){
	foreach($a2b as $after => $begin ){
		if($after >= $eachnum ){
			echo $eachnum."\t".$begin."\n";	
			break;
		}
	}	
}


?>
