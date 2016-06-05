<!DOCTYPE html>
<html>

	<head>
		<!-- Links to stylesheets -->
		<link rel="stylesheet" type="text/css" href="../../stylesheets/StandardStyling.css">
		<link rel="stylesheet" type="text/css" href="UpdaterStyle.css">
		
		<!--Javascript Inserts-->
		<script src="http://www.bxvcodes.club/Javascript/insert.js"></script>
		
		<!--Page's title-->
		<title>Bronxville Programing Club</title>
	</head>

	<body>
	
		<!-- The colored header bar at the top of the page-->
		<header>
			<h1>BXV Programing Club Project Site</h1>
		</header>
		
		<!-- Narrow panel on left containing links to frequently visited pages --> 
		<nav>
			<h3 id="nav_title">Navigation</h3><hr>
			
			<a href="../../index.html">Home</a><br>
			<a href="../../Projects.html">Projects</a><br>
			<a href="../../WeeklyMinutes.html">Weekly Minutes</a><br>
			<a href="../../Bios.html">Bios</a><br>
			<a href="../../References.html">Resources</a><br>
			<a href="SiteUpdater.html">Site Updates</a>
			
		</nav>	
		
		<!-- Thick panel on right containing the page's content -->
		<div id="panel">
		
			<!-- The text at the top of the page -->
			<h2>Project Site Version Manager</h2>
			
			<p>
			This tool allows you to submit new versions of this website to the Webmaster. Currently this Version Manager can only accept folders in zip form, but we are working on adding folder 
			upload functionality. 
			</p>
			
			<p>
			This site is an Open Source project licensed under the <a href="http://opensource.org/licenses/gpl-2.0.php">GNU General Public License</a>. The Club will review any major changes, but 
			our general policy on adding features/revisions is the more the merrier.
			</p>
			
			
			
			<h4> Upload New Version?</h4>
			
			
			<!-- This is some PHP Code that collects the information from the form, checks for errors, and then emails the webmaster the new version of the site--> 
			<div id="return_message">
			
				<?php
				
				//Global Parameters
				$uploadPassword = "3lit3";													//Password required to upload files
				
				$fileName = basename($_FILES ["uploadedFile"] ["name"]);							//Remember the File's name
				$fileType = pathinfo($fileName, PATHINFO_EXTENSION);								//Remember File's extension
				
				$maxAttachmentSize = 24500000;												//File Size limit (24.5 mb)
				
				/*Error Checking*/
				
				//Check if upload password is correct
				if($_POST["password"] != $uploadPassword) {
					print "<span id='error'> Sorry that password isn't correct. Please check the Facebook group for the most recent one </span>"; 
				} 
				
				//Check if File is actually attached
				else if (empty($_FILES["uploadedFile"] ["name"])) {
					print "<span id='error'> Please pick a file to upload </span>";
				}
				
				//Check that file isn't to large
				else if ($_FILES["uploadedFile"] ["size"] >= $maxAttachmentSize) {
					print "<span id='error'>Sorry the max upload size is 24.5 mb. Let the webmaster know if you have something bigger and better </span>>";
				}				
				
				//Check that file is compressed
				else if ($fileType != "zip") {
					print "<span id='error'>Sorry, you have to compress your file into a .zip before you can upload it. Check out the tutorial on this under Resources. </span>";
				}
				
				//If everything is okay, then accept the file
				else {
				
					//email the file
					submitVersion($_POST["comment"], $_POST["authors"], $_FILES["uploadedFile"] ["tmp_name"]);
				
				}
				?>
			
			<br>
			<br>
			
			
			<!--Button to return to Original Form-->	
			<a href="SiteUpdater.html"> <button> Return to Form </button> </a>	
				
			</div>
			
			
			
			<br>
			<br>
			
			
			
			<h4>Revision History*</h4>
			
			<!-- A table to display the site's history in an orderly way-->
			<table>
			
				<tr>														<!-- <tr> indicates a table row, <th> indicates a table heading (A cell that is bold and centered) -->
					<th>				<b>Version</b>	</th>
					<th>								</th>				<!-- <td> indicates a table cell -->
					<th>								</th>
					<th class="notes">	<b>Notes</b>	</th>
				</tr>
				<tr>
					<td>				Version 7																				</td>
					<td>				<a href="../../files/site_versions/Sitev7/Title.html">View</a> 							</td>
					<td>				<a href="../../files/site_versions/Sitev7.zip">Download</a>								</td>
					<td class="notes">	Improved Breakout Game, offering touchscreen interaction. Started Joke Database?		</td>
				</tr>
				<tr>
					<td>				Version 6																				</td>
					<td>				<a href="../../files/site_versions/Sitev3/Title.html">View</a> 							</td>
					<td>				<a href="../../files/site_versions/Sitev3.zip">Download</a>								</td>
					<td class="notes">	Spiffed up breakout project. Added Weekly Minutes. Fixed server index problem.			</td>
				</tr>
				<tr>
					<td>				Version 5																				</td>
					<td>				<a href="../../files/site_versions/Sitev3/Title.html">View</a> 							</td>
					<td>				<a href="../../files/site_versions/Sitev3.zip">Download</a>								</td>
					<td class="notes">	Made Version Manager visible. Added Breakout Project. It is currently invisible.		</td>
				</tr>
				<tr>
					<td>				Version 4																				</td>
					<td>				<a href="../../files/site_versions/Sitev3/Title.html">View</a> 							</td>
					<td>				<a href="../../files/site_versions/Sitev3.zip">Download</a>								</td>
					<td class="notes">	Started Version Manager project. Currently invisible. Added extensive HTML comments.	</td>
				</tr>
				<tr>
					<td>				Version 3																				</td>
					<td>				<a href="../../files/site_versions/Sitev3/Title.html">View</a> 							</td>
					<td>				<a href="../../files/site_versions/Sitev3.zip">Download</a>								</td>
					<td class="notes">	Added Tiles to Project Page. Created Subfolder for pages on Club's Projects				</td>
				</tr>
				<tr>
					<td>				Version 2																				</td>
					<td>				<a href="../../files/site_versions/Sitev2/Title.html">View</a>							</td>
					<td>				<a href="../../files/site_versions/Sitev2.zip">Download</a>								</td>
					<td class="notes">	Added Reference and Project Pages. Refined Standard Page Layout.						</td>
				</tr>
				<tr>
					<td>				Version 1																				</td>
					<td>				<a href="../../files/site_versions/Sitev1/Titlev2.html">View</a>						</td>
					<td>				<a href="../../files/site_versions/Sitev1.zip">Download</a>								</td>
					<td class="notes">	Created Basic Layout of Title Page.														</td>
				</tr>
				
			</table>
			
			<!--The Italic Note at the bottom of the page-->
			<p>*<i>Please note this tool is present but disabled in historical versions of this site to minimize memory usage.</i></p>  
		
			
			<!--Function for emailing File-->
			<?php
							
				function submitVersion($comment, $authors, $path) {
					
					//Use the PHP Mailer Library
					require("../libs/PHPMailer/PHPMailerAutoload.php");
					
					$mail = new PHPMailer();
					
					
					
					/*Prepare connection to Email Server*/
						
					$mail->IsSMTP();								//Use GMAIL as mail server
					$mail->Host	= "smtp.gmail.com";
						
					//$mail->SMTPDebug  = 1;                     		// enables debugging information
					$mail->SMTPAuth   = true;                 			// Use secure connection to email server
						
					$mail->SMTPSecure = "ssl"; 						// Type of secure connection 
					$mail->Port       = 465;
					
					$mail->Username   = "bxvwebmaster@gmail.com";  		// GMAIL username
					$mail->Password   = "EvDrc6294";   // Strong GMAIL password
					
					
					
					/*Email Information*/
							
					$mail->From	= "webmaster@bxvcodes.club";			//Who the email should say it is from
					$mail->AddAddress("bxvwebmaster@gmail.com");			//Who the email should go to
					$mail->Subject = "New Site Version";
					
					if( empty($comment) ) {							//Make sure there is a comment
						$comment = "No Comment Provided";
					}
					
					$mail->Body	= $comment . "\n\n By: " . $authors;	//Add the comment and authors to the body of the email
					
					$mail->addAttachment($path);						//Attach file to email
							
					
					
					/*Send the Email*/	
					
					if(!$mail->Send()) {
					
						//Print this message if there is an error
						print "<span id='error'> Sorry there was an error submitting the file. Please let the webmaster know so he/she can fix it. </span>";
						
						//print "Error: " . $mail -> ErrorInfo;			// prints error messages (for debugging)
					} 
					
					else {
					
						//Print this messsage if successful
						print "<span id='success'> Success! Your file was submitted. </span>";
					}			
				}

			?>
		
		
		</div>
		
	</body>

</html>
