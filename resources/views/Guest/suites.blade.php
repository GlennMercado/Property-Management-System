@extends('layouts.guest', ['class' => 'bg-light'])

@section('content')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"
        integrity="sha512-Y2IiVZeaBwXG1wSV7f13plqlmFOx8MdjuHyYFVoYzhyRr3nH/NMDjTBSswijzADdNzMyWNetbLMfOpIPl6Cv9g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <div class="card mt-6 d-flex justify-content-center" style="width: 100%;">
        <p class="mx-auto pt-6 text-uppercase title" id="section1">Reserve Now</p>
        <div class="card-body">
            <div class="container">
                <h1>Hotel Reservation form</h1>
                <h5>Please complete the form below</h5>
                <hr class="">
                <form action="{{ url('/guest_reservation') }}" class="prevent_submit" method="POST"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row pt-4">
                        <div class="col-md-6">
                            <p>Guest Name <span class="text-danger">*</span></p>
                            <!-- <i class="bi bi-asterisk" style="color:red; font-size:7px;"></i> -->
                            @foreach ($guest as $guests)
                                <input type="hidden" name="gName" value="{{ $guests->name }}" />
                                <input class="form-control" type="text" name="gName" value="{{ $guests->name }}"
                                    readonly>
                            @endforeach
                        </div>
                        <div class="col-md-6">
                            <p>Email <span class="text-danger">*</span></p>
                            @foreach ($guest as $guests)
                                <input class="form-control" type="text" value="{{ $guests->email }}" readonly>
                            @endforeach
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col-md">
                            <p class="form-label">Mobile No. <span class="text-danger">*</span></p>
                            <input class="form-control" type="number" minlength="11" maxlength="11" name="mobile"
                                min="0" oninput="this.value = Math.abs(this.value)" required>

                            <div id="balls"></div>

                        </div>

                        <div class="col-md">
                            <p>Room No <span class="text-danger">*</span></p>
                            <select name="room_no" class="form-control" required>
                                <option selected disabled value="">Select</option>
                                @foreach ($room as $rooms)
                                    @if ($rooms->Status == 'Vacant for Accommodation')
                                        <option value="{{ $rooms->Room_No }}">{{ $rooms->Room_No }} -
                                            {{ $rooms->No_of_Beds }} - {{ $rooms->Extra_Bed }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col-md">

                        </div>
                    </div>

                    <div class="row pt-2">
                        <div class="col-md">
                            <p>Check in Date/Time <span class="text-danger">*</span></p>
                            <input class="form-control chck" name="checkIn" type="date" onkeydown="return false"
                                id="example-datetime-local-input" required />
                        </div>
                        <div class="col-md">
                            <p>Check out Date/Time <span class="text-danger">*</span></p>
                            <input class="form-control chck" name="checkOut" type="date" onkeydown="return false"
                                id="example-datetime-local-input" required>
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col-md">
                            <p class="form-label">Number of pax <span class="text-danger">*</span></p>
                            <div class="dropdown">
                                <button class="btn btn-outline-success dropdown-toggle" type="button"
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" style="width:250px;">
                                    Select
                                </button>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <div class="container">
                                        <div id="input1">
                                            <label for="field1" class="pt-2">Adult:</label>
                                            <input type="number" class="form-control" value="0" id="mytextbox"
                                                min="0" required>
                                        </div>
                                        <div id="input2">
                                            <label for="field1" class="pt-2">Child:</label>
                                            <input type="number" class="form-control" id="field2" value="0"
                                                min="0" required>
                                        </div>
                                        <div id="input3">
                                            <label for="field1" class="pt-2">Infant:</label>
                                            <input type="number" class="form-control" id="field3" value="0"
                                                min="0" required>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="Submit" class="btn btn-primary">Done</button>
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- code for pax count --}}

                            {{-- <select name="pax" id="textboxes" class="form-control" id="pax_num"
                                onchange="pax_on_change()" required>
                                <option selected disabled value="">Select</option>
                                @for ($count = 1; $count <= 4; $count++)
                                    <option value="{{ $count }}" id="room_pax">
                                        {{ $count }}</option>
                                @endfor
                            </select> --}}
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col-md">
                            <div class="form-check form-check-input">
                                <input type="checkbox" id="mainCheckbox">
                                <label for="mainCheckbox">Make this booking for someone else?</label>
                                <br><br>
                            </div>
                        </div>
                    </div>

                    <h3 class="pt-6">Guest Information</h3>

                    <div class="row">
                        <div class="col-md">
                            <p>Full Name</p>
                            <input type="text" id="textbox1" class="form-control" disabled>
                        </div>
                    </div>
                    <h2 class="pt-4">Do you have any special request?</h2>
                    <h5>Extras</h5>
                    <div class="row pt-4">
                        <div class="col-md">
                            <p>Pillow</p>
                            <input type="number" class="form-control" min="0" max="5" value="0">
                        </div>
                        <div class="col-md">
                            <p>Towel</p>
                            <input type="number" class="form-control" min="0" max="5" value="0">
                        </div>
                        <div class="col-md">
                            <p>Mattress</p>
                            <input type="number" class="form-control" min="0" max="5" value="0">
                        </div>
                    </div>
                    <p class="pt-4 txt">Price: </p>
                    <input class="form-control" id="room_price" readonly>
                    <p>Additional P1,500.00/pax</p>
                    <div class="row">
                        <div class="col-md">
                            <div class="custom-control custom-control-alternative custom-checkbox">
                                <input class="custom-control-input" id="customCheckRegister" type="checkbox" required>
                                <label class="custom-control-label" for="customCheckRegister">
                                    <span class="text-muted">{{ __('Agree to') }} <a href="#ModalPrivacyPolicy"
                                            data-toggle="modal" data-target="#ModalTerms">Terms & Conditions</a></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- Modal > Privacy Policy -->
                    <div class="modal fade" id="ModalTerms" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title" id="exampleModalLongTitle">TERMS AND CONDITIONS</h2>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p style="text-align: justify;">

                                    <h2 style="text-align: center;"><b></b></h2>
                                    {{-- <p>Last updated: 2022-12-08</p>
                <strong>1. <b>Introduction</b></strong>
                <p>Welcome to <b>NVDC Properties</b> (“Company”, “we”, “our”, “us”)!</p>
                <p>These Terms of Service (“Terms”, “Terms of Service”) govern your use of our website located at
                    <b>nvdcproperties.com</b> (together or individually “Service”) operated by <b>NVDC Properties</b>.
                </p>
                <p>Our Privacy Policy also governs your use of our Service and explains how we collect, safeguard and
                    disclose information that results from your use of our web pages.</p>
                <p>Your agreement with us includes these Terms and our Privacy Policy (“Agreements”). You acknowledge
                    that you have read and understood Agreements, and agree to be bound of them.</p>
                <p>If you do not agree with (or cannot comply with) Agreements, then you may not use the Service, but
                    please let us know by emailing at <b>nvdcproperties@gmail.com</b> so we can try to find a solution.
                    These Terms apply to all visitors, users and others who wish to access or use Service.</p>
                <strong>2. <b>Communications</b></strong>
                <p>By using our Service, you agree to subscribe to newsletters, marketing or promotional materials and
                    other information we may send. However, you may opt out of receiving any, or all, of these
                    communications from us by following the unsubscribe link or by emailing at nvdcproperties@gmail.com.
                </p>

                <strong>3. <b>Contests, Sweepstakes and Promotions</b></strong>
                <p>Any contests, sweepstakes or other promotions (collectively, “Promotions”) made available through
                    Service may be governed by rules that are separate from these Terms of Service. If you participate
                    in any Promotions, please review the applicable rules as well as our Privacy Policy. If the rules
                    for a Promotion conflict with these Terms of Service, Promotion rules will apply.</p>


                <strong>4. <b>Content</b></strong>
                <p>Our Service allows you to post, link, store, share and otherwise make available certain information,
                    text, graphics, videos, or other material (“Content”). You are responsible for Content that you post
                    on or through Service, including its legality, reliability, and appropriateness.</p>
                <p>By posting Content on or through Service, You represent and warrant that: (i) Content is yours (you
                    own it) and/or you have the right to use it and the right to grant us the rights and license as
                    provided in these Terms, and (ii) that the posting of your Content on or through Service does not
                    violate the privacy rights, publicity rights, copyrights, contract rights or any other rights of any
                    person or entity. We reserve the right to terminate the account of anyone found to be infringing on
                    a copyright.</p>
                <p>You retain any and all of your rights to any Content you submit, post or display on or through
                    Service and you are responsible for protecting those rights. We take no responsibility and assume no
                    liability for Content you or any third party posts on or through Service. However, by posting
                    Content using Service you grant us the right and license to use, modify, publicly perform, publicly
                    display, reproduce, and distribute such Content on and through Service. You agree that this license
                    includes the right for us to make your Content available to other users of Service, who may also use
                    your Content subject to these Terms.</p>
                <p>NVDC Properties has the right but not the obligation to monitor and edit all Content provided by
                    users.</p>
                <p>In addition, Content found on or through this Service are the property of NVDC Properties or used
                    with permission. You may not distribute, modify, transmit, reuse, download, repost, copy, or use
                    said Content, whether in whole or in part, for commercial purposes or for personal gain, without
                    express advance written permission from us.</p>
                <strong>5. <b>Prohibited Uses</b></strong>
                <p>You may use Service only for lawful purposes and in accordance with Terms. You agree not to use
                    Service:</p>
                <p>0.1. In any way that violates any applicable national or international law or regulation.</p>
                <p>0.2. For the purpose of exploiting, harming, or attempting to exploit or harm minors in any way by
                    exposing them to inappropriate content or otherwise.</p>
                <p>0.3. To transmit, or procure the sending of, any advertising or promotional material, including any
                    “junk mail”, “chain letter,” “spam,” or any other similar solicitation.</p>
                <p>0.4. To impersonate or attempt to impersonate Company, a Company employee, another user, or any other
                    person or entity.</p>
                <p>0.5. In any way that infringes upon the rights of others, or in any way is illegal, threatening,
                    fraudulent, or harmful, or in connection with any unlawful, illegal, fraudulent, or harmful purpose
                    or activity.</p>
                <p>0.6. To engage in any other conduct that restricts or inhibits anyone’s use or enjoyment of Service,
                    or which, as determined by us, may harm or offend Company or users of Service or expose them to
                    liability.</p>
                <p>Additionally, you agree not to:</p>
                <p>0.1. Use Service in any manner that could disable, overburden, damage, or impair Service or interfere
                    with any other party’s use of Service, including their ability to engage in real time activities
                    through Service.</p>
                <p>0.2. Use any robot, spider, or other automatic device, process, or means to access Service for any
                    purpose, including monitoring or copying any of the material on Service.</p>
                <p>0.3. Use any manual process to monitor or copy any of the material on Service or for any other
                    unauthorized purpose without our prior written consent.</p>
                <p>0.4. Use any device, software, or routine that interferes with the proper working of Service.</p>
                <p>0.5. Introduce any viruses, trojan horses, worms, logic bombs, or other material which is malicious
                    or technologically harmful.</p>
                <p>0.6. Attempt to gain unauthorized access to, interfere with, damage, or disrupt any parts of Service,
                    the server on which Service is stored, or any server, computer, or database connected to Service.
                </p>
                <p>0.7. Attack Service via a denial-of-service attack or a distributed denial-of-service attack.</p>
                <p>0.8. Take any action that may damage or falsify Company rating.</p>
                <p>0.9. Otherwise attempt to interfere with the proper working of Service.</p>
                <strong>6. <b>Analytics</b></strong>
                <p>We may use third-party Service Providers to monitor and analyze the use of our Service.</p>
                <strong>7. <b>No Use By Minors</b></strong>
                <p>Service is intended only for access and use by individuals at least eighteen (18) years old. By
                    accessing or using Service, you warrant and represent that you are at least eighteen (18) years of
                    age and with the full authority, right, and capacity to enter into this agreement and abide by all
                    of the terms and conditions of Terms. If you are not at least eighteen (18) years old, you are
                    prohibited from both the access and usage of Service.</p>
                <strong>8. <b>Accounts</b></strong>
                <p>When you create an account with us, you guarantee that you are above the age of 18, and that the
                    information you provide us is accurate, complete, and current at all times. Inaccurate, incomplete,
                    or obsolete information may result in the immediate termination of your account on Service.</p>
                <p>You are responsible for maintaining the confidentiality of your account and password, including but
                    not limited to the restriction of access to your computer and/or account. You agree to accept
                    responsibility for any and all activities or actions that occur under your account and/or password,
                    whether your password is with our Service or a third-party service. You must notify us immediately
                    upon becoming aware of any breach of security or unauthorized use of your account.</p>
                <p>You may not use as a username the name of another person or entity or that is not lawfully available
                    for use, a name or trademark that is subject to any rights of another person or entity other than
                    you, without appropriate authorization. You may not use as a username any name that is offensive,
                    vulgar or obscene.</p>
                <p>We reserve the right to refuse service, terminate accounts, remove or edit content, or cancel orders
                    in our sole discretion.</p>
                <strong>9. <b>Intellectual Property</b></strong>
                <p>Service and its original content (excluding Content provided by users), features and functionality
                    are and will remain the exclusive property of NVDC Properties and its licensors. Service is
                    protected by copyright, trademark, and other laws of and foreign countries. Our trademarks may not
                    be used in connection with any product or service without the prior written consent of NVDC
                    Properties.</p>
                <strong>10. <b>Copyright Policy</b></strong>
                <p>We respect the intellectual property rights of others. It is our policy to respond to any claim that
                    Content posted on Service infringes on the copyright or other intellectual property rights
                    (“Infringement”) of any person or entity.</p>
                <p>If you are a copyright owner, or authorized on behalf of one, and you believe that the copyrighted
                    work has been copied in a way that constitutes copyright infringement, please submit your claim via
                    email to nvdcproperties@gmail.com, with the subject line: “Copyright Infringement” and include in
                    your claim a detailed description of the alleged Infringement as detailed below, under “DMCA Notice
                    and Procedure for Copyright Infringement Claims”</p>
                <p>You may be held accountable for damages (including costs and attorneys’ fees) for misrepresentation
                    or bad-faith claims on the infringement of any Content found on and/or through Service on your
                    copyright.</p>
                <strong>11. <b>DMCA Notice and Procedure for Copyright Infringement Claims</b></strong>
                <p>You may submit a notification pursuant to the Digital Millennium Copyright Act (DMCA) by providing
                    our Copyright Agent with the following information in writing (see 17 U.S.C 512(c)(3) for further
                    detail):</p>
                <p>0.1. an electronic or physical signature of the person authorized to act on behalf of the owner of
                    the copyright’s interest;</p>
                <p>0.2. a description of the copyrighted work that you claim has been infringed, including the URL
                    (i.e., web page address) of the location where the copyrighted work exists or a copy of the
                    copyrighted work;</p>
                <p>0.3. identification of the URL or other specific location on Service where the material that you
                    claim is infringing is located;</p>
                <p>0.4. your address, telephone number, and email address;</p>
                <p>0.5. a statement by you that you have a good faith belief that the disputed use is not authorized by
                    the copyright owner, its agent, or the law;</p>
                <p>0.6. a statement by you, made under penalty of perjury, that the above information in your notice is
                    accurate and that you are the copyright owner or authorized to act on the copyright owner’s behalf.
                </p>
                <p>You can contact our Copyright Agent via email at nvdcproperties@gmail.com.</p>
                <strong>12. <b>Error Reporting and Feedback</b></strong>
                <p>You may provide us either directly at nvdcproperties@gmail.com or via third party sites and tools
                    with information and feedback concerning errors, suggestions for improvements, ideas, problems,
                    complaints, and other matters related to our Service (“Feedback”). You acknowledge and agree that:
                    (i) you shall not retain, acquire or assert any intellectual property right or other right, title or
                    interest in or to the Feedback; (ii) Company may have development ideas similar to the Feedback;
                    (iii) Feedback does not contain confidential information or proprietary information from you or any
                    third party; and (iv) Company is not under any obligation of confidentiality with respect to the
                    Feedback. In the event the transfer of the ownership to the Feedback is not possible due to
                    applicable mandatory laws, you grant Company and its affiliates an exclusive, transferable,
                    irrevocable, free-of-charge, sub-licensable, unlimited and perpetual right to use (including copy,
                    modify, create derivative works, publish, distribute and commercialize) Feedback in any manner and
                    for any purpose.</p>
                <strong>13. <b>Links To Other Web Sites</b></strong>
                <p>Our Service may contain links to third party web sites or services that are not owned or controlled
                    by NVDC Properties.</p>
                <p>NVDC Properties has no control over, and assumes no responsibility for the content, privacy policies,
                    or practices of any third party web sites or services. We do not warrant the offerings of any of
                    these entities/individuals or their websites.</p>
                <p>For example, the outlined <a href="https://policymaker.io/terms-and-conditions/">Terms of Use</a>
                    have been created using <a href="https://policymaker.io/">PolicyMaker.io</a>, a free web application
                    for generating high-quality legal documents. PolicyMaker’s <a
                        href="https://policymaker.io/terms-and-conditions/">Terms and Conditions generator</a> is an
                    easy-to-use free tool for creating an excellent standard Terms of Service template for a website,
                    blog, e-commerce store or app.</p>
                <p>YOU ACKNOWLEDGE AND AGREE THAT COMPANY SHALL NOT BE RESPONSIBLE OR LIABLE, DIRECTLY OR INDIRECTLY,
                    FOR ANY DAMAGE OR LOSS CAUSED OR ALLEGED TO BE CAUSED BY OR IN CONNECTION WITH USE OF OR RELIANCE ON
                    ANY SUCH CONTENT, GOODS OR SERVICES AVAILABLE ON OR THROUGH ANY SUCH THIRD PARTY WEB SITES OR
                    SERVICES.</p>
                <p>WE STRONGLY ADVISE YOU TO READ THE TERMS OF SERVICE AND PRIVACY POLICIES OF ANY THIRD PARTY WEB SITES
                    OR SERVICES THAT YOU VISIT.</p>
                <strong>14. <b>Disclaimer Of Warranty</b></strong>
                <p>THESE SERVICES ARE PROVIDED BY COMPANY ON AN “AS IS” AND “AS AVAILABLE” BASIS. COMPANY MAKES NO
                    REPRESENTATIONS OR WARRANTIES OF ANY KIND, EXPRESS OR IMPLIED, AS TO THE OPERATION OF THEIR
                    SERVICES, OR THE INFORMATION, CONTENT OR MATERIALS INCLUDED THEREIN. YOU EXPRESSLY AGREE THAT YOUR
                    USE OF THESE SERVICES, THEIR CONTENT, AND ANY SERVICES OR ITEMS OBTAINED FROM US IS AT YOUR SOLE
                    RISK.</p>
                <p>NEITHER COMPANY NOR ANY PERSON ASSOCIATED WITH COMPANY MAKES ANY WARRANTY OR REPRESENTATION WITH
                    RESPECT TO THE COMPLETENESS, SECURITY, RELIABILITY, QUALITY, ACCURACY, OR AVAILABILITY OF THE
                    SERVICES. WITHOUT LIMITING THE FOREGOING, NEITHER COMPANY NOR ANYONE ASSOCIATED WITH COMPANY
                    REPRESENTS OR WARRANTS THAT THE SERVICES, THEIR CONTENT, OR ANY SERVICES OR ITEMS OBTAINED THROUGH
                    THE SERVICES WILL BE ACCURATE, RELIABLE, ERROR-FREE, OR UNINTERRUPTED, THAT DEFECTS WILL BE
                    CORRECTED, THAT THE SERVICES OR THE SERVER THAT MAKES IT AVAILABLE ARE FREE OF VIRUSES OR OTHER
                    HARMFUL COMPONENTS OR THAT THE SERVICES OR ANY SERVICES OR ITEMS OBTAINED THROUGH THE SERVICES WILL
                    OTHERWISE MEET YOUR NEEDS OR EXPECTATIONS.</p>
                <p>COMPANY HEREBY DISCLAIMS ALL WARRANTIES OF ANY KIND, WHETHER EXPRESS OR IMPLIED, STATUTORY, OR
                    OTHERWISE, INCLUDING BUT NOT LIMITED TO ANY WARRANTIES OF MERCHANTABILITY, NON-INFRINGEMENT, AND
                    FITNESS FOR PARTICULAR PURPOSE.</p>
                <p>THE FOREGOING DOES NOT AFFECT ANY WARRANTIES WHICH CANNOT BE EXCLUDED OR LIMITED UNDER APPLICABLE
                    LAW.</p>
                <strong>15. <b>Limitation Of Liability</b></strong>
                <p>EXCEPT AS PROHIBITED BY LAW, YOU WILL HOLD US AND OUR OFFICERS, DIRECTORS, EMPLOYEES, AND AGENTS
                    HARMLESS FOR ANY INDIRECT, PUNITIVE, SPECIAL, INCIDENTAL, OR CONSEQUENTIAL DAMAGE, HOWEVER IT ARISES
                    (INCLUDING ATTORNEYS’ FEES AND ALL RELATED COSTS AND EXPENSES OF LITIGATION AND ARBITRATION, OR AT
                    TRIAL OR ON APPEAL, IF ANY, WHETHER OR NOT LITIGATION OR ARBITRATION IS INSTITUTED), WHETHER IN AN
                    ACTION OF CONTRACT, NEGLIGENCE, OR OTHER TORTIOUS ACTION, OR ARISING OUT OF OR IN CONNECTION WITH
                    THIS AGREEMENT, INCLUDING WITHOUT LIMITATION ANY CLAIM FOR PERSONAL INJURY OR PROPERTY DAMAGE,
                    ARISING FROM THIS AGREEMENT AND ANY VIOLATION BY YOU OF ANY FEDERAL, STATE, OR LOCAL LAWS, STATUTES,
                    RULES, OR REGULATIONS, EVEN IF COMPANY HAS BEEN PREVIOUSLY ADVISED OF THE POSSIBILITY OF SUCH
                    DAMAGE. EXCEPT AS PROHIBITED BY LAW, IF THERE IS LIABILITY FOUND ON THE PART OF COMPANY, IT WILL BE
                    LIMITED TO THE AMOUNT PAID FOR THE PRODUCTS AND/OR SERVICES, AND UNDER NO CIRCUMSTANCES WILL THERE
                    BE CONSEQUENTIAL OR PUNITIVE DAMAGES. SOME STATES DO NOT ALLOW THE EXCLUSION OR LIMITATION OF
                    PUNITIVE, INCIDENTAL OR CONSEQUENTIAL DAMAGES, SO THE PRIOR LIMITATION OR EXCLUSION MAY NOT APPLY TO
                    YOU.</p>
                <strong>16. <b>Termination</b></strong>
                <p>We may terminate or suspend your account and bar access to Service immediately, without prior notice
                    or liability, under our sole discretion, for any reason whatsoever and without limitation, including
                    but not limited to a breach of Terms.</p>
                <p>If you wish to terminate your account, you may simply discontinue using Service.</p>
                <p>All provisions of Terms which by their nature should survive termination shall survive termination,
                    including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations
                    of liability.</p>
                <strong>17. <b>Governing Law</b></strong>
                <p>These Terms shall be governed and construed in accordance with the laws of Philippines, which
                    governing law applies to agreement without regard to its conflict of law provisions.</p>
                <p>Our failure to enforce any right or provision of these Terms will not be considered a waiver of those
                    rights. If any provision of these Terms is held to be invalid or unenforceable by a court, the
                    remaining provisions of these Terms will remain in effect. These Terms constitute the entire
                    agreement between us regarding our Service and supersede and replace any prior agreements we might
                    have had between us regarding Service.</p>
                <strong>18. <b>Changes To Service</b></strong>
                <p>We reserve the right to withdraw or amend our Service, and any service or material we provide via
                    Service, in our sole discretion without notice. We will not be liable if for any reason all or any
                    part of Service is unavailable at any time or for any period. From time to time, we may restrict
                    access to some parts of Service, or the entire Service, to users, including registered users.</p>
                <strong>19. <b>Amendments To Terms</b></strong>
                <p>We may amend Terms at any time by posting the amended terms on this site. It is your responsibility
                    to review these Terms periodically.</p>
                <p>Your continued use of the Platform following the posting of revised Terms means that you accept and
                    agree to the changes. You are expected to check this page frequently so you are aware of any
                    changes, as they are binding on you.</p>
                <p>By continuing to access or use our Service after any revisions become effective, you agree to be
                    bound by the revised terms. If you do not agree to the new terms, you are no longer authorized to
                    use Service.</p>
                <strong>20. <b>Waiver And Severability</b></strong>
                <p>No waiver by Company of any term or condition set forth in Terms shall be deemed a further or
                    continuing waiver of such term or condition or a waiver of any other term or condition, and any
                    failure of Company to assert a right or provision under Terms shall not constitute a waiver of such
                    right or provision.</p>
                <p>If any provision of Terms is held by a court or other tribunal of competent jurisdiction to be
                    invalid, illegal or unenforceable for any reason, such provision shall be eliminated or limited to
                    the minimum extent such that the remaining provisions of Terms will continue in full force and
                    effect.</p>
                <strong>21. <b>Acknowledgement</b></strong>
                <p>BY USING SERVICE OR OTHER SERVICES PROVIDED BY US, YOU ACKNOWLEDGE THAT YOU HAVE READ THESE TERMS OF
                    SERVICE AND AGREE TO BE BOUND BY THEM.</p>
                <strong>22. <b>Contact Us</b></strong>
                <p>Please send your feedback, comments, requests for technical support by email:
                    <b>nvdcproperties@gmail.com</b>.</p>
                <p style="margin-top: 5em; font-size: 0.7em;">These <a
                        href="https://policymaker.io/terms-and-conditions/">Terms of Service</a> were created for
                    <b>nvdcproperties.com</b> by <a href="https://policymaker.io">PolicyMaker.io</a> on 2022-12-08.</p>

                </p> --}}
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <input type="submit"
                                class="mx-auto d-flex justify-content-center btn btn-outline-success prevent_submit mt-2"
                                value="Submit" style="width:40%;" data-toggle="modal" data-target="#submit" />
                        </div>
                    </div>
                    <div>

                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
                        <div>
                        </div>
                    </div>

                    {{-- modal submit --}}
                    {{-- <div class="modal fade" id="submit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="exampleModalLabel">Reservation Information</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md text-sm font-weight-bold">
                                                        Booking Id: 
                                                    </div> 
                                                    <div class="col-md-6 text-sm">
                                                        Sample Id 
                                                    </div>
                                                    <div class="col-md-6 text-sm font-weight-bold mt-2">
                                                        Name: 
                                                    </div>
                                                    <div class="col-md-6 text-sm mt-2">   
                                                        Sample Name                                     
                                                    </div>
                                                    <div class="col-md-6 text-sm font-weight-bold mt-2">   
                                                        Room Type:                                     
                                                    </div>
                                                    <div class="col-md-6 text-sm mt-2">   
                                                        1                                     
                                                    </div>
                                                    <div class="col-md-6 text-sm font-weight-bold mt-2">   
                                                        Email:                                     
                                                    </div>
                                                    <div class="col-md-6 text-sm mt-2">   
                                                        Email@gmail.com                                     
                                                    </div>
                                                    <div class="col-md-6 text-sm font-weight-bold mt-2">   
                                                        Mobile no:                                     
                                                    </div>
                                                    <div class="col-md-6 text-sm mt-2">   
                                                        09876543212                                     
                                                    </div>
                                                    <div class="col-md-6 text-sm font-weight-bold mt-2">   
                                                        Check in date/time:                                     
                                                    </div>
                                                    <div class="col-md-6 text-sm mt-2">   
                                                        02/10/2023                                     
                                                    </div>
                                                    <div class="col-md-6 text-sm font-weight-bold mt-2">   
                                                        Check out date/time:                                     
                                                    </div>
                                                    <div class="col-md-6 text-sm mt-2">   
                                                        02/11/2023                                   
                                                    </div>
                                                    <div class="col-md-6 text-sm font-weight-bold mt-2">   
                                                        Book applied by:                                     
                                                    </div>
                                                    <div class="col-md-6 text-sm mt-2">   
                                                        Sample Name:                                     
                                                    </div>
                                                    <div class="col-md-6 text-sm font-weight-bold mt-2">   
                                                        Total Amount:                                     
                                                    </div>
                                                    <div class="col-md-6 text-sm mt-2">   
                                                        2,500                                     
                                                    </div>
                                                    <div class="col-md-6 text-sm font-weight-bold mt-2">   
                                                        Payment:                                     
                                                    </div>
                                                    <div class="col-md-6 text-sm mt-2">   
                                                        2,500                                     
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div> --}}
                    <div class="row mt-4">
                        <div class="col">



                            <!-- <p class = " d-flex justify-content-center">scan here to pay</p>
                                                                                        <div class = "qrsample mx-auto d-flex justify-content-center">
                                                                                            <img src="{{ asset('nvdcpics') }}/nvdcqr.png" class = "" alt="">
                                                                                        </div>
                                                                                        <h3 class = "text-uppercase mt-4 d-flex justify-content-center">novadeci properties</h3>
                                                                                        <p class = "d-flex justify-content-center">xxxxxxxx098</p>
                                                                                        <div class="mb-3 d-flex justify-content-center">
                                                                                            <label for="formFile" class="form-label"></label>
                                                                                            <input class="form-control w-50" type="file" id="formFile">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <p class = "text-justify">Any cancellation done more than (3) calendar days before check in date will be
                                                                                    free of charge. If within (3) calendar days, guests will be charged of the total
                                                                                    price. Refund, In case of guaranteed reservation, is payable through check issuance
                                                                                    <a href="#" class = "text-success" data-toggle="modal" data-target="#PolicyModal">Company Policy</a>
                                                                                </p> -->

                        </div>
                </form>
            </div>
            <div class="modal fade" id="PolicyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content mx-auto d-flex justify-content-center">
                        <div class="modal-header">
                            <h2>Company Policy</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                    </div>
                </div>
            </div>


            <!-- section1 -->
            <!-- section2 suite -->
            <p class="d-flex justify-content-center text-uppercase title pt-6">Suites</p>
            <div class="image-grid">
                <img class="image-grid-col-2 image-grid-row-2" src="{{ asset('nvdcpics') }}/hotel1.JPG"
                    data-toggle="lightbox" data-gallery="example-gallery">
                <img class="" src="{{ asset('nvdcpics') }}/hotel2.jpg">
                <img class="" src="{{ asset('nvdcpics') }}/hotel3.jpg">
                <img class="" src="{{ asset('nvdcpics') }}/hotel4.jpg">
                <img class="" src="{{ asset('nvdcpics') }}/hotel5.jpg">
                <img class="" src="{{ asset('nvdcpics') }}/hotel6.jpg">
                <img class="seventh" data-toggle="modal" data-target="#exampleModalCenter"
                    src="{{ asset('nvdcpics') }}/hotel7.JPG">
            </div>
            <!-- <div class="user-select-none centered" data-toggle="modal" data-target="#exampleModalCenter">+7 Photos</div> -->
            <!-- section 3 -->
            <!-- <p class="text-center text-uppercase lg mt-4 title animated fadeIn title">About our Suites</p> -->

            <div class="row pt-8">
                <div class="col">
                    <h3 class="txt">Description</h3>
                    <p>Our Superior Double Room offers comfort and style. The room features a comfortable double bed, a
                        flat-screen TV, a seating area, and a private bathroom with a rain shower. Guests can also enjoy
                        the hotel's garden views from the room's private balcony.</p>
                    <p>The Executive Suite is ideal for business travelers. The suite features a king-sized bed, a
                        separate living area with a comfortable sofa and armchair, a work desk, and a private balcony
                        with city views. Guests also have access to the Executive Lounge, where they can enjoy
                        complimentary breakfast and evening drinks.</p>
                </div>
                <div class="col">
                    <div class="card" style="width: 100%;  background-color: #D7D7D7;">
                        <img class="card-img-top">
                        <div class="card-body">
                            <p
                                class="card-title d-flex justify-content-center uppercase text-uppercase font-weight-bold title">
                                Room
                                Highlights</p>
                            <p class="card-text">Highly rated by recent guests</p>
                            <p class="card-text">Clean, comfortable and quiet</p>
                            <a href="#section1" class="btn btn-success d-flex justify-content-center">Reserve Now</a>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <h1 class="pt-4 txt">House Rules</h1>
                <div class="row">
                    <div class="col">
                        <h2 class="pt-4 txt"><i class="bi bi-slash-circle mr-2" style="color:red;"></i>No Smoking</h2>
                    </div>
                    <div class="col">
                        <p class="pt-4 txt">Smoking is not allowed in any of the guest rooms or common areas of the hotel.
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col txt">
                        <h2><i class="bi bi-alarm mr-2" style="color:#411CAD;"></i>Quiet hours:</h2>
                    </div>
                    <div class="col">
                        <p>Guests are asked to keep noise to a minimum between the hours of 10pm and 8am to
                            respect the comfort of other guests.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col txt">
                        <h2><i class="bi bi-p-circle mr-2" style="color:#1558A1;"></i>Parking:</h2>
                    </div>
                    <div class="col">
                        <p>Parking is available for guests, but may be subject to additional charges.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col txt">
                        <h2><i class="bi bi-exclamation-lg mr-2" style="color:red;"></i>Damages:</h2>
                    </div>
                    <div class="col txt">
                        <p>Guests will be held responsible for any damages caused to the room or hotel property.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col txt">
                        <h2><i class="bi bi-key-fill mr-2" style="color:#F9CF00"></i>Room keys:</h2>
                    </div>
                    <div class="col">
                        <p>Guests are responsible for ensuring the security of their room key and will be charged for a
                            replacement if it is not returned upon check-out.</p>
                    </div>
                </div>
                <!-- section 3 -->

            </div>
        </div>
    </div>
    <!-- Information -->
    <div class="container">
        <div class="wrapper">
            <!-- <h1>Information</h1> -->
        </div>
    </div>

    <!-- Modal at 7th pic-->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalLongTitle">Suite</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- contents -->
                    <div class="row">
                        <div class="col-4">
                            <img class="img-thumbnail" src="{{ asset('nvdcpics') }}/hotel1.JPG">
                        </div>
                        <div class="col-4">
                            <img class="img-thumbnail" src="{{ asset('nvdcpics') }}/hotel2.jpg">
                        </div>
                        <div class="col-4">
                            <img class="img-thumbnail" src="{{ asset('nvdcpics') }}/hotel3.jpg">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-4">
                            <img class="img-thumbnail" src="{{ asset('nvdcpics') }}/hotel4.jpg">
                        </div>
                        <div class="col-4">
                            <img class="img-thumbnail" src="{{ asset('nvdcpics') }}/hotel5.jpg">
                        </div>
                        <div class="col-4">
                            <img class="img-thumbnail" src="{{ asset('nvdcpics') }}/hotel6.jpg">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-4">
                            <img class="img-thumbnail" src="{{ asset('nvdcpics') }}/hotel7.JPG">
                        </div>
                        <div class="col-4">
                            <img class="img-thumbnail" src="{{ asset('nvdcpics') }}/hotel8.JPG">
                        </div>
                        <div class="col-4">
                            <img class="img-thumbnail" src="{{ asset('nvdcpics') }}/hotel9.JPG">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-4">
                            <img class="img-thumbnail" src="{{ asset('nvdcpics') }}/hotel10.JPG">
                        </div>
                        <div class="col-4">
                            <img class="img-thumbnail" src="{{ asset('nvdcpics') }}/hotel11.JPG">
                        </div>
                        <div class="col-4">
                            <img class="img-thumbnail" src="{{ asset('nvdcpics') }}/hotel12.JPG">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-4">
                            <img class="img-thumbnail" src="{{ asset('nvdcpics') }}/hotel13.JPG">
                        </div>
                        <div class="col-4">
                            <img class="img-thumbnail" src="{{ asset('nvdcpics') }}/hotel14.JPG">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>

    <!-- scroll-top button -->
    <!-- <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="bi bi-chevron-double-up"></i></button> -->
    <style>
        body {
            margin: 0;
        }

        input[type="text"] {
            margin-top: 10px;
        }

        /* divider */
        .parent-container {
            display: flex;
            flex-direction: row;
            /* 100% of the viewport width */
        }

        .child-container {
            flex: 1;
            /* to make each child container take equal space */

        }

        .image-grid {
            --gap: 14px;
            --num-cols: 4;
            --row-height: 200px;

            box-sizing: border-box;
            padding: var(--gap);

            display: grid;
            grid-template-columns: repeat(var(--num-cols), 1fr);
            grid-auto-rows: var(--row-height);
            gap: var(--gap);
        }

        .image-grid>img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .image-grid-col-2 {
            grid-column: span 3;
        }

        .image-grid-row-2 {
            grid-row: span 2;
        }

        /* Anything udner 1024px */
        @media screen and (max-width: 600px) {
            .image-grid {
                --num-cols: 1;
                --row-height: 200px;
            }

            .centered {
                position: absolute;
                font-size: 10px;
            }
        }

        .centered {
            position: absolute;
            font-weight: bold;
            font-size: 30px;
            text-decoration: underline;
            color: white;
            top: 30%;
            left: 86%;
            transform: translate(-50%, -50%);
            cursor: pointer;
        }

        .seventh {
            filter: brightness(0.25);

        }

        /* Information */
        .container {}

        p {
            font-family: montserrat;
            text-align: justify;
            font-size: 18px;
        }

        .txt {
            font-family: montserrat;

        }

        .title {
            letter-spacing: 1px;
            font-size: 30px;
        }

        .scrl {
            scroll-behavior: smooth;
        }

        .animate__animated {
            animation-duration: 1s;
            animation-fill-mode: both;
        }

        .parent {
            display: flex;
            justify-content: center;
        }

        html {
            scroll-behavior: smooth;
        }

        hr {
            border: 2px solid #30bc6c;
            display: flex;
        }

        .qrsample {
            height: 100px;
            width: 100px;
        }

        /* scroll to top arrow */
        /* #myBtn {
                                                    display: none;
                                                    position: fixed;
                                                    bottom: 20px;
                                                    right: 30px;
                                                    z-index: 99;
                                                    font-size: 18px;
                                                    border: none;
                                                    outline: none;
                                                    background-color: #484848;
                                                    color: white;
                                                    cursor: pointer;
                                                    padding: 15px;
                                                    border-radius: 4px;
                                                    opacity: 0.5;
                                                    }

                                                    #myBtn:hover {
                                                    background-color: #555;
                                                    } */
        /* .centered {
                                                font-size:30px;
                                                position: absolute;
                                                bottom: 410px;
                                                right: 200px;
                                                color:white;
                                                -webkit-text-stroke-width: 1px;
                                                -webkit-text-stroke-color: black;
                                            } */
        input[type="text"].disabled {
            pointer-events: none;
            opacity: 0.5;
        }

        input[type="checkbox"]:checked~input[type="text"].disabled {
            pointer-events: auto;
            opacity: 1;
        }
    </style>
    <script>
        $(document).ready(function() { //DISABLED PAST DATES IN APPOINTMENT DATE
            var dateToday = new Date();
            var month = dateToday.getMonth() + 1;
            var day = dateToday.getDate();
            var year = dateToday.getFullYear();

            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;

            $('.chck').attr('min', maxDate);
        });
        $('.prevent_submit').on('submit', function() {
            $('.prevent_submit').attr('disabled', 'true');
        });

        function price_count() {
            var pax_num = document.getElementById("pax_num");
            var room_price = document.getElementById("room_price");
            if (pax_num.value == 1) {
                room_price.value = "P2,500.00";
            } else if (pax_num.value == 2) {
                room_price.value = "P4,000.00";
            } else if (pax_num.value == 3) {
                room_price.value = "P5,500.00";
            } else if (pax_num.value == 4) {
                room_price.value = "P6,500.00";
            }
        }

        // code for scroll-top button
        // let mybutton = document.getElementById("myBtn");
        // window.onscroll = function() {scrollFunction()};

        // function scrollFunction() {
        // if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        //     mybutton.style.display = "block";
        // } else {
        //     mybutton.style.display = "none";
        // }
        // }
        // function topFunction() {
        // document.body.scrollTop = 0;
        // document.documentElement.scrollTop = 0;
        // }

        //         document.getElementById("checkbox").addEventListener("change", function() {
        //     var textboxes = document.getElementsByClassName("textbox");
        //     for (var i = 0; i < textboxes.length; i++) {
        //         textboxes[i].disabled = !this.checked;
        //     }
        // });

        document.getElementById("mainCheckbox").addEventListener("change", function() {
            // document.getElementById("checkbox1").disabled = !this.checked;
            // document.getElementById("checkbox2").disabled = !this.checked;
            // document.getElementById("checkbox3").disabled = !this.checked;
            // document.getElementById("checkbox4").disabled = !this.checked;
            document.getElementById("textbox1").disabled = !this.checked;

        });

        function changeValue() {
            var textboxNumbers = document.getElementById("textboxes").value;
            balls.innerHTML = '';
            var i;

            for (i = 0; i < textboxNumbers; i++) {
                var yourTextboxes = document.createElement("INPUT");
                yourTextboxes.setAttribute("type", "text");
                yourTextboxes.classList.add("form-control");
                yourTextboxes.setAttribute("placeholder", "Enter Name Here");
                document.getElementById("balls").appendChild(yourTextboxes);
            }
        }

        function pax_on_change() {
            changeValue();
            price_count();
        }

        function incrementValue(id) {
            var input = document.getElementById(id);
            var value = parseInt(input.value, 10);
            value = isNaN(value) ? 0 : value;
            value++;
            input.value = value;
        }

        function decrementValue(id) {
            var input = document.getElementById(id);
            var value = parseInt(input.value, 10);
            value = isNaN(value) ? 0 : value;
            value--;
            input.value = value;
        }
        // Add event listeners for input 1
        document.querySelector('#input1 .inc').addEventListener('click', function() {
            incrementValue('input1');
        });
        document.querySelector('#input1 .dec').addEventListener('click', function() {
            decrementValue('input1');
        });

        // Add event listeners for input 2
        document.querySelector('#input2 .inc').addEventListener('click', function() {
            incrementValue('input2');
        });
        document.querySelector('#input2 .dec').addEventListener('click', function() {
            decrementValue('input2');
        });
        const textbox = document.getElementById('mytextbox');
        let value = parseInt(textbox.value);

        textbox.addEventListener('keydown', function(event) {
            if (event.keyCode == 38) { // up arrow
                value++;
                textbox.value = value;
            } else if (event.keyCode == 40) { // down arrow
                value--;
                textbox.value = value;
            }
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <!-- <img class="card-img-top mt-2 ml-5 largepic" src="{{ asset('nvdcpics') }}/hotel1.jpg"> -->
    @include('layouts.footers.guest')
    <!-- <div class="container mt--5 pb-5"></div> -->
    <!-- {{ asset('nvdcpics') }}/hotel1.jpg -->
@endsection
