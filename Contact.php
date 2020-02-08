<?php
   $title = 'Gamma: Contact';
   include 'includes/header.php';
   include 'includes/dbconfig.php';
?>
<section id="contact">
  <div>
	  <div class="container text-center">
    <h2>Contact Info!</h2>
    <p>123 North 3rd Street<br>
      Harrisburg Pennsylvania 17701</p>
    <p>Email: <a href="#">webdevpct@gabriellealinn.info</a></p>
    <p>Phone: <a href="#">(123)456-7890</a><br></p>
  </div>

  <div class="col-md-6 col-md-push-1">
    <form name="contactForm" id="contactForm" method="post" action="Contact.php" novalidate>
      <div id="error" class="bg-warning"></div>
      <br><br>
      <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" class="form-control" id="name" placeholder="lastname, firstname" required>
      </div>
      <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
          <label for="message">Message</label>
          <textarea name="message" class="form-control" id="message" rows="10" cols="40" required></textarea>
      </div>
      <button type="submit" id="submit" class="btn btn-primary">Send</button>
      <button type="reset" class="btn btn-primary">Clear</button>
    </form>
	  </div>
  <p><br></p>
</div>
	<iframe id="map" src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d773778.5917032296!2d-77.39014126966812!3d40.74942865880934!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e2!4m5!1s0x89cfa891a14a6e57%3A0xf2e237d6dac001c0!2sPennsylvania+College+of+Technology%2C+1+College+Ave%2C+Williamsport%2C+PA+17701!3m2!1d41.234716!2d-77.021041!4m5!1s0x89c8c11a955f6cbb%3A0xf9ee24da66a4e482!2s123+N+3rd+St%2C+Harrisburg%2C+PA!3m2!1d40.261758799999996!2d-76.88235929999999!5e0!3m2!1sen!2sus!4v1521938090173" width="600" height="450" frameborder="0" style="border:thin" allowfullscreen></iframe>
<section> 
  <p>&nbsp; </p>
</section>
</section>
<?php
   include 'includes/footer.php';
?>
