<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    @vite('resources/css/app.css')
    <link rel="icon" type="image/x-icon" href="/images/logo2.png" name="mabini farm school icon">
    <title>Mabini Farm School</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaisei+Opti&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=KoHo:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
</head>

<body>
    {{-- loading animation for page transitions --}}
    <div class="preloader d-flex justify-content-center align-items-center gap-2">
        <div class="loader"></div>
    </div>
    {{-- margin and padding interfere with DOM elements, especially the navbar.
    div with height gives space for the navbar, but does not interfere with DOM elements. --}}
    <div class="h-[90px] md:h-36"></div>
    @yield('content')

     <style>
         .loader {
             height: 4px;
             width: 130px;
             --c: no-repeat linear-gradient(#044D0B 0 0);
             background: var(--c), var(--c), #d7b8fc;
             background-size: 60% 100%;
             animation: l16 3s infinite;
             }
             
             @keyframes l16 {
                 0% {
                     background-position: -150% 0, -150% 0
                     }
                     
                     66% {
                         background-position: 250% 0, -150% 0
                         }
                         
                         100% {
                             background-position: 250% 0, 250% 0
                             }
                             }
                             
                             .preloader {
                                 background: #f8f8f8 center;
                                 height: 100vh;
                                 width: 100%;
                                 position: fixed;
                                 z-index: 999999;
                                 }
                                 
                                 .preloader--hidden {
                                     transition: ease-out 300ms;
                                     transition-delay: 500ms;
                                     opacity: 0.5;
                                     visibility: hidden;
                                     }
                                     </style>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
        
    <script>
        
        // script that adds a class to the loading animation and making it disappear
        window.addEventListener("load", () => {
            const loader = document.querySelector(".preloader");
            loader.classList.add("preloader--hidden");
            });
            </script>
</body>

</html>
