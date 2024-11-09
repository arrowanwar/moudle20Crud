@extends('layout.app')
@section('content')

<div id="" class="">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="POST" >
                @csrf
                <div class="modal-header">						
                    <h4 class="modal-title">Edit Employee</h4>
                    <a href="{{ route('employee.index') }}" class="btn btn-danger" >Back</a>
                </div>
                <div class="modal-body">					
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $employee->name }}" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $employee->email }}" required>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" name="" value = "{{ $employee->address }}"  required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" value="{{ $employee->email }}" required>
                    </div>					
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>

@endsection