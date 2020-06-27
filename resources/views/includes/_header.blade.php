<header>
    <div class="container">
        <div class="heading-wrapper">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="info">
                        <i class="icon ion-ios-location-outline"></i>
                        <div class="right-area">
                            <h5>{{ $user->profile->street }}</h5>
                            <h5>{{ $user->profile->address }}</h5>
                        </div><!-- right-area -->
                    </div><!-- info -->
                </div><!-- col-sm-4 -->

                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="info">
                        <i class="icon ion-ios-telephone-outline"></i>
                        <div class="right-area">
                            <h5> <a href="tel:{{ $user->profile->phone }}">{{ $user->profile->phone }}</a></h5>
                            <h6>MON - FRI,8AM - 7PM</h6>
                        </div><!-- right-area -->
                    </div><!-- info -->
                </div><!-- col-sm-4 -->

                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="info">
                        <i class="icon ion-ios-chatboxes-outline"></i>
                        <div class="right-area">
                            <h5><a href="mailTo:{{ $user->email }}">{{ $user->email }}</a></h5>
                            <h6>REPLY IN 24 HOURS</h6>
                        </div><!-- right-area -->
                    </div><!-- info -->
                </div><!-- col-sm-4 -->
            </div><!-- row -->
        </div><!-- heading-wrapper -->

        <a class="downlad-btn" href="{{ $media->cv }}">Download CV</a>
    </div><!-- container -->
</header>
