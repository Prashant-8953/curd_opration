<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .registration-container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .btn-container {
            text-align: right; /* Align the button to the right */
        }
    </style>
</head>
<body>

    
<div class="container">
    <a href="{{route('view_data')}}" class="trash"><button class="btn btn-primary mt-5">Goto Home Page</button></a>
    <thead>
    <div class="row">
        <div class="col-md-6">
            <div class="registration-container">
                <h2 class="mb-4">{{$title}}</h2> 
                {{-- $url jo  formlogic me banaya use yaha fatch kar ab url change kiya lekin data view karane ke liye dusra url bana aur waha bhi title registration form diya aur compact karake data ko fatch kiya. --}}
                <form action="{{$url}}"  method="POST"> 
                    @csrf
                    <!-- Your main Blade view -->
                    <x-inputform type="text" name="name" label="Name" placeholder="Enter your first Name" value="{{ old('name', isset($edit_data) ? $edit_data->student_name : '') }}"/>
                    <span class="text-danger">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </span>
                    <x-inputform type="email" name="email" label="Email" placeholder="Enter your Email"
                    
                     value="{{ old('email',isset($edit_data) ? $edit_data->email : '') }}"/>
                    <span class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                    <x-inputform type="password" name="password" label="Password" placeholder="Enter your Password" value="{{ old('password') }}"/>
                    <span class="text-danger">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </span>

                    <x-inputform type="date" name="dob" label="DOB" placeholder="Enter your DOB" value="{{ old('dob',isset($edit_data) ? $edit_data->DOB : '') }}"/>
                    <span class="text-danger">
                        @error('dob')
                            {{ $message }}
                        @enderror
                    </span>
                    
                    <div class="btn-container">
                        <button type="submit" class="btn mt-2 btn-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="registration-container text-center">
                <h2 class="mb-4">Welcome to Our Community</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <img src="https://placekitten.com/400/300" alt="Placeholder Image" class="img-fluid mt-4">
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
