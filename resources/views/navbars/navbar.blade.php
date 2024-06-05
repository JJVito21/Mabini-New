{{-- @section('content')  --}}
{{-- desktop navbar --}}
<section class="hidden md:block desktop fixed z-[99] top-0">
    <nav id="desktop" >
        <div class="flex flex-col">
            {{-- styled on scroll --}}
            <a href="/" id="schoolName" class=" bg-neutral-100 flex justify-center items-center gap-3 w-screen py-4">
                <img src="{{ URL('images/logo2.png') }}" alt="logo" class="w-16">
                <h3 class="text-neutral-800 font-bold text-lg md:text-xl uppercase tracking-wider">Mabini Farm School</h3>
            </a >
             {{-- end of styled on scroll --}}
            <div
                class=" bg-[#044D0B] flex justify-center items-center 
           w-screen py-2 navlinks text-neutral-100 gap-x-10 text-lg ">
                <a class=" hover:text-[#E9AC32] transition duration-300" href="/">Home</a>
                <a class=" hover:text-[#E9AC32] transition duration-300" href="memo">Memo</a>
                <a class=" hover:text-[#E9AC32] transition duration-300" href="programs">Programs</a>
                <a class=" hover:text-[#E9AC32] transition duration-300" href="procurement">Procurement</a>
                <a class=" hover:text-[#E9AC32] transition duration-300" href="about">About Us</a>
                <a class=" hover:text-[#E9AC32] transition duration-300" href="contact">Contact Us</a>
            </div>
        </div>
    </nav>
</section>

{{-- mobile sidebar --}}
<section class="block md:hidden z-[99]">

<nav class="navbar bg-body-tertiary fixed-top navlinks shadow-md">
    <div class="container-fluid">
        <a class="navbar-brand" href="/"> <img src="{{ URL('images/logo2.png') }}" alt="logo"
                class="w-16">

        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end " tabindex="-1" id="offcanvasNavbar"
            aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header text-success">
                <h5 class="fw-bold" id="offcanvasNavbarLabel">MABINI FARM SCHOOL</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">


        <li class="nav-item"><a class="nav-link hover:text-[#E9AC32] transition duration-300 text-sm" href="/">Home</a></li>
        <li class="nav-item"><a class="nav-link hover:text-[#E9AC32] transition duration-300 text-sm" href="memo">Memo</a></li>
        <li class="nav-item"><a class="nav-link hover:text-[#E9AC32] transition duration-300 text-sm" href="programs">Programs</a></li>
        <li class="nav-item"><a class="nav-link hover:text-[#E9AC32] transition duration-300 text-sm" href="procurement">Procurement</a></li>
        <li class="nav-item"><a class="nav-link hover:text-[#E9AC32] transition duration-300 text-sm" href="about">About Us</a></li>
        <li class="nav-item"><a class="nav-link hover:text-[#E9AC32] transition duration-300 text-sm" href="contact">Contact Us</a></li>

                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li> --}}
                </ul>

            </div>
        </div>
</nav>

</section>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let lastScrollTop = 0;
        const nav = document.querySelector("#desktop");

        window.addEventListener("scroll", function() {
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            if (scrollTop > lastScrollTop) {
                // Scrolling down
                nav.classList.remove("slide-down");
                nav.classList.add("slide-up");
            } else {
                // Scrolling up
                nav.classList.remove("slide-up");
                nav.classList.add("slide-down");
            }

            lastScrollTop = scrollTop <= 0 ? 0 : scrollTop; // For Mobile or negative scrolling
        });
    });
</script>

<style>
    h3,
    .navlinks {
        font-family: "Kaisei Opti", serif;
    }
/* Transition classes for sliding effect */
.slide-up {
    transform: translateY(-72%);
    transition: transform 0.3s ease-in-out;
}

.slide-down {
    transform: translateY(0);
    transition: transform 0.1s ease-in-out;
}

/* Initial state for the navigation bar */
#schoolName {
    transform: translateY(0);
    transition: transform 0.3s ease-in-out;
}

</style>
{{-- @endsection --}}
