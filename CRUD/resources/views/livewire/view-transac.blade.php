<div class="max-w-6xl mx-auto p-6 bg-base-100 rounded-box shadow-lg">
    <h1 class="text-2xl font-bold text-primary mb-4">Item History</h1>

    <div class="overflow-x-auto">
        <table class="table w-full">
            <thead>
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Item</th>
                    <th>Faculty</th>
                    <th>Borrowed At</th>
                    <th>Return Time</th>
                    <th>Returned</th>
                </tr>
            </thead>
            <tbody>
                @forelse($itemHistories as $history)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $history->user->name ?? 'N/A' }}</td>
                        <td>{{ $history->item->name ?? 'N/A' }}</td>
                        <td>{{ $history->faculty->faculty_name ?? 'N/A' }}</td>
                        <td>{{ $history->borrowed_at }}</td>
                        <td>{{ $history->returnTime }}</td>
                        <td>
                            @if($history->is_returned)
                                <span class="badge badge-success">Yes</span>
                            @else
                                <span class="badge badge-error">No</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No item history found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>