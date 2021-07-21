<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

<!-- Include the above in your HEAD tag ---------->


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>{{Auth::User()->name}}'s Phonebook</title>
  </head>
  <body>
    <div class="container">
        <div class="row col-md-8 col-md-offset-2 custyle">
        <table class="table table-striped custab">
        <thead>
        <button href="#" id="addContactButton" class="btn btn-primary  pull-right" data-bs-toggle="modal" data-bs-target="#staticBackdrop" ><b>+</b> Add Contact</button>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone</th>
                <th>E-mail</th>
                <th>Address</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
                @foreach($contacts as $contact)
                <tr>
                    <td>{{$contact->first_name}}</td>
                    <td>{{$contact->last_name}}</td>
                    <td>{{$contact->phone}}</td>
                    <td>{{$contact->email}}</td>
                    <td>{{$contact->address}}</td>
                    <td class="text-center">
                      <a id="edit-contact-button" data-contact-id="{{$contact->id}}" data-first-name="{{$contact->first_name}}" data-last-name="{{$contact->last_name}}" data-phone="{{$contact->phone}}" data-email="{{$contact->email}}" data-address="{{$contact->address}}" class='btn btn-info btn-xs' href="#"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                      <a id="delete-contact-button" href="/delete-contact/{{$contact->id}}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Delete</a>
                    </td>
                </tr>
                @endforeach

        </table>
      </div>

      <!-- Add Contact Modal -->
      <div class="modal fade" id="addContactModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Add New Contact</h5>
            </div>
            <div class="modal-body">
              <form action="/create-contact" method="POST"  >

                <div class="form-group">
                  <label >First Name</label>
                  <input type="text" class="form-control"  placeholder="Enter First Name" name="first_name" value="John" required>
                </div>

                <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" class="form-control"  placeholder="Enter Last Name" name="last_name" value="Doe" required>
                </div>

                <div class="form-group">
                  <label >Phone</label>
                  <input type="text" class="form-control"  placeholder="Enter Phone Number" name="phone" value="555-444-3333" required>
                </div>

                <div class="form-group">
                  <label >E-mail</label>
                  <input type="email" class="form-control"  placeholder="Enter E-mail" name="email" value="jdoe@email.com" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Address</label>
                  <input type="text" class="form-control"  placeholder="Enter Address" name="address" value="123 Fake Street Sunnyvale, CA 542345" required>
                </div>
                  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <button type="submit" style="width:100%" class="btn btn-primary">Submit</button>

              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Edit Contact Modal -->
      <div class="modal fade" id="editContactModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Edit Contact</h5>
            </div>
            <div class="modal-body">
              <form action="/edit-contact" method="POST"  >

                <div class="form-group">
                  <label >First Name</label>
                  <input type="text" class="form-control" id="edit-first-name"  placeholder="Enter First Name" name="first_name" required>
                </div>

                <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" class="form-control" id="edit-last-name"  placeholder="Enter Last Name" name="last_name" required>
                </div>

                <div class="form-group">
                  <label >Phone</label>
                  <input type="text" class="form-control" id="edit-phone"  placeholder="Enter Phone Number" name="phone" required>
                </div>

                <div class="form-group">
                  <label >E-mail</label>
                  <input type="email" class="form-control" id="edit-email" placeholder="Enter E-mail" name="email" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Address</label>
                  <input type="text" class="form-control" id="edit-address"  placeholder="Enter Address" name="address" required>
                </div>
                  <input type="hidden" name="edit-contact-id" id="edit-contact-id" >
                  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <button type="submit" style="width:100%" class="btn btn-primary">Update</button>

              </form>
            </div>
          </div>
        </div>
      </div>




    </div>
    <script type="text/javascript" >
      $("#addContactButton").click(function(){
        $("#addContactModal").modal('show');
      });

      $("#edit-contact-button").click(function(){
        $("#editContactModal").modal('show');
        $("#edit-contact-id").val($(this).attr("data-contact-id"));
        $("#edit-first-name").val($(this).attr("data-first-name"));
        $("#edit-last-name").val($(this).attr("data-last-name"));
        $("#edit-phone").val($(this).attr("data-phone"));
        $("#edit-email").val($(this).attr("data-email"));
        $("#edit-address").val($(this).attr("data-address"));
      });
    </script>
  </body>
</html>
