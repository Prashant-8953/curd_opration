<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom Styles */
        .custom-table {
            border: 1px solid #dee2e6;
            margin-top: 20px;
        }

        .custom-table th,
        .custom-table td {
            border: 1px solid #dee2e6;
        }

        .custom-table thead th {
            background-color: #3300ff94;
            color: #fff;
        }

        .custom-table tbody tr:hover {
            background-color: #f5f5f5;
        }

        .btnanchar {
            position: relative;
            left: 920px;
        }

        .trash {
            position: relative;
            left: 930px;
        }

        /* New Styles for Search Box */
        .search-container {
            display: flex;
            align-items: center;
            margin-top: 20px;
        }

        .search-input {
            flex: 1;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-right: 8px;
        }

        .search-button {
            padding: 8px 16px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div class="container">
      
      <table class="table table-bordered custom-table">
          <div class="search-container">
            <form action="">
            <input type="search" name="search" class="search-input" placeholder="Search by name or email" value="{{ trim($search) }}">

          <button class="search-button">Search</button>
        </form>
        <a href="{{route('view_data')}}"><button type="btn" class="search-button ml-2 bg-primary">Reset</button></a>
          </div>
          <a href="{{route('insert_data')}}" class="btnanchar"><button class="btn btn-success mt-5">Add</button></a>
            <a href="{{route('trash_data_display')}}" class="trash"><button
                    class="btn btn-danger mt-5 ml-2 ">Goto Trash</button></a>
            <thead>
                <tr>
                    <th scope="col">stud_id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">DOB</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                {{-- array se data ko nikalne/itration ke liye foreach me data vo pass kiya --}}
                @foreach ($display_data as $value)
                <tr>
                    <th scope="row">{{$value['student_id']}}</th>
                    <td>{{$value['student_name']}}</td>
                    <td>{{$value['email']}}</td>
                    <td>{{$value['DOB']}}</td>
                    <td>
                        <a href="{{ route('delete_data', ['id' => $value['student_id']]) }}" class="">
                            <button class="btn btn-danger">Move to Trash</button>
                        </a>
                        <a href="{{ route('edit_data', ['id' => $value['student_id']]) }}" class=""><button
                                class="btn btn-success">Edit</button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
