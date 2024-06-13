@extends('layouts.layout')

@section('content')
    @include('navbars.navbar')


   <div class="mb-40">
    <section>
      
        <div id="carouselHomepage" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselHomepage" data-bs-slide-to="0"
                    class="active carouselButton" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselHomepage" data-bs-slide-to="1"
                    class=" carouselButton" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselHomepage" data-bs-slide-to="2"
                    class=" carouselButton" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/building.jpg" class="d-block w-100 md:h-[35rem]" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="images/brigada.jpg" class="d-block w-100 md:h-[35rem]" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="images/maggi.jpg" class="d-block w-100 md:h-[35rem]" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselHomepage"
                data-bs-slide="prev">
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselHomepage"
                data-bs-slide="next">
            </button>
        </div>
    </section>

    <section>
        <div class="bg-[#0C7016] font-koho text-slate-200 w-screen py-4 md:py-8 flex items-center justify-center ">

            <div
                class="container gap-x-2 md:gap-x-10 flex flex-row flex-no-wrap justify-center text-center md:items-center lg:items-start ">
                <div class="flex flex-col items-center w-44">
                    <div class="col">
                        <i class="fa-solid fa-building-columns text-2xl md:text-[3rem]"></i></div>
                    <div class="col text-md md:text-xl font-bold">
                        <span small-data-val="55" class="smallNum">00</div>
                    <div class="col text-xs md:text-sm">Years of Existence </div>
                </div>
                <span class="bg-neutral-300 w-0.5 h-22 md:h-28 "></span>
                <div class="flex flex-col items-center w-44">
                    <div class="col">
                        <i class="fa-solid fa-book-open text-2xl md:text-[3rem]"></i></div>
                    <div class="col text-md md:text-xl font-bold">
                        <span small-data-val="20" class="smallNum">00</div>
                    <div class="col text-xs md:text-sm">Programs</div>
                </div>
                <span class="bg-neutral-300 w-0.5 h-22 md:h-28 "></span>
                <div class="flex flex-col items-center w-44">
                    <div class="col">
                        <i class="fa-solid fa-graduation-cap text-2xl md:text-[3rem]"></i></div>
                    <div class="col text-md md:text-xl font-bold">
                        <span big-data-val="30000" class="bigNum">20000</div>
                    <div class="col text-xs md:text-sm">Graduates</div>
                </div>
                <span class="bg-neutral-300 w-0.5 h-22 md:h-28 "></span>
                <div class="flex flex-col items-center w-44">
                    <div class="col">
                        <i class="fa-solid fa-user-group text-2xl md:text-[3rem]"></i></div>
                    <div class="col text-md md:text-xl font-bold">
                        <span small-data-val="3000" class="smallNum">00</div>
                    <div class="col text-xs md:text-sm">Enrolled</div>
                </div>
            </div>

        </div>
    </section>

    <section id="contact-banner" class="h-80 md:h-[30rem] mb-20">

          <div class="pt-10 md:mt-auto flex flex-col md:flex-row items-center justify-center  h-full md:gap-x-10">
            
            <div class="flex flex-row items-center justify-center gap-2">
              <h1 class="font-koho text-neutral-100 text-2xl md:text-[4rem]">Introduction</h1>
              <div class="bg-neutral-100 w-0.5 h-10 md:w-1 md:h-24"></div>
            </div>

              <div class="flex flex-col justify-center items-center h-screen">
            <iframe class="mt-1 md:pt-14 w-[20rem] h-[12rem] md:w-[30rem]  md:h-[25rem]" src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2Fmabininhscadiz%2Fvideos%2F457016009709204%2F&show_text=false&width=560&t=0" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>
             </div>

            </div>
      </section>

    <section>
        <div class="my-10 text-center mt-20">
            <h2 class="uppercase font-serif text-lg md:text-3xl font-bold text-[#044D0B] mb-10">
                <span class="underlined underline-mask">academic tracks</span>
            </h2>
        <div
            class=" container gap-10 mt-20 flex flex-col flex-wrap 
            md:flex-row md:flex-no-wrap justify-center text-center items-center lg:items-start ">
            <div class="col hide track">
                <img class="w-56 md:w-80" src="images/stem.jpg" alt="">
            </div>
            <div class="col hide track">
                <img class="w-56 md:w-80" src="images/stem.jpg" alt="">
            </div>
            <div class="col hide track">
                <img class="w-56 md:w-80" src="images/stem.jpg" alt="">
            </div>
            <div class="col hide track">
                <img class="w-56 md:w-80" src="images/stem.jpg" alt="">
            </div>
        </div>
    </div>
    </section>
    <section >
        <div class="flex items-center justify-center mt-20">
            <h2 class="uppercase font-serif text-lg md:text-3xl font-bold text-[#044D0B]">
                <span class="underlined underline-mask">awards</span>
            </h2>
        </div>
        <div
        class=" container gap-10 mt-20 flex flex-col flex-wrap 
        md:flex-row md:flex-no-wrap justify-center text-center items-center lg:items-start ">
        <div class="col hide track">
            <h2 class="uppercase font-serif font-bold text-lg md:text-2xl text-[#044D0B] mb-10">award</h2>
            <h2 class="uppercase font-serif font-bold text-lg md:text-2xl text-[#044D0B] mb-10">award</h2>
            <h2 class="uppercase font-serif font-bold text-lg md:text-2xl text-[#044D0B] mb-10">award</h2>
            
        </div>
        <div class="col hide track">
            <h2 class="uppercase font-serif font-bold text-lg md:text-2xl text-[#044D0B] mb-10">award</h2>
            <h2 class="uppercase font-serif font-bold text-lg md:text-2xl text-[#044D0B] mb-10">award</h2>
            <h2 class="uppercase font-serif font-bold text-lg md:text-2xl text-[#044D0B] mb-10">award</h2>
            
        </div>
        <div class="col hide track">
            <h2 class="uppercase font-serif font-bold text-lg md:text-2xl text-[#044D0B] mb-10">award</h2>
            <h2 class="uppercase font-serif font-bold text-lg md:text-2xl text-[#044D0B] mb-10">award</h2>
            <h2 class="uppercase font-serif font-bold text-lg md:text-2xl text-[#044D0B] mb-10">award</h2>
            
        </div>
    </div>
    </section>
    <section>


            <div class="flex flex-col md:flex-row items-center justify-center text-pretty my-20 w-full text-neutral-100">
                <div class="flex flex-col h-[40rem] w-screen bg-[#044D0B]">
                    <h2 class="uppercase text-center lg:text-start text-[40px] md:text-[4rem] lg:text-[5rem] md:leading-[70px] font-black mt-20">
                        why should you choose <span class=" border-neutral-100 border-b-2">mabini</span>
                    </h2>

                    <div class="p-20 max-w-[100rem] mx-auto">
                        <span class="text-4xl "><i class="fa-solid fa-quote-left"></i></span> 
                        <p class="text-pretty leading-8">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                        </p>
                        <span class="text-4xl "><i class="fa-solid fa-quote-right"></i></span> 

                        <p class="italic mt-10">-Jian Vito, The Principal</p>
                    </div>
                </div>
            
                <div class="flex flex-col h-0 md:h-[40rem] w-0 md:w-[40rem]">
                    <img src="images/principal.jpg" alt="" class="h-full">
                </div>
            </div>

            <div class="flex flex-col justify-center items-center mt-40">

                <h2 class="uppercase font-serif text-lg md:text-3xl font-bold text-[#044D0B] mb-10">
              read more about us
                </h2>

                <a href="about" type="button" class="button-slide font-medium" >Read More</a>
            </div>

    </section>
   </div>
    @include('footer.footer')


    <style>
        .inquire {
            position: absolute;
            z-index: 2;
        }

        .background-container {
            position: relative;
            width: 100%;
            height: 100vh;
        }

        .logo {
            position: absolute;
            width: 20rem;
            margin-top: 50px;
            margin-left: 50px;
        }

        .building {
            width: 100%;
            height: 100%;
        }

        .grn-filter {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 80%;
            background-image: linear-gradient(180deg, #0C7016, #88B15E);
            mix-blend-mode: multiply;
            /* Blend the background color with the image */
        }

        .carouselButton {
            width: 10px !important;
            height: 10px !important;
            border-radius: 75%;
            background-color: #D9D9D9 !important;
            opacity: 1 !important;
        }

        .active {
            background-color: #88B15E !important;
        }

 
        .hide{
            opacity: 0;
            transition: all 1s;
            filter: blur(5px);
            transform: translateX(-100%)
        }
        .show{
            opacity: 1;
            filter: blur(0);
            transform: translateX(0);
        }
        .track:nth-child(2){
            transition-delay: 200ms;
        }
        .track:nth-child(3){
            transition-delay: 400ms;
        }
        .track:nth-child(4){
            transition-delay: 600ms;
        }
        #contact-banner {
            background:
            linear-gradient(rgba(23, 77, 4, 0.7), rgba(136, 177, 94, 0.7)),
            url("images/air-shot.jpg") no-repeat center / cover;
        }
    </style>

