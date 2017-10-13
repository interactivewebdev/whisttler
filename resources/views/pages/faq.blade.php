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
                    <li><a href="{{url('/')}}/brands" class="brands-border brands-button text-bold">Pricing</a></li>
                    <li><a href="{{url('/')}}/brands/benefits" class="brands-border brands-button text-bold">Benefits</a></li>
                    <li><a href="{{url('/')}}/whisttler/" target="_blank" class="highlighted-button">Blog</a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<div class="back_blue">
    <div class="container">
        <h2>Frequently Asked Questions(FAQ)</h2>
    </div>
</div>

<section class="faq_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 back_grey">
                <ul id="questions">
                    <li><a href="javascript:void(0)" class="active" onclick="showQuestion(this, 'brand_questions', 'influencer_questions')">Brand Questions(21)</a></li>
                    <li><a href="javascript:void(0)" onclick="showQuestion(this, 'influencer_questions', 'brand_questions')">Influencer Questions(21)</a></li>
                </ul> 
            </div>
            <div class="col-lg-9">
                <h1>Frequently Asked Questions</h1>
                <div style="display:none;" id="influencer_questions">
                    <h2>Influencers</h2>
                    <div class="faq_block">
                        <h3 onclick="$('#q1').slideToggle()">1. What is influencer marketing?</h3>
                    <p id="q1" style="display: none;">Influencer Marketing is process of reaching out a targeted audience through someone whom they trust and believe. Influencer Marketing doesn’t imply that the influencer can use monetary benefits to recommend anything to the people who follow them, but an influencer carefully examines the service/product they are promoting before recommending it to their followers.</p>
                    </div>

                    <div class="faq_block">
                        <h3 onclick="$('#q2').slideToggle()">2. What is Whisttler?</h3>
                    <p id="q2" style="display: none;">Whisttler is an environment which allows for smoother interactions and campaign management between the brands and influencers. We are working hard to make it easier for the influencers to realize the potential which they have created through their followings. Whisttler also believes in the premise that influencers should act as advocated to brands in which they believe, and hence we are solving the issues of trust and compatibility between brand and infleuncers through state-of-art technologies and working methodologies.</p>
                    </div>

                    <div class="faq_block">
                        <h3 onclick="$('#q3').slideToggle()">3. How do I know if I am an Influencer?</h3>
                    <p id="q3" style="display: none;">Influencers are people who create impactful content and meaningful stories; they are somebody who knows how to connect with other and create a connection based on mutual admiration. That said, everybody is an influencer in their own sense as we all have dedicated circle of people who believe in us and our recommendations, and hence anyone with a good online presence can create their profile as influencer with us. </p>
                    </div>

                    <div class="faq_block">
                        <h3 onclick="$('#q4').slideToggle()">4. How can I create my Whisttler profile?</h3>
                    <p id="q4" style="display: none;">It’s very simple, really. Just connect one of your most popular and preferred social media accounts with Whisttler. The first time you connect an account, we’ll take you through a real quick process to create you profile in few simple steps.</p>
                    </div>

                    <div class="faq_block">
                        <h3 onclick="$('#q5').slideToggle()">5. How do I connect my social accounts?</h3>
                    <p id="q5" style="display: none;">Once you are on your dashboard, just go to a social platform on which you have a profile and want to connect and click on ‘connect’ icon present on the right side. That’s all.</p>
                    </div>

                    <div class="faq_block">
                        <h3 onclick="$('#q6').slideToggle()">6. Can I connect multiple profiles from a single platform?</h3>
                    <p id="q6" style="display: none;">You can’t connect multiple accounts from a single social platform. To achieve maximum results, connect the account which is most popular on each of the social platforms on which you are present.</p>
                    </div>

                    <div class="faq_block">
                        <h3 onclick="$('#q7').slideToggle()">7. What about my privacy?</h3>
                    <p id="q7" style="display: none;">We are building an environment of trust and transparency and any infringement on individual’s personal information and their privacy will go against our cause. We don’t track you. Neither on our platform, nor on the web.</p>
                    </div>

                    <div class="faq_block">
                        <h3 onclick="$('#q8').slideToggle()">8. Will Whisttler post on my behalf on my connected social accounts?</h3>
                    <p id="q8" style="display: none;">We would never do this.</p>
                    </div>

                    <div class="faq_block">
                        <h3 onclick="$('#q9').slideToggle()">9. How safe is my information?</h3>
                    <p id="q9" style="display: none;">All your interaction with us and your information is saved on our servers in encrypted form.</p>
                    </div>

                    <div class="faq_block">
                        <h3 onclick="$('#q10').slideToggle()">10. What does my Social Score signify?</h3>
                    <p id="q10" style="display: none;">You Social Score is a measure of how much influence do you have through your online presence across the social platforms. It is a scale of 0-100 with increasing index meaning increasing influence.</p>
                    </div>

                    <div class="faq_block">
                        <h3 onclick="$('#q11').slideToggle()">11. How does Whisttler calculate my Social Score?</h3>
                    <p id="q11" style="display: none;">After you connect your social accounts with us, we do a thorough scan of your profile and try to find out about the major performance indicator of the content you post with infringing on your privacy. We track indicators like avg comments per post, total reach, avg impressions, influencer of people who follow you, influence of people who engage with you and 150+ such measures to come up with a comprehensive measure of your social influence.</p>
                    </div>

                    <div class="faq_block">
                        <h3 onclick="$('#q12').slideToggle()">12. How will I get work?</h3>
                    <p id="q12" style="display: none;">Whisttler is constantly abuzz with brands signing up and exploring opportunities to work with influencers who align with their. Once a brands starts a campaign, you will be informed on your registered email id via an email about the campaign. If you are interested, you can always reply to us through that email and we’ll take it for you from there.</p>
                    </div>

                    <div class="faq_block">
                        <h3 onclick="$('#q13').slideToggle()">13. Will my Social Score decide how much I get paid for my campaigns?</h3>
                    <p id="q13" style="display: none;">Absolutely not! Measuring an influencer’s Social Score is yet another and one of the most important steps that we have taken to ensure an environment of trust, transparency and compatibility among our Influencers and Brands. How much you get paid will only be guided by your Social Score and not determined by it.</p>
                    </div>

                    <div class="faq_block">
                        <h3 onclick="$('#q14').slideToggle()">14. What happens once I receive a campaign query from a Brand?</h3>
                    <p id="q14" style="display: none;">Once you receive a campaign query from a brand on your registered email id, you can either choose to respond to it or ignore it. If you choose to respond to it, you and the brand will decide on the deliverables, rights to content produced, campaign details, date of launch, period of campaign and other parameters. If you and brand can come to a common ground regarding a brief, you can help brand launch their campaign. 
                    <br><br>Don’t worry, you won’t be alone throughout this journey. We will always be there to guide you and help you complete a campaign.
                    </p>
                    </div>


                    <div class="faq_block">
                        <h3 onclick="$('#q15').slideToggle()">15. What will be the deliverables of a campaign?</h3>
                    <p id="q15" style="display:none;">Deliverables of each campaign can be different and will depend upon the discussion between you and the brand before the campaign is finalized.</p>
                    </div>

                    <div class="faq_block">
                        <h3 onclick="$('#q16').slideToggle()">16. How and when will I be rewarded/paid/compensated for my work?</h3>
                    <p id="q16" style="display: none;">All the payment will be done directly to your banks account, the details of which will be asked from you after you are ready to launch your first campaign. All the payments, in-kinds rewards will be settled after the campaign has been completed.</p>
                    </div>

                    <div class="faq_block">
                        <h3 onclick="$('#q17').slideToggle()">17. What if a brand rejects my campaign work?</h3>
                    <p id="q17" style="display: none;">You don’t have to worry about it. We’ll be in touch with you and the brand through you campaign discussion and deliveries and will help you create and curate the content and manage your campaign.</p>
                    </div>

                    <div class="faq_block">
                        <h3 onclick="$('#q18').slideToggle()">18. What if my followers and other social metric improve/decline after I have connected my profiles?</h3>
                    <p id="q18" style="display: none;">No problems. We update all database every 24 – 48 hours. Every metrics associated with an account is update along with this.</p>
                    </div>

                    <div class="faq_block">
                        <h3 onclick="$('#q19').slideToggle()">19. How can I improve my Social Score and be a better influencer?</h3>
                    <p id="q19" style="display: none;">This is a somewhat long and elaborate area of discussion. Read our Blog to know more about this. We suggest you subscribe to receives amazing tips and suggestion on growing you social media presence.</p>
                    </div>

                    <div class="faq_block">
                        <h3 onclick="$('#q20').slideToggle()">20. Can I ask my friend who aren’t that popular on social media to create profile on Whisttler?</h3>
                    <p id="q20" style="display: none;">Sure. The more, the merrier.</p>
                    </div>

                    <div class="faq_block">
                        <h3 onclick="$('#q21').slideToggle()">21. What does Whisttler have for us in future?</h3>
                    <p id="q21" style="display: none;">A lot. We are literally moving fast and breaking things to come up with features to give you a cutting edge experience.  Have a little faith in us and we’ll pay it back to you in a big way.</p>
                    </div>

                </div>
                <div id="brand_questions">
                    <h2>Brand</h2>
                    <div class="faq_block">
                        <h3 onclick="$('#qb1').slideToggle()">1. How do I sign up as brand?</h3>
                    <p id="qb1" style="display: none;">On the brands page, you’ll find a field to enter your business email-id. Enter it and click on ‘Get Started’ and we’ll take you through a very easy step-by-step process to create your Whisttle profile.</p>
                    </div>

                    <div class="faq_block">
                        <h3 onclick="$('#qb2').slideToggle()">2. Can a brand have multiple accounts?</h3>
                    <p id="qb2" style="display: none;">No. One brand can only have one account on Whisttler.</p>
                    </div>

                    <div class="faq_block">
                        <h3 onclick="$('#qb3').slideToggle()">3. Do I need to pay Whisttler before creating my profile?</h3>
                    <p id="qb3" style="display: none;">Whisttler is absolutely free for brands to explore. We won’t ask for any card details while you are creating your profile. Some of our features are available only to paid members. If you want to access those features, visit our Pricing page which has flexible plans for business of every shape and size with detailed information of all the Plans.</p>
                    </div>

                    <div class="faq_block">
                        <h3 onclick="$('#qb4').slideToggle()">4. For how long can I subscribe to a Subscription Plan?</h3>
                    <p id="qb4" style="display: none;">We have subscription period of 1 month, 3 months, 6 months and 12 months. You’ll be informed when your subscription in near its expirations and guided to Renew it once it has expired.</p>
                    </div>

                    <div class="faq_block">
                        <h3 onclick="$('#qb5').slideToggle()">5. How do I pay for my subscription?</h3>
                    <p id="qb5" style="display: none;">We aren’t accepting online payment yet. Cheque or standard bank tranfers are the two methods though which we are accepting payments as of now. Get in touch with us to know more.</p>
                    </div>

                    <div class="faq_block">
                        <h3 onclick="$('#qb6').slideToggle()">6. Will my Subscription be auto renewed?</h3>
                    <p id="qb6" style="display: none;">No, we don’t believe in charging our customers without having their prior permissions. You’ll be notifies when you are nearing to subscription expiration and will be guided to renew your plans manually and in full control.</p>
                    </div>

                    <div class="faq_block">
                        <h3 onclick="$('#qb7').slideToggle()">7. Will my account be deactivated once my subscription period expires?</h3>
                    <p id="qb7" style="display: none;">Once a subscription expires, the subscription is set to default i.e. Lite. All your features and functions will be limited to by the accessibility present of a Lite Subscriber. To get control of all the features and process, you’ll have to renew your plan to the one subscribed before or a better plan.</p>
                    </div>

                    <div class="faq_block">
                        <h3 onclick="$('#qb8').slideToggle()">8. What does Social Score of influencers signify?</h3>
                    <p id="qb8" style="display: none;">Social Score of influencer signify the extent of influencer and presence they have on social media and on the web. It is an index from 0-100, greater number meaning a higher influence of the concerned person.</p>
                    </div>

                    <div class="faq_block">
                        <h3 onclick="$('#qb9').slideToggle()">9. How does Whisttler calculates the Social Score of an Influencer?</h3>
                    <p id="qb9" style="display: none;">Once influencer connect their with Whisttler, we get a detail scan of their connected profile and extract all relevant valuable parameters such as number of follower, engagement rate, influence of their followers, frequency of post, total unique reach, future potential and 150+ such parameters and feed them into are algorithms to come up with an influencer’s Social Score.</p>
                    </div>

                    <div class="faq_block">
                        <h3 onclick="$('#qb10').slideToggle()">10. How do I start a campaign?</h3>
                    <p id="qb10" style="display: none;">After you have created your account with us, you will find a footer which will be visible to you till you are on your profile. You’ll find two button – Submit a campaign brief and Get campaing assistance. Click on the one you want and you can start your campaign with 2 minutes of input. It’s that simple.</p>
                    </div>

                    <div class="faq_block">
                        <h3 onclick="$('#qb11').slideToggle()">11. What happens after I have submitted my brief?</h3>
                    <p id="qb11" style="display: none;">You brief is panned out to all the relevant influencers as a mail on their registered email id. Those who choose to participate respond to it. From their you can discuss the deliverables, content rights, Start date of campaign, period of campaign and other details and launch a campaign with your shortlisted influencers.</p>
                    </div>

                    <div class="faq_block">
                        <h3 onclick="$('#qb12').slideToggle()">12. How do I know when my campaign has started?</h3>
                    <p id="qb12" style="display: none;">We will always be there to help you out through your campaign journey, from the submission of campaign brief to the analysis of a campaigns performance. We will keep you updates with the smallest of changes.</p>
                    </div>

                    <div class="faq_block">
                        <h3 onclick="$('#qb13').slideToggle()">13. How do I know how my campaigns have performed?</h3>
                    <p id="qb13" style="display: none;">Once a campaign ends, we will send you a detailed analysis of its performance so that you can be assured of your expenditures and campaigns choices. No human interaction is involved in extraction of the campaigns performance as we remove any scope of manipulation in campaign related data through our technologies and methodologies.</p>
                    </div>

                    <div class="faq_block">
                        <h3 onclick="$('#qb14').slideToggle()">14. How and when do I pay the influencers?</h3>
                    <p id="qb14" style="display: none;">Any and every payment made to the influencer will be managed by us. This helps us keep the process secure and accountable. 50% of the campaigns decided budget needs to be realeaded before the start of the campaign, the remaining 50% after it ends.</p>
                    </div>

                    <div class="faq_block">
                        <h3 onclick="$('#qb15').slideToggle()">15. Is there any other way to compensate influencers who work with my brand than monetary compensations?</h3>
                    <p id="qb15" style="display: none;">Yes, depending upon the discussion which you will have with individual influencers, you can pay them in following ways – Monetary Compensations, Coupons, In-kind compensations, Passes etc.</p>
                    </div>

                    <div class="faq_block">
                        <h3 onclick="$('#qb16').slideToggle()">16. What happens after a campaign is over?</h3>
                    <p id="qb16" style="display: none;">After sending you with all the relevant analysis of the campaign, we will keep you updated with the latest developments in influencer marketing and with suggestion on how you can improve your campaigns based on the history of your previous campaigns with us. Don’t worry, we’ll keep you engaged just the right amount. Do subscribe to us to get practical solutions to Influencer Marketing dilemmas and problems.</p>
                    </div>

                    <div class="faq_block">
                        <h3 onclick="$('#qb17').slideToggle()">17. Can I connect my social pages with Whisttler?</h3>
                    <p id="qb17" style="display: none;">Yes, as a brand, you can connect your Facebook, Instagram and Twitter pages/accounts with us. We will analyze your accounts and keep you updated with all the relevant information related with them.</p>
                    </div>

                    <div class="faq_block">
                        <h3 onclick="$('#qb18').slideToggle()">18. Can I keep a track of all the previous campaigns which I have launched?</h3>
                    <p id="qb18" style="display: none;">Yes. On you dashboard, you will find a tab for campaigns on the left hand side. Once you click on it, a page will open with all the relevant information about your previous campaigns. </p>
                    </div>

                    <div class="faq_block">
                        <h3 onclick="$('#qb19').slideToggle()">19. What does Key Categories mean?</h3>
                    <p id="qb19" style="display: none;">Key Categories of a brand are the categories which most suit a brand’s industry and have relevant influencers who can have the maximum impact when targeting the relevant crowd for the brand.</p>
                    </div>

                    <div class="faq_block">
                        <h3 onclick="$('#qb20').slideToggle()">20. Why Whisttler when I can connect with the influencers directly?</h3>
                    <p id="qb20" style="display: none;">Because we are awesome! Check all the benefits you get once you start using Whisttler.</p>
                    </div>

                    <div class="faq_block">
                        <h3 onclick="$('#qb21').slideToggle()">21. What does Whisttler have in store for us in future?</h3>
                    <p id="qb21" style="display: none;">A lot. Believe us. We are working pretty fast and hard to come up with features and working process which will make you experience a breeze. Whisttler of future won’t be cute, but will be loaded with practical features and User Experience which will bring in more transparency and trust in between the brands and influencers and will help the brands create a dedicated group of brand advocates which will help the brand make a wider and deeper inroads into the mind tof their customers through a much easy and agile work flow. </p>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>
@endsection
<script>
    function showQuestion(obj, id1, id2) {
        $('#questions li a').removeClass('active');
        $(obj).addClass('active');
        $('#' + id2).hide();
        $('#' + id1).show();
    } 

    function showQuestion1(id1, id2) {
        $('#' + id2).hide();
        $('#' + id1).show();
    }

    window.onload = function () { 
        var hash = window.location.hash;
        if(hash == "#influencer_faq"){
            document.getElementById('brand_questions').style.display = "none";
            document.getElementById('influencer_questions').style.display = "block";
        }
    }
    
</script>