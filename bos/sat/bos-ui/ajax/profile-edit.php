
    <div id="profile-edit" class="op-panel charcoal">
        <div class="op-panelctrl solid-black">
			<div data-close="profile-edit" class="op-panelbt op-bt-close">
				<img src="bat/css/bos-ui/arrow-left-48.png" alt="close" />
			</div>
			<a href="logout.php" class="op-panelbt op-bt-nav">
				<span class="lucida unset-bg">LOGOUT</span>
			</a>
			<div class="op-panelbt op-bt-closeall floatright">
				<img src="bat/css/bos-ui/close-white-48a.png" alt="close all" />
			</div>
			<div class="clearspace"></div>
		</div>
        
        <div class="op-panelform smoke-t">
			<div class="container-fluid">
				<div class="block-wrap">
					<div class="block b100">
						<div class="mint chonk black-t" style="padding: 16px; display: inline-block; margin: 0 1.5em 0 0; min-width: 33vw;">
							<h3 class="lucida bold" style="font-size: 2.5em; "><?php echo $_SESSION['userName']; ?></h3>
							<h4 class="lucida heavy flow-text">Edit Profile</h4>
						</div>
					</div>
				</div>
				<div class="block-wrap">
					<div class="block bw33 md-100 sm-100 xs-100">
						<h4 class="mint-t black-t-s lucida flow-text">Account Details</h4>
						<ul class="tiles lucida black-t-s">
							<li><a href="javascript:void(0);" data-panelid="edit-profile" data-pos="right" class="op-tab">
								<span class="title"><i class="bi bi-edit"></i> Edit Profile</span>
							</a></li>
						</ul>
						<p class="courier flow-text">
						<?php
						$row = 0;
						$skip_row_number = array("1");
						if (($handle = fopen("pat/profiles/".$_SESSION['userName'].".csv", "r")) !== FALSE) {
							while (($pdata = fgetcsv($handle, 1000, ",")) !== FALSE) {
								$num = count($pdata);
								$row++;
								if (in_array($row, $skip_row_number)){continue;} else {
									echo '<strong>UID: </strong>'.$pdata[0].'<br />';
									echo '<strong>username: </strong>'.$pdata[1].'<br />';
									echo '<strong>email: </strong>'.$pdata[2].'<br />';
									echo '<strong>active: </strong>'.$pdata[3].'<br />';
									echo '<strong>group: </strong>'.$pdata[4];
								}
							}
							fclose($handle);
						}
						echo '<br /><strong>IP: </strong>'.$userIP; ?>
						</p>
						
					</div>
					<div class="block bw33 md-100 sm-100 xs-100">
						<h4 class="mint-t black-t-s lucida flow-text"><i class="bi bi-encrypt"></i> Change Password</h4>
						<p class="courier flow-text">
						<?php
						$row = 0;
						$skip_row_number = array("1");
						if (($puhandle = fopen("pat/pos/users.csv", "r")) !== FALSE) {
							while (($pudata = fgetcsv($puhandle, 1000, ",")) !== FALSE) {
								$num = count($pudata);
								$row++;
								if ($pudata[0] == $_SESSION['userName']) {
								if (in_array($row, $skip_row_number)){continue;} else {
									echo '<strong>username: </strong>'.$pudata[0].'<br />';
									echo '<strong>password: </strong>'.$pudata[1].'<br />';
								}
								}
							}
							fclose($puhandle);
						} 
						/*
						$input = fopen('pat/pos/users.csv', 'r');  //open for reading
						$output = fopen('pat/pos/temp-users.csv', 'w'); //open for writing
						while( false !== ( $data = fgetcsv($input) ) ){  //read each line as an array
						   //modify data here
						   if ($data[1] == $_POST['oldPassword'] && $data[0] == $_SESSION['userName']) {
							  //Replace line here
							  $data[1] = $_POST['newPassword'];
							  echo("SUCCESS|Password changed!");
						   }
						   //write modified data to new file
						   fputcsv( $output, $data);
						}
						//close both files
						fclose( $input );
						fclose( $output );
						//clean up
						unlink('pat/pos/users.csv');// Delete obsolete BD
						rename('pat/pos/temp-users.csv', 'pat/pos/users.csv'); //Rename temporary to new
						*/
						?>
						</p>
					</div>
					<div class="block bw33 md-100 sm-100 xs-100">
						<h4 class="mint-t black-t-s lucida flow-text">My Stuff</h4>
						
					</div>
				</div>
			</div>
        </div>
    </div>