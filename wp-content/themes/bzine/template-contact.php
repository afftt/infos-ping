<?php 
/*
	Template name:Contact
*/
get_header(); 

global $smof_data;
?> 
<div class="wrapper _content">
	<div class="container">
		<div class="row-fluid">
			<div class="span12 content">
				<div class="main">
				<?php 
				
					while (have_posts()):the_post(); 
						the_title('<h2 class="ribbon ribbon-green">','</h2>'); 
						
						$contact_phone 	= rwmb_meta( 'contact_phone', 'type=text' ); 
						$contact_mobile = rwmb_meta( 'contact_mobile', 'type=text' ); 
						$contact_site 	= rwmb_meta( 'contact_site', 'type=text' ); 
						$contact_email 	= rwmb_meta( 'contact_email', 'type=text' ); 
						$contact_address= rwmb_meta( 'contact_address', 'type=text' ); 
						$map_loc 		= rwmb_meta( 'map_loc', 'type=map' );
						$mapc			= explode( ',', $map_loc);
						
						$contact_email_subject 	= rwmb_meta( 'contact_email_subject', 'type=text' ); 
						$of_subject = explode( '||', $contact_email_subject);
						
						?><script type="text/javascript">
							var map;
							var $ = jQuery.noConflict();
							$(document).ready(function(){
								map = new GMaps({
									el: '#contact_map',
									lat: <?php echo $mapc[0];?>,
									lng: <?php echo$mapc[1];?>
								});

								map.addMarker({
									lat: <?php echo $mapc[0];?>,
									lng: <?php echo $mapc[1];?>,
									title: 'info',
									infoWindow: {
										content: '<p><?php echo bloginfo("name"); ?></p>'
									}
								});
							}); 
						</script>
						<div class="content_contact">	
							<div id="contact_map"></div>
							<?php 
							
							the_content();
							
							$mail_is_sent = FALSE;
							
							
							if (isset ($_REQUEST['cemail'])){
							
								$subject 	= ( isset($_POST['csubject']) ) ? trim($_POST['csubject']) : null;
								$name 		= ( isset($_POST['cname']) ) 	? trim($_POST['cname']) : null;
								$email 		= ( isset($_POST['cemail']) ) 	? trim($_POST['cemail']) : null;
								$email 		= sanitize_email($email);
								$message 	= ( isset($_POST['cmessage']) ) ? trim($_POST['cmessage']) : null;
								$message 	= esc_html($message);
								
								if(!is_email($email)){
									
									echo '<div class="alert alert-danger"> <strong>ERREUR</strong>: Entrez une adresse e-mail correcte. <a class="close" data-dismiss="alert" href="#">&times;</a></div>';
									
								}
								
								else if(empty($message)){
									echo '<div class="alert alert-danger"> <strong>ERREUR</strong>: Entrez un message. <a class="close" data-dismiss="alert" href="#">&times;</a></div>';
									
								}
												
								else{
									$themessage = 'vous recevez un Email de : '.$name."\n".'Adresse Email de la personne : '.$email."\n".$message;

									if(!empty($contact_email)){
										$to = $contact_email;
									} else{
										$to = get_option('admin_email');
									}
													
									wp_mail($to, $subject, $themessage);
									$mail_is_sent = TRUE;
									echo '<div class="alert alert-info" style="margin-top:40px;"> Email envoyé <a class="close" data-dismiss="alert" href="#">&times;</a></div>';
									
									
								}
								
							}
							
							
							if (FALSE == $mail_is_sent) { ?>
								<div id="contactformf" >
									<form  action="<?php the_permalink(); ?>" method="POST">
										<div class="row-fluid">
											<div class="span12"> <label><span class="required">*</span> Champ requis</label></div>
										</div>
										<div class="row-fluid">
											<div class="span6">
												<input  name="cname" class="span6" type="text" placeholder="Nom" required />
											</div>
											<div class="span6">
												<input name="cemail" class="span6 pull-right" placeholder="Email" type="email"  required />
											</div>
										</div>
										<div class="row-fluid">
											<div class="span12">
												<select name="csubject" required>
													<option value="">Sujet</option>
													<?php 
													foreach($of_subject as $s){
														echo '<option value="'.$s.'">'.$s.'</option>';
													}
													?>
												</select>
											</div>
										</div>
										<div class="row-fluid">
											<div class="span12">
												<textarea class="span12" name="cmessage" cols="30" rows="7" placeholder="Message" required></textarea>
											</div>
										</div>
										<input class="btn btn-contact pull-left " type="submit" value="Send"/>
									</form>
								</div>
						<?php  } ?>
						<div class="spacer"></div>
						</div>
					<?php endwhile; ?> 
				</div>
				<!-- end main -->				

				<!-- SIDEBAR -->
				<div class="sidebar">
					<aside id="text-9999"  class="widget widget_text">
						<div class="widget_container">
							<h2 class="widget_title">Coordonnées</h2>
							<div class="widget_body">
								<div class="contactformf_widget">
								<ul>
									<li class="contact_widget_address"><?php echo $contact_address ;?></li>
									<li class="contact_widget_phone"><?php echo $contact_phone ;?></li>
									<li class="contact_widget_mobile"><?php echo $contact_mobile ;?></li>
									<li class="contact_widget_email"><?php echo $contact_email ;?></li>
									<li class="contact_widget_site"><?php echo $contact_site ;?></li>
								</ul>
								</div>
							</div>
						</div>	
					</aside>
					<?php if ( is_active_sidebar( 'widget_sidebar_contact' ) ) : ?>
						<?php dynamic_sidebar( 'widget_sidebar_contact' ); ?>
					<?php endif; ?>
				</div>
				<div class="spacer"></div>
				<!-- END SIDEBAR -->
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>