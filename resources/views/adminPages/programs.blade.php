@extends('layouts.layout')

@section('content')
@include('navbars.admin-navbar')


<div class="mb-40 lg:mb-56">
    
<section>
    <div class="text-center mt-40 mb-32">

        <h2 class="uppercase font-serif text-lg md:text-3xl font-bold text-[#044D0B]">
            <span class="underlined underline-mask">programs</span>
        </h2>
    </div>
    <div id='calendar' class="w-80 md:w-[50rem] mx-auto"></div>

  <!-- Modal -->
  <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 font-medium" id="exampleModalLabel">Add Event</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <label for="title" class="form-label">Event Title</label>
          <input type="text" class="form-control rounded" name="title" id="title" required>
          <span id="titleError" class="text-red-600 "></span>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="save" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
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
            selectable: true,
            selectHelper: true,
            select: function(start, end, allDays){
                $('#eventModal').modal('toggle');

                $('#save').click(function() {
                    var title = $('#title').val();
                    var start_date = moment(start).format('YYYY-MM-DD');
                    var end_date = moment(end).format('YYYY-MM-DD');

                    $.ajax({
                    url:"{{route('create_event') }}",
                    type:"POST",
                    dataType: 'json',
                    data:{ title, start_date, end_date },
                    success:function(response)
                    {
                        // location reload signfies update
                        // whereas, modal('hide') only hides modal, and input field is not cleared
                        Swal.fire({
                          position: "top-end",
                          icon: "success",
                          title: "Event added successfully",
                          showConfirmButton: false,
                          timer: 1500
                        });
                        $('#eventModal').modal('hide');
                        clearForm();
                        function clearForm() {
                        $('#title').val('');
                        $('#titleError').html('');
                    }
                        $('#calendar').fullCalendar('renderEvent', {
                            'title' : response.title,
                            'start' : response.start_date,
                            'end' : response.end_date
                        })
                    } ,  
                    
                    error:function(error)
                    {
                        if(error.responseJSON.errors ){
                            $('#titleError').html(error.responseJSON.errors.title);
                        }
                    }      
                    })
                })
            },
            editable: true,
            eventDrop: function(event){
              var id = event.id;
              var start_date = moment(event.start).format('YYYY-MM-DD');
              var end_date = moment(event.end).format('YYYY-MM-DD');

              $.ajax({
                    url:"{{route('update_event', '') }}" + '/' + id,
                    type:"PATCH",
                    dataType: 'json',
                    data:{ start_date, end_date },
                    success:function(response)
                    {
                      Swal.fire({
                      position: "top-end",
                      icon: "success",
                      title: "Event updated succesfully",
                      showConfirmButton: false,
                      timer: 1500
                    });
                    } ,  
                    
                    error:function(error)
                    {
                        console.log(error)
                    }      
                    })
            }


        })
    });
</script>



<style>
    .fc-center h2 {
        font-size: 2rem; 
        color: #2c812f; 
        font-family: Arial, sans-serif; 
        font-weight: bold; 
    }
</style>
@include('footer.footer')
@endsection
