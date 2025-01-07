{{-- @extends('layouts.app') <!-- Pastikan ini sesuai dengan file layout dashboard Anda -->

@section('content')
    <div class="container">
        <h1>Event Management</h1>
        <a href="{{ route('events.create') }}" class="btn btn-primary">Create Event</a>
        <table id="eventTable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Event Name</th>
                    <th>Description</th>
                    <th>Event Date</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#eventTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('events.index') }}",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'event_name', name: 'event_name' },
                { data: 'description', name: 'description' },
                { data: 'event_date', name: 'event_date' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
    });
</script>
@endpush --}}
