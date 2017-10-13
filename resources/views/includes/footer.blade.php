<footer class="container-fluid footer pad0">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-1 col-md-10">
                <div class="row">
                    <div class="col-md-2">
                        <h4 class="heading-text">WHISTTLER</h4>
                        <ul class="footer-ul">
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li><a href="{{url('/aboutus')}}">About Us</a></li>
                            <li><a href="{{url('/whisttler')}}" target="_blank">Blog</a></li>
                            <li><a href="{{url('/privacy')}}">Privacy</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h4 class="heading-text">BRANDS</h4>
                        <ul class="footer-ul">
                            {{--<li><a href="{{url('/brands')}}">SignUp</a></li>
                            <li><a href="{{url('/brands#login')}}">Login</a></li>--}}
                            <li><a href="{{url('/pricing')}}">Pricing</a></li>
                            <li><a href="{{url('/brands/benefits')}}">Benefits</a></li>
                            <li><a href="#">Schedule a Demo</a></li>
                            <li><a href="{{url('/faq')}}">FAQ</a></li>
                            <li></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h4 class="heading-text">INFLUENCERS</h4>
                        <ul class="footer-ul">
                            {{--<li><a href="{{url('/influencers#signup')}}">Signup</a></li>
                            <li><a href="{{url('/influencers#login')}}">Login</a></li>--}}
                            <li><a href="{{url('/influencers/benefits')}}">Benefits</a></li>
                            <li><a href="{{url('/faq#influencer_faq')}}">FAQ</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h4 class="heading-text">GO SOCIAL</h4>
                        <a href="#" target="_blank"><img src="{{url('/public/assets/images/brand_createinstagramsmall.png')}}"></a>&nbsp;
                        <a href="#" target="_blank"><img src="{{url('/public/assets/images/brand_createfbsmall.png')}}"></a>&nbsp;
                        <a href="#" target="_blank"><img src="{{url('/public/assets/images/brand_createtwittersmall.png')}}"></a>&nbsp;
                        <a href="#" target="_blank"><img src="{{url('/public/assets/images/brand_createmediumsmall.png')}}"></a>&nbsp;
                        <a href="#" target="_blank"><img src="{{url('/public/assets/images/linkedin.png')}}"></a>&nbsp;
                        <a href="#" target="_blank"><img src="{{url('/public/assets/images/slideshare.png')}}"></a>
                        <ul class="footer-ul">
                            <li>&nbsp;</li>
                            <li>&nbsp;</li>
                            <li><a href="mailto:info@whisttler.com" target="_blank"><img src="{{url('/public/assets/images/email-icon.png')}}"> niranjan@whisttler.com</a></li>
                            <!-- <li><a href="javascript:void(0)" target="_blank"><img src="{{url('/public/assets/images/phone-icon.png')}}"> 0123456789</a></li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row footer-bottom">
            <div class="col-md-6 small">
                Terms of Service
            </div>
            <div class="col-md-6">
                <p class="text-right footer-text small">Copyright &copy; 2017</p>
            </div>
        </div>
        <!-- </footer> -->
        </section>
    </div>
</footer>
{{--<span class="chat_screen screen_hide"><section class="compaign-page">
        <div class="user-pop">
            <div class="user-popPage">
                <div class="user-popChat">  
                    <div class="headImgTle">
                        <span class="profileName">
                            <img class="popManImg" src="{{url('/')}}/public/assets/images/men1.png"/>
                        </span>
                        <div class="nameEdit"><span>NIRAJAN</span></div>
                        <p class="popMsg">Ask us anything! What can we help you with?</p>
                    </div> 
                </div>
                <div class="popInputChart" id="messagingBox">
                    <div id="defaultChatBox">
                        <span>Name:</span>
                        <div><input type="text" name="name" class="form-control" placeholder="Enter your name.."></div>
                        <textarea cols="20" rows="5" class="popChart" placeholder="Type Your Message...."></textarea>
                        <div class="send_btn message_btn">
                            <span><img src="public/assets/images/send-message-button.png"></span> <span class="">Send Message</span>
                        </div>
                    </div>
                    <div id="getintouch">
                        <form method="post" action="{{url('/')}}/pricing/getintouch">
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" required placeholder="Name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="email" class="form-control" required placeholder="Email">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" required placeholder="Contact Number">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <textarea class="form-control" required id="message" placeholder="Message"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-danger btn-sm">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section> 
</span>
<a href="JavaScript:void(0);" class="click_chat">
    <span class="chat click_hidechat dsplyShow">
        <img src="{{url('/')}}/public/assets/images/charticon.png" alt="chat icon" id="first">
    </span>
</a>
<a href="JavaScript:void(0);" class="click_chat1">
    <span class="chat click_showchat  dsplyNone">
        <img src="{{url('/')}}/public/assets/images/charticon1.png" alt="chat icon" id="second">
    </span>
</a>--}}
<script type="text/javascript" src="{{asset('public/assets/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/assets/js/custom.js')}}"></script>
<script type="text/javascript" src="{{asset('public/assets/js/main.js')}}"></script>
<!-- Backend -->
<script type="text/javascript" src="{{asset('public/assets/js/backend.js')}}"></script>
<script type="text/javascript" src="{{asset('public/assets/js/aos.js')}}"></script>
<script type="text/javascript">
AOS.init();
</script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
@stack('scripts')
</body>
</html>