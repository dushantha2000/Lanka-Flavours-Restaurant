<!DOCTYPE html>
<html lang="en">

<!--Header blade.php file add here -->
 @include('UserView.header');
 <!--Header blade.php file end here -->
<body>

   <!-- ======= navbar ======= -->
    @include('UserView.navBar');
    <!-- ======= navbar ======= -->

    <!-- ======= Hero Section ======= -->
    @include('UserView.heroSection');
    <!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    @include('UserView.aboutSection');
    <!-- End About Section -->

    <!-- ======= Why Us Section ======= -->
    @include('UserView.why-us');
    <!-- End Why Us Section -->

    <!-- ======= Stats Counter Section ======= -->
    @include('UserView.statsCounter');
    <!-- End Stats Counter Section -->

    <!-- ======= Menu Section ======= -->
    @include('UserView.menuSection');
    <!-- End Menu Section -->

    <!-- ======= Testimonials Section ======= -->
    @include('UserView.testimonialSection');
    <!-- End Testimonials Section -->

    <!-- ======= Events Section ======= -->
    @include('UserView.eventSection');
    <!-- End Events Section -->

    <!-- ======= Chefs Section ======= -->
    @include('UserView.chefSection');
    <!-- End Chefs Section -->

    <!-- ======= Book A Table Section ======= -->
    @include('UserView.bookTable');
    <!-- End Book A Table Section -->

    <!-- ======= Gallery Section ======= -->
    @include('UserView.gallerySection');
    <!-- End Gallery Section -->

    <!-- ======= Contact Section ======= -->
    @include('UserView.contactSection');
    <!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <!-- End Footer -->
  @include('UserView.footer');
  <!-- End Footer -->

  

</body>

</html>