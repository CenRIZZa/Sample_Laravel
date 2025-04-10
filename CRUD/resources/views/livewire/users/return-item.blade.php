<div class="max-w-6xl mx-auto p-6 bg-base-100 rounded-box shadow-lg">
    <h1 class="text-2xl font-bold text-primary mb-4">Return Items</h1>

    @if($userId && count($itemHistories) > 0)
        <div class="alert alert-info mb-4">
            <div class="flex-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 mx-2">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span>Showing items borrowed by: {{ $itemHistories->first()->user->name ?? 'User' }}</span>
            </div>
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="table w-full">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Item</th>
                    <th>Faculty</th>
                    <th>Borrowed At</th>
                    <th>Expected Return</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($itemHistories as $history)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $history->item->name ?? 'N/A' }}</td>
                        <td>{{ $history->faculty->faculty_name ?? 'N/A' }}</td>
                        <td>{{ $history->borrowed_at }}</td>
                        <td>{{ $history->returnTime }}</td>
                        <td>
                            @if($history->is_returned)
                                <span class="badge badge-success">Returned</span>
                            @else
                                <span class="badge badge-warning">Pending</span>
                            @endif
                        </td>
                        <td>
                            @if(!$history->is_returned)
                                <button 
                                    class="btn btn-primary btn-sm"
                                    wire:click="returnItem({{ $history->id }})"
                                    wire:loading.attr="disabled"
                                >
                                    Return Item
                                </button>
                            @else
                                <span class="text-success">Returned</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">No items to return.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>