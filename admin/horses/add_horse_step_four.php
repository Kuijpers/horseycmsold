
<?php

			$stamp	=	$_GET['stamp'];
			
			
			$tablename	=	"horses";
			
						$sql ="SELECT * FROM ".$tablename." WHERE stamp= ".$stamp."";
    						$data = mysql_query($sql);
							if (mysql_num_rows($data)!==0)
								{
									$info = mysql_fetch_array( $data );
					
									$id			=	$info['id'];
									$callname	=	$info['callname'];
									$fullname	=	$info['fullname'];
									$gender		=	$info['gender'];
									$dobday		=	$info['dobday'];
									$dobmonth	=	$info['dobmonth'];
									$dobyear	=	$info['dobyear'];
									$sire		=	$info['sire'];
									$dam		=	$info['dam'];
									$fofs		=	$info['fofs'];
									$mofs		=	$info['mofs'];
									$fofd		=	$info['fofd'];
									$mofd		=	$info['mofd'];
									$color		=	$info['color'];
									$height		=	$info['height'];
									$unit		=	$info['unit'];
									$spot		=	$info['spot'];
								}
			

				$horse			=	array (
								   		"1"	=>	$HORSE["stallion"],
										"2"	=>	$HORSE["mare"],
										"3"	=>	$HORSE["gelding"],
								   
								   	);
				
				$measure 		=	array (
								  		"1" =>	$HORSE["measurespot1"],
										"2" =>	$HORSE["measurespot2"],
								  	);
				
				$measureunit 	=	array (
									  	"1" =>	$HORSE['measureunit1'],
										"2" =>	$HORSE['measureunit2'],
										"3" =>	$HORSE['measureunit3'],
									 );




?>
<table>
	<tr>
    	<td>
			<h3>
            	Step 4 of 4
           	</h3>
        </td>
   </tr>
</table>

<div class="halve">
<table>
	<tr>
    	<td>
        	<?php echo $fullname; ?>
        </td>
    </tr>
	<tr>
    	<td>
        	<?php echo $callname; ?>
        </td>
    </tr>
	<tr>
    	<td>
        	<?php echo $horse[$gender]; ?>
        </td>
	</tr>
	<tr>
    	<td>
        	<?php echo $dobday ; echo "-" ; echo $dobmonth ;echo "-"; echo $dobyear ; ?>
        </td>
   	</tr>
<?php
 	
	if (!empty($color))
		{	
?>
	<tr>
    	<td>
        	<?php echo $color; ?>
        </td>
    </tr>
<?php
		}
?>
<?php
 	
	if (!empty($height))
		{	
?>
	<tr>
    	<td>
        	<?php echo $height; ?> <?php echo $measureunit[$unit]; ?> 
        </td>
    </tr>
    <tr>
    	<td>
        				
        	<?php echo $HORSE['measurespot']; ?> <?php echo $measure[$spot]; ?> 
        </td>
    </tr>
<?php
		}
?>
    <tr>
        	<th colspan="2">
            	<b>
            		Registrations
                </b>
            </th>
        </tr>
        <?php
			
			$tablename	=	"registration";
			
			$sql ="SELECT * FROM ".$tablename." WHERE stamp= ".$stamp." ORDER BY id ASC";
    				$data = mysql_query($sql);
					if (mysql_num_rows($data)==0)
						{
							echo	"<tr><th colspan='2'>";
							echo 	"No registration known.";
							echo	"</th></tr>";
						}
					else
					{
					//here is the loop using the statement above
					while($info = mysql_fetch_array( $data ))
						{
							$id					=	$info['id'];
							$organisation 		= 	$info['organisation'];
							$registration 		= $info['registration'];
?>
		<tr>
        	<td>
            	<?php echo $organisation ; ?>
            </td>
            <td>
            	<?php echo $registration ; ?>
            </td>
        </tr>
        <?php
		
						}
					}
	?>
</table>
</div>


<div class="halve">
	<table>
    	<tr>
        	<th colspan="2">
            	<b>
            		Main image
                </b>
            </th>
        </tr>
        <?php
			
			$tablename	=	"picture";
			
			$sql ="SELECT * FROM ".$tablename." WHERE stamp= ".$stamp." AND main_image= 1 ORDER BY id ASC";
    				$data = mysql_query($sql);
					if (mysql_num_rows($data)==0)
						{
							echo	"<tr><th colspan='2'>";
							echo 	"<img src='images/no_image.png' alt='No image availlable'/>";
							echo	"</th></tr>";
						}
					else
					{
					//here is the loop using the statement above
					while($info = mysql_fetch_array( $data ))
						{
							$id					=	$info['id'];
							$image_name 		= 	$info['image'];
							
							
								$thumb_path		=	"../album/thumbs/thumb_";
								$full_path		=	"../album/";

								$thumb_image	=	"".$thumb_path."".$image_name."";
								$full_image		=	"".$full_path."".$image_name."";
								
								$image_value	=	"1";
?>
		<tr>
        	<td>
            	<img src="<?php echo $thumb_image ; ?>" alt="Main image"/>
            </td>
        </tr>
        <?php
		
						}
					}
	?>
	</table>
