@extends('app')
@section('content')
<header class="container-fulid pad0 headerBckclr">
    <div class="container">
        <nav class="positionRelative">
            <div class="addContainer">
                <a href="{{url('/')}}"><img src="public/images/logo.png" alt="AIM Zeneith Logo" class="logo_img1"></a>
                <a href="{{url('/')}}"><img src="public/images/chage-logo.png" alt="AIM Zeneith Logo" class="logo_img2"></a>
                <ul class="headerAlign">
                    <li><a href="{{url('/')}}/influencers" class="influencers-border influencers-button text-bold">Influencers</a></li>
                    @if(Session::get('username') == '')
                        <li><a href="{{url('/brands')}}" class="brands-border brands-button text-bold">Brands</a></li>
                    @else
                        <li><a href="{{url('/brands/dashboard')}}" class="brands-border brands-button text-bold">Brands</a></li>
                    @endif
                    <li><a href="{{url('/')}}/brands/benefits" class="brands-border brands-button text-bold">Benefits</a></li>
                    <li><a href="{{url('/')}}/whisttler/" target="_blank" class="highlighted-button">Blog</a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<section class="container-fulid pad0 pricingHeader">
    <div class="container height120vh">
        <section class="banner-text">
            <h1 class="influencers-heading-text text-center">Choose a plan which suits you best</h1>
            <h4 class="influencers-heading-text text-center">Flexible plans with no surprise</h4>
        </section>
        <br><br><br>
        <div class="pricing-table shown" id="events-pricing-table">
            <div class="plan-list">
                <div class="plan">
                    <div class="plan-name">Lite</div>
                    <div class="price">
                        <span class="currency">INR</span>
                        0
                        <span class="unit">/mo</span>
                    </div>
                    <div class="dropdown-link">
                        <select class="droplist">
                            <option value="1~0">1 Month</option>
                            <option value="3~0">3 Month</option>
                            <option value="6~0">6 Month</option>
                            <option value="12~0">12 Month</option>
                        </select>
                    </div>
                    <div class="data-points">
                        <span class="data-points-strong">FOR THE EAGER THE BUSINESS WHO WANT TO EXPLORE "NAME" <br><br></span>
                    </div>
                    <span class="titlePricing">BASIC PLAN</span>
                    <div class="plan-info-container">
                        <div class="plan-info-hover">
                            <h4 class="data-points" style="padding-top:40px;">DISCOVER INFLUENCERS</h4>
                            <h4 class="data-points">See & Search influncers accoording to</h4>
                            <ol type="i">
                                <li class="list PADDMRN">Social platform</li>
                            </ol>
                            <div class="mini-divider"></div>
                            <h4 class="data-points">Influencers profile viewable with following number of followers</h4>
                            <div class="clearfix">
                                <ol>
                                    <li class="list1"><img src="{{url('/')}}/public/assets/images/brand_createinstagramsmall.png"> < 5000</li>
                                    <li class="list1"><img src="{{url('/')}}/public/assets/images/brand_createfbsmall.png"> < 10000</li>
                                    <li class="list1"><img src="{{url('/')}}/public/assets/images/brand_createtwittersmall.png"> < 6000</li>
                                    <li class="list1"><img src="{{url('/')}}/public/assets/images/brand_createyoutube.png"> < 5000</li>
                                    <li class="list1"><img src="{{url('/')}}/public/assets/images/brand_createblog.png"> < 500 view/day</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="action">
                        <a class="show-modal action-button choose-plan free" plan="12372" data-toggle="modal" data-target="#chooseplan">
                            Choose Plan
                        </a>
                    </div>
                </div>

                <div class="plan borderLeft">
                    <div class="plan-name">Starter</div>
                    <div class="price">
                        <span class="currency">INR</span>
                        5000
                        <span class="unit">/mo</span>
                    </div>
                    <div class="dropdown-link">
                        <select class="droplist">
                            <option value="1~5000">1 Month - 5,000 INR</option>
                            <option value="3~15000">3 Month - 15,000 INR</option>
                            <option value="6~30000">6 Month - 30,000 INR</option>
                            <option value="12~60000">12 Month - 60,000 INR</option>
                        </select>
                    </div>
                    <div class="data-points">
                        <span class="data-points-strong">FOR THE BUSINESS LOOKING TO CREATE POSITIVE BRANDS IMAGE IN LIGHT BUDGETS </span>
                    </div>

                    <span class="titlePricing">EVERYTHING IN LITE PLUS</span>
                    <div class="plan-info-container">

                        <div class="plan-info-hover">
                            <h4 class="data-points" style="padding-top:26px;"></h4>
                            <div class="mini-divider PADDMRN" >
                                <h4 class="data-points ">Connect to your brands social page and see ralated social metrics</h4>
                            </div>
                            <div class="mini-divider">
                                <h4 class="data-points PADDMRN">See & Search Influncers accoording to</h4>
                                <ol type="i">
                                    <li class="list PADDMRN">Social Platform</li>
                                    <li class="list">Category</li>    
                                </ol>
                                <h4 class="data-points">Influencers profile viewable with following number of followers</h4>
                                <div class="clearfix">
                                    <ol>
                                        <li class="list1"><img src="{{url('/')}}/public/assets/images/brand_createinstagramsmall.png"> < 25,000</li>
                                        <li class="list1"><img src="{{url('/')}}/public/assets/images/brand_createfbsmall.png"> < 50,000</li>
                                        <li class="list1"><img src="{{url('/')}}/public/assets/images/brand_createtwittersmall.png"> < 30,000</li>
                                        <li class="list1"><img src="{{url('/')}}/public/assets/images/brand_createyoutube.png"> < 20,000</li>
                                        <li class="list1"><img src="{{url('/')}}/public/assets/images/brand_createblog.png"> < 5,000 view/day</li>
                                    </ol>
                                </div><br/><br/>
                                <h5 class="textAlignLast">10 campaigns/ mo</h5><br/>
                                <h5 class="textAlignLast">Influencers Per Campaign - Upto 5</h5><br/>
                                <h5 class="textAlignLast">Social Platform Per Campaign - 1</h5><br/>
                                <h5 class="textAlignLast">Individual Campaign Analysis</h5><br/>
                                <h5 class="textAlignLast">Email and Phone Support</h5><br/>
                                <h5 class="textAlignLast">Default set of influencers only according to brands category choices</h5><br/>
                                <h5 class="textAlignLast">Connect Brands Social Media Pages</h5><br/>
                            </div>
                        </div>
                    </div>
                    <div class="action">
                        <a class="show-modal action-button choose-plan" plan="12374" data-toggle="modal" data-target="#chooseplan">
                            Choose Plan
                        </a>
                    </div>
                </div>


                <div class="plan zooming">
                    <div class="best-value">

                    </div>
                    <div class="plan-name">Pro</div>
                    <div class="plus">
                        <span class="currency">INR</span>
                        20000
                        <span class="unit">/mo</span>
                    </div>
                    <div class="dropdown-link">
                        <select class="droplist">
                            <option value="Month">Month 1</option>
                            <option value="Month">Month 2</option>
                            <option value="Month">Month 3</option>
                            <option value="Month">Month 4</option>
                        </select>
                    </div>
                    <div class="data-points">
                        <span class="data-points-strong">FOR THE BUSINESS LOOKING TO CREATE POSITIVE  BRANDS </span>
                    </div>
                    <span class="plustitle">EVERYTHING IN STARTER PLUS</span>
                    <div class="plan-info-container">
                        <div class="plan-info-hover">
                            <h4 class="data-points" style="padding-top:40px;">Curated influncers according to brands indstry</h4>
                            <div class="mini-divider">
                                <h4 class="data-points PADDMRN">See & Search Influncers accoording to</h4>
                                <ol type="i">
                                    <li class="list PADDMRN">Social platform</li>
                                    <li class="list">category</li>  
                                    <li class="list">Location</li>    
                                </ol>
                                <h4 class="data-points">Influencers profile viewable with following number of followers</h4>
                                <div class="clearfix">
                                    <ol>
                                        <li class="list1"><img src="{{url('/')}}/public/assets/images/brand_createinstagramsmall.png"> < 2,00,000</li>
                                        <li class="list1"><img src="{{url('/')}}/public/assets/images/brand_createfbsmall.png"> < 2,50,000</li>
                                        <li class="list1"><img src="{{url('/')}}/public/assets/images/brand_createtwittersmall.png"> < 2,00,000</li>
                                        <li class="list1"><img src="{{url('/')}}/public/assets/images/brand_createyoutube.png"> < 80,000</li>
                                        <li class="list1"><img src="{{url('/')}}/public/assets/images/brand_createblog.png"> < 30,000 view/day</li>
                                    </ol>
                                </div><br/><br/>

                                <h5 class="textAlignLast">30 campaigns/ mo</h5><br/>
                                <h5 class="textAlignLast">Influncers per compaigns - Multiple</h5><br/>
                                <h5 class="textAlignLast">Social Platform/ Campaign - 1</h5><br/>
                                <h5 class="textAlignLast">1 Excel Report/mo</h5><br/>
                                <h5 class="textAlignLast">Influencer recommendations</h5><br/>
                                <h5 class="textAlignLast">Add/remove influencers whenever you want before the campaign</h5><br/>
                                <h5 class="textAlignLast">Dedicated email, phone Support</h5><br/>
                                <h5 class="textAlignLast">Search Filters : social platform, location and category</h5><br/>
                            </div>
                            <div style="height:30px;">&nbsp;</div>
                        </div>
                    </div>
                    <div class="action">
                        <a class="show-modal action-button choose-plan" plan="12376" data-toggle="modal" data-target="#chooseplan">
                            Choose Plan
                        </a>
                    </div>
                </div>


                <div class="plan">
                    <div class="best-value">

                    </div>
                    <div class="plan-name">Enterprise</div>
                    <div class="price">
                        <span class="currency">INR</span>
                        40000
                        <span class="unit">/mo</span>
                    </div>
                    <div class="dropdown-link">
                        <select class="droplist">
                            <option value="Month">Month 1</option>
                            <option value="Month">Month 2</option>
                            <option value="Month">Month 3</option>
                            <option value="Month">Month 4</option>
                        </select>
                    </div>
                    <div class="data-points">
                        <span class="data-points-strong">FOR THE BUSINESS  WHO WORK LOOKING TO CREATE POSITIVE BRANDS IMAGE IN LIGHT BRANDS </span>
                    </div>
                    <span class="titleLast">EVERYTHING IN PRO PLUS</span>
                    <div class="plan-info-container">
                        <div class="plan-info-hover">
                            <h4 class="data-points" style="padding-top:26px;">Work with every influncers on our platform</h4>
                            <h5 class="textAlignLast">Unlimited compaign/mo</h5><br/>
                            <h5 class="textAlignLast">Influencer per campaign : mutliple</h5><br/>
                            <h5 class="textAlignLast">Platform per campaign : mutliple</h5><br/>
                            <h5 class="textAlignLast">Campaign Analysis</h5><br/>
                            <h5 class="textAlignLast">Dedicated customer success manager</h5><br/>
                            <h5 class="textAlignLast">Individual campaign Excel Report</h5><br>
                            <h5 class="textAlignLast">Custom suggestions and recommndations after each campaign</h5><br/>
                            <h5 class="textAlignLast">Add/remove influencers whenever you want before the campaign</h5><br/>
                            <h5 class="textAlignLast">Custom campaign management</h5><br/>
                            <h5 class="textAlignLast">Dedicated email, phone and in- person support</h5><br/>
                            <div class="mini-divider">

                            </div>
                            <p class="value-prop"></p>
                        </div>
                    </div>
                    <div class="action">
                        <a class="show-modal action-button choose-plan" plan="12376" data-toggle="modal" data-target="#chooseplan">
                            Choose Plan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="clearfix  banner-bottom text-center" style="margin-top: 1150px;">
    <h3>Humans respond to recommendations, not ads.</h3>
