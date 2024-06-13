@extends('layouts.layout')

@section('content')
@include('navbars.admin-navbar')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Load DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/cscsss/dataTables.bootstrap5.min.">

<div class="mb-40 lg:mb-56 container">

<div class="flex items-center justify-center mt-20">

    <h2 class="uppercase font-serif text-lg md:text-3xl font-bold text-[#044D0B]">
        <span class="underlined underline-mask">Procurement</span>
    </h2>
</div>

<div class="mt-20 mb-20  lg:mb-auto mx-auto w-[90%] overflow-hidden">
    <div class="flex justify-end">
        <button type="button" class="btn bg-lime-600 hover:bg-lime-700 text-neutral-100 hover:text-neutral-100" data-bs-toggle="modal" data-bs-target="#uploadItemModal"><i class="fa-solid fa-plus"></i> Add Item
        </button>
    </div>
    <table id="procurementTable" class="display  table table-light table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Item Name</th>
                <th>Date</th>
                <th>Supplier</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($procurementItem as $item)
            
            <tr>
              <td>{{ $item->itemName }}</td>
              <td>{{ $item->created_at->format('Y-m-d') }}</td>
              <td>{{ $item->supplier }}</td>
              <td>{{ $item->quantity }}</td>

              <td class="flex flex-row">
                {{-- {{ url('/download', $item->file) }} --}}
                <button type="button" data-bs-toggle="modal" data-bs-target="#editItemModal" class="btn  bg-lime-600 hover:bg-lime-700 text-neutral-100 hover:text-neutral-100 me-3 ">
                <div class="flex flex-col py-1">
                    <i class="fa-solid fa-pen"></i>
                </div>
                </button>
                <a href="{{ route('delete_procurement', $item->id) }}" 
                class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')"><i class="fa-solid fa-trash-can"></i></a>
                 
              </td> 
           </tr>
           
            @endforeach
        </tbody>


    </table>
</div>
{{-- add new procurement item modal --}}
    <div class="modal fade" id="uploadItemModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title ms-auto font-medium text-lime-800" id="exampleModalLabel">Add Procurement Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
      
                    <form action="{{ route('uploadItem') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="itemName" class="form-label font-sans font-medium capitalize">Item Name</label>
                          <input type="text" class="form-control border-0 bg-gray-300 rounded" name="itemName" id="itemName" required>
                        </div>
                        <div class="mb-3">
                          <label for="supplier" class="form-label font-sans font-medium capitalize">Supplier</label>
                          <input type="text" class="form-control border-0 bg-gray-300 rounded" name="supplier" id="supplier" required>
                        </div>
                        <div class="mb-3">
                          <label for="quantity" class="form-label font-sans font-medium capitalize">Quantity</label>
                          <input type="number" class="form-control border-0 bg-gray-300 rounded" name="quantity" id="quantity" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn bg-lime-600 hover:bg-lime-700 text-neutral-100 hover:text-neutral-100">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>

{{-- edit procurement item modal --}}
<div class="modal fade" id="editItemModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title ms-auto font-medium text-lime-800" id="exampleModalLabel">Edit Procurement Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
  
                <form method="GET" action="{{ route('updateItem', ['procurementItem' => $item->id]) }}"  enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                      <label for="itemName" class="form-label font-sans font-medium capitalize">Item Name</label>
                      <input type="text" class="form-control border-0 bg-gray-300 rounded" name="itemName" id="itemName" value="{{ $item->itemName }}" required>
                    </div>
                    <div class="mb-3">
                      <label for="supplier" class="form-label font-sans font-medium capitalize">Supplier</label>
                      <input type="text" class="form-control border-0 bg-gray-300 rounded" name="supplier" id="supplier" value="{{ $item->supplier }}" required>
                    </div>
                    <div class="mb-3">
                      <label for="quantity" class="form-label font-sans font-medium capitalize">Quantity</label>
                      <input type="number" class="form-control border-0 bg-gray-300 rounded" name="quantity" id="quantity" value="{{ $item->quantity }}" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn bg-lime-600 hover:bg-lime-700 text-neutral-100 hover:text-neutral-100">Save</button>
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
        $('#procurementTable').DataTable({
            rowReorder: true
        });
    });
</script>
    
@include('footer.footer')
@endsection