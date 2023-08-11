@extends('base')

@section('content')
<div class="container p-3">
    <div class="justify-content-center align-items-center" style="height: 80vh;">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h4>Contacts</h4>
                        </div>
                        <div class="col-md-4">
                            <button type="button" data-toggle="modal" data-target="#addContact" class="btn btn-warning float-right">Add Contact</button>
                        </div>
                    </div>
                </div>

                <div id="successMessage" class="alert alert-success" style="display: none;"></div>
                <div id="errorMessage" class="alert alert-danger" style="display: none;"></div>

                <div class="datatable-container" style="margin-left: 20px; margin-right: 20px;">
                <div class="table-responsive mt-4 mb-3">
                    <table id="contactTable" class="table align-items-center table-striped table-bordered table-hover" style="background-color: #FCFCFC;">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>City</th>
                                <th>Email</th>
                                <th>DOB</th>
                                <th>Contact No</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Contact data will be dynamically loaded here -->
                        </tbody>
                    </table>
                </div>
            </div>
                
                <!-- <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" style="background-color: #FCFCFC;">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>City</th>
                                <th>Email</th>
                                <th>DOB</th>
                                <th>Contact No</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                            <tr>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->city }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->dob }}</td>
                                <td>{{ $contact->contact_no }}</td>
                                <td>{{ $contact->created_at }}</td>
                                <td>
                                    <button type="button" class="btn btn-info" data-original-title="" title="Edit" name="edit-contact" data-toggle="modal" data-target="#editContact" value="{{ $contact->id }}">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </button>

                                    <button type="button" rel="tooltip" class="btn btn-danger" data-original-title="" title="Delete" name="delete" value="{{ $contact->id }}">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>            
                            @endforeach
                        </tbody>
                    </table>
                </div> -->
            </div>
        </div>
    </div>
</div>









<!-- Add Contact Modal -->
<div class="modal fade" id="addContact" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Add Contact</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="addContactForm">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name" class="form-control-label">Name</label>
                                    <input class="form-control" type="text" name="name" id="name" required value="{{ old('name') }}">
                                </div>
                            </div>
                        </div>                                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="city" class="form-control-label">City</label>
                                    <input class="form-control" type="text" name="city" id="city" required value="{{ old('city') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email" class="form-control-label">Email</label>
                                    <input class="form-control" id="email" type="email" name="email" required value="{{ old('email') }}">
                                </div>
                            </div>
                        </div>   
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="dob" class="form-control-label">DOB</label>
                                    <input class="form-control" id="dob" type="text" name="dob" required value="{{ old('dob') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="contact_no" class="form-control-label">Contact No</label>
                                    <input class="form-control" type="text" name="contact_no" id="contact_no" required value="{{ old('contact_no') }}">
                                </div>
                            </div>
                        </div>
                        <button type="button" id="createContact" class="btn btn-primary">Create Contact</button>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Contact Modal -->
<div class="modal fade" id="editContact" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Edit Contact</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="editContactForm">
                    @csrf
                    <input type="hidden" name="contact_id" id="contact_id">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name" class="form-control-label">Name</label>
                                    <input class="form-control" type="text" name="name" id="name" required>
                                </div>
                            </div>
                        </div>                                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="city" class="form-control-label">City</label>
                                    <input class="form-control" type="text" name="city" id="city" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email" class="form-control-label">Email</label>
                                    <input class="form-control" id="email" type="email" name="email" required>
                                </div>
                            </div>
                        </div>   
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="dob" class="form-control-label">DOB</label>
                                    <input class="form-control" id="dob" type="text" name="dob" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="contact_no" class="form-control-label">Contact No</label>
                                    <input class="form-control" type="text" name="contact_no" id="contact_no" required>
                                </div>
                            </div>
                        </div>
                        <button type="button" id="updateContact" class="btn btn-primary">Update Contact</button>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {

    //Loading Data Table
    $('#contactTable').DataTable({
        //processing: true,
        //serverSide: true,
        ajax: '{{ route('contact.index') }}', // Replace with your Laravel route URL
        columns: [
            { data: 'name', name: 'name' },
            { data: 'city', name: 'city' },
            { data: 'email', name: 'email' },
            { data: 'dob', name: 'dob' },
            { data: 'contact_no', name: 'contact_no' },
            {
                data: null,
                render: function(data, type, row) {
                    return `
                        <button type="button" class="edit-button btn btn-info" data-original-title="" title="Edit" name="edit-contact" data-toggle="modal" data-target="#editContact" value="${row.id}">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </button>

                        <button type="button" rel="tooltip" class="delete-button btn btn-danger" data-original-title="" title="Delete" name="delete" value="${row.id}">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                    `;
                }
            }
        ]
    });


    //DatePicker
    $("#dob").datepicker({    
        format: 'yyyy-mm-dd',
        endDate: new Date()
    });


    //Create Contact
    $('#createContact').click(function() {
        var formData = $('#addContactForm').serialize(); // Serialize the form data

        $.ajax({
            type: 'POST',
            url: '/store-contact',
            data: formData,
            success: function(response) {
                $("#addContact .close").click();
                $('#contactTable').DataTable().ajax.reload();
                $('#addContactForm')[0].reset();
                
                if(response.success)
                {
                    $('#successMessage').text(response.success).show();
                    $('#errorMessage').hide();
                }
                else
                {
                    $('#errorMessage').text(response.error).show();
                    $('#successMessage').hide(); 
                }
            },
            error: function(xhr, status, error) {
                //
            }
        });
    });


    //Edit Contact - load data
    //$('[name=edit-contact]').click(function() {
    $('#contactTable').on('click', '.edit-button', function() {
        var contact_id = $(this).val();

        $.ajax({
            type: 'GET',
            url: '/edit-contact/' + contact_id,
            success: function(response) {
                $('#editContactForm #name').val(response.name);
                $('#editContactForm #city').val(response.city);
                $('#editContactForm #email').val(response.email);
                $('#editContactForm #dob').val(response.dob);
                $('#editContactForm #contact_no').val(response.contact_no);
                $('#editContactForm #contact_id').val(contact_id);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });

    //Edit Contact
    $('#updateContact').click(function() {
        var formData = $('#editContactForm').serialize(); // Serialize the form data

        $.ajax({
            type: 'POST',
            url: '/update-contact',
            data: formData,
            success: function(response) {
                $("#editContact .close").click();
                $('#contactTable').DataTable().ajax.reload();

                if(response.success)
                {
                    $('#successMessage').text(response.success).show();
                    $('#errorMessage').hide();
                }
                else
                {
                    $('#errorMessage').text(response.error).show();
                    $('#successMessage').hide(); 
                }
            },
            error: function(xhr, status, error) {
                //
            }
        });
    });


    //Delete Contact
    //$('[name=delete]').click(function (){
    $('#contactTable').on('click', '.delete-button', function() {
        var value = $(this).val();
        
        swal("Are you sure you want to delete?", {
          dangerMode: true,
          buttons: true,
        }).then((Delete) => 
        {
            if (Delete)
            {
                $.ajax({
                      url: "/delete-contact/" + value,
                      type: 'GET',
                      success: function(){
                          swal({
                            title: "Contact deleted successfully!",
                          }).then(function(){ 
                                //location.reload();
                                $('#contactTable').DataTable().ajax.reload();
                            }
                        );
                    }
                });
            }    
        }).catch(swal.noop);
    });
});
</script>