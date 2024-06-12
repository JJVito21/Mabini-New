@extends('layouts.layout')

@section('content')
@include('navbars.admin-navbar')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Load DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/cscsss/dataTables.bootstrap5.min.">

<div class="container">
    


    <div class="flex items-center justify-center mt-20">

        <h2 class="uppercase font-serif text-lg md:text-3xl font-bold text-[#044D0B]">
            <span class="underlined underline-mask">Message View</span>
        </h2>
    </div>
    <div class="flex justify-end mt-10">
    <a href="/message_management" class="btn bg-lime-600 hover:bg-lime-700 text-neutral-100 hover:text-neutral-100"><i class="fa-solid fa-arrow-left"></i> Back</a>

    </div>
    <div class="mt-20 mb-20 lg:mb-auto flex items-center justify-center">
        
        <div class="card w-80 lg:w-[40rem]">

            <div class="card-body ">
                <p class="text-sm text-body-secondary">{{ $messageItem -> created_at->format('Y-m-d') }}</p>
                <div class="flex flex-row justify-start">
                <h5 class="card-title font-medium">Name: {{ $messageItem -> name }}</h5>
                </div>
                <div class="flex flex-row justify-end -mt-8">
                <a href="{{ route('delete_message', $messageItem->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this file?')"><i class="fa-solid fa-trash-can"></i></a>
                </div>
                <h6 class="card-subtitle mb-2 ">Email: <span class="text-lime-700">{{ $messageItem -> email }}</span></h6>
                <h6 class="card-subtitle mt-10 mb-2 text-body-secondary">Message:</h6>
                <div class="card px-1 pt-1 pb-10  bg-gray-200">
                    <p class="card-text">{{ $messageItem -> message }}</p>
      
                </div>
            </div>
          </div>
    
        {{-- <table id="messageTable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($messageItem as $item)
                
                <tr>
                  <td >{{ $item->name }}</td>
                  <td>{{ $item->created_at->format('Y-m-d') }}</td>
                  <td>
                     <a href="#" class="btn  bg-lime-600 hover:bg-lime-700 text-neutral-100 hover:text-neutral-100  me-3">View</a>
                     <a href="{{ route('delete_message', $item->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this file?')"><i class="fa-solid fa-trash-can"></i></a>
                  </td> 
               </tr>
               
                @endforeach
            </tbody>
    
    
        </table> --}}
        </div>


    </div>
    
@include('footer.footer')

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

<!-- Load DataTables JS -->
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#messageTable').DataTable({
            rowReorder: true
        });
    });
</script>
    
@endsection
