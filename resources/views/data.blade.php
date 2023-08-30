<!doctype html>
<html lang="en">

<head>
    <title>NoteBook</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    @include('header'); {{-- include header --}}
    {{-- show flash msg start --}}
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    {{-- end flash msg --}}
    <div class="text-center">
        <h1>{{ $heading }}</h1> {{-- dynamic heading --}}
    </div>

    <div class="container">
        {{-- form start --}}
        <form action="{{ url($url) }}"method="post" enctype="multipart/form-data">

            @csrf
            <div class="mb-3">

                <label for="exampleFormControlInput1" class="form-label">Note Title</label>
                <input type="text" class="form-control @error('title') border border-danger @enderror" name="title"
                    value="{{ isset($edit) ? $edit->title : '' }}" id="exampleFormControlInput1" placeholder="">

                @error('title')
                    {{-- validation start --}}

                    {{ $message }}

                    <span class="text-danger">


                        <span class="border border-danger"></span>
                    @enderror
                </span>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Note Description</label>
                <textarea class="form-control"name="desc" id="exampleFormControlTextarea1" rows="3">{{ isset($edit) ? $edit->desc : '' }}</textarea>
                <span class="text-danger">
                    @error('desc')
                        {{ $message }}
                    @enderror {{-- validation end --}}
                </span>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Upload Image</label>
                <input type="file" class="form-control" name="image"
                    value="{{ isset($edit) ? $edit->image : '' }}">
            </div>
            <button type="submit" class="btn btn-primary">{{ $button }}</button>

        </form>
        {{-- form end --}}
        <br><br>
        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">S/NO</th>
                        <th scope="col">title</th>
                        <th scope="col" style="width : 100px">description</th>
                        <th scope="col">Image</th>
                        <th colspan="3" class="text-center">action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $sno = 0;
                    @endphp
                    @if (count($read)) {{-- check table data --}}
                        @foreach ($read as $item)
                            @php
                                $sno = $sno + 1;
                            @endphp
                            <tr>
                                <td>{{ $sno }}</td>
                                <td>
                                    <h3>{{ $item->title }}</h3>
                                </td>
                                <td>
                                    <div style="width : 300px">
                                        <p class="text-truncate">{{ $item->desc }}</p>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <a target="_blank" href="{{ asset('images/' . $item->image) }}">
                                            <img src="{{ asset('images/' . $item->image) }}"width="50px"
                                                height="50px" alt="image">
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <a name="" id="" class="btn btn-warning"
                                        href="{{ url('reading', ['id' => $item->id]) }}" role="button">
                                        Read
                                    </a>
                                </td>
                                <td>
                                    <a name="" id="" class="btn btn-primary"
                                        href="{{ route('data.edit', ['id' => $item->id]) }}" role="button">
                                        Edit
                                    </a>
                                </td>
                                <td><a href="#" role="button"><button
                                            onclick="myFunction('{{ route('data.delete', ['id' => $item->id]) }}')"
                                            class="btn btn-danger">Delete</button></a></td>
                            </tr>
                </tbody>
                @endforeach
            @else
                {{-- else for no data found --}}
                <tr>
                    <td colspan="4" class="text-center">
                        No data found!
                    </td>
                </tr>
                @endif



            </table>
        </div>

    </div>
    <script>
        function myFunction(url) {
            if (confirm("Are you sure to delete!") == true) {
                window.location.href = url;
            } else {}
        }
    </script>

</body>

</html>
