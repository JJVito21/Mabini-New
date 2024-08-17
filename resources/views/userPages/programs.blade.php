@extends('layouts.layout')

@section('content')
@include('navbars.navbar')


<div class="mb-40 lg:mb-56">
    
<section>
    <div class="text-center mt-20 mb-32">
        <h2 class="uppercase font-serif text-lg md:text-3xl font-bold text-[#044D0B]">
            <span class="underlined underline-mask">programs</span>
        </h2>
    </div>
</section>   
   
<section class="flex flex-col lg:flex-row items-center md:items-start justify-center gap-10">

<div class="calendar-container max-h-[30rem]">
    <header class="calendar-header">
        <p class="calendar-current-date"></p>
        <div class="calendar-navigation">
            <span id="calendar-prev" 
                  class="">
                  <i class="fa-solid fa-chevron-left"></i>
            </span>
            <span id="calendar-next" 
                  class="">
                  <i class="fa-solid fa-chevron-right"></i>
            </span>
        </div>
    </header>

    <div class="calendar-body">
        <ul class="calendar-weekdays">
            <li>Sun</li>
            <li>Mon</li>
            <li>Tue</li>
            <li>Wed</li>
            <li>Thu</li>
            <li>Fri</li>
            <li>Sat</li>
        </ul>
        <ul class="calendar-dates"></ul>
    </div>
</div>

<div class="flex flex-col p-4 calendar-container">
<h1 class="font-medium text-2xl ">Events</h1>
<div class="w-72 md:w-96 h-[1px] bg-neutral-500 mb-2"></div>
<div class="flex flex-col mx-auto overflow-scroll overflow-x-hidden max-h-[24.5rem] w-72 md:w-96">

    @foreach ($eventData as $data)
    <div class="mb-5 me-2">
    <h1 class="font-medium text-lg ">{{ $data -> eventName }}</h1>
    <h2 class="font-sm text-base">{{ \Carbon\Carbon::parse($data->eventDate)->format('F d, Y') }}</h2>
    <img src="{{ asset($data->eventImage) }}" class="w-auto mt-2"  alt="event poster image">
    </div>
    
    @endforeach
</div>
</div>
</section>
</div>

<script>
let date = new Date();
let year = date.getFullYear();
let month = date.getMonth();

const day = document.querySelector(".calendar-dates");

const currdate = document
    .querySelector(".calendar-current-date");

const prenexIcons = document
    .querySelectorAll(".calendar-navigation span");

// Array of month names
const months = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December"
];

// Function to generate the calendar
const manipulate = () => {

    // Get the first day of the month
    let dayone = new Date(year, month, 1).getDay();

    // Get the last date of the month
    let lastdate = new Date(year, month + 1, 0).getDate();

    // Get the day of the last date of the month
    let dayend = new Date(year, month, lastdate).getDay();

    // Get the last date of the previous month
    let monthlastdate = new Date(year, month, 0).getDate();

    // Variable to store the generated calendar HTML
    let lit = "";

    // Loop to add the last dates of the previous month
    for (let i = dayone; i > 0; i--) {
        lit +=
            `<li class="inactive">${monthlastdate - i + 1}</li>`;
    }

    // Loop to add the dates of the current month
    for (let i = 1; i <= lastdate; i++) {

        // Check if the current date is today
        let isToday = i === date.getDate()
            && month === new Date().getMonth()
            && year === new Date().getFullYear()
            ? "active"
            : "";
        lit += `<li class="${isToday}">${i}</li>`;
    }

    // Loop to add the first dates of the next month
    for (let i = dayend; i < 6; i++) {
        lit += `<li class="inactive">${i - dayend + 1}</li>`
    }

    // Update the text of the current date element 
    // with the formatted current month and year
    currdate.innerText = `${months[month]} ${year}`;

    // update the HTML of the dates element 
    // with the generated calendar
    day.innerHTML = lit;
}

manipulate();

// Attach a click event listener to each icon
prenexIcons.forEach(icon => {

    // When an icon is clicked
    icon.addEventListener("click", () => {

        // Check if the icon is "calendar-prev"
        // or "calendar-next"
        month = icon.id === "calendar-prev" ? month - 1 : month + 1;

        // Check if the month is out of range
        if (month < 0 || month > 11) {

            // Set the date to the first day of the 
            // month with the new year
            date = new Date(year, month, new Date().getDate());

            // Set the year to the new year
            year = date.getFullYear();

            // Set the month to the new month
            month = date.getMonth();
        }

        else {

            // Set the date to the current date
            date = new Date();
        }

        // Call the manipulate function to 
        // update the calendar display
        manipulate();
    });
});
    

</script>



<style>

  
  
</style>
@include('footer.footer')
@endsection
