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
    <div id='calendar' class="w-80 md:w-[50rem] mx-auto"></div>

</section>   
   


</div>

<script>



        $(document).ready(function() {
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });   


        var eventList = @json($eventList);
        $('#calendar').fullCalendar({
            header: {
            'left': 'prev, next, today',
            'center': 'title',
            'right': 'month, agendaWeek, agendaDay'
            },
            events: eventList,
        });
        

    });

</script>



<style>

  .fc{
    padding: 20px;
    border-top: 2px solid #E9AC32;
  }
  .fc-today{
    background-color: #f7de97 !important;
  }
  .fc-event{
    font-size: 16px;
    /* background-color: #84b056; */
    /* border: #84b056; */
  }
  .fc-center h2 {
      font-size: 2rem; 
      color: #2c812f; 
      font-family: Arial, sans-serif; 
      font-weight: bold; 
  }
  @media only screen and (max-width: 600px) {

    .fc-center h2 {
      font-size: 1.5rem;
      margin: 20px auto !important; 
  }
  }
</style>
@include('footer.footer')
@endsection
