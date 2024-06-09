@extends('layouts.layout')

@section('content')
@include('navbars.navbar')

<!-- Load jQuery first -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Load DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/cscsss/dataTables.bootstrap5.min.">


<div class="flex items-center justify-center mt-20">

    <h2 class="uppercase font-serif text-lg md:text-3xl font-bold text-[#044D0B]">
        <span class="underlined underline-mask">memorandums</span>
    </h2>
</div>

<div class="mt-20 mb-20  md:mb-auto mx-auto w-[90%] overflow-hidden">

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
              <td>
                 <a href="{{ url('/download', $item->file) }}" class="btn btn-success me-3">Download</a>
              </td> 
           </tr>
           
            @endforeach
        </tbody>


    </table>
</div>

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