</section>
<section>
    <div class="container marginTop">
        <table class="table">
            <thead>
                <tr class="borderBtm">
                    <th class="width40"><img src="public/assets/images/search_influ.png"><span class="tableTle">Influncers search and related</span></th>
                    <th class="txtcolor">LITE<br>INR 0/mo<br> <button class="brands-border brands-button text-bold chooseBtn" data-toggle="modal" data-target="#chooseplan">Choose plan</button>
                        </div></th>
                    <th class="txtcolor">STANDARD<br>INR 5000/mo<br> <button class="brands-border brands-button text-bold chooseBtn1" data-toggle="modal" data-target="#chooseplan">Choose plan</button>
                        </div></th>
                    <th class="txtcolor">PLUS<br>INR 20000/mo<br> <button class="brands-button text-bold chooseBtn2" data-toggle="modal" data-target="#chooseplan">Choose plan</button>
                        </div></th>
                    <th class="txtcolor">PRO<br>INR 40000/mo<br> <button class="brands-border brands-button text-bold chooseBtn3" data-toggle="modal" data-target="#chooseplan">Choose plan</button>
                        </div></th>
                </tr>
            </thead>
            <tbody>
                <tr class="">
                    <td class="txtcolor">Discover Influencer</td>
                    <td><img src="public/images/tick.png"></td>
                    <td><img src="public/images/tick.png"></td>
                    <td><img src="public/images/tick.png"></td>
                    <td><img src="public/images/tick.png"></td>
                </tr>
            <thead>
                <tr class="active">
                    <th class="txtcolor">See influncers accoording to</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tr >
                <td class="textRight txtcolor"">Social platform they use</td>
                <td><img src="public/images/tick.png"></td>
                <td><img src="public/images/tick.png"></td>
                <td><img src="public/images/tick.png"></td>
                <td><img src="public/images/tick.png"></td>
            </tr>
            <tr>
                <td class="textRight txtcolor"">their category</td>
                <td></td>
                <td><img src="public/images/tick.png"></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="textRight txtcolor"">Their location</td>
                <td></td>
                <td></td>
                <td><img src="public/images/tick.png"></td>
                <td><img src="public/images/tick.png"></td>
            </tr>
            <thead>
                <tr class="active">
                    <th class="txtcolor">Filters to influncers structure</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tr >
                <td class="textRight txtcolor"">Social platform</td>
                <td><img src="public/images/tick.png"></td>
                <td><img src="public/images/tick.png"></td>
                <td><img src="public/images/tick.png"></td>
                <td><img src="public/images/tick.png"></td>
            </tr>
            <tr>
                <td class="textRight txtcolor"">Category</td>
                <td></td>
                <td><img src="public/images/tick.png"></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="textRight txtcolor"">Location</td>
                <td></td>
                <td></td>
                <td><img src="public/images/tick.png"></td>
                <td><img src="public/images/tick.png"></td>
            </tr>
            <tr class="pane">
                <td class="textRight txtcolor"">Location</td>
                <td></td>
                <td></td>
                <td><img src="public/images/tick.png"></td>
                <td><img src="public/images/tick.png"></td>
            </tr>
            <tr class="pane">
                <td class="textRight txtcolor"">Location</td>
                <td></td>
                <td></td>
                <td><img src="public/images/tick.png"></td>
                <td><img src="public/images/tick.png"></td>
            </tr>
            <tr class="pane">
                <td class="textRight txtcolor"">Location</td>
                <td></td>
                <td></td>
                <td><img src="public/images/tick.png"></td>
                <td><img src="public/images/tick.png"></td>
            </tr>
            </tbody>
        </table>
        <div class="viewMore">
            <button class="view"> <span class="dsplyFlex">VIEW MORE<span class="icon_position">
                        <span class="glyphicon glyphicon-chevron-up dsplyNone"></span><span class="glyphicon glyphicon-chevron-down dsplyShow"></span></span></span>
            </button>
        </div>


        <table class="table">
            <thead>
                <tr>
                    <th class="width40"><img src="public/images/compaign_feature.png"><span class="tableTle txtcolor"">Compaign Features</span></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr class="active">
                    <td class=" txtcolor">Run compaign</td>
                    <td></td>
                    <td><img src="public/images/tick.png"></td>
                    <td><img src="public/images/tick.png"></td>
                    <td><img src="public/images/tick.png"></td>
                </tr>
                <tr class="">
                    <td class=" txtcolor">Compaign/mo</td>
                    <td></td>
                    <td class="txtcolor">10</td>
                    <td class="txtcolor">30</td>
                    <td class="txtcolor">Unlimited</td>
                </tr>
                <tr class="active">
                    <td class=" txtcolor"">Influncers compagain</td>
                    <td></td>
                    <td class="txtcolor">5</td>
                    <td class="txtcolor">Mutilple</td>
                    <td class="txtcolor">Mutilple</td>
                </tr>
                <tr class="">
                    <td class=" txtcolor">Social platform compagain</td>
                    <td></td>
                    <td class="txtcolor">1</td>
                    <td class="txtcolor">1</td>
                    <td class="txtcolor">Cross-platform</td>
                </tr>
                <tr>
                    <td class=" txtcolor">Add or more innfluncer before compaign</td>
                    <td></td>
                    <td></td>
                    <td><img src="public/images/tick.png"></td>
                    <td><img src="public/images/tick.png"></td>
                </tr>      
            </tbody>
        </table>

        <table class="table">
            <thead>
                <tr>
                    <th class="width40"><img src="assets/images/tech.png"><span class="tableTle txtcolor"">Report and analysis</span></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

            <thead>
                <tr class="">
                    <th class=" txtcolor">Indiviual compaign analysis</th>
                    <th></th>
                    <th><img src="public/images/tick.png"></th>
                    <th><img src="public/images/tick.png"></th>
                    <th><img src="public/images/tick.png"></th>
                </tr>
            </thead>

            <thead>
                <tr class="active">
                    <th class=" txtcolor"">COST and RO analysis</th>
                    <th></th>
                    <th></th>
                    <th><img src="public/images/tick.png"></th>
                    <th><img src="public/images/tick.png"></th>
                </tr>
            </thead>
            <thead>
                <tr class="">
                    <th class=" txtcolor">Excel reports</th>
                    <th></th>
                    <th></th>
                    <th class="txtcolor">1/mo</th>
                    <th class="txtcolor">Every compaign</th>
                </tr>
            </thead>
            <thead>
                <tr class="active">
                    <th class=" txtcolor">Custom suggestion and recommandation</th>
                    <th></th>
                    <th></th>
                    <th class="txtcolor">1/mo</th>
                    <th class="txtcolor">Every compaign</th>
                </tr>
            </thead>

            <thead>
                <tr class="">
                    <th class=" txtcolor">Connection Brands social handles and measures</th>
                    <th></th>
                    <th><img src="public/images/tick.png"></th>
                    <th><img src="public/images/tick.png"></th>
                    <th><img src="public/images/tick.png"></th>

                </tr>
            </thead>    
            </tbody>
        </table>



        <table class="table">
            <thead>
                <tr>
                    <th class="width40"><img src="public/images/support.png"><span class="tableTle txtcolor"">Support</span>
                </tr>
            </thead>
            <tbody>
                <tr class="active">
                    <td class="txtcolor">View support</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr >
                    <td class="textRight txtcolor"">Email</td>
                    <td></td>
                    <td><img src="public/images/tick.png"></td>
                    <td><img src="public/images/tick.png"></td>
                    <td><img src="public/images/tick.png"></td>
                </tr>
                <tr>
                    <td class="textRight txtcolor"">Phone</td>
                    <td></td>
                    <td><img src="public/images/tick.png"></td>
                    <td><img src="public/images/tick.png"></td>
                    <td><img src="public/images/tick.png"></td>
                </tr>
                <tr>
                    <td class="textRight txtcolor"">In person</td>
                    <td></td>
                    <td></td>
                    <td><img src="public/images/tick.png"></td>
                    <td><img src="public/images/tick.png"></td>
                </tr>
                <tr class="active">
                    <th class="txtcolor">Custom compaign management</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th><img src="public/images/tick.png"></th>
                </tr>
                </thead>
            <thead>
                <tr class="">
                    <th class="txtcolor">Dedicate custom  management</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th><img src="public/assets/images/tick.png"></th>
                </tr>
            </thead>





            </tbody>

        </table>
    </div>
