<?php
        $namedb = "";
        $emaildb = "";
        if(isset($_SESSION['user'])){
            $namedb = $_SESSION['user']['user_fullname'];
            $emaildb = $_SESSION['user']['user_email'];
        }

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $title = $_POST['title'];
        $message = $_POST['message'];

        $sql = "INSERT INTO contact(contact_name, contact_email, contact_title, contact_message)
                VALUES ('$name' , '$email' , '$title' , '$message')";
        if($conn -> query($sql)){
            echo "Submit message successful.";
        }
    }  
?>

<div id="contact-page" class="container">
    <div class="bg">
        <div class="row">    		
            <div class="col-sm-12">    			   			
                <h2 class="title text-center">Contact <strong>Us</strong></h2>    			    				    				
                <div id="gmap" class="contact-map">
                <iframe src="https://www.google.com/maps/d/embed?mid=1XFW-uHReJFO9LRijcIvRSEcWS6s&hl=en_US&ehbc=2E312F" width="100%" height="480"></iframe>
                </div>
            </div>			 		
        </div>    	
        <div class="row">  	
            <div class="col-sm-8">
                <div class="contact-form">
                    <h2 class="title text-center">Contact</h2>
                    <div class="status alert alert-success" style="display: none"></div>
                    <form id="main-contact-form" class="contact-form row" name="contact-form" method="post" action="">
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control" required="required" placeholder="Name" value="<?php echo $namedb; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" name="email" class="form-control" required="required" placeholder="Email" value="<?php echo $emaildb; ?>">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" name="title" class="form-control" required="required" placeholder="Subject">
                        </div>
                        <div class="form-group col-md-12">
                            <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
                        </div>                        
                        <div class="form-group col-md-12">
                            <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="contact-info">
                    <h2 class="title text-center">Contact Info</h2>
                    <address>
                        <p><b>BTEC Cần Thơ</b></p>
                        <p><i>Address:</i> 41 CMT8, P.An Hòa, Q.Ninh Kiều, TP.Cần Thơ</p>
                        <p>Việt Nam</p>
                        <p><i>Mobile:</i> +84 911139225</p>
                        <p><i>Email:</i> info@YourDomain.com</p>
                    </address>
                    <div class="social-networks">
                        <h2 class="title text-center">Social Networking</h2>
                        <ul>
                            <li>
                                <a href="https://www.facebook.com/profile.php?id=100057963553474"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>    			
        </div>  
    </div>	
</div><!--/#contact-page-->
