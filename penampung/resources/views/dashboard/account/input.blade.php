@extends('dashboard.index')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="ml-auto text-right">
            <nav aria-label="breadcrumb"> 
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page"> {{ $page }} Account</li>
                </ol>
            </nav>
        </div>
        <div class="row">   
            <div class="col-md-12">
                <form action="{{ route('account.simpan') }}" enctype="multipart/form-data" method="POST">
                    {{ csrf_field() }}
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="">First Name</label>
                                            <input type="text" name="first_name" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Last Name</label>
                                            <input type="text" name="last_name" class="form-control">
                                        </div>
                                        
                                        <div class="form-group col-md-6">
                                            <label for="">Birth Place</label>
                                            <input type="text" name="birth_place" class="form-control">
                                        </div>
                                        
                                        <div class="form-group col-md-6">
                                            <label for="">Birth Date</label>
                                            <div class="input-group">
                                                <input type="text" name="birth_date" id="datepicker-autoclose" class="form-control mydatepicker" placeholder="mm/dd/yyyy">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-grpup col-md-6">
                                            <label for="">Gender</label>
                                            <select name="gender" class="form-control" id="">
                                                <option value="L">Male</option>
                                                <option value="P">Female</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Photo Profile</label>
                                            <input type="file" name="photo_profile">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="">Level</label>
                                            <select name="level" class="form-control" id="">
                                                @foreach($mLevel as $lvl)
                                                    <option value="{{ $lvl->id_level }}">{{ $lvl->level }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="">Status</label>
                                            <input type="text" name="status" class="form-control">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="">Email</label>
                                            <input type="text" name="email" class="form-control">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="">Password</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>

                                        <div class="form-group col-md-6"></div>
                                        <div class="form-group col-md-6">
                                            <button class="btn btn-success"> Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop