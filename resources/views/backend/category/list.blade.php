@extends('layouts.backend_master')

@section('main_content')
<div class="row">
    <div class="col-lg-8">
        <div class="card-style mb-30">
            <h6 class="mb-10">All Categories</h6>
            <div class="table-wrapper table-responsive">
                <table class="table striped-table">
                    <thead>
                        <tr>
                            <th>Sl. No.</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        <!-- end table row-->
                    </thead>
                    <tbody>

                        @forelse ($categories as $key=> $category)
                        <tr>
                            <td>
                                <h6 class="text-sm">#{{ $categories->firstItem() + $key }}</h6>
                            </td>
                            <td>
                                <p>{{ $category->name }}</p>
                            </td>
                            <td>
                                <p>{{ $category->slug }}</p>
                            </td>
                            <td>
                                <div class="form-check form-switch toggle-switch">
                                    <input class="form-check-input" type="checkbox" id="toggleSwitch2" {{
                                        $category->status ? 'checked' : '' }}>
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('category.edit', $category->id) }}"
                                    class="btn-sm main-btn info-btn btn-hover">
                                    <i class="lni lni-pencil-alt"></i>
                                </a>
                                <button class="btn-sm main-btn danger-btn btn-hover delete_btn">
                                    <i class="lni lni-trash-can"></i>
                                </button>
                                <form method="POST" action="{{ route('category.delete', $category->id) }}">
                                    @method('DELETE')
                                    @csrf
                                </form>
                            </td>
                        </tr>
                        <!-- end table row -->
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-danger"><strong>No Data Found!</strong></td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
                <!-- end table -->
            </div>
            <div>
                {{ $categories->links() }}
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card-style mb-30">
            <h6 class="mb-25">{{ isset($editData) ? 'Update' : 'Create New' }} Category</h6>
            <form action="{{ isset($editData) ? route('category.update', $editData->id) : route('category.store') }}"
                method="POST">
                @isset($editData)
                @method('PUT')
                @endisset
                @csrf
                <div class="input-style-1">
                    <label>Category Name</label>
                    <input type="text" placeholder="Category Name" name="name"
                        value="{{ isset($editData) ? $editData->name : '' }}">
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <!-- end input -->
                <button type="submit"
                    class="w-100 btn-sm main-btn primary-btn btn-hover">{{ isset($editData) ? 'Update' : 'Create New' }}
                    Category</button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('additional-js')
<script src="{{ asset('backend/assets/js/sweetalert2@11.js') }}"></script>
<script>
    $('.delete_btn').on('click', function() {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).next('form').submit();
                }
            });
        })
</script>
@endpush
