@extends('layouts.adminltee')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Donors List</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Filter box -->
    <div class="mb-4">
        <input type="text" id="donorFilter" class="form-control" placeholder="Search donors by name or blood type">
    </div>

    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th onclick="sortTable(0)">Name</th>
                <th onclick="sortTable(1)">Email</th>
                <th onclick="sortTable(2)">Phone Number</th>
                <th onclick="sortTable(3)">Blood Type</th>
                <th onclick="sortTable(4)">Total Donations</th>
            </tr>
        </thead>
        <tbody id="donorsTable">
            @if($donors->isEmpty())
            <tr>
                <td colspan="5" class="text-center">No donors found.</td>
            </tr>
            @else
                @foreach($donors as $donor)
                <tr>
                    <td>{{ $donor->full_name }}</td>
                    <td>{{ $donor->email }}</td>
                    <td>{{ $donor->phone }}</td>
                    <td><i class="fas fa-tint"></i> {{ $donor->blood_type }}</td>
                    <td class="font-weight-bold">{{ $donor->donation_count }}</td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>

<script>
    // Filter function
    document.getElementById('donorFilter').addEventListener('keyup', function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll('#donorsTable tr');
        
        rows.forEach(row => {
            let name = row.cells[0].textContent.toLowerCase();
            let bloodType = row.cells[3].textContent.toLowerCase();
            if (name.includes(filter) || bloodType.includes(filter)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });

    // Sort function
    function sortTable(n) {
        let table = document.querySelector('table');
        let rows = table.rows;
        let switching = true;
        let shouldSwitch;
        let dir = 'asc'; 
        let switchCount = 0;

        while (switching) {
            switching = false;
            let rowsArray = Array.from(rows).slice(1);
            for (let i = 0; i < rowsArray.length - 1; i++) {
                shouldSwitch = false;
                let x = rowsArray[i].getElementsByTagName('TD')[n];
                let y = rowsArray[i + 1].getElementsByTagName('TD')[n];
                if (dir === 'asc') {
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                } else if (dir === 'desc') {
                    if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                }
            }
            if (shouldSwitch) {
                rowsArray[i].parentNode.insertBefore(rowsArray[i + 1], rowsArray[i]);
                switching = true;
                switchCount++;
            } else {
                if (switchCount === 0 && dir === 'asc') {
                    dir = 'desc';
                    switching = true;
                }
            }
        }
    }
</script>
@endsection
