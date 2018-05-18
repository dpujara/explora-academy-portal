<?php
      session_start();
      require('view/fpdf.php');
      // Create me a new pdf object:
      include('include_db.php');
      $id=$_GET['idv'];
      $sql1='SELECT * FROM `registration` WHERE `s_id`='.$id.'';
      $result1=$con->query($sql1);
      date_default_timezone_set("Asia/Kolkata");
      $signm='manoj patel';
      $signa='manoj patel';
      $signr='manoj patel';

      while($row=mysqli_fetch_array($result1))
      {  
      $form=$row['formnumber'];
      $course=$row['course'];
      $firstname=$row['first_name'];
      $middlename=$row['middle_name'];
      $surname=$row['surname'];
      $address=$row['address'];
      $mobile=$row['mobile_no'];
      $f_reg=$row['f_reg'];
      $f_reg_date=$row['f_reg_date'];
      $f_april=$row['f_april'];
      $f_april_date=$row['f_april_date'];
      $f_may=$row['f_may'];
      $f_may_date=$row['f_may_date'];
      $dob=$row['dob'];
      $dob=date('d-m-Y',strtotime($dob));
      $pimg=$row['img_path'];
      $email=$row['email'];
      $_SESSION['email']=$email;
      $_SESSION['name']=$firstname;
      $pdf = new FPDF();
      $image12="done2.png";

      // Add a page to that object
      $pdf->AddPage();
      $pdf->setleftmargin(10);
      $pdf->setX(10);
      $pdf->setY(10);

      // Add some text
      $pdf->SetFont('Arial','B',10);
      // width, height, text, no border, next line - below & left margin, alignement
      // shree rang in centre
      $pdf->Cell(200,10,'|| Shree Rang ||',0,1,"C");

      //create rectangle and registration form
      $pdf->SetFillColor(0,0,0);
      $pdf->Rect(0, 20, 210, 10, 'F');
      $pdf->SetTextColor(255,255,255);
      $pdf->SetFont('Arial','B',15);
      $pdf->Cell(200,10,'REGISTRATION FORM - 2016',0,1,"C");

      // space below registration form
      $pdf->Cell(210,5,'',0,1,"C");

      //set font and height
      $pdf->SetFont('Arial','B',12);
      $pdf->SetTextColor(0,0,0);
      //space before form no.
      $pdf->Cell(10,5,'',0,0,"C");
      $pdf->Cell(5,5,'FORM NO.',0,0,"C");
      //space between rect and form no tag
      $pdf->Cell(10,5,'',0,0,"C");
      // create box for form
      $pdf->Cell(30,5,$form,1,0,"C");

      //space after box 
      $pdf->Cell(100,5,'',0,0,"C");
      //display date
      $pdf->SetFont('Arial','B',12);
      $pdf->Cell(20,5,date("d-m-Y"),0,1,"C");

      //add new row
      $pdf->Cell(210,5,'',0,1,"C");

      //Explora academy title
      $pdf->SetFont('Helvetica','',25);
      $pdf->Cell(200,15,'Explora Academy of Design',0,1,"C");

      //add new row
      $pdf->Cell(210,5,'',0,1,"C");
      $pdf->SetFont('Arial','',12);
      $pdf->SetTextColor(0,0,0);
      //nata and all 3 courses
      $pdf->Cell(80,5,'',0,0,"C");
      if(strtoupper($course)=="NATA")
      {
      $pdf->Cell( 10,5, $pdf->Image($image12, $pdf->GetX(), $pdf->GetY(),10,5), 1, 0, 'L', false );
      $pdf->Cell(15,5,'NATA',0,1,"C");

      }else
      {
      $pdf->Cell(10,5,'',1,0,"C");  
      $pdf->Cell(15,5,'NATA',0,1,"C");
      }
      $pdf->Cell(1,1,'',0,1,"C");
      $pdf->Cell(210,4,'',0,1,"C");
      $pdf->SetFont('Arial','',12);
      $pdf->SetTextColor(0,0,0);
      $pdf->Cell(80,0,'',0,0,"C");
      if(strtoupper($course)=="INTERIOR DESIGN")
      {
      $pdf->Cell( 10,5, $pdf->Image($image12, $pdf->GetX(), $pdf->GetY(),10,5), 1, 0, 'L', false );
      $pdf->Cell(41,5,'INTERIOR DESIGN',0,1,"C");

      }else
      {
      $pdf->Cell(10,5,'',1,0,"C");
      $pdf->Cell(41,5,'INTERIOR DESIGN',0,1,"C");

      }

      $pdf->setFont('Arial','',12);
      $pdf->Cell(20,15,'Surname',0,0,"L");
      $pdf->setFont('Arial','',12);
      $pdf->Cell(10,0,'',0,0,"C");
      $pdf->Cell(40,15,$surname,0,1,"L");
      $pdf->SetFillColor(150,150,150);
      $pdf->Rect(40,90, 114,0.5, 'F');


      $pdf->setFont('Arial','',12);
      $pdf->Cell(20,5,'Firstname',0,0,"L");
      $pdf->setFont('Arial','',12);
      $pdf->Cell(10,0,'',0,0,"C");
      $pdf->Cell(40,5,$firstname,0,1,"L");
      $pdf->SetFillColor(150,150,150);
      $pdf->Rect(40,100, 114,0.5, 'F');



      // Explora icon
      $pdf->setXY(160,61);
      $image1 ="logo.png";
      $pdf->Cell( 40, 40, $pdf->Image($image1, $pdf->GetX(), $pdf->GetY(), 33.78), 0, 1, 'L', false );
      $pdf->setFont('Arial','',12);
      $pdf->Cell(20,12,'Middlename',0,0,"L");
      $pdf->setFont('Arial','',12);
      $pdf->Cell(10,0,'',0,0,"C");
      $pdf->Cell(40,12,$middlename,0,1,"L");
      $pdf->SetFillColor(150,150,150);
      $pdf->Rect(40,109, 114,0.5, 'F');

      //add new row
      $pdf->Cell(210,10,'',0,20,"C");
      $pdf->setFont('Arial','',12);
      $pdf->Cell(20,-13,'Birthdate',0,0,"L");
      $pdf->setFont('Arial','',12);
      $pdf->Cell(10,0,'',0,0,"C");
      $pdf->Cell(40,-13,$dob,0,1,"L");
      $pdf->SetFillColor(150,150,150);
      $pdf->Rect(40,119, 114,0.5, 'F');

      //add new row
      $pdf->Cell(210,10,'',0,1,"C");
      $pdf->setFont('Arial','',12);
      $pdf->Cell(20,12,'E-mail',0,0,"L");
      $pdf->setFont('Arial','',12);
      $pdf->Cell(10,0,'',0,0,"C");
      $pdf->Cell(40,12,$email,0,1,"L");
      $pdf->SetFillColor(150,150,150);
      $pdf->Rect(40,129, 114,0.5, 'F');

      //first address
      $pdf->Cell(210,3,'',0,1,"C");
      $pdf->setFont('Arial','',12);
      $pdf->Cell(200,15,'Postal Address for Communication',0,1,"L");
      if(strlen($address)>87)
      {
      $addr1=str_split($address,87);
      $addr=$addr1[0];
      $addr2=$addr1[1];
      $pdf->setFont('Arial','',10);
      $pdf->Cell(0.01,0,'',0,0,"L");
      $pdf->Cell(190,0,strtoupper($addr),0,1,"L");
      $pdf->SetFillColor(150,150,150);
      $pdf->Rect(10.8,152, 190,0.5, 'F');

      //second address
      $pdf->Cell(210,9,'',0,1,"C");
      $pdf->setFont('Arial','',10);

      $pdf->Cell(0.01,0,'',0,0,"L");
      $pdf->Cell(100,0,strtoupper($addr2),0,1,"L");
      }
      else
      {
      $pdf->setFont('Arial','',10);
      $pdf->Cell(0.01,0,'',0,0,"L");
      $pdf->Cell(190,0,strtoupper($address),0,1,"L");
      $pdf->SetFillColor(150,150,150);
      $pdf->Rect(10.8,152, 190,0.5, 'F');

      //second address
      $pdf->Cell(210,9,'',0,1,"C");
      $pdf->setFont('Arial','',10);
      $pdf->Cell(0.01,0,'',0,0,"L");
      $pdf->Cell(100,0,"",0,1,"L");
      }
      $pdf->Cell(115,5,'',0,0,"C");
      $pdf->Cell(100,4,'M -',0,1,"L");

      //second address underline
      $pdf->SetFillColor(150,150,150);
      $pdf->Rect(10.8,161, 110,0.5, 'F');

      //mobile number underline
      $pdf->SetFillColor(150,150,150);
      // $pdf->Rect(133,160, 50,5, 'F');
      $pdf->Cell(125,0,'',0,0,"C");
      $mob0=str_split($mobile,1);
      for($i=0;$i<strlen($mobile);$i++)
      {
      $mob1=$mob0[$i];
      $pdf->Cell(5,-5,$mob1,1,0,"C");
      }

      //sign of the candidate
      $pdf->Cell(200,3,'',0,1,"C");
      $pdf->Cell(0,6,'Sign of the candidate',0,1,"L");

      //use this as a horizontal line 
      $pdf->SetFillColor(150,150,150);
      $pdf->Rect(148,170,25,0.5, 'F');

      //box for the signature
      $pdf->Cell(1,0,'',0,0,"C");
      $pdf->Cell(45,10,'',1,1,"C");

      //box for the photos
      $pdf->setXY(160,102);
      $image1 =$pimg;
      //$pdf->Cell( 30, 35, , 0, 1, 'L', false );
      $pdf->Cell(1,0,'',0,0,"C");
      $pdf->Cell(30,35,$pdf->Image($image1, $pdf->GetX(), $pdf->GetY(), 30,35),1,1,"C");

      //branch head
      $pdf->setXY(145,162);
      $pdf->Cell(10,10,'    Branch Head         (Vadodara)',0,1,"L");
      $pdf->Cell(0,5,'Ar. Manoj Patel  :  09924376644',0,1,"R");
      $pdf->Cell(0,5,'Ar. Parth Chitte  :  09998130018',0,1,"R");

      //use this as a horizontal line  below signature box
      $pdf->SetFillColor(150,150,150);
      $pdf->Rect(11,188,190,0.5, 'F');
      //contact
      $pdf->Cell(0,10,'',0,1,"L");
      $pdf->Cell(0,5,'Website : www.explora.in',0,1,"L");
      $pdf->Cell(0,7,'Contact us: infonataexplora@yahoo.com',0,1,"L");

      //address
      $pdf->setXY(117,188 );
      $pdf->setFont('Arial','B',10);
      $pdf->Cell(0,5,'Address : ',0,1,"L");
      $pdf->setFont('Arial','',10);
      $pdf->setXY(117,193 );
      $pdf->Cell(0,5,'Studio-2, First Floor, Cross Road Complex.',0,1,"L");
      $pdf->setXY(117,198);
      $pdf->Cell(0,5,'Next to Mr. Puff, Near to Domino\'s Pizza',0,1,"L");
      $pdf->setXY(117,203);
      $pdf->Cell(0,5,'Subhanpura, Vadodara-390023',0,1,"L");
      $pdf->Cell(0,5,'',0,1,"L");

      //use this as a horizontal line  below signature box
      $pdf->SetFillColor(10,10,10);
      $pdf->Rect(11,208,190,1, 'F');

      //for office use only
      $pdf->SetFont('Arial','B',12);
      $pdf->Cell(0,10,'For Office Use Only',0,1,"C");

      $pdf->SetFont('Arial','B',12);
      $pdf->Cell(0,8,'Fees Details',0,1,"L");

      $pdf->SetFont('Arial','',10);
      $pdf->Cell(37,0,'',0,0,"L");
      $pdf->Cell(0,5,'Cash / Cheque',0,0,"L");

      $pdf->Cell(-85,0,'',0,0,"L");
      $pdf->Cell(47,5,'Date',0,0,"L");
      $pdf->Cell(0,5,'Authorized Signature',0,1,"L");

      $pdf->SetFont('Arial','',12);
      $pdf->Cell(0,7,'Registration',0,0,"L");
      $signr='images/Manoj_sign.jpg';
      if($f_reg==0)
      {
      $f_reg="";
      $signr="";
      $f_reg_date="";
      }
      // create box for form
      $pdf->Cell(0,0,'',0,1,"L");
      $pdf->Cell(30,5,'',0,0,"L");
      $pdf->Cell(42,8   ,$f_reg,1,0,"C");

      $pdf->Cell(17,4,'',0,0,"L");
      $pdf->Cell(42,8,$f_reg_date,1,0,"C");

      $pdf->Cell(17,4,'',0,0,"L");
      //$pdf->Cell(42,8,$signr,1,1,"C");
      $pdf->Cell(42,8, $pdf->Image($signr, $pdf->GetX(), $pdf->GetY(),42,8), 1, 1, 'C', false );

      $signa="images/Manoj_sign.jpg";
      $pdf->SetFont('Arial','',12);
      $pdf->Cell(0,18,'April',0,0,"L");
      if($f_april==0)
      {
      $f_april="";
      $signa="images/sign.jpg";
      $f_april_date="";
      }
      $pdf->Cell(0,5,'',0,1,"L");
      $pdf->Cell(30,5,'',0,0,"L");
      $pdf->Cell(42,8   ,$f_april,1,0,"C");

      $pdf->Cell(17,4,'',0,0,"L");
      $pdf->Cell(42,8,$f_april_date,1,0,"C");

      $pdf->Cell(17,4,'',0,0,"L");
      $pdf->Cell(42,8, $pdf->Image($signa, $pdf->GetX(), $pdf->GetY(),42,8), 1, 1, 'C', false );

      $signm="images/Manoj_sign.jpg";
      $pdf->SetFont('Arial','',12);
      $pdf->Cell(0,18,'May',0,0,"L");

      if($f_may==0)
      {
      $f_may="";
      $signm="images/sign.jpg";
      $f_may_date="";
      }
      $pdf->Cell(0,5,'',0,1,"C");
      $pdf->Cell(30,5,'',0,0,"C");
      $pdf->Cell(42,8   ,$f_may,1,0,"C");

      $pdf->Cell(17,4,'',0,0,"L");
      $pdf->Cell(42,8,$f_may_date,1,0,"C");

      $pdf->Cell(17,4,'',0,0,"L");
      $pdf->Cell(42,8, $pdf->Image($signm, $pdf->GetX(), $pdf->GetY(),42,8), 1, 1, 'C', false );

      $pdf->SetFillColor(10,10,10);
      $pdf->Rect(11,278,190,1, 'F');
  //    $pdf->Output("");
      $pdf->Output("Receipts/".$form.".pdf");
      }
      //echo '<script> window.location="send_mail.php?name=';
      //echo $form;
      //echo'"</script>'; 
      ?>
