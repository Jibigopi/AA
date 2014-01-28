
<!DOCTYPE html>
<html>
    <head>
        <title>Ancient Agro</title> 
       
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">  
        <!-- Bootstrap css-->
        <link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap-itheme.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>css/invoice.css">
         
        <!-- Bootstrap css-->

</head>
<body >
   <!-- Container-->
   <div class=" container ">
       <?php foreach ($row as $order){?>
     <div class="row">
       <div class="col col-lg-1"></div>
       <div class="col col-lg-9" >
             <div class="row  " style="background: #953734">
                 <div class="col col-lg-3 pull-left inv_h"> Ancient Agro</div>
                 <div class="col col-lg-2 pull-right inv_h"> INVOICE</div>
                 
             </div>
             <div class="row inv_cont">
                 <div class="col col-lg-4">
                     20800 Valley Green Drive Apt 499	<br>		
                     Cupertino, CA, 95014	
                 </div><div class="col col-lg-4">
                     (845) 636-0856)
                 </div>
                 <div class="col col-lg-4"></div>
             </div>
           <div class="row">
                   <div class="col col-lg-7">
                       <div class="row"><strong>SOLD TO: </strong><strong style="text-transform: uppercase ;font-weight: bold;font-size: 18px" > <?php echo $order->sfirst_name ?></strong></div>
                       <br><br>
                       <div class="row"><strong>SOLD FROM: </strong><strong style="text-transform: uppercase ;font-weight: bold;font-size: 18px" > <?php echo $order->first_name ?></strong></div>
                   
                   </div>
                   <div class="col col-lg-3 inv_p">
                        <p class="pull-right">INVOICE NUMBER : </p>
                        <p class="pull-right">INVOICE DATE  </p>
                        <p class="pull-right">OUR ORDER NO  </p>
                        <p class="pull-right">YOUR ORDER NO </p>
                        <p class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TERMS  </p>
                        <p class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SALES EXP  </p>
                        <p class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SHIPPED VIA  </p>
                        <p class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;F.O.B </p>
                        <p class="pull-right">REPAID OR COLLECT  </p>
</div>
                   <div class="col col-lg-2 inv_pp" >
                        <p ><strong style="text-transform: uppercase ;font-weight: bold;font-size: 13px" ><?php echo $order->order_id ?></strong></p>
                        <p ><strong style="text-transform: uppercase ;font-weight: bold;font-size: 13px" ><?php echo $order->date ?></strong></p>
                        <p ><br></p>
                        <p ><br></p>
                        <p >Net 30</p>
                        <p >Karun</p>
                        <p > Self</p>
                        <p >Cupertino, CA,USA </p>
                        <p >COLLECT </p>
                   </div>
              
           </div>
           <div class="row ">
               <div class="col col-lg-3">
                   Sales Tax Rate:
               </div>
               <div class="col col-lg-2 text-center" style="border: solid 1px;">
                  0.00%
               </div>
           </div>
           <div class="row" style="margin-top: 20px;">
               <div class="col col-lg-12">
                   <table class="table" >
                   <thead style="background: #e3e3e3">
                       <tr><td style="border: solid 1px;">S.No</td><td style="border: solid 1px;" class="text-center">DESCRIPTION</td><td style="width: 70px;" class="text-center" >QUANTITY</td><td style="width: 90px" class="text-center">UNIT PRICE</td><td style="width: 120px" class="text-center">AMOUNT</td></tr>
                   </thead>
                   <tbody>
                       <?php $i=0; foreach ($items as $item) {?>
                       <tr><td><?php echo ++$i; ?></td><td><?php echo $item->grain_name ?></td><td><?php echo $item->quty ?></td><td><?php echo $item->price ?></td><td><?php echo $item->price*$item->quty ?></td></tr>
                       <?php }?>
                       <tr style="border:solid 1px"><td style="border:solid 1px">TOTAL:<?php echo $i ?></td><td style="border:solid 1px"></td><td style="border:solid 1px"></td><td style="border:solid 1px"></td><td style="border:solid 1px"></td></tr>
                       <tr style="border:none;border-left: solid 1px"><td style="border:none"></td><td style="border:none"></td><td style="border:none"></td><td style="border: solid 1px">SUBTOTAL</td><td style="border:solid 1px"><?php echo $order->total_amount ?></td></tr>
                       <tr style="border:none; border-left: solid 1px"><td style="border:none"></td><td style="border:none"></td><td style="border:none"></td><td style="border: solid 1px" >TAX</td><td  style="border:solid 1px">0.00</td></tr>
                       <tr style="border:none; border-left: solid 1px;border-bottom: solid 1px" ><td style="border:none"></td><td style="border:none"></td><td style="border:none"></td><td style="border: solid 1px">FRIGHT</td><td  style="border:none; border-right: solid 1px;">0.00</td></tr>
                       <tr style="border:none; "><td style="border:none"></td><td style="border:none"></td><td style="border:none"></td><td style="border:none; " ></td><td style="border:solid 1px"><?php echo $order->total_amount; ?></td></tr>
                       
                   </tbody>
                   
               </table>
               </div>
           </div>
           <div class="row" style="margin-top: -40px;">
               <div class="col col-lg-4">
                  DIRECT ALL INQUIRIES TO:<br>
Karun		<br>
845-636-0856		<br>
email: karuncv@gmail.com<br>
               </div>
               <div class="col col-lg-4">
               MAKE ALL CHECKS PAYABLE TO:<br>		
Ancient Agro<br>
               </div>
           </div>
           <div class="row col-lg-12 text-center" >
              Cupertino, CA, 95014
              <h5 style="font-style: italic;font-weight: bold">THANK YOU FOR YOUR BUSINESS</h5>
              <h5 style="font-style: italic;font-weight: bold">THANK YOU FOR YOUR BUSINESS</h5>
           </div>
      <div class="row  " style="background: #953734"><br>
             </div>
           <br>
       </div>
       <div class="col col-lg-1">
           
       </div>
       </div> <?php }?>
   </div>
  
    <!-- Container-->
       
        <!-- Bootstrap js-->
         <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-1.8.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.video-ui.js"></script>
        
        <!-- Bootstrap js-->
       
   <!-- Body-->
</body>
</html>
