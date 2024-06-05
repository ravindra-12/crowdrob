<!DOCTYPE html>
<html>
<head>
    <title>Launch Setting</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    @extends('layout')
    @section('content')

    <div class="container mt-5">
        <h1 class="text-center mb-4">Launch Setting</h1>
        <div class="alert alert-info">
            <p>Action: Use the checkbox below to toggle the status of ads. Currently, it reflects the current state. Check the box labeled "Ads" to activate advertisements, or uncheck it to deactivate them.</p>
        </div>
    
        <form method="POST" action="{{ route('launch-setting.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="launchSetting" name="launchSetting" 
                    {{ old('launchSetting', isset($launchSetting['launchSettingTemp']) && $launchSetting['launchSettingTemp'] ? 'checked' : '') }}>
                <label class="form-check-label" for="launchSetting">Launch Setting</label>
            </div>
            <div class="form-group mt-3">
                <label for="adsimage">Ads Image</label>
                <input type="file" class="form-control" id="adsimage" name="adsimage">
                <img src="{{ $launchSetting['adsImage'] }}" alt="Ads Image" style="max-width: 100px;">
                <input type="hidden" name="currentAdsImage" value="{{ $launchSetting['adsImage'] }}">
            </div>
            <div class="form-group mt-3">
                <label for="adsUrl">Ads URL</label>
                <input type="text" class="form-control" id="adsUrl" name="adsUrl" placeholder="Enter Ads URL" value="{{ old('adsUrl', $launchSetting['adsUrl'] ?? '') }}">
            </div>
            <div class="form-group mt-3">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" placeholder="Enter Description">{{ old('description', $launchSetting['adsDescription'] ?? '') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Update</button>
        </form>
    </div>
    @endsection
</body>
</html>
