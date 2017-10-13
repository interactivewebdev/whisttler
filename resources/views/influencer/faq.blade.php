@extends('admin')
@section('content')
<section>
    <div class="row">
        @include('influencer.sidebar')
        <div class="col-lg-9 admin">
            <div class="back_blue">
                <div class="container">
                    <h2>Frequently Asked Questions (FAQ)</h2>
                </div>
            </div>

            <section class="faq_section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">
                            <h1>Frequently Asked Questions</h1>
                            <div>
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
                                <br><br>
                                Don’t worry, you won’t be alone throughout this journey. We will always be there to guide you and help you complete a campaign.</p>
                                </div>

                                <div class="faq_block">
                                    <h3 onclick="$('#q15').slideToggle()">15. What will be the deliverables of a campaign?</h3>
                                <p id="q15" style="display: none;">Deliverables of each campaign can be different and will depend upon the discussion between you and the brand before the campaign is finalized.</p>
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
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>
@endsection