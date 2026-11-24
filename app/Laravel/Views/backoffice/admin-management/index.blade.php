@extends('backoffice._layouts.main')

@section('content')
    <div class="d-flex">
        <main class="flex-grow-1 p-3 p-md-4 p-lg-5" style="min-width:0">

            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
                <div>
                    <h3 class="fw-medium mb-1">Account Management</h3>
                    <p class="text-primary small mb-0">
                        Manage and organize user accounts
                    </p>
                </div>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-header bg-body-tertiary text-primary fw-medium py-3 px-3">
                    <i class="bi bi-people me-2"></i>Admin Accounts
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" class="px-3 py-3">Name</th>
                                    <th scope="col" class="py-3">Email Address</th>
                                    <th scope="col" class="py-3 text-end pe-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($records as $record)
                                    <tr>
                                        <td class="px-3 py-3 fw-medium">
                                            {{ $record->name }}
                                        </td>
                                        <td class="py-3 text-body-secondary">
                                            {{ $record->email }}
                                        </td>
                                        <td class="py-3 text-end pe-3">
                                            <div class="d-inline-flex gap-1">
                                                <a href="{{ route('backoffice.admin-management.show', $record->id) }}"
                                                    class="btn btn-light border btn-sm" title="View Account">
                                                    <i class="bi bi-eye"></i>
                                                    <span class="d-none d-md-inline ms-1">View</span>
                                                </a>

                                                <a href="{{ route('backoffice.admin-management.edit', $record->id) }}"
                                                    class="btn btn-primary btn-sm" title="Edit Account">
                                                    <i class="bi bi-pencil-square"></i>
                                                    <span class="d-none d-md-inline ms-1">Edit</span>
                                                </a>
                                                <form
                                                    action="{{ route('backoffice.admin-management.delete', $record->id) }}"
                                                    method="GET" class="delete-form d-inline">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="submit-btn btn btn-danger btn-sm"
                                                        title="Delete Account">
                                                        <i class="bi bi-trash"></i>
                                                        <span class="d-none d-md-inline ms-1">Delete</spa n>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center py-4 text-body-secondary">
                                            <i class="bi bi-person-x fs-4 d-block mb-2"></i>
                                            No accounts found.
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>

                @if ($records instanceof \Illuminate\Pagination\AbstractPaginator && $records->hasPages())
                    <div class="card-footer bg-body-tertiary border-top py-3 px-3">
                        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center gap-2">
                            <small class="text-body-secondary">
                                Showing <span class="fw-medium">{{ $records->firstItem() }}</span>
                                to <span class="fw-medium">{{ $records->lastItem() }}</span>
                                of <span class="fw-medium">{{ $records->total() }}</span> accounts
                            </small>

                            <nav aria-label="Account pagination">
                                {{ $records->onEachSide(1)->links('pagination::bootstrap-5') }}
                            </nav>
                        </div>
                    </div>
                @endif
            </div>

        </main>
    </div>
@endsection

@section('page-scripts')
    <script>
        document.querySelectorAll('.delete-form').forEach((form) => {
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                Swal.fire({
                    title: "Delete Account?",
                    text: "Are you sure you want to delete this account?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "red",
                    cancelButtonColor: "#6c757d",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: 'CANCELLLLL',
                    buttonsStyling: false,
                    customClass: {
                        confirmButton: 'btn btn-danger me-2',
                        cancelButton: 'btn btn-secondary'
                    }
                }).then((result) => {

                    if (result.isConfirmed) {
                        form.submit();
                        Swal.fire({
                            title: "Deleted!",
                            text: "Account has been deleted.",
                            icon: "success"
                        });
                    }
                });
            });
        });
    </script>
@endsection
