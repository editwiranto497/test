<!DOCTYPE html>
<html>
<head>
    <title>Upload File</title>
</head>
<body>
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('upload.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="file">Pilih file:</label>
        <input type="file" name="file" id="file" required>

        <label for="destination">Pilih lokasi penyimpanan:</label>
        <select name="destination" id="destination" required>
            @foreach($storageLocations as $location)
                <option value="{{ $location->alias }}">{{ $location->alias }}</option>
            @endforeach
        </select>
        
        <button type="submit">Upload</button>
    </form>
</body>
</html>
