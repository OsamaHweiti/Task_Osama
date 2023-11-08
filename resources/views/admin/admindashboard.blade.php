@extends('admin/adminmaster')
@extends('admin/include/header')


@section('title', 'Dashboard')


@section('main')

    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="container border-radius">

                <div id="adddiv" style="background-color: white; text-align: center; padding:1%; display:none">
                    <form method="post" action="" enctype="multipart/form-data">
                        @csrf
                        <label class="col-2">Name:</label>
                        <input class="col-5" type="text" name="name" required><br>
                        <label class="col-2">description:</label>
                        <input class="col-5" type="text" name="description" required><br>
                        <label class="col-2">Photo:</label>
                        <input class="col-5" type="file" name="photo" required><br>

                        <br>
                        <input type="submit" class="btn btn-outline-secondary" value="Add Serives">
                    </form>

                </div>
            </div>
            <hr>
            <div class="col-lg-12">
                <!-- USER DATA-->
                <div class="user-data m-b-30" style="background-color: white;padding:2%">
                    <div class="row justify-content-between mb-3">
                        <div class="col-lg-8">
                            <h3 class="title-3">
                                <i class="zmdi zmdi-account-calendar"></i> Blogs
                            </h3>
                        </div>
                        <div class="col mb-2">

                            <form method="post">
                                <p style="text-align: left; color: #888">Total number of Blogs :{{$sum}} &nbsp;
                                    <a href="javascript:void(0)" class="btn btn-success mb-2" id="new-blogs" data-toggle="modal">New blogs</a>
                            </form>
                        </div>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="table-responsive table-data" style="height: 450; overflow: auto;">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>photo</td>
                                        <td>title</td>
                                        <td>Category</td>
                                        <td>Show</td>
                                        <td>Edit</td>
                                        <td>Delete</td>
                                        

                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($blogs as $blog)
                                        <tr class="mb-3">
                                            <td>{{ $blog->id }}</td>
                                            <td>
                                                <img src="{{ asset('images/' . $blog->photo) }}" class="img-fluid" style="max-width: 100px; max-height: 100px;">
                                            </td>
                                            
                                            <td>{{ $blog->title }}</td>
                                            <td>{{ $blog->category }}</td>
                                            
                                            <td>
                                               
                                                <a class="btn btn-info" id="show-blogs" data-toggle="modal" data-id="{{ $blog->id }}" >Show</a>
                                            </td>
                                            <td> 
                                                 <a href="javascript:void(0)" class="btn btn-success" id="edit-blogs" data-toggle="modal" data-id="{{ $blog->id }}">Edit </a>
                                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                            </td>
                                            <td> 
                                                <form method="post"action="{{ route('dashboard.destroy', $blog->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" class="btn btn-danger delete-user" value="Delete">
                                                </form>
                                              
                                            </td>
                                         
                                           
                                           
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!-- END USER DATA-->
                </div>
                <!-- Add and Edit blogs modal -->
                <div class="modal fade" id="crud-modal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="blogsCrudModal"></h4>
                            </div>
                            <div class="modal-body">
                                <form name="blogform" action="{{ route('dashboard.store') }}" method="POST"   enctype="multipart/form-data">
                                    <input type="hidden" name="blog_id" id="blog_id">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Title:</strong>
                                                <input type="text" name="title" id="title" class="form-control"
                                                    placeholder="Title" onchange="validate()">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Category:</strong>
                                                <input type="textarea" name="category" id="category" class="form-control"
                                                    placeholder="category" onchange="validate()">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>description:</strong>
                                                {{-- <input type="text" name="description" id="description" class="form-control"
                                                    placeholder="description" onchange="validate()" onkeypress="validate()"> --}}
                                          <textarea class="form-control" type='text' name="description" id="description"  onchange="validate()" onkeypress="validate()"></textarea>
                                          </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-13">
                                            <div class="form-group">
                                                <strong>Photo:</strong>
                                              
                                                <input type="file" name="photo" id="photo" class="form-control btn btn-light" placeholder="Picture" required>
                                            </div>
                                            
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                            <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary"
                                                disabled>Submit</button>
                                            <a href="{{ route('dashboard.index') }}" class="btn btn-danger">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- model --}}

                   <!-- Show blogs modal -->
    <div class="modal fade" id="crud-modal-show" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="blogsCrudModal-show"></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-2 col-sm-2 col-md-2"></div>
                        <div class="col-xs-10 col-sm-10 col-md-10 ">
                           
                                <table>
                                    <td>
                                        <img id="photoshow"  class="img-fluid" style="max-width: 100px; max-height: 100px;">
                                    </td>
                                    <tr>
                                        <td><strong>Title:</strong></td>
                                        <td id="titleshow"></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Category:</strong></td>
                                        <td id="categoryshow"></td>
                                    </tr>
                                    <tr>
                                        <td><strong>description:</strong></td>
                                        <td id="descriptionshow"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="text-align: right "><a
                                                href="{{ route('dashboard.index') }}" class="btn btn-danger">OK</a> </td>
                                    </tr>
                                </table>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end show --}}
            </div>


        </div>
    </div>
@endsection
