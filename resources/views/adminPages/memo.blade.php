@extends('layouts.layout')

@section('content')
@include('navbars.admin-navbar')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Load DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/cscsss/dataTables.bootstrap5.min.">

<div class="mb-40 lg:-mb-20 container">

<div class="flex items-center justify-center mt-20">

    <h2 class="uppercase font-serif text-lg md:text-3xl font-bold text-[#044D0B]">
        <span class="underlined underline-mask">memorandums</span>
    </h2>
</div>

<div class="mt-20 mb-20  lg:mb-auto mx-auto w-[90%] overflow-hidden">
    <div class="flex justify-end">
        <button type="button" class="btn bg-lime-600 hover:bg-lime-700 text-neutral-100 hover:text-neutral-100" data-bs-toggle="modal" data-bs-target="#uploadModal"><i class="fa-solid fa-plus"></i> Add New
        </button>
    </div>
    <table id="memoTable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>File Name</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            
            <tr>
              <td><i class="fa-solid fa-file-pdf"> </i>{{ $item->file }}</td>
              <td>{{ $item->created_at->format('Y-m-d') }}</td>
              <td class="flex flex-row">
                <a href="{{ url('/download', $item->file) }}" class="btn  bg-lime-600 hover:bg-lime-700 text-neutral-100 hover:text-neutral-100 me-3 ">
                <div class="flex flex-col py-1">
                    <i class="fa-solid fa-arrow-down"></i>
                    <div class="bg-neutral-100 w-4 h-0.5 rounded"></div>
                </div>
                </a>
                <a href="{{ route('delete_memo', $item->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this file?')"><i class="fa-solid fa-trash-can"></i></a>
                 
              </td> 
           </tr>
           
            @endforeach
        </tbody>


    </table>
</div>
{{-- upload new memorandum modal --}}
    <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title ms-auto font-medium text-lime-800" id="exampleModalLabel">Upload Memorandum PDF</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
      
                    <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-4 mb-5 ">
                            <input class="text-gray-900" type="file" name="file" id="file" class="form-control" accept=".pdf">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn bg-lime-600 hover:bg-lime-700 text-neutral-100 hover:text-neutral-100">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>

</div>
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
        $('#memoTable').DataTable({
            rowReorder: true
        });
    });
</script>
    
@include('footer.footer')
@endsection