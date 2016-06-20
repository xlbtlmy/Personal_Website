<style type=text/css>
A:link{
 color:#AAAAAA;
 font-size:15px;
}
A:visited{
 color:#AAAAAA;
 text-decoration:none;
 border:   #FFFFFF solid 1px;
}
A:hover{
 text-decoration:underline;
  border:   #FFFFFF solid 1px;
}
A:title{
border:   #FFFFFF solid 1px;
}
TD{
text-align:center;
font-size:20px;
background-color:#E6E6E6;
border:   #FFFFFF solid 1px;
color:#198281;
height:20px;
}
TD.title{
background-color:#9a9a9a;
color:#FFFFFF;
font-weight:bold;
}
TABLE{
border-collapse:collapse;

border-color:white;
border:   #198281 solid 0px;
}
</style>
<?php
@$year=$_GET["year"]?$_GET["year"]:date('Y');
@$month=$_GET["month"]?$_GET["month"]:date('m');

draw_month_cal($year,$month);

function draw_month_cal($year,$month)
{
	if(checkdate($month,1,$year))
	{
		if(!$f_day=date("w",mktime(0,0,0,$month,1,$year))) 
			$f_day=7;
		echo '
			<table border=0>
				<tr>
					<th colspan=1>
						<a href="?month='.$month.'&year='.($year-1).'">&lt;&lt;</a>
					</th>
					<th colspan=1>
						<a href="?month='.date('m',mktime(0,0,0,$month-1,1,$year)).'&year='.(($month==1)?($year-1):$year).'">&lt;</a>
					</th>
					<th colspan=3>
						<a href="?month='.date('m').'&year='.date('Y').'">'.$year.'-'.$month.'</a>
					</th>
					<th colspan=1>
						<a href="?month='.date('m',mktime(0,0,0,$month+1,1,$year)).'&year='.(($month==12)?($year+1):$year).'">&gt;</a>
					</th>
					<th colspan=1>
						<a href="?month='.$month.'&year='.($year+1).'">&gt;&gt;</a>
					</th>
				</tr>	
				<tr>';
		for($w=1;$w<8;$w++)
		{
			switch($w)
			{
			case 1:$d='一';break;
			case 2:$d='二';break;
			case 3:$d='三';break;
			case 4:$d='四';break;
			case 5:$d='五';break;
			case 6:$d='六';break;
			case 7:$d='日';break;
			}
			echo '<th>'.$d.'</th>';
		}
		echo '</tr><tr>'.str_repeat('<td>&nbsp;</td>',--$f_day);
		$i=0;
		while(checkdate($month,++$i,$year))
		{
			$style=(date('m')==$month&&date('Y')==$year&&date('j')==$i)?' style="background-color:#CCC"':'';
			echo '<td'.$style.'>'.$i.'</td>';
			if(!(++$f_day%7))
				echo '</tr><tr>';
		}
		echo '</tr></table>';
	}
}
?>