</div>





<div class="full">
<table>
    <tr class="listing">
    	<td>&nbsp;
        
    	</td>
        <td>
        	<?php echo $fofs ; ?>
        </td>
    </tr>
    <tr class="listing">
        <td>
        	<?php echo $sire ; ?>
        </td>
    	<td>&nbsp;
        
    	</td>
    </tr>
    <tr class="listing">
    	<td>&nbsp;
        
    	</td>
        <td>
        	<?php echo $mofs ; ?>
        </td>
    </tr>
    <tr class="listing">
    	<td>&nbsp;
        
    	</td>
        <td>
        	<?php echo $fofd ; ?>
        </td>
    </tr>
    <tr class="listing">
        <td>
        	<?php echo $dam ; ?>
        </td>
    	<td>&nbsp;
        
    	</td>
    </tr>
    <tr class="listing">
    	<td>&nbsp;
        
    	</td>
        <td>
        	<?php echo $mofd ; ?>
        </td>
    </tr>
</table>

</div>

<div class="image_scroll">
	<table>
    	<tr>
	<?php
			
			$tablename	=	"picture";
			
			$sql ="SELECT * FROM ".$tablename." WHERE stamp= ".$stamp." ORDER BY id ASC";
    				$data = mysql_query($sql);
					if (mysql_num_rows($data)==0)
						{
							echo	"<div class='image'>";
							echo 	"<img src='images/no_image.png' alt='No image availlable'/>";
							echo	"</div>";
						}
					else
					{
					//here is the loop using the statement above
					while($info = mysql_fetch_array( $data ))
						{
							$id					=	$info['id'];
							$image_name 		= 	$info['image'];
							
							
								$thumb_path		=	"../album/thumbs/thumb_";
								$full_path		=	"../album/";

								$thumb_image	=	"".$thumb_path."".$image_name."";
								$full_image		=	"".$full_path."".$image_name."";
								
								$image_value	=	"1";
?>
		<td>
            	<img src="<?php echo $thumb_image ; ?>" alt="Images"/>
        </td>
        <?php
		
						}
					}
	?>
    </tr>
    </table>
    
    
	

</div>
<?php
		
		
		$dir = "./lang/";

		$dh = opendir($dir);

		while (($file = readdir($dh)) !== false) 
		{
			// Gets the File Extension
			$extension = substr($file, strrpos($file, '.'));
			
			
			// checks if the extension is .php or the file name is  . or .. if so it will be shown as an exclusion
			if($extension !== ".php" && $file !== "." && $file !== ".." && $file !== "index.html")
			{
			
			
						
			
			
?>
<div class="horseinfo">

<?php


						$tablename	=	"".$file."_".$data_id."";


			$sql ="SELECT * FROM ".$tablename." WHERE stamp= ".$stamp." ORDER BY id ASC";
    				$data = mysql_query($sql);
					if (mysql_num_rows($data)==0)
					echo "No records available";
					else
					{
					//here is the loop using the statement above
					while($info = mysql_fetch_array( $data ))
						{
							$id		=	$info['id'];
							$title 	= 	$info['title'];
    						$tekst 	= 	$info['text'];
							$tekst 	= 	nl2br ($tekst);
							$stamp = $info['stamp'];

			
?>
<h4>
	<?php echo $title ; ?>
</h4>
<?php echo $tekst ; ?>
<hr />

<?php

						}
					}


?>

</div>


<?php
			}
		}


		closedir($dh);
?>

<div class="full">
<form name="newad" enctype="multipart/form-data" action="?action=member&amp;process=addhorseinfo" method="post">
<?php
		
		
		$dir = "./lang/";

		$dh = opendir($dir);

		while (($file = readdir($dh)) !== false) 
		{
			// Gets the File Extension
			$extension = substr($file, strrpos($file, '.'));
			
			
			// checks if the extension is .php or the file name is  . or .. if so it will be shown as an exclusion
			if($extension !== ".php" && $file !== "." && $file !== ".." && $file !== "index.html")
			
			
			
			

echo "
<fieldset>
	<legend>
		$language[$file]
		<img src='lang/$file/$file.png' alt='$language[$file]' title='$language[$file]'/>
	</legend>
	$ADM[title]
	<input name='title_$file' type='text' size='42' />
	<br />
	$ADM[descrip]
	<br />
	<textarea name='text_$file' cols='95' rows='12'></textarea>
</fieldset>";
			
		}


		closedir($dh);
?>
	<input name="stamp" type="hidden" value="<?php echo $stamp; ?>" />
<table>
	<tr>
    	<td>
        	<input type="reset" value="<?php echo $ADM['reset'];?>" />
        </td>
        <td>
        	<input type="submit" value="<?php echo $ADM['submit'];?>" />
        </td>
    </tr>
</table>

</form>
</div>

<div class="full">
<table>
	<tr>
    	<th colspan="2">
        	<a href="?action=member&amp;process=finalize&amp;stamp=<?php echo $stamp;?>">Finalize >></a>
        </th>
    </tr>
</table>
</div>


