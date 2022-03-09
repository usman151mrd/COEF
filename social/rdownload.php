<?php


//$tempstr = $row1['p_nm'];
require("../db/database.php");
$cid = $_GET['cid'];
$qid = $_GET['qid'];
//$str="SELECT * from answer where question_id=$_GET[id]  ";
//$result=ExecuteQuery($str);
//$row1=mysqli_fetch_array($result);
 $str = "SELECT * from `related_topic` WHERE t_id=$qid";	
 $str1= "SELECT * FROM `related_topic_comment` WHERE `rtc_id`=$cid";
$mydb->setQuery($str);
$res = $mydb->selection();
$question = $res->fetch();
$mydb->setQuery($str1);
$res1 = $mydb->selection();
$answer = $res1->fetch();

//$str1="SELECT * from question where question_id=$_GET[id]  ";
//$result1=ExecuteQuery($str1);
//$row2=mysqli_fetch_array($result1);

require("../class/fpdf.php");

class PDF extends FPDF
{
// Page header
function Header() //Aa function page ma header nakhva mate 6. jo header nakhvu hoy to j aa function no use kar j.
{
   //  Logo
   // $this->Image('7.jpg',10,6,30);
    // Arial bold 15
    //$this->SetFont('Arial','B',15);
    // Move to the right
    //$this->Cell(80);
     //Title
    //$this->Cell(190,10,'Technical Discussion Forum',1,2,'C');
    // Line break
    //$this->Ln(20);
}

// Page footer
function Footer() //Aa function page ma footer nakhva mate 6. jo footer nakhvu hoy to j aa function no use kar j. Me page no print karaya 6 jo.
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
	$this->Cell(190 - $this->GetStringWidth('Page '.$this->PageNo().'/{nb}'));
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Ahi thi lai ne STOP lakhyu 6 tya sudhi aakha pahe ma header ane footer ni vacche j print karavu 6 enu coading 6.
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
$pdf->MultiCell(0,10,'COMSAT online education Forum','TB','C');

$pdf->SetFont('Arial','B',14);
$pdf->MultiCell(0,10, $question->discription,'TB','C');

$pdf->SetFont('Arial','B',14);
$pdf->MultiCell(0,10,$answer->comment,'TB','C');

$pdf->SetFont('Arial','',12);



/*
$tempstr = 'Standerd : '.$row1['a'];
$pdf->Cell($pdf->GetStringWidth($tempstr),10,'Standerd : '.$row1['std'],0,0,'L');
$pdf->Cell(190 - $pdf->GetStringWidth($tempstr) - $pdf->GetStringWidth('No. Of Que. : '.$row1['noofque']));
$tempstr = 'No. Of Que. : '.$row1['noofque'];
$pdf->Cell($pdf->GetStringWidth($tempstr),10,'No. Of Que. : '.$row1['noofque'],0,1,'L');

$tempstr = 'Subject : '.$row1['sub_nm'];
$pdf->Cell($pdf->GetStringWidth($tempstr),10,'Subject : '.$row1['sub_nm'],0,0,'L');
$pdf->Cell(190 - $pdf->GetStringWidth($tempstr) - $pdf->GetStringWidth('Minutes : '.$row1['mins']));
$tempstr = 'Minutes : '.$row1['mins'];
$pdf->Cell($pdf->GetStringWidth($tempstr),10,'Minutes : '.$row1['mins'],0,1,'L');

$tempstr = 'Date :      /      /          .';
$pdf->Cell($pdf->GetStringWidth($tempstr),10,'Date :      /      /          .',0,1,'L');

$pdf->Line(10,55,200,55);
$pdf->Ln(5.0);

$i = 0;
while($row = mysql_fetch_array($query))
{
	$i++;
//$tempstr = 'Que. '.$i. '.'.$row['que'];
$pdf->MultiCell(0,6,'Que. '.$i. '. : '.$row['que'],0,'L');
//$pdf->Ln(5);

//$tempstr = '     Option A. :'.$row['opt_a'];
$pdf->Image('../images/radiobtn.png',$pdf->GetX() + 4,$pdf->GetY() + 1,3,3,'PNG');
$pdf->MultiCell(0,6,'          Option A. : '.$row['opt_a'],0,'L');
//$pdf->Ln(3);

//$tempstr = '     Option B. :'.$row['opt_b'];
$pdf->Image('../images/radiobtn.png',$pdf->GetX() + 4,$pdf->GetY() + 1,3,3,'PNG');
$pdf->MultiCell(0,6,'          Option B. : '.$row['opt_b'],0,'L');
//$pdf->Ln(1.5);

//$tempstr = '     Option C. :'.$row['opt_c'];
$pdf->Image('../images/radiobtn.png',$pdf->GetX() + 4,$pdf->GetY() + 1,3,3,'PNG');
$pdf->MultiCell(0,6,'          Option C. : '.$row['opt_c'],0,'L');
//$pdf->Ln(1.5);

//$tempstr = '     Option D. :'.$row['opt_d'];
$pdf->Image('../images/radiobtn.png',$pdf->GetX() + 4,$pdf->GetY() + 1,3,3,'PNG');
$pdf->MultiCell(0,6,'          Option D. : '.$row['opt_d'],0,'L');
//$pdf->Cell(10);

//$pdf->Ln(1.5);

if($i == 1)
 {
		if(file_exists("../images/paperimages/".$row['p_id']."_0.jpg"))
		{
				$tempstr = 'Figure :';
				$pdf->Cell($pdf->GetStringWidth($tempstr),6,'Figure :',0,1,'L');
				$pdf->Image('../images/paperimages/'.$row['p_id'].'_0.jpg',$pdf->GetX(),$pdf->GetY(),125,75,'JPG');
				$pdf->Ln(80);
			}
	 
	 }
	 else{
		 	if(file_exists("../images/paperimages/".$row['q_id'].".jpg"))
		{
		 	$tempstr = 'Figure :';
				$pdf->Cell($pdf->GetStringWidth($tempstr),6,'Figure :',0,1,'L');
				$pdf->Image('../images/paperimages/'.$row['q_id'].'.jpg',$pdf->GetX(),$pdf->GetY(),125,75,'JPG');
 				$pdf->Ln(80);
			}
		 }
	
}
//STOP
*/
$pdf->Output(); // Aa function uper na code no use kari ne PDF generate kar se ane automatic download karva aapi de se.

	
?>