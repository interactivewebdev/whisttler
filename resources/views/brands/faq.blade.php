@extends('admin')
@section('content')
<section>
    <div class="row">
        @include('brands.sidebar')
        <div class="col-lg-9 admin">
            <div class="back_blue">
                <div class="container">
                    <h2>Frequently Asked Questions(FAQ)</h2>
                </div>
            </div>

            <section class="faq_section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-11">
                            <h1>Frequently Asked Questions</h1>
                            <div>
                                <div class="faq_block">
                                    <h3 onclick="$('#q1').slideToggle()">1. How do I sign up as brand?</h3>
                                    <p id="q1" style="display: none;">On the brands page, you’ll find a field to enter your business email-id. Enter it and click on ‘Get Started’ and we’ll take you through a very easy step-by-step process to create your Whisttle profile.</p>
                                </div>

                                <div class="faq_block">
                                    <h3 onclick="$('#q2').slideToggle()">2. Can a brand have multiple accounts?</h3>
                                <p id="q2" style="display: none;">No. One brand can only have one account on Whisttler.</p>
                                </div>

                                <div class="faq_block">
                                <h3 onclick="$('#q3').slideToggle()">3. Do I need to pay Whisttler before creating my profile?</h3>
                                <p id="q3" style="display: none;">Whisttler is absolutely free for brands to explore. We won’t ask for any card details while you are creating your profile. Some of our features are available only to paid members. If you want to access those features, visit our Pricing page which has flexible plans for business of every shape and size with detailed information of all the Plans.</p>
                                </div>

                                <div class="faq_block">
                                <h3 onclick="$('#q4').slideToggle()">4. For how long can I subscribe to a Subscription Plan?</h3>
                                <p id="q4" style="display: none;">We have subscription period of 1 month, 3 months, 6 months and 12 months. You’ll be informed when your subscription in near its expirations and guided to Renew it once it has expired.</p>
                                </div>

                                <div class="faq_block">
                                <h3 onclick="$('#q5').slideToggle()">5. How do I pay for my subscription?</h3>
                                <p id="q5" style="display: none;">We aren’t accepting online payment yet. Cheque or standard bank tranfers are the two methods though which we are accepting payments as of now. Get in touch with us to know more.</p>
                                </div>

                                <div class="faq_block">
                                <h3 onclick="$('#q6').slideToggle()">6. Will my Subscription be auto renewed?</h3>
                                <p id="q6" style="display: none;">No, we don’t believe in charging our customers without having their prior permissions. You’ll be notifies when you are nearing to subscription expiration and will be guided to renew your plans manually and in full control.</p>
                                </div>

                                <div class="faq_block">
                                <h3 onclick="$('#q7').slideToggle()">7. Will my account be deactivated once my subscription period expires?</h3>
                                <p id="q7" style="display: none;">Once a subscription expires, the subscription is set to default i.e. Lite. All your features and functions will be limited to by the accessibility present of a Lite Subscriber. To get control of all the features and process, you’ll have to renew your plan to the one subscribed before or a better plan.</p>
                                </div>

                                <div class="faq_block">
                                <h3 onclick="$('#q8').slideToggle()">8. What does Social Score of influencers signify?</h3>
                                <p id="q8" style="display: none;">Social Score of influencer signify the extent of influencer and presence they have on social media and on the web. It is an index from 0-100, greater number meaning a higher influence of the concerned person.</p>
                                </div>

                                <div class="faq_block">
                                <h3 onclick="$('#q9').slideToggle()">9. How does Whisttler calculates the Social Score of an Influencer?</h3>
                                <p id="q9" style="display: none;">Once influencer connect their with Whisttler, we get a detail scan of their connected profile and extract all relevant valuable parameters such as number of follower, engagement rate, influence of their followers, frequency of post, total unique reach, future potential and 150+ such parameters and feed them into are algorithms to come up with an influencer’s Social Score.</p>
                                </div>

                                <div class="faq_block">
                                <h3 onclick="$('#q10').slideToggle()">10. How do I start a campaign?</h3>
                                <p id="q10" style="display: none;">After you have created your account with us, you will find a footer which will be visible to you till you are on your profile. You’ll find two button – Submit a campaign brief and Get campaing assistance. Click on the one you want and you can start your campaign with 2 minutes of input. It’s that simple.</p>
                                </div>

                                <div class="faq_block">
                                <h3 onclick="$('#q11').slideToggle()">11. What happens after I have submitted my brief?</h3>
                                <p id="q11" style="display: none;">You brief is panned out to all the relevant influencers as a mail on their registered email id. Those who choose to participate respond to it. From their you can discuss the deliverables, content rights, Start date of campaign, period of campaign and other details and launch a campaign with your shortlisted influencers.</p>
                                </div>

                                <div class="faq_block">
                                <h3 onclick="$('#q12').slideToggle()">12. How do I know when my campaign has started?</h3>
                                <p id="q12" style="display: none;">We will always be there to help you out through your campaign journey, from the submission of campaign brief to the analysis of a campaigns performance. We will keep you updates with the smallest of changes.</p>
                                </div>

                                <div class="faq_block">
                                <h3 onclick="$('#q13').slideToggle()">13. How do I know how my campaigns have performed?</h3>
                                <p id="q13" style="display: none;">Once a campaign ends, we will send you a detailed analysis of its performance so that you can be assured of your expenditures and campaigns choices. No human interaction is involved in extraction of the campaigns performance as we remove any scope of manipulation in campaign related data through our technologies and methodologies.</p>
                                </div>

                                <div class="faq_block">
                                <h3 onclick="$('#q14').slideToggle()">14. How and when do I pay the influencers?</h3>
                                <p id="q14" style="display: none;">Any and every payment made to the influencer will be managed by us. This helps us keep the process secure and accountable. 50% of the campaigns decided budget needs to be realeaded before the start of the campaign, the remaining 50% after it ends.</p>
                                </div>

                                <div class="faq_block">
                                <h3 onclick="$('#q15').slideToggle()">15. Is there any other way to compensate influencers who work with my brand than monetary compensations?</h3>
                                <p id="q15" style="display: none;">Yes, depending upon the discussion which you will have with individual influencers, you can pay them in following ways – Monetary Compensations, Coupons, In-kind compensations, Passes etc.</p>
                                </div>

                                <div class="faq_block">
                                <h3 onclick="$('#q16').slideToggle()">16. What happens after a campaign is over?</h3>
                                <p id="q16" style="display: none;">After sending you with all the relevant analysis of the campaign, we will keep you updated with the latest developments in influencer marketing and with suggestion on how you can improve your campaigns based on the history of your previous campaigns with us. Don’t worry, we’ll keep you engaged just the right amount. Do subscribe to us to get practical solutions to Influencer Marketing dilemmas and problems.</p>
                                </div>

                                <div class="faq_block">
                                <h3 onclick="$('#q17').slideToggle()">17. Can I connect my social pages with Whisttler?</h3>
                                <p id="q17" style="display: none;">Yes, as a brand, you can connect your Facebook, Instagram and Twitter pages/accounts with us. We will analyze your accounts and keep you updated with all the relevant information related with them.</p>
                                </div>

                                <div class="faq_block">
                                <h3 onclick="$('#q18').slideToggle()">18. Can I keep a track of all the previous campaigns which I have launched?</h3>
                                <p id="q18" style="display: none;">Yes. On you dashboard, you will find a tab for campaigns on the left hand side. Once you click on it, a page will open with all the relevant information about your previous campaigns. </p>
                                </div>

                                <div class="faq_block">
                                <h3 onclick="$('#q19').slideToggle()">19. What does Key Categories mean?</h3>
                                <p id="q19" style="display: none;">Key Categories of a brand are the categories which most suit a brand’s industry and have relevant influencers who can have the maximum impact when targeting the relevant crowd for the brand.</p>
                                </div>

                                <div class="faq_block">
                                <h3 onclick="$('#q20').slideToggle()">20. Why Whisttler when I can connect with the influencers directly?</h3>
                                <p id="q20" style="display: none;">Because we are awesome! Check all the benefits you get once you start using Whisttler.</p>
                                </div>

                                <div class="faq_block">
                                <h3 onclick="$('#q21').slideToggle()">21. What does Whisttler have in store for us in future?</h3>
                                <p id="q21" style="display: none;">A lot. Believe us. We are working pretty fast and hard to come up with features and working process which will make you experience a breeze. Whisttler of future won’t be cute, but will be loaded with practical features and User Experience which will bring in more transparency and trust in between the brands and influencers and will help the brands create a dedicated group of brand advocates which will help the brand make a wider and deeper inroads into the mind tof their customers through a much easy and agile work flow. </p>
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