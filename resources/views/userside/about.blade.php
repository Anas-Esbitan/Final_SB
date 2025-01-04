@extends('userside.userside_source.userside_template')
@section('content')
    <section class="bg-img1 txt-center p-lr-15 p-tb-92"
        style="background-image: url('{{ asset('assits') }}/images/aboutupdated (1).jpg');">
        <h2 class="ltext-105 cl0 txt-center" style="color:black ">

        </h2>
    </section>

    <!-- Content page -->
    <section class="bg0 p-t-75 p-b-120">
        <div class="container">
            <div class="row p-b-148">
                <div class="col-md-7 col-lg-8">
                    <div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
                        <h3 class="mtext-111 cl2 p-b-16">
                            Our Story
                        </h3>

                        <p class="stext-113 cl6 p-b-26">
                            At the heart of our journey lies a passion for creativity, innovation, and connection. From
                            humble beginnings, we set out to create solutions that inspire and empower people. Every step
                            we've taken reflects our dedication to providing value, whether through our products, services,
                            or the experiences we craft for our customers.
                        </p>

                        <p class="stext-113 cl6 p-b-26">
                            Over the years, we've grown alongside our community, embracing new challenges and opportunities
                            to evolve. Our story is a testament to perseverance, teamwork, and the belief that great things
                            happen when people come together with a shared vision.
                        </p>

                        <p class="stext-113 cl6 p-b-26">
                            If you have any questions or want to know more, feel free to visit us at 8th floor, 379 Hudson
                            St, jordan, NY 10018, or give us a call at (962) 778925445.
                        </p>
                    </div>
                </div>

                <div class="col-11 col-md-5 col-lg-4 m-lr-auto">
                    <div class="how-bor1 ">
                        <div class="hov-img0">
                            <img src="{{ asset('assits') }}/images/pexels-karolina-grabowska-5632402.jpg" alt="IMG">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="order-md-2 col-md-7 col-lg-8 p-b-30">
                    <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
                        <h3 class="mtext-111 cl2 p-b-16">
                            Our Mission
                        </h3>

                        <p class="stext-113 cl6 p-b-26">
                            In a world driven by rapid change and innovation, we believe that creativity and
                            forward-thinking are the keys to success and sustainability. Our vision revolves around
                            delivering unique solutions that meet our clients' needs and contribute to building a brighter
                            future. We are passionate about turning ideas into reality, committed to providing high-quality
                            services that align with user expectations. Our goal is to create an environment that fosters
                            collaboration and positive exchange, where everyone can find inspiration and opportunities for
                            growth and development.</p>

                        <div class="bor16 p-l-29 p-b-9 m-t-22">
                            <p class="stext-114 cl6 p-r-40 p-b-11">
                                Creativity is just connecting things. When you ask creative people how they did something,
                                they feel a little guilty because they didn't really do it, they just saw something. It
                                seemed obvious to them after a while.
                            </p>

                            <span class="stext-111 cl8">
                                - Steve Job’s
                            </span>
                        </div>
                    </div>
                </div>

                <div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
                    <div class="how-bor2">
                        <div class="hov-img0">
                            <img src="{{ asset('assits') }}/images/pexels-negativespace-34577.jpg" alt="IMG">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
