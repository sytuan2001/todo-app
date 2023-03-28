<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo list</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-group">

                    <li class="list-group-item" id="addNew">Todo list</li>
                    <li class="list-group-item">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">

                                <li class="page-item"><a class="page-link" href="#">
                                        <div class="checkbox">
                                            <input class="form-check-input" type="checkbox" value="">
                                        </div>
                                    </a></li>
                                <li class="page-item"><a class="page-link" href="#" ><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path
                                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                        </svg></a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>

                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                <li class="page-item"><a class="page-link" href="#" data-bs-toggle="modal"
                                        data-bs-target="#exampleModalCreate">+</a></li>
                        </nav>

                    </li>
                    @foreach ($tasks as $key => $item)
                        <li class="list-group-item ourItem">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="">
                                <label class="form-check-label task-item" for="flexCheckIndeterminate">
                                    <h5 data-bs-toggle="modal" data-bs-target="#exampleModal"><span class="label-text"
                                            data-id="{{ $item->id }}">{{ $item->title }}</span>
                                    </h5>
                                </label>
                            </div>
                        </li>
                    @endforeach

                </ul>
            </div>
 

            <!-- Modal 1-->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Task</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{route('todo.create')}}" method="POST" id="form_create1">
                            <div class="modal-body">
                                <p>
                                    <input type="text" placeholder="Nhập ở đây" id="addItem" class="form-control">
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                    style="display: none">Close</button>
                                <button type="button" class="btn btn-primary" id="editTask">Add Task</button>
                                <button type="button" class="btn btn-primary" id="saveChangesEdit">Save
                                    Changes</button>
                            </div>
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal 2-->
            <div class="modal fade" id="exampleModalCreate" tabindex="-1" aria-labelledby="exampleModalLabelCreate"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{route('todo.store')}}" method="POST" id="form_create">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add new Task</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    <input type="text" placeholder="Nhập ở đây" id="addItem" name="title" class="form-control">
                                </p>
                                <div>
                                    <textarea name="description" class="form-group" cols="60" rows="10" placeholder="Mô tả"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                    style="display: none">Close</button>
                                <button type="submit" class="btn btn-primary" id="addTask">Add Task</button>
                                {{ csrf_field() }}
                                {{--  <button type="button" class="btn btn-primary" id="saveChanges">Save Changes</button>  --}}
                            </div>
                        </form>
                       
                    </div>
                </div>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <script src="https://code.jquery.com/jquery-3.6.4.min.js"
                integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
                integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
            </script>
            <script>
                $(document).ready(function() {
                    $('.task-item').click(function() {
                        var text = $(this).find('.label-text').text();
                        $('#exampleModalLabel').text('Edit Item');
                        $('#addItem').val(text);
                        $('#addTask').hide('400');
                        var id = $(this).find('.label-text').data('id');
                        console.log(text);
                    });

                    $('#form_create').submit(function(event) {

                        event.preventDefault();
                        var dataCreate = $(this).serialize();
                        $.ajax({
                            type: "POST",
                            url: $(this).attr("action"),
                            data: dataCreate,
                            dataType: 'json',
                            success: function(data) {
                                console.log(text);
                              }
                          });


                        
                    });
                });
            </script>
</body>

</html>
