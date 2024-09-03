@extends('layouts.layout')

@section('content')
@include('navbars.admin-navbar')


<div class="mb-40 lg:mb-56">

<section>
  <div class="text-center mt-20 mb-32">
      <h2 class="uppercase font-serif text-lg md:text-3xl font-bold text-[#044D0B]">
          <span class="underlined underline-mask">programs</span>
      </h2>
  </div>
</section>

<section class="flex flex-col lg:flex-row items-center md:items-center justify-center gap-10">
<div class="flex flex-col items-end gap-2">
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
<button class="btn  bg-lime-600 hover:bg-lime-700 text-neutral-100 hover:text-neutral-100"
data-bs-toggle="modal" data-bs-target="#addEvent">
  <i class="fa-solid fa-plus"></i> Add Event</button>
</div>
{{-- add event modal --}}
<div class="modal fade" id="addEvent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title ms-auto font-medium text-lime-800 text-lg" id="exampleModalLabel">Add Event</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form action="{{ route('create_event') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-3">
                    <label for="eventName" class="form-label font-sans font-medium capitalize">Event Name</label>
                    <input type="text" class="form-control border-0 bg-gray-300 rounded" name="eventName" id="eventName" required>
                  </div>
                  <div class="mb-3">
                    <label for="eventDate" class="form-label font-sans font-medium capitalize">Date</label>
                    <input type="date" class="form-control border-0 bg-gray-300 rounded" name="eventDate" id="eventDate" required>
                  </div>
                  <div class="mt-4 mb-5 ">
                    <img id="showPhoto" class="rounded-lg w-80 mb-5 mx-auto" src="{{ asset('images/landscape-placeholder.png') }}" alt="photo"  />
                    <input type="file" name="photo" id="photo" class="" onchange="previewImage(this);" accept=".jpg, .png, .jpeg" required >
                  </div>
                  <div class="modal-footer">
                      <button type="submit" class="btn bg-lime-600 hover:bg-lime-700 text-neutral-100 hover:text-neutral-100">Submit</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>
{{--  event list --}}
<div class="flex flex-col p-4 calendar-container">
<h1 class="font-medium text-2xl ">Events</h1>
<div class="w-72 md:w-96 h-[1px] bg-neutral-500 mb-2"></div>
<div class="flex flex-col mx-auto overflow-scroll overflow-x-hidden max-h-[24.5rem] w-72 md:w-96">
  @foreach ($eventData as $data)
  <div class="mb-5 me-2">

    <div class="dropdown m-1">
      <button  class="z-10 absolute top-0 right-0 bg-neutral-100 transition duration-300 hover:bg-neutral-400 px-1 rounded" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa-solid fa-ellipsis text-gray-800"></i>
      </button>
      <ul class="dropdown-menu dropdown-menu-end min-w-20">
        <li><a class="dropdown-item font-medium text-lime-600 hover:text-white hover:bg-lime-600" href="{{ route('edit_event',  $data->id) }}">Edit</a></li>
        <li><a class="dropdown-item font-medium text-red-600 hover:text-white hover:bg-red-600" href="{{ route('delete_event', $data->id) }}" onclick="return confirm('Are you sure you want to delete this Event?')">Delete</a></li>
      </ul>
    </div>

    <div class="relative">
      <h1 class="font-medium text-lg ">{{ $data -> eventName }}</h1>
      <h2 class="font-sm text-base">{{ \Carbon\Carbon::parse($data->eventDate)->format('F d, Y') }}</h2>
    </div>

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
<script>
  // JavaScript function to preview the selected image
  function previewImage(input) {
      var file = input.files[0];
      if (file) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#showPhoto').attr('src', e.target.result);
          }
          reader.readAsDataURL(file);
      }
  }
</script>
@if(session('success'))
      <style>
          /* Add CSS styles for the success message */
          #success-message {
              opacity: 1;
              transition: opacity 0.5s ease-in-out; /* Adjust the duration and easing as needed */
          }
      </style>

      <div id="success-message" class="alert bg-[#6e914b] text-neutral-200 position-fixed bottom-0 mt-5 ms-4">
          {{ session('success') }}
      </div>

      <script>
          // Function to close the success message
          function closeSuccessMessage() {
              var successMessage = document.getElementById('success-message');
              successMessage.style.opacity = '0';

              // Wait for the transition to complete before hiding or removing the message
              setTimeout(function () {
                  successMessage.style.display = 'none'; // or remove the success message from the DOM
              }, 500); // Duration of the transition, should match the CSS transition duration
          }

          // Close the success message after 3000 milliseconds even if the modal is not closed
          setTimeout(closeSuccessMessage, 3000); // 3000 milliseconds = 3 seconds, adjust as needed
      </script>
  @endif
@include('footer.footer')
@endsection