</section>
<section class="question">
    <h3 class="txtcolor">Got any question? Need more details?</h3>
</section>
<section class="question">
    <button class="questionBtn">Get in touch</button>
    <button class="questionBtn" data-toggle="modal" data-target="#scheduleademo">Schedule a demo</button>
</section> 

<!-- Schedule a demo -->
<div class="modal fade" id="scheduleademo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Schedule A Demo</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="post" action="{{url('/')}}/pricing/scheduleademo">
                            <div class="form-group">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" required id="name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email address <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" required id="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="contact">Contact Number <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" required id="contact" placeholder="Contact Number">
                            </div>
                            <div class="form-group">
                                <label for="message">Message <span class="text-danger">*</span></label>
                                <textarea class="form-control" required id="message" placeholder="Message"></textarea>
                            </div>
                            <button type="submit" class="btn btn-danger btn-sm">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Choose A Plan -->
<div class="modal fade" id="chooseplan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Choose A Plan</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="post" action="{{url('/')}}/pricing/chooseplan">
                            <div class="form-group">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" required id="name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email address <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" required id="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="contact">Contact Number <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" required id="contact" placeholder="Contact Number">
                            </div>
                            <div class="form-group">
                                <label for="message">Message <span class="text-danger">*</span></label>
                                <textarea class="form-control" required id="message" placeholder="Message"></textarea>
                            </div>
                            <button type="submit" class="btn btn-danger btn-sm">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection