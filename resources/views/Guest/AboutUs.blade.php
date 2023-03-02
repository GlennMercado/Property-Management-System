@extends('layouts.guest', ['class' => 'bg-light'])

@section('content')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <div class="container-fluid bg-white">
        <div class="text-center mt-6">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 mt-9 text-center">
                    <br>
                    <img src="{{ asset('nvdcpics') }}/nvdcpic4.png" style="max-width: 75vh; max-height: 50vh; ">
                    <br>
                    <br>
                    <h2>
                        The Novadeci Convention Center
                    </h2>
                    <p class="text-center">
                        "The NOVADECI Convention Center is the first coop-owned convention center in the Philippines. It is
                        being managed by NVDC Properties."
                    </p>
                </div>
                <div class="col-md-6 text-center">
                    <h1 class="display-1 mt-6">Brief History</h1>
                    <br>
                    <p>In the latter part of the 70’s a slaughterhouse in Novaliches was ordered closed by the local
                        government
                        due
                        to sanitation and health considerations. This prompted the vendors in Susano Market to hold a
                        meeting to
                        address this concern. Their agenda was mainly to provide solution to the meat vendor’s problem of
                        lack
                        of
                        meat supply and the lack of capital to continue their businesses and to address the sanitation and
                        health.
                        Thus, in a subsequent meeting the idea of forming a cooperative was brought up.
                        <br>
                        <br>
                        There were 15 founders who infused a total initial capitalization of P7,000.00 to the cooperative.
                        Soon,
                        more people were convinced to join as members, with the idea of pooling each other’s resources to
                        address
                        each other’s needs. There were 70 original members when Novaliches Vendors Credit Cooperative
                        Incorporated
                        was renamed Novaliches Development Cooperative or NOVADECI. The newly formed cooperative underwent
                        numerous
                        trials and problems. Initially, the group could not afford to lease a space to hold office for their
                        business transactions and for holding their meetings, because of this, the founders utilized their
                        residences as the venues of their assemblies.
                        <br>
                        <br>
                        The creation of the NOVADECI came to the knowledge of the market owner so that, the fear of the
                        market
                        owner
                        on the coop’s taking over the management of their market resulted to the eviction of the members of
                        the
                        Cooperative from their Market stalls. However, the members took everything in stride and considered
                        these
                        problems as challenges in molding them into a stronger and better organization and to work harder.
                        <br>
                        <br>
                        In 1984, the co-op opened its membership even to non-market vendors. Gradually, the co-op’s
                        membership
                        grew
                        in size and expanded its operations. In 1989, the co-op which was once had no place of its own
                        acquired
                        a
                        lot and built a four storey building located in Novaliches Proper. Nine Years later an additional
                        six-storey
                        building was built besides the first building. NOVADECI adopted the VISION Statement “NOVADECI is
                        the
                        best
                        financial institution responsive to members’ need” and MISSION statement “Novadeci is a community
                        based
                        cooperative that improves the quality of life of its members through excellent financial and allied
                        services”
                        <br>
                        <br>
                        It was geared towards providing diversified services to the members. To date, the co-op’s products
                        and
                        services include health and medical services, mutual benefit services, savings products, loan
                        products,
                        medical services pharmacy and educational services.
                        <br>
                        <br>
                        Aside from these services, NOVADECI has launched and implemented some big projects and programs.
                        Among
                        these
                        are the housing project, micro-finance project, and livelihood program. NOVADECI also involves
                        itself in
                        community services such as tree planting, medical and dental mission, mass feeding and fund raising
                        campaigns in support of its socio-civic programs.
                        <br>
                        <div id="section3">
                            asd
                        </div>
                        <br>
                        <br>
                        <br>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footers.guest')
    <div class="container mt--5 pb-5"></div>
    <style>
        p {
            font-family: sans-serif;
            text-align: justify;
        }

        h1 {

            letter-spacing: 2px;
        }
    </style>
@endsection
