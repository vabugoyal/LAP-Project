<!-- Game page when landslide occurs -->
<!DOCTYPE html>
<html lang="en">
    <?php 
		//header('Location: ./game.php');
		include 'head.php';
		include 'config.php'; 
		session_start();
		//unset($_SESSION['process']); 
	?>
<body>
    <!--HEADER, no header needed -->
    
    <!-- BODY -->
    <div class="container-fluid">
        <div class="row">
            <div class="jumbotron">
                <h2 class="text-center">
			<!--	<?php 
	/*				$rand_dis=mt_rand() / mt_getrandmax();
					
				if($_SESSION['message_property']){
					//echo "a";
					if($rand_dis<0.50){
						//0.0-0.50, cyclone
						$disaster="Cyclone";
						$rand_inj=0.30;
						$rand_fat=0.30;
						$rand_prop=0.30;
					}else{
						$rand_inj=0.5;
						$rand_fat=0.5;
						$rand_prop=0.5;
						$disaster="Flood";
						
					}
				}else{
					$rand_inj=$rand_dis;
					$rand_fat=$rand_dis;
					$rand_prop=$rand_dis;	
					if($rand_dis<0.33){
						//0.0-0.32, cyclone
						$disaster="Cyclone";
					}elseif($rand_dis<=0.66 && $rand_dis>=0.33){
						//0.33-0.66, flood
						$disaster="Flood";
					}else{
						//0.67-1.00, drought
						$disaster="Drought";
					}
				}	*/	
				?> -->
				<?php
				if($_SESSION['actual'] == '1' || $_SESSION['actual'] == 1){
					$actualvalue = "Phishing";
				}
				elseif($_SESSION['actual'] == '0' || $_SESSION['actual'] == 0){
					$actualvalue = "Genuine";
				}
				?>
				<h1><center><b>Feedback</b></center></h1><br><br>
				<p>This was <strong><?php echo $actualvalue;?></strong> email, and your detection was <strong><?php echo  $_SESSION['detect'];?></strong><br>
		Your score is <strong><?php echo  $_SESSION['reward'];?></strong></p>
			<!--<i class="fa fa-exclamation-triangle"></i> <?php  // echo $disaster; ?> occurred due to climate change!  
                    <?php //echo  $_SESSION['scenario_id']; ?> 
                </h2>
                SAD MESSAGE START 
                <br><br>
                <p>You made <strong><?php //echo  $_SESSION['invest'];?></strong> investment against climate change and you spent <strong><?php //echo  $_SESSION['checkOne']+$_SESSION['checkTwo']+$_SESSION['checkThree'];?></strong> in buying different types of insurances against climate change. </p>
              <?php //if(isset($_SESSION['nbr_pay']) ) { ?>
                <p><strong>Your friend invested: <?php //echo $_SESSION['nbr_pay']; ?> </strong></p>-->

       <!--         <?php
             /*   if($_SESSION['message_injury'] && $_SESSION['checkOne']!=0)
                {	//injury and health insurance	
					
					$injury_img=0;
					if($rand_inj<0.33){
						//0.0-0.32, cyclone
						$injury_img=1;
						echo "<p>Sorry, a wage-earner of your family while returning home met with an accident and suffered substantial injuries. As you purchased health insurance, your annual income was less affected, and it became "; echo "<strong>"; echo round($_SESSION['daily_income'],1); echo "</strong>.</p>";
					}elseif($rand_inj<=0.66 && $rand_inj>=0.33){
						//0.33-0.66, flood
						$injury_img=3;
						echo "<p>Sorry, a wage-earner of your family got caught in the strong water currents and suffered substantial injuries. As you purchased health insurance, your annual income was less affected, and it became "; echo "<strong>"; echo round($_SESSION['daily_income'],1); echo "</strong>.</p>";
					}else{
						//0.67-1.00, drought
						$injury_img=6;
						echo "<p>Sorry, a wage-earner of your family faced a physical disability due to malnutrition during the drought phase. As you purchased health insurance, your annual income was less affected, and it became "; echo "<strong>"; echo round($_SESSION['daily_income'],1); echo "</strong>.</p>";
					}
                    
                }
                elseif ($_SESSION['message_injury'] && $_SESSION['checkOne']==0) { 
					//injury and ~ health insurance					
					$injury_img=0;
					if($rand_inj<0.33){
						//0.0-0.32, cyclone
						$injury_img=1;
						echo "<p>Sorry, a wage-earner of your family while returning home met with an accident and suffered substantial injuries. As you did not purchase health insurance, your annual income was affected, and it decreased to "; echo "<strong>"; echo round($_SESSION['daily_income'],1); echo "</strong>.</p>";						
					}elseif($rand_inj<=0.66 && $rand_inj>=0.33){
						//0.33-0.66, flood
						$injury_img=3;
	                    echo "<p>Sorry, a wage-earner of your family got caught in the strong water currents and suffered substantial injuries. As you did not purchase health insurance, your annual income was affected, and it decreased to "; echo "<strong>"; echo round($_SESSION['daily_income'],1); echo "</strong>.</p>";					
					}else{
						//0.67-1.00, drought
						$injury_img=6;
	                    echo "<p>Sorry, a wage-earner of your family faced a physical disability due to malnutrition during the drought phase. As you did not purchase health insurance, your annual income was affected, and it decreased to "; echo "<strong>"; echo round($_SESSION['daily_income'],1); echo "</strong>.</p>";					
					}
                }
                else {
					//~ injury	
					$injury_img=0;
					echo "<p>Fortunately, no one in your family was injured.</p>"; echo "<p>Thus, your annual income was not affected and stays at the same value.</p>";
				}
				
                if($_SESSION['message_fatality'] && $_SESSION['checkTwo']!=0)
                {	//fatality and life insurance	
					$fatality_img=0;
					if($rand_fat<0.33){
						//0.0-0.32, cyclone
						$fatality_img=1;
						echo "<p>Sorry, a wage-earner of your family fell prey to a nearby collapsing building and got stuck under the debris, during the cyclone. As you purchased life insurance, your annual income was less affected, and it decreased to ";
						echo "<strong>";
						echo round($_SESSION['daily_income'],1);
						echo "</strong>.</p>";	
					}elseif($rand_fat<0.66 && $rand_fat>=0.33){
						//0.33-0.65, flood
						$fatality_img=3;
						echo "<p>Sorry, a wage-earner of your family got caught amidst floating debris during a flood. As you purchased life insurance, your annual income was less affected, and it decreased to ";
						echo "<strong>";
						echo round($_SESSION['daily_income'],1);
						echo "</strong>.</p>";
					}else{
						//0.66-1.00, drought	
						$fatality_img=6;
						echo "<p>Sorry, a wage-earner of your family suffered from severe malnutrition, which resulted in their death. As you purchased life insurance, your annual income was less affected, and it decreased to ";
						echo "<strong>";
						echo round($_SESSION['daily_income'],1);
						echo "</strong>.</p>";
					}
                }elseif ($_SESSION['message_fatality'] && $_SESSION['checkTwo']==0) { 
					//fatality and ~ life insurance
					$fatality_img=0;
					$rand_fat=mt_rand() / mt_getrandmax();
					if($rand_fat<0.32){
						//0.0-0.32, cyclone
						$fatality_img=1;
						echo "<p>Sorry, a wage-earner of your family fell prey to a nearby collapsing building and got stuck under the debris, during the cyclone. As you did not purchase life insurance, your annual income was affected, and it decreased to "; 
						echo "<strong>";
						echo round($_SESSION['daily_income'],1);
						echo "</strong>.</p>";
					}elseif($rand_fat<=0.66 && $rand_fat>=0.33){
						//0.33-0.66, flood
						$fatality_img=3;
						echo "<p>Sorry, a wage-earner of your family got caught amidst floating debris during a flood. As you did not purchase life insurance, your annual income was affected, and it decreased to "; 
						echo "<strong>";
						echo round($_SESSION['daily_income'],1);
						echo "</strong>.</p>";
					}else{
						//0.67-1.00, drought
						$fatality_img=6;
						echo "<p>"; 
						echo "<strong>";
						echo round($_SESSION['daily_income'],1);
						echo "</strong>.</p>";						
					}
                }
                else { 	//~fatality
					$fatality_img=0;
					echo "<p>Fortunately, no one in your family died. Thus, your annual income was not affected and stays at the same value.</p>";                
                }
                
                ?>
                

				<?php
					if($_SESSION['message_property'] && $_SESSION['checkThree']!=0){
						//property damage and  property insurance
						$property_img=0;
						if($rand_prop<0.50){
							//0.0-0.50, cyclone
							$property_img=1;
							$_SESSION['invest']=0;
							echo "<p>Sorry, your house was destroyed by the strong winds during the cyclone. As you purchased property insurance, the total damage occurred was less at ";
							echo "<strong>";
							echo round($_SESSION['dmg_property'],1);
							echo "</strong>.</p>";                    							
						}else{
							//0.50-1.00, flood
							$property_img=3;
							$_SESSION['invest']=0;
							echo "<p>Sorry, your house was destroyed by the strong water currents during the flood. As you purchased property insurance, the total damage occurred was less at ";
							echo "<strong>";
							echo round($_SESSION['dmg_property'],1);
							echo "</strong>.</p>";                    							
						}
				?>
			<p>Thus, your property wealth is <strong><?php echo round($_SESSION['final_money_array'][$_SESSION['day']-1],1) ;?></strong>.</p>
				<?php  }elseif ($_SESSION['message_property'] && $_SESSION['checkThree']==0) {
						//property damage and ~ property insurance
						$property_img=0;
						if($rand_prop<0.50){
							//0-0.50, cyclone
							$property_img=1;
							echo "<p>Sorry, your house was destroyed by the strong winds during the cyclone. As you did not purchase property insurance, the total damage occurred is "; 
							echo "<strong>";
							echo round($_SESSION['dmg_property'],1);
							echo "</strong>.</p>";	
						}else{
							//0.50-1.00, flood
							$property_img=3;
							echo "<p>Sorry, your house was destroyed by the strong water currents during the flood. As you did not purchase property insurance, the total damage occurred is "; 
							echo "<strong>";
							echo round($_SESSION['dmg_property'],1);
							echo "</strong>.</p>";														
						}					
					}elseif (!$_SESSION['message_property']) {
						//~property damage
						$property_img=0;
						echo "<p>Fortunately, none of your property was harmed.</p>";
                        echo "<p>Thus, your property wealth was not affected and stays at the same value.</p>";

					}*/
                ?>
                
                <p>Your total wealth is <strong><?php //echo round($_SESSION['final_money'],1); ?></strong>.</p>
            <br> -->
                </h2></div></div></div>  <?php 
						echo "<a href='game.php'><button class='btn btn-warning'>Return To Game</button></a>"; ?>
			<!-- /*
					//code for images to be displayed
					
					$scenario_id = $_SESSION['scenario_id'];
					if($_SESSION['message_fatality']) {
						$sqldth = "SELECT image_source FROM death_images WHERE scenario_id='$fatality_img'";
						//echo $sqldth;
						if($resultdth = mysqli_query($conn,$sqldth)){
						   $i = 0;
						   $rowdth1=array();
							while($rowdth=mysqli_fetch_array($resultdth)){
								$rowdth1[$i] = $rowdth['image_source'];
								$i++;
							}
							$random_keys_dth = array_rand($rowdth1);
							
							$dth_img_src = $rowdth1[$random_keys_dth];
							
							echo "<div class='col-md-4'><embed height='400' width='100%' src='";echo $dth_img_src; echo "'></div>";
						}
					}
					if($_SESSION['message_injury']){
						$sqlinj = "SELECT image_source FROM injury_images WHERE scenario_id='$injury_img'";
						//echo $sqlinj;
						if($resultinj = mysqli_query($conn,$sqlinj)){
							$i =0 ;
							while($rowinj=mysqli_fetch_array($resultinj,MYSQLI_NUM)) {
								$rowinj1[$i] = $rowinj[0];$i++;
							}
							$random_keys_inj = array_rand($rowinj1);
							$inj_img_src = $rowinj1[$random_keys_inj];
							echo "<div class='col-md-4'><embed height='400' width='100%' src='";echo $inj_img_src; echo "'></div>";
						}
					}
					if($_SESSION['message_property']){
						//~drought
						$sqlprop = "SELECT image_source FROM property_images WHERE scenario_id='$property_img'";
						//echo $sqlprop;
						if($resultprop = mysqli_query($conn,$sqlprop)){
							$i=0;
							while($rowprop=mysqli_fetch_array($resultprop,MYSQLI_NUM)) {
								$rowprop1[$i] = $rowprop[0];$i++;
							}
							
							$random_keys_prop = array_rand($rowprop1);
							$prop_img_src = $rowprop1[$random_keys_prop];
							
							echo "<div class='col-md-4'><embed height='400' width='100%' src='";echo $prop_img_src; echo "'></div>";
						}
					}  */    -->         
					<?php mysqli_close($conn);
                ?>
  <!--  <FOOTER -->
    <?php include 'footer.php';?>
</body>
</html>