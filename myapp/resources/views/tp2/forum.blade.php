@extends ('layouts.default')
@section('content')

    <h1 style="text-align:center">Laissez nous votre trace</h1>

    <!-- start wpo-blog-pg-section -->
    <section class="wpo-blog-pg-section" style="margin-top:50px">
        <div class="container">
            <div class="row">
                <div class="col col-md-12">
                    <div class="wpo-wpo-blog-content">



                        <div class="wpo-donations-details">
                            <h2>Ecrivez quelque chose</h2>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group">
                                    <input type="text" class="form-control" name="NomPrenom" id="fname"
                                        placeholder="Nom et prenom">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group">
                                    <input type="email" class="form-control" name="email" id="name" placeholder="Email">
                                </div>

                                <div class="col-lg-12 col-12 form-group">
                                    <textarea class="form-control" name="note" id="note"
                                        placeholder="Ecrivez quelque chose"></textarea>
                                </div>
                                <div class="form-submit">
                                    <input style="background:#f7c33f;width:20%" id="submit" value="Reply" type="submit">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </section>
    <!-- end wpo-blog-pg-section -->


    <!-- start wpo-blog-single-section -->
    <section class="wpo-blog-single-section" style="margin-bottom:50px">
        <div class="container">
            <div class="row">
                <div class="col col-md-12">

                    <div class="comments-area">
                        <div class="comments-section">
                            <h3 class="comments-title">Comments</h3>
                            <ol class="comments">
                                <li class="comment even thread-even depth-1" id="comment-1">

                                    <!-- commentaire -->
                                    <div id="div-comment-1">
                                        <div class="comment-theme">
                                            <div class="comment-image"><img
                                                    src="assets/images/blog-details/comments-author/img-1.jpg" alt></div>
                                        </div>
                                        <div class="comment-main-area">
                                            <div class="comment-wrapper">
                                                <div class="comments-meta">
                                                    <h4>John Abraham <span class="comments-date">Octobor 28,2018 At
                                                            9.00am</span></h4>
                                                </div>
                                                <div class="comment-area">
                                                    <p>I will give you a complete account of the system, and expound the
                                                        actual teachings of the great explorer of the truth, </p>
                                                    <div class="comments-reply" data-toggle="modal" data-target="#myModal">
                                                        <a class="comment-reply-link" href="#"><i class="fa fa-reply"
                                                                aria-hidden="true"></i><span>Reply</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- commentaire ends -->

                                    <!-- reponse -->
                                    <ul class="children" style="margin-left:7%">
                                        <li class="comment">
                                            <div>
                                                <div class="comment-theme">
                                                    <div class="comment-image"><img
                                                            src="assets/images/blog-details/comments-author/img-2.jpg" alt>
                                                    </div>
                                                </div>
                                                <div class="comment-main-area">
                                                    <div class="comment-wrapper">
                                                        <div class="comments-meta">
                                                            <h4>Lily Watson <span class="comments-date">Octobor 28,2018 At
                                                                    9.00am</span></h4>
                                                        </div>
                                                        <div class="comment-area">
                                                            <p>I will give you a complete account of the system, and expound
                                                                the actual teachings of the great explorer of the truth,
                                                            </p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul>

                                            </ul>
                                        </li>
                                    </ul>
                                    <!-- end reponse -->

                                </li>
                            </ol>
                        </div> <!-- end comments-section -->
                    </div> <!-- end comments-area -->

                    <!-- formulaire de reponse-->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog" style="background-color:white;width:70%">
                            <div class="comment-respond" style="width:80%;margin-left:10%">
                                <h3 class="comment-reply-title">Leave a Comment</h3>
                                <form method="post" id="commentform" class="comment-form">
                                    <div class="form-inputs">
                                        <input placeholder="Name" type="text">
                                        <input placeholder="Email" type="email">

                                    </div>
                                    <div class="form-textarea">
                                        <textarea id="comment" placeholder="Write Your Comments..."></textarea>
                                    </div>
                                    <div class="form-submit">
                                        <input id="submit" value="Reply" type="submit">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- formulaire de reponse-->

                </div>
            </div>
        </div> <!-- end container -->
    </section>
    <!-- end wpo-blog-single-section -->




    <div class="wpo-ne-footer">
        <!-- start wpo-news-letter-section -->
        <section class="wpo-news-letter-section">
            <div class="container">
                <div class="row">
                    <div class="col col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                        <div class="wpo-newsletter">
                            <h3>Follow us For ferther information</h3>
                            <div class="wpo-newsletter-form">
                                <form>
                                    <div>
                                        <input type="text" placeholder="Enter Your Email" class="form-control">
                                        <button type="submit">Subscribe</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end container -->
        </section>
        <!-- end wpo-news-letter-section -->
@endsection