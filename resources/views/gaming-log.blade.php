@extends('layouts.app')

@section('title', 'My Gaming Log')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>My Gaming Log</h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#gameModal" onclick="resetForm()">
            <i class="bi bi-plus-circle"></i> Add Record
        </button>
    </div>

    <div class="table-responsive bg-white p-3 rounded shadow-sm">
        <table class="table table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Game Title</th>
                    <th>Device</th>
                    <th>Hours</th>
                    <th>Rating</th>
                    <th>Comments</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="logTableBody">
                @forelse($logs as $log)
                    <tr id="row-{{ $log->id }}">
                        <td>{{ $log->game_title }}</td>
                        <td>{{ $log->device }}</td>
                        <td>{{ $log->hours }}</td>
                        <td>{{ $log->rating }}</td>
                        <td>{{ $log->comments }}</td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary" onclick="editRecord({{ $log->id }})">
                                <i class="bi bi-pencil"></i> Edit
                            </button>
                            <button class="btn btn-sm btn-outline-danger" onclick="deleteRecord({{ $log->id }})">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr id="no-records">
                        <td colspan="6" class="text-center text-muted py-4">
                            No gaming records yet. Click "Add Record" to get started!
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="gameModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Add Game Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="record_id">
                <div class="mb-3">
                    <label class="form-label">Game Title *</label>
                    <input type="text" id="game_title" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Device *</label>
                    <input type="text" id="device" class="form-control" required>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Hours *</label>
                        <input type="number" id="hours" class="form-control" required min="0">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Rating *</label>
                        <select id="rating" class="form-select" required>
                            <option value="">Select rating</option>
                            <option value="5/5">5/5 - Excellent</option>
                            <option value="4.5/5">4.5/5 - Great</option>
                            <option value="4/5">4/5 - Good</option>
                            <option value="3.5/5">3.5/5 - Above Average</option>
                            <option value="3/5">3/5 - Average</option>
                            <option value="2/5">2/5 - Below Average</option>
                            <option value="1/5">1/5 - Poor</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Comments</label>
                    <textarea id="comments" class="form-control" rows="3"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="saveRecord()">Save Record</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
let editingId = null;

function resetForm() {
    editingId = null;
    document.getElementById('modalTitle').textContent = 'Add Game Record';
    document.getElementById('game_title').value = '';
    document.getElementById('device').value = '';
    document.getElementById('hours').value = '';
    document.getElementById('rating').value = '';
    document.getElementById('comments').value = '';
    document.getElementById('record_id').value = '';
}

function saveRecord() {
    const game_title = document.getElementById('game_title').value;
    const device = document.getElementById('device').value;
    const hours = document.getElementById('hours').value;
    const rating = document.getElementById('rating').value;
    const comments = document.getElementById('comments').value;

    if (!game_title || !device || !hours || !rating) {
        alert('Please fill in all required fields!');
        return;
    }

    const formData = new FormData();
    formData.append('_token', '{{ csrf_token() }}');
    formData.append('game_title', game_title);
    formData.append('device', device);
    formData.append('hours', hours);
    formData.append('rating', rating);
    formData.append('comments', comments);

    let url = '{{ route("gaming-log.store") }}';
    let method = 'POST';

    if (editingId) {
        url = `/gaming-log/${editingId}`;
        formData.append('_method', 'PUT');
    }

    fetch(url, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error saving record. Check console for details.');
    });
}

function editRecord(id) {
    editingId = id;
    const row = document.querySelector(`#row-${id}`);
    
    document.getElementById('game_title').value = row.cells[0].textContent;
    document.getElementById('device').value = row.cells[1].textContent;
    document.getElementById('hours').value = row.cells[2].textContent;
    document.getElementById('rating').value = row.cells[3].textContent;
    document.getElementById('comments').value = row.cells[4].textContent;
    document.getElementById('modalTitle').textContent = 'Edit Game Record';
    
    const modal = new bootstrap.Modal(document.getElementById('gameModal'));
    modal.show();
}

function deleteRecord(id) {
    if (confirm('Are you sure you want to delete this record?')) {
        const formData = new FormData();
        formData.append('_token', '{{ csrf_token() }}');
        formData.append('_method', 'DELETE');

        fetch(`/gaming-log/${id}`, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error deleting record.');
        });
    }
}
</script>
@endpush