<script>

    // counter for smaller numbers
    let smallValueDisplays = document.querySelectorAll(".smallNum");
    //the smaller the interval value, the faster the count
    let smallInterval = 2000;

    smallValueDisplays.forEach((smallValueDisplays => {
    let smallStartValue = 0;
    let smallEndValue = parseInt(smallValueDisplays.getAttribute
        ("small-data-val"));
    let smallDuration = Math.floor(smallInterval / smallEndValue);
    let smallCounter = setInterval(function () {
        smallStartValue += 1;
        smallValueDisplays.textContent = smallStartValue;
        if (smallStartValue == smallEndValue){
            clearInterval(smallCounter);
        }
    }, smallDuration);
    }))
    
    // counter for larger numbers

    let bigValueDisplays = document.querySelectorAll(".bigNum");
    let bigInterval = 100;

    bigValueDisplays.forEach((bigValueDisplays => {
    let bigStartValue = 27000;
    let bigEndValue = parseInt(bigValueDisplays.getAttribute
        ("big-data-val"));
    let bigDuration = Math.floor(bigInterval / bigEndValue);
    let bigCounter = setInterval(function () {
        bigStartValue += 1;
        bigValueDisplays.textContent = bigStartValue;
        if (bigStartValue == bigEndValue){
            clearInterval(bigCounter);
        }
    }, bigDuration);
    }))

    //scroll animation that slides in elements

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry ) => {
            // console.log(entry)
            if (entry.isIntersecting){
                entry.target.classList.add('show');
            } //else condition shows animation more than once
            // else {
            //     entry.target.classList.remove ('show');
            // }
        });
    });
    const hiddenElements = document.querySelectorAll ('.hide');
    hiddenElements.forEach((el) => observer.observe(el));

    
</script>
@endsection
