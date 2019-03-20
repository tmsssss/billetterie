<?php require 'header.php'; session_destroy(); ?>

    <!-- SECTION -->
    <div class="section">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light-nav fixed-top">
                <a class="navbar-brand text-uppercase" href="index.html">Seminors</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar1">
                    <ul class="navbar-nav ml-auto nav-links-btn">
                        <li class="nav-item active"><a class="nav-link" href="index.html">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.html">Workshops</a></li>
                        <li class="nav-item"><a class="nav-link" href="about-us.html">About us</a></li>
                        <li class="nav-item"><a class="nav-link" href="post-your-event.html">Post Your Event</a></li>
                        <li class="nav-item"><a class="nav-link" href="javascript:void(0)" data-toggle="modal" data-target="#sem-login">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="javascript:void(0)" data-toggle="modal" data-target="#sem-reg">Register</a></li>
                    </ul>
                </div>
            </nav>
            <section>
                <div class="Seminor-banner">
                    <img class="img-fluid" src="images/seminar1.jpeg" />
                </div>
            </section>
            <section id="post-your-event-tabs">
                <div class="container">
                    <h1 class="section-title">Post Your Event Details</h1>
                    <!-- Nav pills -->
                    <ul class="nav nav-pills nav-justified" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="organizer-event-tab" data-toggle="tab" href="#organizer-event" role="tab" aria-controls="organizer-event" aria-selected="true">Organizer Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="event-details-tab" data-toggle="tab" href="#event-details" role="tab" aria-controls="event-details" aria-selected="false">Event Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="confirm-details-tab" data-toggle="tab" href="#confirm-details" role="tab" aria-controls="confirm-details" aria-selected="false">Confirm Details</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content py-3 px-3 px-sm-0 events-tab-content">
                        <div class="tab-pane fade show active" id="organizer-event" role="tabpanel" aria-labelledby="organizer-event-tab">
                            <form class="seminor-login-form ges-location-from">

                                <div class="form-group">
                                    <label for="contact-person">Contact Person</label>
                                    <input type="text" placeholder="Contact Organizing Person" class="form-control ges-form-control" required autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <label for="contact-email">Contact Email</label>
                                    <input type="email" placeholder="Contact Organizer Email" class="form-control ges-form-control" required autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <label  for="alternative-email">Alternative Email</label>
                                    <input type="email" placeholder="Contact Organizer Alternative Email" class="form-control ges-form-control" autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <label  for="contact-number">Contact Number</label>
                                    <input type="text" placeholder="Contact Organizer Phone Number" class="form-control ges-form-control" required autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <label  for="alternative-number">Alternative Number</label>
                                    <input type="text" placeholder="Contact Organizer Phone Alternative Number" class="form-control ges-form-control" autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <label class="container-checkbox">
                                        Iam the event organizer and responsible for the info provided.
                                        <input type="checkbox" checked="checked" required>
                                        <span class="checkmark-box"></span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="container-checkbox">
                                        Just posting an event that iam aware about this.
                                        <input type="checkbox" checked="checked" required>
                                        <span class="checkmark-box"></span>
                                    </label>
                                </div>
                                <div class="btn-check-log text-center">
                                    <button type="submit" class="btn-check-login ripple-effect">NEXT</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="event-details" role="tabpanel" aria-labelledby="event-details-tab">
                            <form class="seminor-login-form ges-location-from">
                                <div class="form-group">
                                    <label  for="event-title">Event Title</label>
                                    <input type="text" placeholder="Event Title" class="form-control ges-form-control" required autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <label for="event-start-date">Event Start Date</label>
                                    <input type='text' placeholder="Event Start Date (MM/DD/YYYY)" class="form-control ges-form-control date"  id='datetimepicker1' autocomplete="off"/>
                                </div>

                                <div class="form-group">
                                    <label for="event-end-date">Event End Date</label>
                                    <input type='text' placeholder="Event End Date (MM/DD/YYYY)" class="form-control ges-form-control date"  id='datetimepicker2' autocomplete="off"/>
                                </div>

                                <div class="form-group">
                                    <label for="last-date-registration">Last Date For Registration</label>
                                    <input type="text" placeholder="Last Date For Registration (MM/DD/YYYY)" class="form-control ges-form-control date" id='datetimepicker3' required autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <label for="venue-city">Venue City</label>
                                    <input type="text" placeholder="Event Venue City" class="form-control ges-form-control" required autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <label for="venue-location">Venue Location</label>
                                    <input type="text" placeholder="Event Venue Location" class="form-control ges-form-control" required autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <label for="full-address">Full Address</label>
                                    <input type="text" placeholder="Event Full Address" class="form-control ges-form-control" required autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <label for="Website">Website</label>
                                    <input type="text" placeholder="Event Website" class="form-control ges-form-control" autocomplete="off">
                                </div>

                                <div class="btn-check-log text-center">
                                    <!--   <button type="submit" class="btn-check-login">LOGIN</button> -->
                                    <button type="submit" class="btn-check-login ripple-effect">NEXT</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="confirm-details" role="tabpanel" aria-labelledby="confirm-details-tab">
                            <form class="seminor-login-form">
                                <ul class="post-final-submit">
                                    <li><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p></li>
                                    <li><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p></li>
                                    <li><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p></li>
                                    <li><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p></li>
                                    <li><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p></li>
                                    <li><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p></li>
                                </ul>
                                <div class="btn-check-log text-center">
                                    <button type="submit" class="btn-check-login ripple-effect">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>


<?php require 'footer.php'; ?>