<?php
      $id=$_GET['idv'];
      $sql1='SELECT * FROM `registration` WHERE `s_id`='.$id.'';
      $result1=$con->query($sql1);
      date_default_timezone_set("Asia/Kolkata");


while($row=mysqli_fetch_array($result1))
      {  
      $form=$row['formnumber'];
      $address=$row['address'];
      $mobile=$row['mobile_no'];
      $f_reg=$row['f_reg'];
      $f_april=$row['f_april'];
      $f_may=$row['f_may'];
      $total_fees=$f_reg;
      if($f_may==0)
      {
            if($f_april==0)
            {
                  $total_fees=$f_reg;
            }
            else
            {
                  $total_fees=$f_april;
            }
      }
      else
      {
            $total_fees=$f_may;
      }
     
      $pdf = new FPDF('P','mm',array(210,210));
// Add a page to that object
$pdf->AddPage();

$pdf->setleftmargin(10);
$pdf->setX(20);
$pdf->setY(10);


$pdf->SetFillColor(0,0,0);
$pdf->Cell(190,140,'',1,0,"C");

$pdf->setX(20);
$pdf->setY(15);


$pdf->SetFillColor(0,0,0);

$image1='logo.png';
// Add some text
$pdf->SetFont('Arial','',20);
// width, height, text, no border, next line - below & left margin, alignement
// shree rang in centre
$pdf->Cell(175,10,'           Explora Academy of Design',0,0,"C");
$pdf->Cell( 15, 10, $pdf->Image($image1, $pdf->GetX(), $pdf->GetY(), 10), 0, 1, 'R', false );
$pdf->SetFillColor(0,0,0);
$pdf->Rect(20,26, 175,1,'F');

$pdf->Cell(10,8,'',0,1,"C");

//set font and height
$pdf->SetFont('Arial','',12);
$pdf->SetTextColor(0,0,0);
//space before form no.
$pdf->Cell(20,10,'',0,0,"C");
$pdf->Cell(20,7,'RECEIPT NUMBER:',0,0,"C");
//space between rect and form no tag
$pdf->Cell(15,10,'',0,0,"C");
// create box for form
$pdf->Cell(30,7,$form,1,0,"C");

//space after box 
$pdf->Cell(30,10,'',0,0,"C");

$pdf->Cell(15,7,'DATE:',0,0,"C");
//display date
$pdf->SetFont('Arial','',12);
$pdf->Cell(20,7,date("d-m-Y"),0,1,"L");
$pdf->SetFillColor(155,155,155);
$pdf->Rect(140,39, 25,0.5,'F');
$pdf->SetFillColor(0,0,0);

$pdf->Cell(10,4,'',0,1,"C");

$pdf->Cell(10,10,'',0,0,"C");
$pdf->Cell(52,7,'Received with thanks from ',0,0,"L");
//display date
$pdf->SetFont('Arial','',12);
$pdf->Cell(100,7,$surname." ".$firstname." ".$middlename,0,1,"L");
$pdf->SetFillColor(155,155,155);
$pdf->Rect(73,50, 123,0.5,'F');
$pdf->SetFillColor(0,0,0);

$pdf->Cell(10,4,'',0,1,"C");


$pdf->Cell(29,7,'A sum of ',0,0,"R");
$totalfees0=str_split($total_fees,1);
$length=strlen($total_fees);
for($i=0;$i<$length;$i++)
{
      $totalfees1=$totalfees0[$i];
      $pdf->Cell(8,6,$totalfees1,1,0,"C");
}

$pdf->Cell(59,7,'rupees by cash/Cheque No.',0,0,"R");

for($i=0;$i<8;$i++)
{

      $pdf->Cell(6,6,' ',1,0,"C");
}

$pdf->Cell(10,5,'',0,1,"C");
$pdf->Cell(10,5,'',0,1,"C");

$pdf->Cell(26.5,7,'Address',0,0,"R");

$pdf->SetFont('Arial','',12);
$pdf->Cell(120,7,$address,0,1,"L");
$pdf->SetFillColor(155,155,155);
$pdf->Rect(38,71, 157,0.5,'F');

$pdf->Cell(26.5,7,'',0,0,"R");
$pdf->Cell(120,7,'',0,1,"L");
$pdf->Rect(38,79, 157,0.5,'F');
$pdf->Cell(10,4,'',0,1,"C");
$pdf->SetFillColor(0,0,0);
$pdf->Cell(41,7,'Phone No. (M) :',0,0,"R");

$pdf->SetFont('Arial','',12);
$mob0=str_split($mobile,1);
for($i=0;$i<strlen($mobile);$i++)
{
      $mob1=$mob0[$i];
      $pdf->Cell(6,6,$mob1,1,0,"C");
}
$pdf->SetFont('Arial','B',12);
$pdf->Cell(10,5,'',0,1,"C");
$pdf->Cell(10,5,'',0,1,"C");
$pdf->Cell(56,7,'Authorized Signature :',0,0,"R");

$pdf->Cell(15,7,'',0,0,"C");
$pdf->SetFont('Arial','',12);
$pdf->Cell(56,7,'Name',0,1,"R");
$image2='images/Manoj_sign.jpg';
$pdf->Cell(10,2,'',0,1,"C");
$pdf->Cell(55,7,'',0,0,"C");
$pdf->Cell(50,10, $pdf->Image($image2, $pdf->GetX(), $pdf->GetY(), 50,10), 1, 0, 'R', false );
$pdf->Cell(10,7,'',0,0,"C");
$pdf->Cell(50,7,'Manoj Patel',1,1,"C");

$pdf->SetFont('Arial','',11);
$pdf->Cell(10,4,'',0,1,"C");
$pdf->Cell(8.5,50,'',0,0,"C");
$pdf->Cell(120,5,'Subject to Realisation in case of Cheques.',0,1,"L");


$pdf->SetFont('Arial','',11);
$pdf->Cell(8.5,5,'',0,0,"C");
$pdf->Cell(120,5,'Subject to Vadodara Jurisdiction.',0,1,"L");
$pdf->SetFillColor(155,155,155);
$pdf->Rect(19,124, 175,0.5,'F');
$pdf->SetFillColor(0,0,0);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(10,3,'',0,1,"C");
$pdf->Cell(8.5,5,'',0,0,"C");
$pdf->Cell(40,5,'Address :',0,1,"L");

$pdf->SetFont('Arial','',11);
$pdf->Cell(8.5,5,'',0,0,"C");
$pdf->Cell(40,5,'Studio-2, First Floor, Cross Road Complex.',0,0,"L");

$pdf->Cell(60,5,'',0,0,"C");
$pdf->Cell(40,5,'Ar. Manoj Patel : 09924376644',0,1,"L");


$pdf->Cell(8.5,5,'',0,0,"C");
$pdf->Cell(40,5,'Next to Mr. Puff, Near to Domino'.'s Pizza,',0,0,"L");

$pdf->Cell(60,5,'',0,0,"C");
$pdf->Cell(40,5,'Ar. Parth Chitte : 09998130018',0,1,"L");

$pdf->Cell(8.5,5,'',0,0,"C");
$pdf->Cell(40,5,'Subhanpura, Vadodara-390023.',0,1,"L");

$pdf->SetFont('Arial','',8);
$pdf->Cell(10,4,'',0,1,"C");
$pdf->Cell(8.5,5,'',0,0,"C");
$pdf->Cell(40,5,'NOTE: FEES WILL NOT BE REFUNDABLE AFTER ONE WEEK',0,0,"L");

$pdf->Cell(60,10,'',0,0,"C");
$pdf->Rect(116,151.5, 2,1.5,'F');
$pdf->Cell(40,5,'Registration fees for 2016 NATA test',0,1,"L");

$pdf->Cell(108.5,10,'',0,0,"C");
$pdf->SetFont('Arial','',8);
$pdf->Cell(40,5,'WWW.EXPLORA.IN',0,1,"L");

$pdf->SetFillColor(155,155,155);
$pdf->Rect(5,160, 200,0.5,'F');
//$pdf->Output();
$pdf->Output("studentReceipts/".$form.".pdf");
}
     echo '<script> window.location="send_mail.php?name=';
     echo $form;
     echo'"</script>'; 

?>
