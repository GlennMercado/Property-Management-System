<div class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h6>About NVDC Properties</h6>
                <p class="text-justify font-weight-bold">"NVDC Properties is a property management company engaged in operating and
                    managing the NOVADECI Sports and Convention Center events place, hotel and commercial spaces for
                    lease. Our services are open to the public - both members and non-members of NOVADECI"</p>
            </div>

            <div class="col-xs-12 col-md-6">
                <h6>Office hour</h6>
                <ul class="footer-links">
                    <li><p class="font-weight-bold">Monday-Sunday:8:00am-5:00pm</p></li>
                </ul>
            </div>
        </div>
        <hr>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-6 col-xs-12">
                <div class="copyright text-muted">
                    &copy; {{ now()->year }} <a href="https://www.facebook.com/NVDCProperties"
                        class="font-weight-bold ml-1" target="_blank"> NOVADECI Properties</a> &amp;
                    <a href="#" class="font-weight-bold ml-1">InTeractive Solutions</a>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12">
                <ul class="social-icons">
                    <li>
                        <p class="font-weight-bold">Follow us</p>
                    </li>
                    <li>
                        <a class="facebook" href="https://www.facebook.com/NVDCProperties">
                            <i class="bi bi-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a class="insta" href="https://www.instagram.com/nvdcproperties/">
                            <i class="bi bi-instagram"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<style>
    .site-footer {
        background-color: #26272b;
        padding: 45px 0 20px;
        font-size: 15px;
        line-height: 24px;
        color: #737373;
    }

    .site-footer hr {
        border-top-color: #bbb;
        opacity: 0.5
    }

    .site-footer hr.small {
        margin: 20px 0
    }

    .site-footer h6 {
        color: #fff;
        font-size: 16px;
        text-transform: uppercase;
        margin-top: 5px;
        letter-spacing: 2px
    }

    .site-footer a {
        color: #737373;
    }

    .site-footer a:hover {
        color: #3366cc;
        text-decoration: none;
    }

    .footer-links {
        padding-left: 0;
        list-style: none
    }

    .footer-links li {
        display: block
    }

    .footer-links a {
        color: #737373
    }

    .footer-links a:active,
    .footer-links a:focus,
    .footer-links a:hover {
        color: #3366cc;
        text-decoration: none;
    }

    .footer-links.inline li {
        display: inline-block
    }

    .site-footer .social-icons {
        text-align: right
    }

    .site-footer .social-icons a {
        width: 40px;
        height: 40px;
        line-height: 40px;
        margin-left: 6px;
        margin-right: 0;
        border-radius: 100%;
        background-color: #33353d
    }

    .copyright-text {
        margin: 0
    }

    @media (max-width:991px) {
        .site-footer [class^=col-] {
            margin-bottom: 30px
        }
    }

    @media (max-width:767px) {
        .site-footer {
            padding-bottom: 0
        }

        .site-footer .copyright-text,
        .site-footer .social-icons {
            text-align: center
        }
    }

    .social-icons {
        padding-left: 0;
        margin-bottom: 0;
        list-style: none
    }

    .social-icons li {
        display: inline-block;
        margin-bottom: 4px
    }

    .social-icons li.title {
        margin-right: 15px;
        text-transform: uppercase;
        color: #96a2b2;
        font-weight: 700;
        font-size: 13px
    }

    .social-icons a {
        background-color: #eceeef;
        color: #818a91;
        font-size: 16px;
        display: inline-block;
        line-height: 44px;
        width: 44px;
        height: 44px;
        text-align: center;
        margin-right: 8px;
        border-radius: 100%;
        -webkit-transition: all .2s linear;
        -o-transition: all .2s linear;
        transition: all .2s linear
    }

    .social-icons a:active,
    .social-icons a:focus,
    .social-icons a:hover {
        color: #fff;
        background-color: #29aafe
    }

    .social-icons.size-sm a {
        line-height: 34px;
        height: 34px;
        width: 34px;
        font-size: 14px
    }

    .social-icons a.facebook:hover {
        background-color: #3b5998;
    }

    .social-icons a.insta:hover {
        background: rgb(37, 18, 246);
        background: linear-gradient(90deg, rgba(37, 18, 246, 1) 0%, rgba(121, 9, 9, 1) 42%, rgba(241, 255, 0, 1) 100%);
    }

    @media (max-width:767px) {
        .social-icons li.title {
            display: block;
            margin-right: 0;
            font-weight: 600
        }
    }
</style>
