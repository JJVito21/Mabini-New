@extends('layouts.layout')

@section('content')
@include('navbars.navbar')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Load DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/cscsss/dataTables.bootstrap5.min.">


<div class="mb-40 lg:mb-56">

  <div class="flex items-center justify-center mt-20">

    <h2 class="uppercase font-serif text-lg md:text-3xl font-bold text-[#044D0B]">
        <span class="underlined underline-mask">Procurement</span>
    </h2>
</div>

<div class="mt-20 mb-20  lg:mb-auto mx-auto w-[90%] overflow-hidden">

    <table id="procurementTable" class="display  table table-light table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Item Name</th>
                <th>Date</th>
                <th>Supplier</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($procurementItem as $item)
            
            <tr>
              <td>{{ $item->itemName }}</td>
              <td>{{ $item->created_at->format('Y-m-d') }}</td>
              <td>{{ $item->supplier }}</td>
              <td>{{ $item->quantity }}</td>
           </tr>
           
            @endforeach
        </tbody>


    </table>
</div>
</div>

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
