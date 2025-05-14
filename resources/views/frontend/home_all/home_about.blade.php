@php
$aboutPage = App\Models\About::find(1);

@endphp


<section id="aboutSection" class="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <ul class="about__icons__wrap">
                        <li>
                            <img class="light" src="{{asset('frontend/assets/img/icons/7-trumpets.jpg')}}" alt="Trumpets">
                            <img class="dark" src="{{asset('frontend/assets/img/icons/7-trumpets.jpg')}}" alt="Trumpets">
                        </li>
                        <li>
                            <img class="light" src="{{asset('frontend/assets/img/icons/Matt-20.jpg')}}" alt="Matt 20">
                            <img class="dark" src="{{asset('frontend/assets/img/icons/Matt-20.jpg')}}" alt="Matt 20">
                        </li>
                        <li>
                            <img class="light" src="{{asset('frontend/assets/img/icons/Temples.jpg')}}" alt="Temples">
                            <img class="dark" src="{{asset('frontend/assets/img/icons/Temples.jpg')}}" alt="Temples">
                        </li>
                        <li>
                            <img class="light" src="{{asset('frontend/assets/img/icons/Living-Church.jpg')}}" alt="Living-Church">
                            <img class="dark" src="{{asset('frontend/assets/img/icons/Living-Church.jpg')}}" alt="Living-Church">
                        </li>
                        <li>
                            <img class="light" src="{{asset('frontend/assets/img/icons/Beast-chart.jpg')}}" alt="Beast-chart">
                            <img class="dark" src="{{asset('frontend/assets/img/icons/Beast-chart-V2 copy.jpg')}}" alt="Beast-chart">
                        </li>
                        <li>
                            <img class="light" src="{{asset('frontend/assets/img/icons/7-churches.jpg')}}" alt="7-churches">
                            <img class="dark" src="{{asset('frontend/assets/img/icons/7-churches.jpg')}}" alt="7-churches">
                        </li>
                        <li>
                            <img class="light" src="{{asset('frontend/assets/img/icons/Cerem-harvest.jpg')}}" alt="Cerem-harvest">
                            <img class="dark" src="{{asset('frontend/assets/img/icons/Cerem-harvest.jpg')}}" alt="Cerem-harvest">
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <div class="about__content">
                        <div class="section__title">
                            <span class="sub-title">01 - About us</span>
                            <h2 class="title">{{$aboutPage->title}}</h2>
                        </div>
                        <div class="about__exp">
                            <div class="about__exp__icon">
                                <img src="{{asset('frontend/assets/img/icons/Golden-bowl mini.jpg')}}" alt="">
                            </div>
                            <div class="about__exp__content">
                                <p>{{$aboutPage->short_title}}</p>
                            </div>
                        </div>
                        <p class="desc">{{$aboutPage->short_description}}</p>
                        <a href="about.html" class="btn">Download Our Fundamental Beliefs</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
